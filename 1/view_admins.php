<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
?>
<html>
<head>
    <title>View Administrators | MMS</title>
    <?php include "includes/style_links.php";?>
</head>
<body>

<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section class="main_body">
    <?php
    if (isset($_SESSION['message'])){
    ?>
    <div class="success">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); } ?>
    <?php
    if (isset($_SESSION['error_message'])){
        ?>
        <div class="error">
            <?php echo $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']); } ?>
    <form action="" method="post">
        <table id="show_admins">
            <tr>
                <td>Lakkoofsa Galmee</td>
                <td>Lakkoofsa Bilbilaa</td>
                <td>Jecha Darbii</td>
                <td>Ga'ee Hojjii</td>
                <td></td>
                <td></td>
            </tr>
            <?php
                $query = $DBcon->query("SELECT * FROM admins");
                $count = mysqli_num_rows($query);
                if($count > 0) {
                    while ($row = $query->fetch_assoc()) {
                        ?>
                        <tr class="animated bounceInUp"  data-wow-delay="10.<?php echo $row['id']; ?>s">
                            <td><?php echo $row['membership_id'];?></td>
                            <td><?php echo $row['phone_number'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td><?php if($row['position_of_church']==1){ echo "Geggeessaa Waldaa";}else{echo "Koree kan biraa";}?></td>
                            <td><a href="includes/routes.php?edit=<?php echo $row['id'];?>"><i class="fa fa-pencil"></a></td>
                            <td><a href="includes/routes.php?delete=<?php echo $row['id'];?>"><i class="fa fa-trash"></a></td>
                        </tr>
                        <?php
                    }
                }?>
        </table>
    </form>
</section>
</body>
</html>
