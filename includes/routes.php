<?php
include "data.php";

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
        if($query = $DBcon->query("INSERT INTO
         srv(serial_number,
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
         approved_by)
        VALUES
        (".$serial_number.",'".$did."','".$code[$i]."','".$description[$i]."','".$unit[$i]."','".$qty_req[$i]."','".$qty_issued[$i]."',
        '".$unit_price[$i]."','".$total_price[$i]."','".$remark[$i]."','".$requested_by."','".$approved_by."')")){
            echo "Successfully saved";
    }else{
        echo "There is an error!";
    }
}
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
    echo $serial_number;
    $length = count($code);

    for ($i=0; $i < $length; $i++) { 
        try {
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
       }else{
           echo "There is an error!";
       }
   
         } catch (Exception $e) {
            return $e->getMessage();
         }
}
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
}
}

?>