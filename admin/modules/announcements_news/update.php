<?php
include("../../../utils/connection.php");
date_default_timezone_set('Asia/Manila');

$title        = mysqli_real_escape_string($db, trim($_POST['title']));
$description  = mysqli_real_escape_string($db, trim($_POST['description']));
$purpose      = mysqli_real_escape_string($db, trim($_POST['purpose']));
$date         = mysqli_real_escape_string($db, trim($_POST['date']));
$bene_id         = mysqli_real_escape_string($db, trim($_POST['bene_id']));


$res_success = 0;
$res_message = "";
$data        = array();


$query = "
UPDATE tbl_beneficiary_news
SET
title          = '$title',
activity_desc  = '$description',
purpose        = '$purpose',
date_activity  = '$date'
WHERE bene_id = '$bene_id'
";

if (mysqli_query($db, $query)) {
    $res_success = 1;

} else {
    $res_message = "Query Failed";
}


$data['res_success'] = $res_success;
$data['res_message'] = $res_message;


echo json_encode($data);

?>