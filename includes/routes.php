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
?>