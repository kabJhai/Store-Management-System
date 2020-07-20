<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 5/28/2018
 * Time: 11:05 AM
 */
$DatabaseHost = "localhost";
$DatabaseName = "gbkcmemberscom_ebkc";
$Username = "gbkcmemberscom_gojo";
$Password = "godforase";
$DBcon = new MySQLi($DatabaseHost,$Username,$Password,$DatabaseName);

if ($DBcon->connect_errno) {
    die("ERROR : -> ".$DBcon->connect_error);
}
?>