<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/14/2018
 * Time: 1:01 AM
 */
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>