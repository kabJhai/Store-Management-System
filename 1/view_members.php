<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
include "data/data.php";
if(isset($_GET['baptism'])){
    $baptism = "".$_GET['baptism'];
    if($baptism != 0 && $baptism !=1){
        $baptism = 1;
    }
}else{
    $baptism = 1;
}
?>
<html>
<head>
    <title>View Members | MMS</title>
    <?php include "includes/style_links.php";?>
    <script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7243602708958043",
    enable_page_level_ads: true
  });
</script>
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
        <?php unset($_SESSION['error_message']); }
            if(isset($_POST['search'])){
                $searched = $_POST['search'];
                $query = $DBcon->query("SELECT * FROM members WHERE haala_cuuphaa = ".$baptism." maqaa_guutuu LIKE '%".$searched."' OR maqaa_guutuu LIKE '".$searched."%' OR maqaa_guutuu LIKE '%".$searched."%' OR  lakkoofsa_bilbilaa LIKE '%".$searched."' OR lakkoofsa_bilbilaa LIKE '".$searched."%' OR lakkoofsa_bilbilaa LIKE '%".$searched."%' OR id ='".$searched."' ORDER BY maqaa_guutuu ASC");
            }else{
                $query = $DBcon->query("SELECT * FROM members WHERE haala_cuuphaa = ".$baptism." ORDER BY maqaa_guutuu ASC");
            }
                $count = mysqli_num_rows($query);
    ?>
    <form action="" method="post">
        <input type="search" id="search_field" name="search" value="<?php
        if(isset($_POST['search'])){ echo $_POST['search'];}?>" placeholder="Miseensa Barbaadi" /><button class="search_button" type="submit"><i class="fa fa-search" ></i> </button>
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
                <td>Ganda</td>
                <td>Guuxii</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
                if($count > 0) {
                    while ($row = $query->fetch_assoc()) {
                        ?>
                        <tr class="animated bounceInUp<?php if($row['haala_lubbuu']==0){echo " dead";}?>" >
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['maqaa_guutuu'];?></td>
                            <td><?php $temp_num = $row['lakkoofsa_bilbilaa']; 
                            if($temp_num[0]=='0' && $temp_num =='9'){ 
                            echo $temp_num;
                            }else{
                                $saala = $row['saala'];
                                if($saala == 0){
                                    echo "Hin Qabdu";
                                }else{
                                    echo "Hin Qabu";
                                }
                                
                            }
                            ?></td>
                            <td><?php $saala = $row['saala'];
                                if ($saala == 1){
                                    echo "Dhiira";
                                }else{
                                    echo "Dhalaa";
                                }?></td>
                            <td><?php echo $row['ganda'];?></td>
                            <td><?php echo $row['guuxii'];?></td>
                            <td><a href="includes/routes.php?view=<?php echo $row['id'];?>"><i class="fa fa-folder-open"></a></td>
                            <td><a href="includes/routes.php?edit_members=<?php echo $row['id'];?>"><i class="fa fa-pencil"></a></td>
                            <td><a href="includes/routes.php?delete_members=<?php echo $row['id'];?>"><i class="fa fa-trash"></a></td>
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
