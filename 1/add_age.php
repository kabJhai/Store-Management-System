<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
$query = $DBcon->query("SELECT * FROM update_year ORDER BY id DESC ");

?>
<html>
<head>
    <title>Update Age | MMS</title>
    <?php include "includes/style_links.php";?>
</head>
<body>
<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section class="main_body ">
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

    <table id="display_kurno">
        <form method="post" action="includes/routes.php">
        <tr>
            <td>Guyyoota Itti dabalame:</td>
            <td></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <ul>
                        <?php
                        $count = mysqli_num_rows($query);
                        if($count == 0){
                            echo "<li style='color: red;font-weight: bold;'>" . "Umuriin Dabalame Hin Jiru" . "</li>";

                        }else {
                            while ($row = $query->fetch_array()) {
                                echo "<li>" . $row['updated_on'] . "</li>";
                            }
                        }
                        ?>
                </ul>
            </td>
        </tr>
        <tr>
            <td><button id="print_report_button" name="update_age"> Umurii Dabali</button>
            <td><button id="print_report_button" name="decrement_age"> Umurii Hirdhisi</button>
        </tr>
        </form>
    </table>
</section>
<?php
if(isset($_SESSION['identification'])){
//    unset($_SESSION['identification']);
}
?>
</body>
</html>