<?php 
include "data.php";

 function Log_Transaction($userId,$code,$serial_number,$balance,$action='grv',$DBcon)
{
    if($query = $DBcon->query("INSERT INTO
        bin_log
        (
        USERID,
        CODE,
        serial_number,
        balance,
        action_type
        )
        VALUES
        (
            '".$userId."',
            '".$code."',
            '".$serial_number."',
            '".$balance."',
            '".$action."'
        )")){
            echo "Successfully saved log";
            //Update stock
            if($query = $DBcon->query("UPDATE material SET available_quantity = ".$balance."  WHERE code = '".$code."'")){
                echo "Stock updated!";
            }else{
                echo "Stock update error!";
            }
        }else{
        echo "There is an error log!";
        }
}

function Send_Notification($title,$body,$to,$serial_number,$type,$userId=0,$DBcon)
{
        //Notification
        if($query = $DBcon->query("INSERT INTO
        notifications
        (
        title,
        notification_body,
        notify,
        serial_number,
        notif_type,
        USERID
          )
      VALUES
      (
      '".$title."',
      '".$body."',
      '".$to."',
      '".$serial_number."',
      '".$type."',
      '".$userId."'
      )")){
          echo "Successfully saved notification";
      }else{
      echo "There is an error notification!";
      }   

}

//Add the material into database 
function Add_Material($name,$code,$available_quantity,$unit,$DBcon)
{
        //Notification
        if($query = $DBcon->query("INSERT INTO
        material
        (
        material_name,
        code,
        available_quantity,
        unit_price
          )
      VALUES
      (
      '".$name."',
      ".$code.",
      ".$available_quantity.",
      ".$unit."
      )")){
          echo "Successfully saved material";
      }else{
      echo "There is an error saving the material!";
      }
}

//Check if the material is already registered in the system
function Find_Material($code,$DBcon)
{
    $query = $DBcon->query("SELECT * FROM material WHERE code = '".$code."'");
    $count = mysqli_num_rows($query);
    if($count == 0) {
        return FALSE;
    }else{
        return TRUE;
    }
}

?>