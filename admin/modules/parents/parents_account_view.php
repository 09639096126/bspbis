<?php
include("../../../utils/connection.php");

$users = array();

$query = "
  SELECT * FROM tbl_solo_parent
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();


    $status = "";
    if($row['on_status'] == 0){
      $status = '<span class="text-white bg-success" style="padding: 3px 8px; border-radius: 5px;">Active</span>';

    }
    if($row['on_status'] == 1){
      $status = '<span class="text-white bg-warning" style="padding: 3px 8px; border-radius: 5px;">Inactive</span>';

    }

    $temp_arr['parent_id']   = $row['parent_id'];
    $temp_arr['username']  = $row['username'];
    $temp_arr['lname']     = $row['lname'];
    $temp_arr['fname']     = $row['fname'];
    $temp_arr['gender']    = $row['gender'];
    $temp_arr['email']     = $row['email'];
    $temp_arr['status']    = $status;

    $users[] = $temp_arr;
  }
}

foreach($users as $key => $value){
  $button= "
  <td class='text-center'>
  <div class='d-flex justify-content-center order-actions'>
  <button class = 'btn btn-warning' onclick= 'change_user(".$value['parent_id'].",\"".$value['username']."\")'><i class = 'fa fa-key'></i></button>&nbsp;

  </div>
</td>
  ";
    $data['data'][] = array($value['username'],$value['fname'],$value['lname'], $value['gender'],$value['email'],$value['status'],$button);
  }
  
  
  echo json_encode($data);


?>




