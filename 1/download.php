 <?php 
  /**
  $filename = "https://focusfinfinnee.com/index.php"; //Obviously needs validation
  ob_end_clean();
  header("Content-Type: application/octet-stream; "); 
  header("Content-Transfer-Encoding: binary"); 
  header("Content-Length: ". filesize($filename).";"); 
  header("Content-disposition: attachment; filename=" . $filename);
  readfile($filename);
  die();
  */
  ?>
  <?php
//  downloadThatPhp("index.php");
function downloadThatPhp($nameOfTheFile)
    {
        header("Pragma: public");
        header("Expires: 0"); // set expiration time
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/text/x-vCard");
        header("Content-Disposition: attachment; filename=".basename($nameOfTheFile).";");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($nameOfTheFile));
        @readfile($nameOfTheFile);
        exit(0);
    }

    // and this how to use:
    // download that php file with your own risk :)
    $file = "index.php";
    $downloadThis = "https://www.focusfinfinnee.com/".$file;
    if (file_exists($file)) {
        downloadThatPhp($downloadThis);
    }
?>