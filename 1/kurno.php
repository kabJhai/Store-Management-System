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
    <title>View Income Payment | MMS</title>
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
        <input type="search" id="search_field" name="search" value="<?php
        if(isset($_POST['search'])){ echo $_POST['search'];}?>" placeholder="Miseensa Barbaadi" /><button  class="search_button" type="submit"><i class="fa fa-search" ></i> </button>
        <table class="button_holder">
            <tr>
                <td>
                    <button class="print_button" type="button" onclick="printMembersInfo()"><i class="fa fa-print"></i></button>
                </td>
            </tr>
        </table>
        <div id="hold_all_admins">
        <table id="show_admins">
            <tr>
                <td>Lakkoofsa Galmee</td>
                <td>Maqaa Guutuu</td>
                <td>Lakkoofsa Bilbilaa</td>
                <td>Saala</td>
                <td>Haala Kaffaltii Kurnoo</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
            if(isset($_POST['search'])){
                $searched = $_POST['search'];
                $query = $DBcon->query("SELECT * FROM members WHERE (maqaa_guutuu LIKE '%".$searched."' OR maqaa_guutuu LIKE '".$searched."%' OR maqaa_guutuu LIKE '%".$searched."%' OR  lakkoofsa_bilbilaa LIKE '%".$searched."' OR lakkoofsa_bilbilaa LIKE '".$searched."%' OR lakkoofsa_bilbilaa LIKE '%".$searched."%' OR id ='".$searched."') AND haala_lubbuu = 1  ORDER BY maqaa_guutuu ASC");
            }else{
                $query = $DBcon->query("SELECT * FROM members  WHERE haala_lubbuu = 1 ORDER BY maqaa_guutuu ASC");
            }
                $count = mysqli_num_rows($query);
                if($count > 0) {
                    while ($row = $query->fetch_assoc()) {
                        ?>
                        <tr class="animated bounceInUp"  data-wow-delay="10.<?php echo $row['id']; ?>s">
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['maqaa_guutuu'];?></td>
                            <td><?php echo $row['lakkoofsa_bilbilaa'];?></td>
                            <td><?php $saala = $row['saala'];
                                if ($saala == 1){
                                    echo "Dhiira";
                                }else{
                                    echo "Dhalaa";
                                }?></td>
                            <td><?php
                                $life = $DBcon->query("SELECT * FROM income_payment  WHERE id = ".$row['id']);
                                $count_income = mysqli_num_rows($life);
                                if($count_income > 0) {
                                        if ($saala == 1){
                                            echo "Kaffalaa Jira";
                                        }else{
                                            echo "Kaffalaa Jirti";
                                        }
                                    }else{
                                        if ($saala == 1){
                                            echo "Kaffalaa hin jiru";
                                        }else{
                                            echo "Kaffalaa hin jirtu";
                                        }
                                    }?></td>
                            <td><a href="includes/routes.php?view_kurno=<?php echo $row['id'];?>"><i class="fa fa-folder-open"></a></td>
                            <td><a href="includes/routes.php?edit_kurno=<?php echo $row['id'];?>"><i class="fa fa-pencil"></a></td>
                        </tr>
                        <?php
                    }
                }else if(($count == 0) && isset($_POST['search'])){
                    $_SESSION['error_message'] = $searched." yookin Miseensi Ati Barbaaddu Hin Argamne Irra Deebi'ii Yaali!";
                    ?></table><?php
                    echo "<div class='error'>".$_SESSION['error_message']."</div>"
                    ?>
            <?php
                }else if($count == 0){
                    $_SESSION['error_message'] = "Miseensi Galmaa'e Hin Jiru!";?>
            </table>
            <div class="error">
            <?php echo $_SESSION['error_message']; ?>
            </div>
<?php
            }unset($_SESSION['error_message']);?>
        </table>
            </div>
    </form>
</section>
</body>
</html>
