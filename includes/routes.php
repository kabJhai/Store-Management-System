<?php
include "data.php"

if(isset($_POST['srv'])){
    $code = $_POST['code'];
    $unit = $_POST['unit'];
    $qty_req = $_POST['qty_requested'];
    $qty_issued = $_POST['qty_issued'];
    $unit_price = $_POST['unit_price'];
    $total_price = $_POST['total_price'];
    $remark = $_POST['remark'];
    $requested_by = $_POST['requested_by'];
    $approved_by = $_POST['approved_by'];

    $length = count($code);

    for ($i=0; $i < $length; $i++) { 
        echo $code[$i];
    }
}
?>