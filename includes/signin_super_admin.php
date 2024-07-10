<?php
include "../utils/connection.php";

date_default_timezone_set('Asia/Manila');

$data = array();
$res_success = 0;
$res_message = '';

extract($_POST);
    
  $query = "
  SELECT * FROM tbl_users
  WHERE username = '$username'
  AND password = '" . md5($password) . "'
  AND user_type_id = 2
";

  $result = mysqli_query($db, $query) or die('Error in Inserting users in ' . $query);
  if (mysqli_num_rows($result) == 1) {
    //log user in
    $res_success               = 1;
    $row = mysqli_fetch_array($result);
    $_SESSION['super_admin']   = $row;
  } else {

    $res_message = "Wrong Credentials";
  }



$data['res_success'] = $res_success;
$data['res_message'] = $res_message;

echo json_encode($data);
