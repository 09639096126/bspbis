<?php
include("../../../utils/connection.php");

$users = array();

$query = "
  SELECT * FROM tbl_users
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();


    $temp_arr['user_id']   = $row['user_id'];
    $temp_arr['username']  = $row['username'];
    $temp_arr['lname']     = $row['lname'];
    $temp_arr['fname']     = $row['fname'];
    $temp_arr['gender']    = $row['gender'];
    $temp_arr['email']     = $row['email'];

    $users[] = $temp_arr;
  }
}

foreach($users as $key => $value){
  $button= "
  <td class='text-center'>
  <div class='d-flex justify-content-center order-actions'>
  <button class = 'btn btn-warning' onclick= 'change_user(".$value['user_id'].",\"".$value['username']."\")'><i class = 'fa fa-key'></i></button>&nbsp;
  <button class = 'btn btn-primary' onclick= 'edit_user(".$value['user_id'].")'><i class = 'fa fa-edit'></i></button>&nbsp;
 <button class = 'btn btn-danger' onclick= 'delete_user(".$value['user_id'].")'><i class = 'fa fa-trash'></i></button>

  </div>
</td>
  ";
    $data['data'][] = array($value['username'],$value['fname'],$value['lname'], $value['gender'],$value['email'],$button);
  }
  
  
  echo json_encode($data);


?>




