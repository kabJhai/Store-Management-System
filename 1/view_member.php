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
    $current_identification = $_SESSION['identification'];
}else{
    header("Location:view_members.php");
}
?>
<html>
    <head>
        <title>Waldaa Birhana Kiristoos Goojjoo Lakkoofsa Tokko</title>
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
                <?php unset($_SESSION['error_message']); } ?>

            <div id="paper_form">
                <?php
                $query = $DBcon->query("SELECT * FROM members WHERE id = ".$_SESSION['identification']);
                $count = mysqli_num_rows($query);
                if($count == 0) {
                    ?>
                    <div class="error">
                                Dhiifama,Miseensi Galmaa'e Hin Jiru!.
                    </div>
                    <?php
                }else{
                    $row=$query->fetch_array();
                ?>
                <h2 id="header_of_paper" class="<?php if ($row['haala_lubbuu'] == 0) echo "dead_header";?>">
                    <img src="images/logo.png" id="header_logo"/>Waldaa Birhana Kiristoos Goojjoo Lakkoofsa Tokko
                </h2>
                <table class="view_one_user">
                    <tr>
                        <td id="image_holder">
                            <img id="user_image" src="<?php echo $row['suura'];?>"/>
                        </td>
                        <td>
                            <table class="inner_info_table">
                                <tr>
                                    <td>Maqaa Guutuu: </td>
                                    <td><?php echo $row['maqaa_guutuu'];?></td>
                                </tr>
                                <tr>
                                    <td>Saala: </td>
                                    <td><?php
                                        $saala = $row['saala'];
                                        if ($saala == 1){
                                            echo "Dhiira";
                                        }else{
                                            echo "Dhalaa";
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Ummurii: </td>
                                    <td><?php echo $row['umurii'];?></td>
                                </tr>
                                <tr>
                                    <td>Hojjii: </td>
                                    <td><?php echo $row['hojjii'];?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="inner_info_table">
                                <tr>
                                    <td><?php
                                        if ($saala == 1){
                                            echo "Bara Amane:";
                                        }else {
                                            echo "Bara Amante:";
                                        }
                                        ?></td>
                                    <td><?php if($row['bara_amantii']==1){ echo "Dhalootaa Kaasee";}else{ echo $row['bara_amantii'];}?></td>
                                </tr>
                                <tr>
                                    <td>Ganda:</td>
                                    <td><?php echo $row['ganda'];?></td>
                                </tr>
                                <tr>
                                    <td>Lakkoofsa Bilbilaa:</td>
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
                                
                            }?></td>
                                </tr>
                                <tr>
                                    <td>Haala Gaa'elaa:</td>
                                    <td><?php echo $row['haala_gaaela']; $haala_gaaelaa = $row['haala_gaaela'];?></td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="inner_info_table">
                                <tr>
                                    <td>Haala Cuuphaa:</td>
                                    <td><?php
                                        $cuuphaa = $row['haala_cuuphaa'];
                                        if ($saala == 1 && $cuuphaa== 1){
                                            echo "Cuuphameera";
                                        }else if ($saala == 0  || $cuuphaa== 1){
                                            echo "Cuuphamteetti";
                                        }else if ($cuuphaa== 0){
                                            echo "Hin Cuuphamne";
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Guuxii:</td>
                                    <td><?php echo $row['guuxii'];?></td>
                                </tr>
                                <tr>
                                    <td>Sadarkaa Barnootaa:</td>
                                    <td><?php echo $row['sadarkaa_barnootaa'];?></td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php
                                    if($haala_gaaelaa == 'Hin fuune' ||$haala_gaaelaa == 'Hin heerumne'){

                                    }else{
                                      if($haala_gaaelaa == 'Fuudhera'){

                                        echo "Maqaa Haadhamanaa:";
                                     } else if($haala_gaaelaa == 'Heerumteetti'){
                                          echo "Maqaa Abbaamanaa:";
                                      }else if($haala_gaaelaa == 'Kadhimameera' ||$haala_gaaelaa == 'Kadhimamteetti'){
                                          echo "Maqaa Kaadhimaa:";
                                      }
                                      ?>
                                    </td>
                                    <td><?php
                                        $wife_id =  $row['wife_id'];
                                        $query = $DBcon->query("SELECT * FROM members WHERE lakkoofsa_bilbilaa = ".$wife_id." OR id = ".$wife_id." OR maqaa_guutuu = ".$wife_id);
                                        $count = 0;
                                        if($query) {
                                            $count = mysqli_num_rows($query);
                                        }
                                            if ($count == 0) {
                                                echo "<span id='maqaa_haadha_manaa' style='color: red'>".$wife_id."</span> <br><span id='miseensa_miti'><em>miseensa miti</em></span>";
                                            } else {
                                                $inner_row = $query->fetch_array();
                                                echo "<a href=\"includes/routes.php?view=" . $inner_row['id'] . "\">" . $inner_row['maqaa_guutuu'] . "</a>";
                                            }

                                    };?></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <h4>Gosoota tajaajilaa kanaa keessatti hirmaachaa <?php
                    if ($saala == 1){
                        echo "jiru";
                    }else {
                        echo "jirtu";
                    }
                    ?> mallattoo <em>' X '</em>  kan of biraa qabanidha.</h4>
                <table  class="view_one_user tajaajila">
                    <tr>
                        <td>
                            <table class="inner_info_table">
                                <tr>
                                    <td>Paasterii: </td>
                                    <td><?php
                                        $tajaajila = $row['soortuu'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hojjetaa Wangeelaa: </td>
                                    <td><?php
                                        $tajaajila = $row['lallaba'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Faarfannaa Dhuunfaa: </td>
                                    <td><?php
                                        $tajaajila = $row['faarfannaa_dhuunfaa'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Garee Daaqonaatii: </td>
                                    <td><?php
                                        $tajaajila = $row['diyaaqonaatii'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Walaloo: </td>
                                    <td><?php
                                        $tajaajila = $row['walaloo'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>

                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="inner_info_table">
                                <tr>
                                    <td>Raajummaa: </td>
                                    <td><?php
                                        $tajaajila = $row['raajummaa'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Faarfannaa Garee: </td>
                                    <td><?php
                                        $tajaajila = $row['faarfannaa_garee'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Geggeessummaa: </td>
                                    <td><?php
                                        $tajaajila = $row['geggeessummaa'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Meeshaa Taphachuu: </td>
                                    <td><?php
                                        $tajaajila = $row['meeshaa_taphachuu'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diraamaa: </td>
                                    <td><?php
                                        $tajaajila = $row['diraamaa'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sagantaa Geggeessuu: </td>
                                    <td><?php
                                        $tajaajila = $row['sagantaa_geggeessuu'];
                                        if ($tajaajila == 1 || $tajaajila == 3){
                                            echo "X";
                                        }else if ($tajaajila == 0  || $tajaajila== 2){
                                            echo "----";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div id="display_children">
                    <h3>Ijoolle <?php
                        if ($saala == 1){
                            echo "isaa :";
                        }else{
                            echo "ishee :";
                        }
                        ?></h3>
                <table class="view_one_user children_table" >
                    <?php
                    if($row['ijoollee_qabda'] == 1){
                        ?>
                        <tr>
                        <td> Maqaa Guutuu </td>
                        <td>Saala</td>
                        <td>Umurii</td>
                        </tr>
                            <?php
                                $children_id = $row['children_id'];
                                $splitted = str_split($children_id,1);
                                $identification = "";
                                $i = 0;
                                while($i < count($splitted)) {
                                        if ($splitted[$i] == ','){

                                        }else{
                                            $identification = $identification."".$splitted[$i];
                                            if($i == (count($splitted) - 1)){

                                            }else{
                                            $i = $i +1;
                                            continue;
                                            }
                                        }
                                    $children_id = $identification;
                                        $query = $DBcon->query("SELECT * FROM members WHERE lakkoofsa_bilbilaa = " . $children_id . " OR id = " . $children_id);
                                        $count = 0;
                                        if ($query) {
                                            $count = mysqli_num_rows($query);
                                        }
                                        if ($count == 0) {
                                            echo "<span style='color: red'>" . $children_id . "</span> <br><em>miseensa miti</em>";
                                        } else {
                                            $inner_row = $query->fetch_array();
                                            ?>
                                            <tr>
                                                <td>
                                            <?php
                                            echo "<a href=\"includes/routes.php?view=" . $inner_row['id'] . "\">" . $inner_row['maqaa_guutuu']. "</a>";
                                            ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($inner_row['saala'] == 1){
                                                        echo "Dhiira";
                                                    }else{
                                                        echo "Dhalaa";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                <?php echo $inner_row['umurii'];?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    if ($splitted[$i] == ','){
                                        $identification = "";
                                    }
                                    $i = $i + 1;

                                    ?>
                                    <?php
                                    }

                            ?>
                        <?php
                    }?>
                    </table>
                    </div>
                    <table class="view_one_user" id="view_methods">
                        <tr>
                                        <td>
                                            <a class="view_buttons" href="add_children.php">Ijoollee Galmeessi</i></a>
                                        </td>
                                        <td>
                                            <button id="waraqaa_geggeessituu" onclick="printPage()"> Waraqaa Geggeessituu</button>
                                        </td>
                                        <td>
                                            <a class="view_buttons" href="includes/routes.php?edit_members=<?php echo $row['id'];?>">Odeeffannoo Jijjiiri</i></a>
                                        </td>
                                        <td>
                                            <a class="view_buttons" href="includes/routes.php?add_picture=<?php echo $row['id'];?>">Suura galchi</i></a>
                                        </td>
                        </tr>
                    </table>
                <?php }
                $query = $DBcon->query("SELECT * FROM admins WHERE position_of_church = 1");
                $inner_row = $query->fetch_array();
                $members_id = $inner_row['membership_id'];
                $query = $DBcon->query("SELECT * FROM members WHERE id =".$members_id);
                $inner_row = $query->fetch_array();
                $church_leader_name = $inner_row['maqaa_guutuu'];
                ?>
                <div id="hubachiisa">
                    <strong>Hubachiisa:</strong>Waraqaa geggeessituu kun mallattoo geggeessaa waldaa fi chaappaa waldaa birhana kiristoos Goojjoo lakkoofsa tokkootiin alatti akkasumas haqaaf laaqaa yoo qabaate fayidaa hin qabu.
                    <span id="church_leader_name"><?php echo $church_leader_name;?><br/><br/>____________________<br/>Geggeessaa Waldaa</span>
                </div>
            </div>
        </section>
    </body>
</html>
