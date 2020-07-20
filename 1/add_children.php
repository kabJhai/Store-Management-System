<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
$query = $DBcon->query("SELECT * FROM members WHERE  id = " . $_SESSION['identification']);
    $inner_row = $query->fetch_array();
    $previous_value = $inner_row['children_id'];
?>
<html>
<head>
    <?php
    if(isset($_SESSION['edit'])){
?>
    <title>Edit Children | MMS</title>
    <?php
    }else { ?>
        <title>Add Children | MMS</title>
    <?php }
    include "includes/style_links.php";?>
</head>
<body>

<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section class="main_body children">
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
        <p >
            Lakkoofsa eenyummeessaa ijoollee qoodduu dhaan gargar baasuun galchi. Ijoollee maatii biratti galmeessuuf jalqaba kophaatti dursanii galmaa'uu qabu.<br/>
            Fakkeenya: 12,23,1,56,85,34
            <br/>Lakkoofsa bilbilaa ijoollees fayyadamuun ni danda'ama.
        </p>
        <table id="register_members_form">
            <tr>
                <td>Lakkoofsa Eenyummeessaa Ijoollee</td>
                <td><input name="id"type="text" value="<?php echo $previous_value;?>"/></td>
            </tr>
            <tr>
                <td></td>
                <?php if(isset($_SESSION['edit'])){ ?>
                <td><button type="submit" name="register_Children" id="register">Sirreessi</button></td>
                <?php } else {?>
                <td><button type="submit" name="register_Children" id="register">Galmeessi</button></td>
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
