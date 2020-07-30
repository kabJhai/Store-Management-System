<?php
include "functions.php";

session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $DBcon->query("SELECT * FROM employee WHERE email = '".$email."'");
    $count = mysqli_num_rows($query);
    if($count == 0) {
        header("Location:../login");
    }else{
        $row=$query->fetch_array();
        $password_db = $row['pass'];
        if($password_db == $password){
            $_SESSION['user'] = $row['email'];
            $_SESSION['fn'] = $row['first_name'];
            $_SESSION['ln'] = $row['last_name'];
            $_SESSION['did'] = $row['DID'];
            $_SESSION['USERID'] = $row['USERID'];
            $query = $DBcon->query("SELECT * FROM departments WHERE DID = '".$row['DID']."'");
            $row=$query->fetch_array();
            $_SESSION['department_name'] = $row['department_name'];
            header("Location:../index");
        }else{
            header("Location:../login");
        }
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("Location:../login");
}

if(isset($_POST['srv'])){
    $serial_number = $_POST['serial_number'];
    $did = $_POST['DID'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $qty_req = $_POST['qty_requested'];
    $qty_issued = $_POST['qty_issued'];
    $unit_price = $_POST['unit_price'];
    $total_price = $_POST['total_price'];
    $remark = $_POST['remark'];
    $requested_by = $_POST['requested_by'];
    $approved_by = $_POST['approved_by'];
    echo $serial_number;
    $length = count($code);

    for ($i=0; $i < $length; $i++) { 
        try{
                if($query = $DBcon->query("INSERT INTO
                srv(
                serial_number,
                DID,
                code,
                description,
                unit,
                qty_requested,
                qty_issued,
                unit_price,
                total_price,
                remark,
                requested_by,
                approved_by,
                USERID)
                VALUES
                (".$serial_number.",'".$did."','".$code[$i]."','".$description[$i]."','".$unit[$i]."','".$qty_req[$i]."','0',
                '".$unit_price[$i]."','".$total_price[$i]."','".$remark[$i]."','".$requested_by."','".$approved_by."',
                '".$_SESSION['USERID']."')")){
                    echo "Successfully saved";

            }else{
                echo "There is an error!";
            }
        }catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
         }
        }
        $query = $DBcon->query("SELECT * FROM heads WHERE DID = '".$did."'");
        $row=$query->fetch_array();
        $head_id = $row['USERID'];
        Send_Notification('SRV Approval',$_SESSION['fn']." ".$_SESSION['ln'].' is waiting for your approval...',$head_id,$serial_number,'srv',$_SESSION['USERID'],$DBcon);
    
    $serial_number++;
    $query = $DBcon->query("UPDATE sno SET current_number = ".$serial_number."  WHERE document_type = 'srv'");

}

if(isset($_POST['siv'])){
    $serial_number = $_POST['serial_number'];
    $did = $_POST['DID'];
    $issuing_store = $_POST['issuing_store'];
    $grv_number = $_POST['grv_number'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $qty_req = $_POST['qty_requested'];
    $qty_issued = $_POST['qty_issued'];
    $unit_price = $_POST['unit_price'];
    $total_price = $_POST['total_price'];
    $remark = $_POST['remark'];
    $store_keeper = $_POST['store_keeper'];
    $recepient_name = $_POST['recepient_name'];
    $authorized_by = $_POST['authorized_by'];
    $uid = $_POST['uid'];
    $sn = $_POST['sn'];
    $total_value = $_POST['total_val'];
    echo $serial_number;
    $length = count($code);

    for ($i=0; $i < $length; $i++) { 
            if($query = $DBcon->query("INSERT INTO
            siv(serial_number,
            DID,
            code,
            description,
            unit,
            qty_requested,
            qty_issued,
            unit_price,
            total_price,
            remark,
            store_keeper,
            recepient_name,
            authorized_by,
            issuing_store,
            grv_number)
           VALUES
           (".$serial_number.",'".$did."','".$code[$i]."'
           ,'".$description[$i]."','".$unit[$i]."','".$qty_req[$i]."',
           '".$qty_issued[$i]."','".$unit_price[$i]."','".$total_price[$i]."',
           '".$remark[$i]."','".$store_keeper."','".$recepient_name."',
           '".$authorized_by."','".$issuing_store."',".$grv_number.")")){
               echo "Successfully saved";
               $stock_balance = $total_value[$i] - $qty_req[$i];
                //Update the bin log
                Log_Transaction($uid,$code[$i],$serial_number,$stock_balance,"siv",$DBcon);
                $query = $DBcon->query("UPDATE srv SET is_provided = 1  WHERE serial_number = '".$sn."' AND code='".$code[$i]."'");
            }else{
                echo "There is an error!";
            }
        }
        $serial_number++;
        $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$sn." AND USERID='".$uid."'");
        $query = $DBcon->query("UPDATE sno SET current_number = ".$serial_number."  WHERE document_type = 'siv'");
        Send_Notification("SIV Done",$_SESSION['fn']." ".$_SESSION['ln']." finished SIV...",$uid,$serial_number,"sivdone",0,$DBcon);
}

if(isset($_POST['pr'])){
    $serial_number = $_POST['serial_number'];
    $did = $_POST['DID'];
    $to = $_POST['send_to'];
    $deliver_to = $_POST['deliver_to'];
    $item = $_POST['item'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $qty = $_POST['qty'];
    $stock_balance = $_POST['stock_balance'];
    $remark = $_POST['remark'];
    $requested_by = $_POST['requested_by'];
    $approved_by = $_POST['approved_by'];
    echo $serial_number;
    $length = count($item);

    for ($i=0; $i < $length; $i++) { 
        if($query = $DBcon->query("INSERT INTO
         pr(serial_number,
         DID,
         item,
         description,
         unit,
         qty,
         stock_balance,
         remark,
         requested_by,
         approved_by,
         send_to,
         deliver_to)
        VALUES
        (".$serial_number.",'".$did."','".$item[$i]."'
        ,'".$description[$i]."','".$unit[$i]."','".$qty[$i]."'
        ,'".$stock_balance[$i]."','".$remark[$i]."','".$requested_by."'
        ,'".$approved_by."','".$to."','".$deliver_to."')")){
            echo "Successfully saved";
    }else{
        echo "There is an error!";
    }
    $query = $DBcon->query("SELECT * FROM heads WHERE DID = 'TACON-PC'");
    $row=$query->fetch_array();
    $head_id = $row['USERID'];
    Send_Notification('PR Request',$_SESSION['fn']." ".$_SESSION['ln'].' is waiting for your approval...',$head_id,$serial_number,'pr',$_SESSION['USERID'],$DBcon);
    $serial_number++;
    $query = $DBcon->query("UPDATE sno SET current_number = ".$serial_number."  WHERE document_type = 'pr'");

}
}


if(isset($_POST['po'])){
    $serial_number = $_POST['serial_number'];
    $project_name = $_POST['project_name'];
    $part_no = $_POST['part_no'];

    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $qty_req = $_POST['qty_ordered'];
    $unit_price = $_POST['unit_price'];
    $total_price = $_POST['total_price'];
    $remark = $_POST['remark'];

    $supplier = $_POST['supplier'];
    $performa = $_POST['proforma'];
    $offer_date = date('y-m-d',strtotime($_POST['offer_date']));
    $total_birr = $_POST['total_birr'];
    $tax_birr = $_POST['tax_birr'];
    $net_birr = $_POST['net_birr'];
    $terms = $_POST['terms'];
    $delivery_time =date('y-m-d',strtotime($_POST['delivery_time']));
    $prepared_by = $_POST['prepared_by'];
    $checked_by = $_POST['checked_by'];
    $ordered_by = $_POST['ordered_by'];

    echo $serial_number;
    $length = count($part_no);

    for ($i=0; $i < $length; $i++) { 
        if($query = $DBcon->query("INSERT INTO
         po(serial_number,
         project_name,
         part_no,
         description,
         unit,
         qty_ordered,
         unit_price,
         total_price,
         remark,
         prepared_by,
         checked_by,

         supplier,
         performa,
         offer_date,
         total_birr,
         tax_birr,
         net_birr,
         terms,
         delivery_time,
         ordered_by
         )
        VALUES
        (".$serial_number.",'".$project_name."','".$part_no[$i]."','".$description[$i]."','".$unit[$i]."','".$qty_req[$i]."',
        '".$unit_price[$i]."','".$total_price[$i]."','".$remark[$i]."','".$prepared_by."','".$checked_by."'
        ,'".$supplier."'
        ,'".$performa."'
        ,'".$offer_date."'
        ,'".$total_birr."',
        '".$tax_birr."',
        '".$net_birr."'
        ,'".$terms."',
        '".$delivery_time."',
        '".$ordered_by."'
        )")){
            echo "Successfully saved";    
    }else{
        echo "There is an error!";
    }
    }
    $query = $DBcon->query("SELECT * FROM heads WHERE DID = 'TACON-PC'");
    $row=$query->fetch_array();
    $head_id = $row['USERID'];
    $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$serial_number." AND notif_type='pc_handle'");
    Send_Notification('PO Approval',$_SESSION['fn']." ".$_SESSION['ln'].' is waiting for your approval...',$head_id,$serial_number,'po_approve',$_SESSION['USERID'],$DBcon);
    $serial_number++;
    $query = $DBcon->query("UPDATE sno SET current_number = ".$serial_number."  WHERE document_type = 'po'");

}

if(isset($_POST['grn'])){
    $serial_number = $_POST['serial_number'];
    $supplier = $_POST['supplier'];
    $supplier_invoice = $_POST['supplier_invoice'];
    $pr_po_no = $_POST['pr_po_no'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $qty_req = $_POST['qty'];
    $unit_price = $_POST['unit_price'];
    $total_price = $_POST['total_price'];
    $remark = $_POST['remark'];
    $store_keeper = $_POST['store_keeper'];
    $delivered_by = $_POST['delivered_by'];
    
    $total_qty = $_POST['total_qty'];
    $total_unit = $_POST['total_unit'];
    $grand_total = $_POST['grand_total'];
    $receipt_type = $_POST['receipt_type'];

    $sending_store = $_POST['sending_store'];
    echo $serial_number;
    $length = count($code);

    for ($i=0; $i < $length; $i++) { 
        if($query = $DBcon->query("INSERT INTO
         grn(serial_number,
         supplier,
         supplier_invoice,
         pr_po_no,
         code,
         description,
         unit,
         qty,
         unit_price,
         total_price,
         remark,
         store_keeper,
         delivered_by,
         total_qty,
         total_unit,
         grand_total,
         receipt_type,
         sending_store)
        VALUES
        (".$serial_number.",'".$supplier."','".$supplier_invoice."','".$pr_po_no."','".$code[$i]."','".$description[$i]."','".$unit[$i]."','".$qty_req[$i]."',
        '".$unit_price[$i]."','".$total_price[$i]."','".$remark[$i]."','".$store_keeper."','".$delivered_by."'
        ,'".$total_qty."','".$total_unit."','".$grand_total."'
        ,'".$receipt_type."','".$sending_store."')")){
            echo "Successfully saved";
            $serial_number++;
            $query = $DBcon->query("UPDATE sno SET current_number = ".$serial_number."  WHERE document_type = 'grn'");
    }else{
        echo "There is an error!";
    }
}
}

if(isset($_POST['register'])){
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $dept = explode("-",$department);
    echo $department;
        if($query = $DBcon->query("INSERT INTO
         employee(
        first_name,
        last_name,
        phone,
        email,
        pass,
        DID
         )
        VALUES
        (
        '".$fn."',
        '".$ln."',
        '".$phone."',
        '".$email."',
        '".$password."',
        '".$department."'
        )")){
            echo "Successfully saved";
    
    }else{
        echo "There is an error!";
    }
}

if (isset($_POST['approve'])) {
    $sn = $_POST['sn'];
    $uid = $_POST['uid'];
    if($query = $DBcon->query("UPDATE srv SET is_approved = 1,approved_by='".$_SESSION['fn']." ".$_SESSION['ln']."' WHERE serial_number = ".$sn)){
        echo "Success";
        $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$sn." AND USERID='".$uid."'");
            if($query = $DBcon->query("INSERT INTO
            notifications
            (
            title,
            notification_body,
            notify,
            serial_number
            )
        VALUES
        (
        'SRV Approved',
        '".$_SESSION['fn']." ".$_SESSION['ln']." approved your SRV...',
        '".$uid."',
        '".$sn."'
        )")){
            echo "Successfully saved notification";
        }else{
        echo "There is an error notification!";
        }
    
    }

}

if (isset($_POST['request_siv'])) {
    $sn = $_POST['sn'];
    $uid = $_POST['uid'];
    $query = $DBcon->query("SELECT * FROM heads WHERE DID = 'TACON-STR'");
    $row=$query->fetch_array();
    $head_id = $row['USERID'];

        $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$sn." AND USERID='".$uid."'");
            if($query = $DBcon->query("INSERT INTO
            notifications
            (
            title,
            notification_body,
            notify,
            serial_number,
            USERID,
            notif_type
            )
        VALUES
        (
        'SIV Requested',
        '".$_SESSION['fn']." ".$_SESSION['ln']." requested SIV...',
        '".$head_id."',
        '".$sn."',
        '".$uid."',
        'rsiv'
        )")){
            echo "Successfully saved notification";
        }else{
        echo "There is an error notification!";
        }

}
//Approve PO
if (isset($_POST['approve_po'])) {
    echo "HERE";
    $sn = $_POST['sn'];
    $uid = $_POST['uid'];
    try {
        if($query = $DBcon->query("UPDATE po SET is_approved = 1,checked_by='".$_SESSION['fn']." ".$_SESSION['ln']."' WHERE serial_number = ".$sn)){
            echo "Success";
            $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$sn." AND USERID='".$uid."'");
            Send_Notification('PO Approved',$_SESSION['fn']." ".$_SESSION['ln']." approved your PR...",$uid,$sn,'',0,$DBcon);
        }
        } catch (Exception $th) {
            echo $th->getmessage();
    }
}
//PO Completed
if (isset($_POST['po_completed'])) {
    echo "HERE";
    $sn = $_POST['sn'];
    $uid = $_POST['uid'];
    try {
        if($query = $DBcon->query("UPDATE po SET is_done = 1 WHERE serial_number = ".$sn)){
            echo "Success";
            $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$sn." AND USERID='".$uid."'");
            Send_Notification('PO Approved',$_SESSION['fn']." ".$_SESSION['ln']." approved your PR...",$uid,$sn,'',0,$DBcon);
        }
        } catch (Exception $th) {
            echo $th->getmessage();
    }
}

//Approve PR
if (isset($_POST['approve_pr'])) {
    $sn = $_POST['sn'];
    $uid = $_POST['uid'];
    if($query = $DBcon->query("UPDATE pr SET is_approved = 1,approved_by='".$_SESSION['fn']." ".$_SESSION['ln']."' WHERE serial_number = ".$sn)){
        echo "Success";
        $query = $DBcon->query("UPDATE notifications SET unred = 1 WHERE serial_number = ".$sn." AND USERID='".$uid."'");
        Send_Notification('PR Approved',$_SESSION['fn']." ".$_SESSION['ln']." approved your PR...",$uid,$sn,'pr_approved',0,$DBcon);
        Send_Notification('Prepare a PO',$_SESSION['fn']." ".$_SESSION['ln']." approved a PR...",0,$sn,'pc_handle',$uid,$DBcon);
    }
}

?>
