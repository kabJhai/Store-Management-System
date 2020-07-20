<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
$query = $DBcon->query("SELECT * FROM income_payment WHERE  id = " . $_SESSION['identification']);
    $inner_row = $query->fetch_array();
    $date_collection = $inner_row['date_collection'];
    $payment_collection = $inner_row['payment_collection'];
    $splitted = str_split($date_collection,1);
    $msplitted = str_split($payment_collection,1);
    $date_splitted = "";
    $money_splitted = "";
?>
<html>
<head>
    <title>Kurnoo | MMS</title>
    <?php include "includes/style_links.php";?>
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
    <table class="button_holder">
        <tr>
            <td>
                <button class="print_button" type="button" onclick="printKurno()"><i class="fa fa-print"></i></button>
            </td>
        </tr>
    </table>
    <div id="hold_all_admins">
        <table id="display_kurno">
            <tr>
                <td>Maqaaa Guutuu:</td>
                <td><?php echo $_SESSION['full_name'];?></td>
            </tr>
            <tr>
                <td>Guyyaa itti kaffalame</td>
                <td>Hamma kaffalame</td>
            </tr>
            <tr>
                <td>
                <ul>
                    <?php
                    $i = 0;
                    while($i < count($splitted)) {
                        if ($splitted[$i] == ',') {
                            echo "<li>".$date_splitted."</li>";
                            $date_splitted = "";
                        } else {
                            $date_splitted = $date_splitted . "" . $splitted[$i];
                            if ($i == (count($splitted) - 1)) {
                                echo "<li>".$date_splitted."</li>";
                            } else {
                                $i = $i + 1;
                                continue;
                            }
                        }
                        $i = $i + 1;
                    }

                    ?>
                </ul>
            </td>
            <td>
                <ul>
                    <?php
                    $i = 0;
                    while($i < count($msplitted)) {
                        if ($msplitted[$i] == ',') {
                            echo "<li>".$money_splitted."</li>";
                            $money_splitted = "";
                        } else {
                            $money_splitted = $money_splitted . "" . $msplitted[$i];
                            if ($i == (count($msplitted) - 1)) {
                                echo "<li>".$money_splitted."</li>";
                            } else {
                                $i = $i + 1;
                                continue;
                            }
                        }
                        $i = $i + 1;
                    }
                    ?>
                </ul>
            </td>
        </tr>
        </table>
    </div>
</section>
<?php
if(isset($_SESSION['identification'])){
//    unset($_SESSION['identification']);
}
?>
</body>
</html>
