<?php
if (isset($_POST['new'])) {
    $dir = "new/";
    // Sort in ascending order - this is default
    $images = scandir($dir);
    echo json_encode(array_slice($images,2,sizeof($images),false));
    exit();
}
if (isset($_POST['amharic'])) {
    $dir = "amharic/";
    // Sort in ascending order - this is default
    $images = scandir($dir);
    echo json_encode(array_slice($images,2,sizeof($images),false));
    exit();
}
if (isset($_POST['series'])) {
    $dir = "series/";
    // Sort in ascending order - this is default
    $images = scandir($dir);
    echo json_encode(array_slice($images,2,sizeof($images),false));
    exit();
}
if (isset($_POST['movies'])) {
    $dir = "movies/";
    // Sort in ascending order - this is default
    $images = scandir($dir);
    echo json_encode(array_slice($images,2,sizeof($images),false));
    exit();
}
if (isset($_POST['hind'])) {
    $dir = "hind/";
    // Sort in ascending order - this is default
    $images = scandir($dir);
    echo json_encode(array_slice($images,2,sizeof($images),false));
    exit();
}


?>