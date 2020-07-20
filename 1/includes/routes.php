<?php
/**
 * Created by PhpStorm.
 * User: kabil
 * Date: 7/13/2018
 * Time: 11:04 PM
 */

include_once "../data/data.php";
session_start();
if(isset($_POST['login'])){
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $query = $DBcon->query("SELECT * FROM admins WHERE phone_number = '".$phone."'");
    $count = mysqli_num_rows($query);
    if($count == 0) {
        header("Location:../login.php");
    }else{
        $row=$query->fetch_array();
        $password = $row['password'];
        if($password == $_POST['password']){
            $_SESSION['id'] = $row['id'];;
            $_SESSION['position'] = $row['position_of_church'];
            header("Location:../index.php");
        }else{
            header("Location:../login.php");
        }
    }


}else if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    header("Location:../login.php");

}else if (isset($_POST['update_age'])){
    if($query = $DBcon->query("INSERT INTO update_year(is_added) VALUES (1)")){
        if($query = $DBcon->query("SELECT * FROM members WHERE haala_lubbuu = 1")){
            while($row=$query->fetch_array()){
                $age = $row['umurii'] + 1;
                $internal_query = $DBcon->query("UPDATE members SET umurii = ".$age." WHERE id = ".$row['id']);
            }
            $_SESSION['message'] = "Umuriin Dabalameera!";
            header("Location:../add_age.php");
        }else{
            $_SESSION['error_message'] = "Umuriin Hin Dabalamne!";
            header("Location:../add_age.php");
        }
    }else{
        $_SESSION['error_message'] = "Umuriin Hin Dabalamne!";
    }
    header("Location:../add_age.php");
}else if (isset($_POST['decrement_age'])){
    if($query = $DBcon->query("SELECT * FROM update_year ORDER BY id DESC")){
        $row=$query->fetch_array();
        $query = $DBcon->query("DELETE FROM update_year WHERE id = ".$row['id']);
        if($query = $DBcon->query("SELECT * FROM members WHERE haala_lubbuu = 1")){
            while($row=$query->fetch_array()){
                $age = $row['umurii'] - 1;
                $internal_query = $DBcon->query("UPDATE members SET umurii = ".$age." WHERE id = ".$row['id']);
            }
            $_SESSION['message'] = "Umuriin Hirdhifameera!";
            header("Location:../add_age.php");
        }else{
            $_SESSION['error_message'] = "Umuriin Hin Hirdhifamne!";
            header("Location:../add_age.php");
        }
    }else{
        $_SESSION['error_message'] = "Umuriin Hin Hirdhifamne!";
    }
    header("Location:../add_age.php");

}else if (isset($_GET['add_picture'])) {
    $_SESSION['identification']=$_GET['add_picture'];
    $query = $DBcon->query("SELECT * FROM members WHERE id =".$_GET['add_picture']);
    $count = mysqli_num_rows($query);
    if($count == 0) {
        header("Location:../index.php");
    }else {
        header("Location:../add_members2.php");
    }
}else if(isset($_POST['upload_photo'])){
    $upload_dir = '../images/'; // upload directory
    $imgFile = $_FILES['photo']['name'];
    $tmp_dir = $_FILES['photo']['tmp_name'];
    $imgSize = $_FILES['photo']['size'];

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    // rename uploading image
    $userpic = rand(1000, 10000000000000000000) . "." . $imgExt;
    // allow valid image file formats
    if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
        if ($imgSize < 10000000) {
            move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            $photo = "images/" . $userpic;

            if($query = $DBcon->query("UPDATE members SET suura = '".$photo."' WHERE id = ".$_SESSION['identification'])){
                $_SESSION['message'] = "Milkaa'inaan suura galcheera!";
                header("Location:../view_member.php");
            }else{
                $_SESSION['error_message'] ="Suura galchuu hin dandeenye irra deebi'ii yaali!";
                header("Location:../add_members2.php");
            }

        } else {
            $_SESSION['error_message'] ="Suura galchuu hin dandeenye, Suurichi baayyee guddaadha!";
            header("Location:../add_members2.php");
        }
    } else {
        $_SESSION['error_message'] ="Kan ati galchuuf yaalte suura miti!";
        echo $imgExt;
//        header("Location:../add_members2.php");
    }
}else if(isset($_POST['register_admins'])){
    $membership_id = $_POST['membership_id'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    if($query = $DBcon->query("INSERT INTO admins(membership_id,phone_number,password,position_of_church) VALUES(".$membership_id.",'".$phone."','".$password."',".$phone.")")){
        $_SESSION['message'] = "Milkaa'inaan galmaa'era!";
        header("Location:../view_admins.php");
    }else{
        $_SESSION['error_message'] = "Galmeessuu hin dandeenye irra deebi'ii yaali!";
        header("Location:../add_admins.php");
    }
}else if(isset($_POST['register_Children'])){
    $children = $_POST['id'];
    if($query = $DBcon->query("UPDATE members SET ijoollee_qabda = 1 , children_id = '".$children."' WHERE id = ".$_SESSION['identification'])){
        $_SESSION['message'] = "Milkaa'inaan galmaa'era!";
        header("Location:../view_member.php");
    }else{
        $_SESSION['error_message'] ="galmeessuu hin dandeenye irra deebi'ii yaali!";
        header("Location:../add_children.php");
    }
}else if(isset($_POST['register_members'])){
    $full_name =addslashes($_POST['full_name']);
    $sex = $_POST['sex'];
    $ganda = $_POST['ganda'];
    $guuxii = $_POST['guuxii'];
    $phone = $_POST['phone'];
    if($phone == ""){
        $phone = "".rand(1, 9)."".rand(1, 9)."".rand(0, 9)."".rand(0, 9)."".rand(0, 9)."".rand(0, 9)."".rand(0, 9)."".rand(0, 9);
    }
    $year_saved = $_POST['year_saved'];
    $baptism_status = $_POST['baptism_status'];
    $marital_status = $_POST['marital_status'];
    $wife_id = $_POST['wife_id'];
    $academic_status = $_POST['academic_status'];
    $prophecy = $_POST['prophecy'];
    $preach = $_POST['preach'];
    $solo = $_POST['solo'];
    $choir = $_POST['choir'];
    $usher = $_POST['usher'];
    $poem = $_POST['poem'];
    $drama = $_POST['drama'];
    $geggeessummaa = $_POST['leadership'];
    $age = $_POST['age'];
    $ijoollee = $_POST['child_status'];
    $musical_instruments = $_POST['musical_instruments'];
    $sagantaa_geggeessuu = $_POST['lead_programs'];
    $soortuu = $_POST['pastor'];
    $hojjii = $_POST['work'];
    if($query = $DBcon->query("INSERT INTO members(
maqaa_guutuu,
saala,
bara_amantii
,haala_cuuphaa
,haala_gaaela
,wife_id,
sadarkaa_barnootaa,
raajummaa,
lallaba,
faarfannaa_dhuunfaa,
faarfannaa_garee,
diyaaqonaatii,
walaloo,
meeshaa_taphachuu,
lakkoofsa_bilbilaa,
ganda,
guuxii,
geggeessummaa,
umurii,
ijoollee_qabda,
soortuu,
diraamaa,
sagantaa_geggeessuu,
hojjii
)VALUES(
'".$full_name."',
'".$sex."',
'".$year_saved."',
'".$baptism_status."',
'".$marital_status."',
'".$wife_id."',
'".$academic_status."',
".$prophecy.",
".$preach.",
".$solo.",
".$choir.",
".$usher.",
".$poem.",
".$musical_instruments.",
'".$phone."',
'".$ganda."',
'".$guuxii."',
".$geggeessummaa.",
".$age.",
".$ijoollee.",
".$soortuu.",
".$drama.",
".$sagantaa_geggeessuu.",
'".$hojjii."'
)")){

        $_SESSION['message'] = $full_name." milkaa'inaan galmeesseera!";
        header("Location:../view_member.php");
    }else{
        $_SESSION['error_message'] = $full_name." hin galmoofne!";
        header("Location:../add_members.php");
    }
}else if(isset($_POST['update_admins'])){

    if($query = $DBcon->query("SELECT maqaa_guutuu FROM members WHERE id=".$_POST['membership_id'])) {
        $row=$query->fetch_array();
        if($row['maqaa_guutuu'] != ""){
            $_SESSION['message'] = "Milkaa'inaan sirreesseera!";
            if($_SESSION['position']==1) {
                header("Location:../view_admins.php");
            }else{
                header("Location:../profile.php");
            }
            if ($query = $DBcon->query("UPDATE admins SET membership_id = " . $_POST['membership_id'] . ",phone_number = '" . $_POST['phone'] . "',position_of_church = '" . $_POST['position'] . "',password = '" . $_POST['password'] . "' WHERE id = " . $_SESSION['identification'])) {
                $_SESSION['message'] = "Milkaa'inaan sirreesseera!";
                if($_SESSION['position']==1) {
                    header("Location:../view_admins.php");
                }else{
                    header("Location:../profile.php");
                }
            }else {
                $_SESSION['error_message'] = "Hin sirreeffamne!";
                if($_SESSION['position']==1) {
                    header("Location:../add_admins.php");
                }else{
                    header("Location:../profile.php");
                }
            }
        }else{
            $_SESSION['error_message'] = "Lakkoofsi galmee ati galchite sirri miti!";
            if($_SESSION['position']==1) {
                header("Location:../add_admins.php");
            }else{
                header("Location:../profile.php");
            }

        }
    }
}else if(isset($_POST['update_members'])){
    $full_name =addslashes($_POST['full_name']);
    $sex = $_POST['sex'];
    $ganda = $_POST['ganda'];
    $guuxii = $_POST['guuxii'];
    $phone = $_POST['phone'];
    $year_saved = $_POST['year_saved'];
    $baptism_status = $_POST['baptism_status'];
    $marital_status = $_POST['marital_status'];
    $wife_id = $_POST['wife_id'];
    $academic_status = $_POST['academic_status'];
    $prophecy = $_POST['prophecy'];
    $preach = $_POST['preach'];
    $solo = $_POST['solo'];
    $choir = $_POST['choir'];
    $usher = $_POST['usher'];
    $poem = $_POST['poem'];
    $drama = $_POST['drama'];
    $geggeessummaa = $_POST['leadership'];
    $age = $_POST['age'];
    $ijoollee = $_POST['child_status'];
    $musical_instruments = $_POST['musical_instruments'];
    $sagantaa_geggeessuu = $_POST['lead_programs'];
    $soortuu = $_POST['pastor'];
    $hojjii = $_POST['work'];
    $life = $_POST['life'];

if ($query = $DBcon->query("UPDATE members SET maqaa_guutuu = '".$full_name."',
saala = '".$sex."'
,umurii = ".$age.",
bara_amantii = ".$year_saved.",
haala_cuuphaa = '".$baptism_status."',
haala_gaaela = '".$marital_status."',
wife_id = '".$wife_id."',
sadarkaa_barnootaa = '".$academic_status."',
raajummaa = ".$prophecy.",
lallaba = ".$preach.",
faarfannaa_dhuunfaa = ".$solo.",
faarfannaa_garee = ".$choir.",
diyaaqonaatii = ".$usher.",
geggeessummaa = ".$geggeessummaa.",
walaloo = ".$poem.",
meeshaa_taphachuu = ".$musical_instruments.",
lakkoofsa_bilbilaa = '".$phone."',
ganda = '".$ganda."',
guuxii = '".$guuxii."',
ijoollee_qabda = ".$ijoollee.",
soortuu = ".$soortuu.",
diraamaa = ".$drama.",
sagantaa_geggeessuu = ".$sagantaa_geggeessuu.",
hojjii = '".$hojjii."',
haala_lubbuu = ".$life."
 WHERE id = " . $_SESSION['identification'])) {
                $_SESSION['message'] = "Milkaa'inaan sirreesseera!";
                    header("Location:../view_members.php");
            }else {
                $_SESSION['error_message'] = "Hin sirreeffamne!";
                    header("Location:../add_members.php");
            }
}else if(isset($_GET['edit'])){
    $query = $DBcon->query("SELECT * FROM admins WHERE id = ".$_GET['edit']);
    $count = mysqli_num_rows($query);

    if($count == 0) {
        header("Location:../index.php");
    }else{
        $row=$query->fetch_array();
        $_SESSION['edit'] = "true";
        $_SESSION['membership_id'] = $row['membership_id'];
        $_SESSION['identification'] = $row['id'];
        $_SESSION['phone'] = $row['phone_number'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['position_manipulate'] = $row['position_of_church'];
        header("Location:../add_admins.php");
    }
}else if(isset($_GET['edit_members'])){
    $query = $DBcon->query("SELECT * FROM members WHERE id = ".$_GET['edit_members']);
    $count = mysqli_num_rows($query);

    if($count == 0) {
        header("Location:../index.php");
    }else{
        $row=$query->fetch_array();
        $_SESSION['edit'] = "true";
        $_SESSION['maqaa_guutuu'] = $row['maqaa_guutuu'];
        $_SESSION['identification'] = $row['id'];
        $_SESSION['saala'] = $row['saala'];
        $_SESSION['umurii'] = $row['umurii'];
        $_SESSION['bara_amantii'] = $row['bara_amantii'];
        $_SESSION['haala_cuuphaa'] = $row['haala_cuuphaa'];
        $_SESSION['haala_gaaela'] = $row['haala_gaaela'];
        $_SESSION['wife_id'] = $row['wife_id'];
        $_SESSION['sadarkaa_barnootaa'] = $row['sadarkaa_barnootaa'];
        $_SESSION['raajummaa'] = $row['raajummaa'];
        $_SESSION['lallaba'] = $row['lallaba'];
        $_SESSION['faarfannaa_dhuunfaa'] = $row['faarfannaa_dhuunfaa'];
        $_SESSION['faarfannaa_garee'] = $row['faarfannaa_garee'];
        $_SESSION['diyaaqonaatii'] = $row['diyaaqonaatii'];
        $_SESSION['geggeessummaa'] = $row['geggeessummaa'];
        $_SESSION['walaloo'] = $row['walaloo'];
        $_SESSION['meeshaa_taphachuu'] = $row['meeshaa_taphachuu'];
        $_SESSION['lakkoofsa_bilbilaa'] = $row['lakkoofsa_bilbilaa'];
        $_SESSION['ganda'] = $row['ganda'];
        $_SESSION['guuxii'] = $row['guuxii'];
        $_SESSION['ijoollee_qabda'] = $row['ijoollee_qabda'];
        $_SESSION['soortuu'] = $row['soortuu'];
        $_SESSION['diraamaa'] = $row['diraamaa'];
        $_SESSION['sagantaa_geggeessuu'] = $row['sagantaa_geggeessuu'];
        $_SESSION['hojjii'] = $row['hojjii'];
        $_SESSION['lubbuu'] = $row['haala_lubbuu'];
        header("Location:../add_members.php");
    }
}else if(isset($_GET['edit_kurno'])){
    $query = $DBcon->query("SELECT * FROM income_payment WHERE id = ".$_GET['edit_kurno']);
    $count = mysqli_num_rows($query);

    if($count == 0) {
        $_SESSION['identification'] = $_GET['edit_kurno'];
        $_SESSION['date'] = "";
        $_SESSION['payment'] = "";
        $_SESSION['payment_status'] = 0;
        header("Location:../add_kurno.php");
    }else{
        $row=$query->fetch_array();
        $_SESSION['identification'] = $row['id'];
        $_SESSION['date'] = $row['date_collection'];
        $_SESSION['payment'] = $row['payment_collection'];
        $_SESSION['payment_status'] = 1;
        header("Location:../add_kurno.php");
    }
}else if(isset($_POST['save_kurno'])){
    $date_input = $_POST['date_collection'];
    $payment_input = $_POST['payment_collection'];
    if($_SESSION['payment_status'] == 0){
        if($query = $DBcon->query("INSERT INTO income_payment(id,date_collection,payment_collection) VALUES(".$_SESSION['identification'].",'".$date_input."','".$payment_input."')")){
            $_SESSION['message'] = "Milkaa'inaan galmaa'era!";
            header("Location:../kurno.php");
        }else{
            $_SESSION['error_message'] = "Galmeessuu hin dandeenye irra deebi'ii yaali!";
            header("Location:../kurno.php");
        }
    }else{
        $date_input = $_SESSION['date'].",".$date_input;
        $payment_input = $_SESSION['payment'].",".$payment_input;
        if($query = $DBcon->query("UPDATE income_payment SET date_collection = '".$date_input."' , payment_collection = '".$payment_input."' WHERE id = ".$_SESSION['identification'])){
            $_SESSION['message'] = "Milkaa'inaan galmaa'era!";
            header("Location:../kurno.php");
        }else{
            $_SESSION['error_message'] = "Galmeessuu hin dandeenye irra deebi'ii yaali!";
            header("Location:../kurno.php");
        }
    }
}else if(isset($_GET['delete'])) {
    if($query = $DBcon->query("DELETE FROM admins WHERE id=".$_GET['delete'])){
        $_SESSION['message'] = "Milkaa'inaan haqeera!";
        header("Location:../view_admins.php");
    }else{
        $_SESSION['error_message'] = "Haqamuu hin dandeenye irra deebi'ii yaali!";
        header("Location:../add_admins.php");
    }
}else if(isset($_GET['delete_members'])) {
    if($query = $DBcon->query("DELETE FROM members WHERE id =".$_GET['delete_members'])){
        $query = $DBcon->query("SELECT * FROM income_payment WHERE id =".$_GET['delete_members']);
        $count = mysqli_num_rows($query);
        if($count> 0){
            $query = $DBcon->query("DELETE FROM income_payment WHERE id =".$_GET['delete_members']);
        }
        $_SESSION['message'] = "Milkaa'inaan haqeera!";
        header("Location:../view_members.php");
    }else{
        $_SESSION['error_message'] = "Haqamuu hin dandeenye irra deebi'ii yaali!";
        header("Location:../view_members.php");
    }
}else if(isset($_GET['view'])) {
    $query = $DBcon->query("SELECT * FROM members WHERE id = ".$_GET['view']." OR lakkoofsa_bilbilaa = ".$_GET['view']);
    $count = mysqli_num_rows($query);

    if($count == 0) {
        header("Location:../index.php");
    }else{
        $row=$query->fetch_array();
        $_SESSION['full_name'] = $row['first_name'];
        $_SESSION['identification'] = $_GET['view'];
        header("Location:../view_member.php");
    }
}
else if(isset($_GET['view_kurno'])) {
    $query = $DBcon->query("SELECT * FROM income_payment WHERE id = ".$_GET['view_kurno']);
    $count = mysqli_num_rows($query);
    $query = $DBcon->query("SELECT * FROM members WHERE id = ".$_GET['view_kurno']);
    $row=$query->fetch_array();
    $_SESSION['full_name'] = $row['maqaa_guutuu'];
    if($count == 0) {
        $_SESSION['error_message'] = $_SESSION['full_name']." dhaan kurnoon kaffalamaa ture hin jiru";
        header("Location:../kurno.php");
    }else{
        $_SESSION['identification'] = $_GET['view_kurno'];
        header("Location:../view_kurno.php");
    }
}
?>