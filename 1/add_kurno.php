<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
$id = "";
$id = $_SESSION['identification'];
?>
<html>
<head>
    <title>Kurnoo | MMS</title>
    <?php
    include "includes/style_links.php";?>
</head>
<body>

<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section >
    <form action="includes/routes.php" method="post">
        <table id="register_form">
            <tr>
                <td> Maqaa Miseensaa </td>
                <?php
                $query = $DBcon->query("SELECT maqaa_guutuu FROM members  WHERE id = ".$id);
                $count = mysqli_num_rows($query);
                $row=$query->fetch_array();
                ?>
                <td><?php echo $row['maqaa_guutuu'];?></td>
            </tr>
            <tr>
                <td> Guyyaa </td>
                <td><input name="date_collection" type="date"/></td>
            </tr>
            <tr>
                <td> Kurnoo Kaffalame </td>
                <td><input name="payment_collection"  type="text"/></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="save_kurno" id="register">Galmeessi</button></td>
            </tr>
        </table>
    </form>
</section>
</body>
</html>
