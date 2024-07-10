<?php
include("../../../utils/connection.php");
date_default_timezone_set('Asia/Manila');

$title        = mysqli_real_escape_string($db, trim($_POST['title']));
$description  = mysqli_real_escape_string($db, trim($_POST['description']));
$purpose      = mysqli_real_escape_string($db, trim($_POST['purpose']));
$date         = mysqli_real_escape_string($db, trim($_POST['date']));
$announcement_id         = mysqli_real_escape_string($db, trim($_POST['announcement_id']));


$res_success = 0;
$res_message = "";
$data        = array();


$query = "
UPDATE tbl_barangay_activities
SET
title          = '$title',
activity_desc  = '$description',
purpose        = '$purpose',
date_activity  = '$date'
WHERE activity_id = '$announcement_id'
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