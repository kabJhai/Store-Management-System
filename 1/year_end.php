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
            <?php include "includes/left_navigation.php";
            $query = $DBcon->query("SELECT * FROM members");
            $count_members = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM income_payment");
            $count_kurno = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE raajummaa = 1 OR raajummaa = 3");
            $count_raajii = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE soortuu = 1 OR soortuu = 3");
            $count_soortuu = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE faarfannaa_garee = 1 OR faarfannaa_garee = 3");
            $count_garee = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE faarfannaa_dhuunfaa = 1 OR faarfannaa_dhuunfaa = 3");
            $count_dhuunfaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE lallaba = 1 OR lallaba = 3");
            $count_lallaba = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE saala = 0");
            $count_dhalaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE saala = 1");
            $count_dhiira = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_cuuphaa = 1");
            $count_cuuphame = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_cuuphaa = 0");
            $count_hin_cuuphamne = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE geggeessummaa = 1 OR geggeessummaa = 3");
            $count_geggeessummaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE diyaaqonaatii = 1 OR diyaaqonaatii = 3");
            $count_diyaaqonaatii = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE walaloo = 1 OR walaloo = 3");
            $count_walaloo = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE meeshaa_taphachuu = 1 OR meeshaa_taphachuu = 3");
            $count_meeshaa_taphachuu = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE diraamaa = 1 OR diraamaa = 3");
            $count_diraamaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE sagantaa_geggeessuu  = 1 OR sagantaa_geggeessuu  = 3");
            $count_sagantaa_geggeessuu  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_gaaela  = 'Hin fuune' OR haala_gaaela  = 'Hin heerumne'");
            $count_hin_fuune  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_gaaela  = 'Fuudhera' OR haala_gaaela  = 'Heerumteetti'");
            $count_fuudheera  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_gaaela  = 'Kadhimameera' OR haala_gaaela  = 'Kadhimamteetti'");
            $count_kaadhimaa  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii < 30 AND umurii > 14 ");
            $count_dargaggoo  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii < 15  AND umurii > 7");
            $count_ijoollee = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii < 60  AND umurii > 29");
            $count_gaessa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii < 8 ");
            $count_daaimman = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii > 59 ");
            $count_jaarsolii = mysqli_num_rows($query);
            ?>
        </aside>
        <section class="main_body">
            <img class="center-logo index_logo" src="images/logo.png"/>
            <p id="page_title">
                Marsariitii Waldaa Birhana Kiristoos Goojjootti Baga Nagaaan Dhuftan.
            </p>
            <p id="page_content">
                <div id="print_report">
                    <br><p id="date" style="float: right"></p>
                <script>
                    var d = new Date();
                    document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                </script>
                <h3 class="report_title"><i class="fa fa-cloud"></i> Hojjilee dhuma waggaarratti hojjetamuu qaban</h3>
                        <table class="main_report_table generate_report" title="Hojjii dhumarratti hojjetamuu qaban">
                            <tr>
                                 <td>
                                     <a class="report_anchor" href="all_members_data.php" >Gabaasa Miseensota Hundaa Baasi</a>
                                 </td>
                            </tr>
                            <tr>
                                 <td>
                                     <a class="report_anchor" href="add_age.php" >Ummurii Miseensotaa Dabali</a>
                                 </td>
                            </tr>
                        </table>
            </div>
        </section>
    </body>


</html>

