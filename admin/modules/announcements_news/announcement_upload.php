<?php
include("../../../utils/connection.php");

$bene_id  = mysqli_real_escape_string($db, trim($_POST['announcement_id']));

if(isset($_FILES['file']['name'])){
    /* Getting file name */
    $filename = $_FILES['file']['name'];
 
    /* Location */
    $location = "uploads/";
    $FileType = pathinfo($filename,PATHINFO_EXTENSION);
    $FileType = strtolower($FileType);

    //rename
      $rename = md5($filename);
      $newname = $rename.'.'.$FileType;

    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","webp");

    $response = 0;
    /* Check file extension */
    if(in_array(strtolower($FileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['file']['tmp_name'],$location.$newname)){
          $response = $newname;
          $query="
            UPDATE tbl_beneficiary_news
            SET
            photo      = '$response'
            WHERE bene_id = '$bene_id'
            ";
         mysqli_query($db,$query);
       }
    }  
    echo $response;
    exit;
 }

 echo 0;





?>
