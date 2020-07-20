<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
if(isset($_SESSION['identification'])){
    $query = $DBcon->query("SELECT * FROM members WHERE id = ".$_SESSION['identification']);
    $count = mysqli_num_rows($query);
    if($count == 0) {
        header("Location:../index.php");
    }else{
        $row=$query->fetch_array();
        $previous = $row['suura'];
    }
}else{
    header("Location:../index.php");
}
?>
<html>
<head>
    <?php
    if(isset($_SESSION['edit'])){
?>
    <title>Edit Photo | MMS</title>
    <?php
    }else { ?>
        <title>Add Photo | MMS</title>
    <?php }
    include "includes/style_links.php";?>
</head>
<body>

<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section class="main_body">
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
    <form action="includes/routes.php" enctype="multipart/form-data" method="post">
        <table id="members_photo">
            <tr>
                <td></td>
                <td>
                    <img id="photo_id" src="<?php echo $previous?>" alt="person"/>
                </td>
            </tr>
            <tr>
                <td>Suura</td>
                <td><input name="photo"type="file"/></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="upload_photo" id="register">Upload</button></td>
            </tr>
        </table>
    </form>
</section>
<?php
//if(isset($_SESSION['identification'])){
//    unset($_SESSION['identification']);
//}
//?>
</body>
</html>
