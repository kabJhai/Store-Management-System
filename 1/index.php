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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
            $query = $DBcon->query("SELECT * FROM members WHERE haala_lubbuu = 1");
            $count_members = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM income_payment");
            $count_kurno = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (raajummaa = 1 OR raajummaa = 3) AND haala_lubbuu = 1");
            $count_raajii = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (soortuu = 1 OR soortuu = 3) AND haala_lubbuu = 1");
            $count_soortuu = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (faarfannaa_garee = 1 OR faarfannaa_garee = 3) AND haala_lubbuu = 1");
            $count_garee = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (faarfannaa_dhuunfaa = 1 OR faarfannaa_dhuunfaa = 3) AND haala_lubbuu = 1");
            $count_dhuunfaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (lallaba = 1 OR lallaba = 3) AND haala_lubbuu = 1");
            $count_lallaba = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE saala = 0 AND haala_lubbuu = 1");
            $count_dhalaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE saala = 1 AND haala_lubbuu = 1");
            $count_dhiira = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_cuuphaa = 1 AND haala_lubbuu = 1");
            $count_cuuphame = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE haala_cuuphaa = 0 AND haala_lubbuu = 1");
            $count_hin_cuuphamne = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (geggeessummaa = 1 OR geggeessummaa = 3) AND haala_lubbuu = 1");
            $count_geggeessummaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (diyaaqonaatii = 1 OR diyaaqonaatii = 3) AND haala_lubbuu = 1");
            $count_diyaaqonaatii = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (walaloo = 1 OR walaloo = 3) AND haala_lubbuu = 1");
            $count_walaloo = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (meeshaa_taphachuu = 1 OR meeshaa_taphachuu = 3) AND haala_lubbuu = 1");
            $count_meeshaa_taphachuu = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (diraamaa = 1 OR diraamaa = 3) AND haala_lubbuu = 1");
            $count_diraamaa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (sagantaa_geggeessuu  = 1 OR sagantaa_geggeessuu  = 3) AND haala_lubbuu = 1");
            $count_sagantaa_geggeessuu  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (haala_gaaela  = 'Hin fuune' OR haala_gaaela  = 'Hin heerumne') AND haala_lubbuu = 1");
            $count_hin_fuune  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (haala_gaaela  = 'Fuudhera' OR haala_gaaela  = 'Heerumteetti') AND haala_lubbuu = 1");
            $count_fuudheera  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (haala_gaaela  = 'Kadhimameera' OR haala_gaaela  = 'Kadhimamteetti') AND haala_lubbuu = 1");
            $count_kaadhimaa  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (umurii < 30 AND umurii > 14) AND haala_lubbuu = 1 ");
            $count_dargaggoo  = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (umurii < 15  AND umurii > 7) AND haala_lubbuu = 1");
            $count_ijoollee = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE (umurii < 60  AND umurii > 29) AND haala_lubbuu = 1");
            $count_gaessa = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii < 8 AND haala_lubbuu = 1");
            $count_daaimman = mysqli_num_rows($query);
            $query = $DBcon->query("SELECT * FROM members WHERE umurii > 59 AND haala_lubbuu = 1");
            $count_jaarsolii = mysqli_num_rows($query);
            ?>
        </aside>
        <section class="main_body">
            <img class="center-logo index_logo" src="images/logo.png"/>
            <p id="page_title">
                Marsariitii Waldaa Birhana Kiristoos Goojjootti Baga Nagaaan Dhuftan.
            </p>
            <p id="page_content">
                Marsariitiin kun miseensota waldaa kanaa qindeessuuf akkasumas to'achuuf Waldaa kanaaf qofa kan kennamedha.
                <div id="print_report">
                    <br><p id="date" style="float: right"></p>
                <script>
                    var d = new Date();
                    document.getElementById('date').innerHTML = d.getDate()+" - "+(d.getUTCMonth()+1)+" - "+d.getFullYear();
                </script>
                <h3 class="report_title"><i class="fa fa-group"></i> Gabaasa Haala Miseensotaa</h3>

                    <table class="main_report_table" title="Gabaasa Haala Miseensotaa">
                            <tr>
                                <td>Baayina Miseensota Galmaa'anii: </td>
                                <td><?php echo $count_members?></td>
                            </tr>
                            <tr>
                                <td>Baayina Miseensota Kurnoo Kaffalanii: </td>
                                <td><?php echo $count_kurno?></td>
                            </tr>
                            <tr>
                                <td>Kan Cuuphaman: </td>
                                <td><?php echo $count_cuuphame?></td>
                            </tr>
                            <tr>
                                <td>Kan hin Cuuphamne: </td>
                                <td><?php echo $count_hin_cuuphamne?></td>
                            </tr>
                            <tr>
                                <td>Baayina Dhiiraa: </td>
                                <td><?php echo $count_dhiira?></td>
                            </tr>
                            <tr>
                                <td>Baayina Dhalaa: </td>
                                <td><?php echo $count_dhalaa?></td>
                            </tr>
                            <tr>
                                <td>Kan fuudhan/heeruman: </td>
                                <td><?php echo $count_fuudheera?></td>
                            </tr>
                            <tr>
                                <td>Kan kaadhimaa qaban: </td>
                                <td><?php echo $count_kaadhimaa?></td>
                            </tr>
                            <tr>
                                <td>Kan hin fuune/heerumne: </td>
                                <td><?php echo $count_hin_fuune?></td>
                            </tr>
                        </table>
                <h3 class="report_title"><i class="fa fa-clock-o"></i> Gabaasa Haala Umuriidhaan</h3>
                <table class="main_report_table" title="Gabaasa Haala Umuriidhaan">
                            <tr>
                                <td>Jaarsolii: </td>
                                <td><?php echo $count_jaarsolii?></td>
                            </tr>
                            <tr>
                                <td>Ga'eessota: </td>
                                <td><?php echo $count_gaessa?></td>
                            </tr>
                            <tr>
                                <td>Dargaggoota: </td>
                                <td><?php echo $count_dargaggoo?></td>
                            </tr>
                            <tr>
                                <td>Ijoollee: </td>
                                <td><?php echo $count_ijoollee?></td>
                            </tr>
                            <tr>
                                <td>Daa'imman: </td>
                                <td><?php echo $count_daaimman?></td>
                            </tr>
                        </table>
                <h3 class="report_title"><i class="fa fa-cloud"></i> Gabaasa Haala Tajaajilaa</h3>
                        <table class="main_report_table" title="Gabaasa Haala Tajaajilaa">
                            <tr>
                                <td>Raajotaa: </td>
                                <td><?php echo $count_raajii?></td>
                            </tr>
                            <tr>
                                <td>Soortuu: </td>
                                <td><?php echo $count_soortuu?></td>
                            </tr>
                            <tr>
                                <td>Faarfattoota Garee: </td>
                                <td><?php echo $count_garee?></td>
                            </tr>
                            <tr>
                                <td>Faarfattoota Dhuunfaa: </td>
                                <td><?php echo $count_dhuunfaa?></td>
                            </tr>
                            <tr>
                                <td>Hojjettoota Wangeelaa: </td>
                                <td><?php echo $count_lallaba?></td>
                            </tr>
                            <tr>
                                <td>Geggeessitoota: </td>
                                <td><?php echo $count_geggeessummaa?></td>
                            </tr>
                            <tr>
                                <td>Daaqonaatii: </td>
                                <td><?php echo $count_diyaaqonaatii?></td>
                            </tr>
                            <tr>
                                <td>Walaloo: </td>
                                <td><?php echo $count_walaloo?></td>
                            </tr>
                            <tr>
                                <td>Namoota Meeshaa Taphatan: </td>
                                <td><?php echo $count_meeshaa_taphachuu?></td>
                            </tr>
                            <tr>
                                <td>Namoota Diraamaa Hojjetan: </td>
                                <td><?php echo $count_diraamaa?></td>
                            </tr>
                            <tr>
                                <td>Namoota Sagantaa Geggeessan: </td>
                                <td><?php echo $count_sagantaa_geggeessuu ?></td>
                            </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><button id="print_report_button" onclick="printReport()" type="button" >Gabaasa Baasi</button></td>
                                                        </tr>

                        </table>
            </div>
        </section>
    </body>


</html>

