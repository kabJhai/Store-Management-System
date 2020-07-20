<div class="left_menu">
    <img class="logo animatedLogo swingLogo" src="images/logo.png" alt="Jeldu Berhane Kristos Church Number one logo"/>
    <p class="church_name">Waldaa Birhana Kiristoos Goojjoo Lakkoofsa Tokko</p>
    <div id="members_dropdown">
        <ul>
            <li><a href="add_members.php">Miseensa Galmeessi</a></li>
            <li><a href="view_members.php?baptism=1">Miseensota Cuuphaman</a></li>
            <li><a href="view_members.php?baptism=0">Miseensota Hin Cuuphamne</a></li>
        </ul>
    </div>
    <div id="admins_dropdown">
        <ul>
            <li><a href="add_admins.php">Qindeessaa Dabali</a></li>
            <li><a href="view_admins.php">Qindeessitoota Jiran</a></li>
        </ul>
    </div>
    <ul class="left_menu_items animated fadeInDown">
        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Jalqaba</a></li>
        <li><a href="view_pastors.php"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Soortuu</a></li>
        <li><a href="view_prophets.php"><i class="fa fa-magic" aria-hidden="true"></i> Raajota</a></li>
        <li><a href="view_preachers.php"><i class="fa fa-magic" aria-hidden="true"></i> Lallabdoota</a></li>
        <li><a href="view_solo.php"><i class="fa fa-microphone" aria-hidden="true"></i> Faarfattoota Dhuunfaa</a></li>
        <li><a href="view_choir.php"><i class="fa fa-microphone" aria-hidden="true"></i> Faarfattoota Garee</a></li>
        <li><a href="view_usher.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Gartuu Daaqonaatii</a></li>
        <li onclick="displayMenu('members')"><a><i class="fa fa-meetup" aria-hidden="true"></i> Miseensota</a>
        </li>
        <?php if($_SESSION['position'] == 1){?>
        <li  id="under_members"><a href="kurno.php"><i class="fa fa-percent" aria-hidden="true"></i> Kurnoo</a></li>
        <li onclick="displayMenu('admins')" ><a><i class="fa fa-address-book" aria-hidden="true"></i> Qindeessitoota</a></li>
        <li  id="under_admins"><a href="year_end.php"><i class="fa fa-hourglass-end" aria-hidden="true"></i> Dhuma Waggaa</a></li>
        <?php }?>
        <li <?php if($_SESSION['position'] == 0){?>id="under_members" <?php }else{?>id="under_admins"<?php }?>><a href="profile.php"><i class="fa fa-file-photo-o" aria-hidden="true"></i> Profaayilii</a></li>
        <li <?php if($_SESSION['position'] == 0){?>id="under_members" <?php }else{?>id="under_admins"<?php }?>><a href="documentation.php"><i class="fa fa-desktop" aria-hidden="true"></i> Ibsa Fayyaamaa</a></li>
        <li <?php if($_SESSION['position'] == 0){?>id="under_members" <?php }else{?>id="under_admins"<?php }?>><a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> Eenyutu Hojjete</a></li>
        <li><a href="includes/routes.php?logout=y"><i class="fa fa-sign-out" aria-hidden="true"></i> Ba'i</a></li>
    </ul>
</div>