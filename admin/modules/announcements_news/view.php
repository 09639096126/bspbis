<?php
include("../../../utils/connection.php");

$data            = array();
$res_success = 0;
$res_message = "";
extract($_POST);

$announcement = array();

$query = "
SELECT activity_desc, purpose, bene_id, DATE(date_inserted) as date_insert, photo, title, date_activity
 FROM tbl_beneficiary_news
";

$result = $db->query($query);
$numRows = $result->num_rows;

if ($numRows > 0) {
    while ($row = $result->fetch_assoc()) {
      $temp_arr = array();
      $res_success = 1;

      $temp_arr['bene_id']           = $row['bene_id'];
      $temp_arr['activity_desc']     = $row['activity_desc'];
      $temp_arr['purpose']           = $row['purpose'];
      $temp_arr['title']             = $row['title'];
      $temp_arr['photo']             = $row['photo'];
      $temp_arr['date_activity']     = $row['date_activity'];


      $announcement[] = $temp_arr;

    }

  }

  foreach($announcement as $key => $value){
    $image = "<img src='announcements_news/uploads/".$value['photo']."' alt='No Photo' width='70px'>";
    
    $button= "
    <td class='text-center'>
    <div class='d-flex justify-content-center order-actions'>
    <button class = 'btn btn-warning' onclick= 'announcement_upload(".$value['bene_id'].")'><i class = 'fa fa-upload'></i></button>&nbsp;
    <button class = 'btn btn-primary' onclick= 'edit_activity(".$value['bene_id'].")'><i class = 'fa fa-edit'></i></button>&nbsp;
   <button class = 'btn btn-danger' onclick= 'delete_activity(".$value['bene_id'].")'><i class = 'fa fa-trash'></i></button>
    </div>
  </td>
    ";
    $data['data'][] = array($image,$value['title'],$value['activity_desc'], $value['purpose'],$value['date_activity'],$button);
  }

echo json_encode($data);


?>