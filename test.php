<?php
if(isset($_POST['btn'])){
    echo $_POST['name'][1];
}
?>
<form action="" method="post">
    <input type="text" name="name[]" id="">
    <input type="text" name="name[]" id="">
    <input type="text" name="name[]" id="">
    <input type="submit" value="Subit" name="btn">
</form>