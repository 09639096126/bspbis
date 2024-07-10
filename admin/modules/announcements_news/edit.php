<?php
include("../../../utils/connection.php");

$data = array();
$bene_id  = mysqli_real_escape_string($db, trim($_POST['bene_id']));

$activity_desc  = "";
$purpose        = "";
$date_inserted  = "";
$title          = "";


$query = "
SELECT *, DATE(date_inserted) as date_insert
 FROM tbl_beneficiary_news
WHERE bene_id = '$bene_id'
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_assoc($result);

  $activity_desc = $row['activity_desc'];
  $purpose       = $row['purpose'];
  $date_inserted = $row['date_activity'];
  $title         = $row['title'];

}

$data['bene_id']   = $bene_id;
$data['activity_desc'] = $activity_desc; 
$data['purpose']       = $purpose;
$data['title']         = $title;
$data['date_inserted'] = $date_inserted;


echo json_encode($data);

?>