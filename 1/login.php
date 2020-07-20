<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/13/2018
 * Time: 9:57 PM
 */
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
    <body id="login_body">
        <section>
            <form action="includes/routes.php" method="post">
                <table id="login_form">
                    <tr>
                        <td>
                            <img class="logo animatedLogo swingLogo" src="images/logo.png" alt="Jeldu Berhane Kristos Church Number one logo"/>
                        </td>
                    </tr>
                    <tr>
                        <td><input name="phone" id="phone_number" onclick="changeStyle(0)" type="text" placeholder="Phone Number"></td>
                    </tr>
                    <tr>
                        <td><input name="password" id="password" onclick="changeStyle(1)" type="password" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td><button name="login" type="submit">Log In</button></td>
                    </tr>
                </table>
                </form>
        </section>
    </body>
</html>
