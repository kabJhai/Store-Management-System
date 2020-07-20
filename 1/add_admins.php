<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
$membership_id = "";
$phone = "";
$password = "";
$position = "";
if(isset($_SESSION['edit'])){
    $membership_id = $_SESSION['membership_id'];
    $phone = $_SESSION['phone'];
    $password = $_SESSION['password'];
    $position = $_SESSION['position_manipulate'];
}
?>
<html>
<head>
    <?php
    if(isset($_SESSION['edit'])){
?>
    <title>Edit Administrators | MMS</title>
    <?php
    }else { ?>
        <title>Add Administrators | MMS</title>
    <?php }
    include "includes/style_links.php";?>
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
                <td><input name="membership_id" placeholder="Lakkoofsa Galmee" type="text" value="<?php echo $membership_id;?>"/></td>
            </tr>
            <tr>
                <td><input name="phone" placeholder="Lakkoofsa Bilbilaa" type="text" value="<?php echo $phone;?>"/></td>
            </tr>
            <tr>
                <td><input name="password" placeholder="Jecha Darbii"
                           <?php if(isset($_SESSION['edit'])){ ?>type="text" <?php } else {?>type="password" <?php }?> value="<?php echo $password;?>"/></td>
            </tr>
            <tr>
                <td>
                    <select name="position" id="position ">
                        <?php
                        if(isset($_SESSION['edit'])){
                        ?>
                        <option value="1" <?php if($position ==1){ echo "selected"; }?>>Geggeessaa waldaa</option>
                        <option value="0" <?php if($position ==0){ echo "selected"; }?>>Koree kan biraa</option>
                        <?php }else{
                            ?>
                            <option value="1">Geggeessaa waldaa</option>
                            <option value="0">Koree kan biraa</option>
                            <?php
                        }?>
                    </select>
                </td>
            </tr>
            <tr>
                <?php if(isset($_SESSION['edit'])){ ?>
                <td><button type="submit" name="update_admins" id="register">Sirreessi</button></td>
                <?php } else {?>
                <td><button type="submit" name="register_admins" id="register">Galmeessi</button></td>
                <?php } ?>
            </tr>
        </table>
    </form>
</section>
<?php
if(isset($_SESSION['edit'])){
    unset($_SESSION['edit']);
}
?>
</body>
</html>
