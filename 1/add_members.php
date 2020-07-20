<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/11/2018
 * Time: 11:51 PM
 */
include "includes/session.php";
$full_name = "";
$sex = "";
$age = "";
$year_saved = "";
$baptism_status = "";
$marital_status = "";
$wife_id = "";
$academic_status = "";
$prophecy = "";
$preach = "";
$drama = "";
$solo = "";
$choir = "";
$usher = "";
$leadership = "";
$poem = "";
$musical = "";
$phone = "";
$ganda = "";
$guuxii = "";
$child_status = "";
$pastor = "";
$lead_program = "";
$work = "";
$life_status = "";
if(isset($_SESSION['edit'])){
    $full_name = $_SESSION['maqaa_guutuu'];
    $sex = $_SESSION['saala'];
    $age = $_SESSION['umurii'];
    $year_saved = $_SESSION['bara_amantii'];
    $baptism_status = $_SESSION['haala_cuuphaa'];
    $marital_status = $_SESSION['haala_gaaela'];
    $wife_id = $_SESSION['wife_id'];
    $academic_status =$_SESSION['sadarkaa_barnootaa'];
    $prophecy = $_SESSION['raajummaa'];
    $preach = $_SESSION['lallaba'];
    $drama = $_SESSION['diraamaa'];
    $solo = $_SESSION['faarfannaa_dhuunfaa'];
    $choir = $_SESSION['faarfannaa_garee'];
    $usher = $_SESSION['diyaaqonaatii'];
    $leadership = $_SESSION['geggeessummaa'];
    $poem = $_SESSION['walaloo'];
    $musical = $_SESSION['meeshaa_taphachuu'];
    $phone = $_SESSION['lakkoofsa_bilbilaa'];
    $ganda = $_SESSION['ganda'];
    $guuxii = $_SESSION['guuxii'];
    $child_status = $_SESSION['ijoollee_qabda'];
    $pastor = $_SESSION['soortuu'];
    $lead_program = $_SESSION['sagantaa_geggeessuu'];
    $work = $_SESSION['hojjii'];
    $life_status = $_SESSION['lubbuu'];

}
?>
<html>
<head>
    <?php
    if(isset($_SESSION['edit'])){
?>
    <title>Edit Members | MMS</title>
    <?php
    }else { ?>
        <title>Add Members | MMS</title>
    <?php }
    include "includes/style_links.php";?>
</head>
<body>

<aside>
    <?php include "includes/left_navigation.php";?>
