<?php
include("../../../utils/connection.php");
date_default_timezone_set('Asia/Manila');

$title        = mysqli_real_escape_string($db, trim($_POST['title']));
$description  = mysqli_real_escape_string($db, trim($_POST['description']));
$purpose      = mysqli_real_escape_string($db, trim($_POST['purpose']));
$date_s       = mysqli_real_escape_string($db, trim($_POST['date_s']));


$res_success = 0;
$res_message = "";
$data        = array();


$query = "
INSERT INTO tbl_barangay_activities(
    title,
    activity_desc,
    purpose,
    date_inserted,
    date_activity)VALUES(
    '$title',
    '$description',
    '$purpose',
    '".date("Y-m-d H:i:s")."',
    '$date_s'
)";

if (mysqli_query($db, $query)) {
    $res_success = 1;

} else {
    $res_message = "Query Failed";
}


$data['res_success'] = $res_success;
$data['res_message'] = $res_message;


echo json_encode($data);

?>