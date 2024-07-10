<?php
include("../../../utils/connection.php");

$data = array();
$activity_id  = mysqli_real_escape_string($db, trim($_POST['activity_id']));

$activity_desc  = "";
$purpose        = "";
$date_inserted  = "";
$title          = "";


$query = "
SELECT *, DATE(date_inserted) as date_insert
 FROM tbl_barangay_activities
WHERE activity_id = '$activity_id'
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_assoc($result);

  $activity_desc = $row['activity_desc'];
  $purpose       = $row['purpose'];
  $date_inserted = $row['date_activity'];
  $title         = $row['title'];

}

$data['activity_id']   = $activity_id;
$data['activity_desc'] = $activity_desc; 
$data['purpose']       = $purpose;
$data['title']         = $title;
$data['date_inserted'] = $date_inserted;


echo json_encode($data);

?>