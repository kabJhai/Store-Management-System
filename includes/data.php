<?php
/**
 * Created by PhpStorm.
 * User: kabila
 * Date: 6/25/2020
 * Time: 11:05 AM
 */

$DatabaseHost = "localhost";
$DatabaseName = "tacon_store";
$Username = "root";
$Password = "";
$DBcon = new MySQLi($DatabaseHost,$Username,$Password,$DatabaseName);

if ($DBcon->connect_errno) {
    die("ERROR : -> ".$DBcon->connect_error);
}
?>