</aside>
<section class="main_body">
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
    <form action="includes/routes.php" method="post">
        <table id="register_members_form">
            <tr>
                <td>Maqaa Guutuu</td>
                <td><input name="full_name"type="text" value="<?php echo $full_name;?>"/></td>
            </tr>
            <tr>
                <td>Saala</td>
                <td>
                    <select name="sex" id="sex" onchange="listenForSex()">
                        <option value="1" <?php if($sex == 1){echo "selected";}?>>Dhiira</option>
                        <option value="0"<?php if($sex == 0){echo "selected";}?>>Dhalaa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Ummurii</td>
                <td><input name="age"type="text" value="<?php echo $age;?>"/></td>
            </tr>
            <tr>
                <td>Ganda</td>
                <td><input name="ganda"type="text" value="<?php echo $ganda;?>"/></td>
            </tr>
            <tr>
                <td>Guuxii</td>
                <td><input name="guuxii"type="text" value="<?php echo $guuxii;?>"/></td>
            </tr>
            <tr>
                <td>Lakkoofsa Bilbilaa</td>
                <td><input name="phone" id="phone" onclick="listenPhone()" type="text" value="<?php echo $phone;?>"/></td>
            </tr>
            <tr>
                <td>Hojjii</td>
                <td><input name="work"type="text" value="<?php echo $work;?>"/></td>
            </tr>

            <tr>
                <td id="year_saved">Bara Amane</td>
                <td>
                    <input name="year_saved" type="text" value="<?php echo $year_saved;?>"/>
                </td>
            </tr>
            <tr>
                <td>Haala Cuuphaa</td>
                <td>
                    <select name="baptism_status" id="position ">
                        <option value="1"<?php if($baptism_status == 1){echo "selected";}?>>Cuuphameera</option>
                        <option value="0"<?php if($baptism_status == 0){echo "selected";}?>>Hin Cuuphamne</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Haala Gaa'elaa</td>
                <td>
                    <select name="marital_status" id="marital_status" onchange="listenMaritalStatus()">
                        <option value="Fuudhera"<?php if($marital_status == "Fuudhera"){echo "selected";}?>>Fuudhera</option>
                        <option value="Heerumteetti"<?php if($marital_status == "Heerumteetti"){echo "selected";}?>>Heerumteetti</option>
                        <option value="Kadhimameera"<?php if($marital_status == "Kadhimameera"){echo "selected";}?>>Kadhimameera</option>
                        <option value="Kadhimamteetti"<?php if($marital_status == "Kadhimamteetti"){echo "selected";}?>>Kadhimamteetti</option>
                        <option value="Hin fuune"<?php if($marital_status == "Hin fuune"){echo "selected";}?>>Hin fuune</option>
                        <option value="Hin heerumne"<?php if($marital_status == "Hin heerumne"){echo "selected";}?>>Hin heerumne</option>
                    </select>
                </td>
            </tr>
            <tr id="marital_id">
                <td id="marital_label">Maqaa Haadhamanaa</td>
                <td><input name="wife_id" id="phone" type="text" value="<?php echo $wife_id;?>"/></td>
            </tr>
            <tr>
                <td>Ijoollee qaba/qabdi</td>
                <td>
                    <select name="child_status" id="position ">
                        <option value="0"<?php if($child_status == 0){echo "selected";}?>>Lakki</option>
                        <option value="1"<?php if($child_status == 1){echo "selected";}?>>Eeyyeni</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Sadarkaa Barnootaa</td>
                <td>
                    <select name="academic_status" id="position " >
                        <option value="Olmaa Daaimmanii" <?php if($academic_status == "Olmaa Daaimmanii"){echo "selected";}?>>Olmaa Daaimmanii</option>
                        <option value="Sadarkaa Tokkooffaa" <?php if($academic_status == "Sadarkaa Tokkooffaa"){echo "selected";}?>>Sadarkaa Tokkooffaa</option>
                        <option value="Sadarkaa Lammaffaa" <?php if($academic_status == "Sadarkaa Lammaffaa"){echo "selected";}?>>Sadarkaa Lammaffaa</option>
                        <option value="Qophaaina"  <?php if($academic_status == "Qophaaina"){echo "selected";}?>>Qophaaina</option>
                        <option value="Teeknikaaf Ogummaa"<?php if($academic_status == "Teeknikaaf Ogummaa"){echo "selected";}?>>Teeknikaaf Ogummaa</option>
                        <option value="Sertifikkeettii"<?php if($academic_status == "Sertifikkeettii"){echo "selected";}?>>Sertifikkeettii</option>
                        <option value="Diiploomaa"<?php if($academic_status == "Diiploomaa"){echo "selected";}?>>Diiploomaa</option>
                        <option value="Digrii Jalqabaa (First Degree)"<?php if($academic_status == "Digrii Jalqabaa (First Degree)"){echo "selected";}?>>Digrii Jalqabaa (First Degree)</option>
                        <option value="Digrii Lammaffaa (Masters)"<?php if($academic_status == "Digrii Lammaffaa (Masters)"){echo "selected";}?>>Digrii Lammaffaa (Masters)</option>
                        <option value="Digrii Sadaffaa (PHD)"<?php if($academic_status == "Digrii Sadaffaa (PHD)"){echo "selected";}?>>Digrii Sadaffaa (PHD)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Haala Tajaajilaa</td>
            </tr>
            <tr>
                <td>Paasterii/Soortuu</td>
                <td>
                    <select name="pastor" id="position ">
                        <option value="1"<?php if($pastor == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($pastor == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($pastor == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($pastor == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Raajummaa</td>
                <td>
                    <select name="prophecy" id="position ">
                        <option value="1"<?php if($prophecy == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($prophecy == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($prophecy == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($prophecy == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Lallaba</td>
                <td>
                    <select name="preach" id="position ">
                        <option value="1"<?php if($preach == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($preach == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($preach == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($preach == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Faarfannaa Dhuunfaa</td>
                <td>
                    <select name="solo" id="position ">
                        <option value="1"<?php if($solo == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($solo == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($solo == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($solo == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Faarfannaa Gartuu</td>
                <td>
                    <select name="choir" id="position ">
                        <option value="1"<?php if($choir == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($choir == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($choir == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($choir == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Garee Daaqonaatii</td>
                <td>
                    <select name="usher" id="position ">
                        <option value="1"<?php if($usher == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($usher == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($usher == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($usher == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Walaloo</td>
                <td>
                    <select name="poem" id="position ">
                        <option value="1"<?php if($poem == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($poem == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($poem == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($poem == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Diraamaa</td>
                <td>
                    <select name="drama" id="position ">
                        <option value="1"<?php if($drama == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($drama == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($drama == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($drama == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Geggeessummaa</td>
                <td>
                    <select name="leadership" id="position ">
                        <option value="1"<?php if($leadership == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($leadership == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($leadership == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($leadership == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Meeshaa Taphachuu</td>
                <td>
                    <select name="musical_instruments" id="position ">
                        <option value="1"<?php if($musical == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($musical == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($musical == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($musical == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Sagantaa Geggeessuu</td>
                <td>
                    <select name="lead_programs" id="position ">
                        <option value="1"<?php if($lead_program == 1){echo "selected";}?>>Ni tajaajila</option>
                        <option value="0"<?php if($lead_program == 0){echo "selected";}?>>Hin tajaajilu</option>
                        <option value="3"<?php if($lead_program == 3){echo "selected";}?>>Ni tajaajilti</option>
                        <option value="2"<?php if($lead_program == 2){echo "selected";}?>>Hin tajaajiltu</option>
                    </select>
                </td>
            </tr>
            <?php
            if (isset($_SESSION['edit'])){
                ?>
            <tr>
                <td>Haala Lubbuu</td>
                <td>
                    <select name="life" id="position ">
                        <option value="1"<?php if($life_status == 1){echo "selected";}?>>Lubbun Jira</option>
                        <option value="0"<?php if($life_status == 0){echo "selected";}?>>Lubbuun hin Jiru</option>
                    </select>
            </td>
            </tr>
                <?php
            }
            ?>
            <tr>
                <td></td>
                <?php if(isset($_SESSION['edit'])){ ?>
                <td><button type="submit" name="update_members" id="register">Sirreessi</button></td>
                <?php } else {?>
                <td><button type="submit" name="register_members" id="register">Galmeessi</button></td>
                <?php } ?>
            </tr>
        </table>
    </form>
</section>
<?php
if(isset($_SESSION['edit'])){
    unset($_SESSION['edit']);
}
?>
</body>
</html>
