<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include_once "data/data.php";
$query = $DBcon->query("SELECT * FROM admins WHERE id = ".$_SESSION['id']);
$count = mysqli_num_rows($query);
    $row=$query->fetch_array();
    $_SESSION['membership_id'] = $row['membership_id'];
    $_SESSION['phone'] = $row['phone_number'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['position'] = $row['position_of_church'];
    $membership_id = $_SESSION['membership_id'];
    $phone = $_SESSION['phone'];
    $password = $_SESSION['password'];
    $position = $_SESSION['position'];
    $_SESSION['identification'] = $_SESSION['id'];
?>
<html>
<head>
    <title>Profile | MMS</title>
    <?php include "includes/style_links.php";?>
</head>
<body>

<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section >
    <?php
        if (isset($_SESSION['error_message'])){
    ?>
    <div class="error">
        <?php echo $_SESSION['error_message']; ?>
    </div>
    <?php unset($_SESSION['error_message']); } ?>
    <?php
    if (isset($_SESSION['message'])){
        ?>
        <div class="success">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); } ?>
    <form action="includes/routes.php" method="post">
        <table id="register_form">
            <tr>
                <td>Lakkoofsa Galmee</td>
                <td><input name="membership_id" placeholder="Lakkoofsa Galmee" type="text" value="<?php echo $membership_id;?>"/></td>
            </tr>
            <tr>
                <td>Lakkoofsa Bilbilaa</td>
                <td><input name="phone" placeholder="Lakkoofsa Bilbilaa" type="text" value="<?php echo $phone;?>"/></td>
            </tr>
            <tr>
                <td>Jecha Darbii</td>
                <td><input name="password" placeholder="Jecha Darbii" type="text" value="<?php echo $password;?>"/></td>
            </tr>
            <tr>
                <?php
                if($position == 1){
                ?>
                <td>
                    <select name="position" id="position ">
                        <option  value="1" <?php if($position == 1){ echo "selected";}?>>Geggeessa Waldaa</option>
                        <option value="0" <?php if($position == 0){ echo "selected";}?>>Koree kan biraa</option>
                    </select>
                </td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="update_admins" id="register">Ol kaa'i</button></td>
            </tr>
        </table>
    </form>
</section>
</body>
</html>
