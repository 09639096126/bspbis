<?php
include("../../../utils/connection.php");

$parents = array();

$query = "
SELECT sp.*, br.name as br_name, inc.description as inc_name, 
educ.description as educ_desc, DATE(sp.date_inserted) as date_insert, cl.class_desc
FROM tbl_solo_parent as sp
LEFT JOIN tbl_educational_level as educ ON educ.education_id = sp.education_id
LEFT JOIN tbl_income_per_month as inc ON inc.income_id = sp.income_id
LEFT JOIN tbl_barangays as br ON br.barangay_id = sp.barangay_id
LEFT JOIN tbl_classification as cl ON cl.class_id = sp.class_id
WHERE sp.on_status = 0
ORDER BY sp.lname ASC
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();


    $status = "";
    if($row['status'] == 0){
      $status = '<span class="text-white bg-warning" style="padding: 3px 8px; border-radius: 5px;">Not Validated</span>';

    }
    if($row['status'] == 1){
      $status = '<span class="text-white bg-success" style="padding: 3px 8px; border-radius: 5px;">Validated</span>';

    }


    $temp_arr['parent_id']  = $row['parent_id'];
    $temp_arr['username']   = $row['username'];
    $temp_arr['class_desc'] = $row['class_desc'];
    $temp_arr['fname']      = $row['fname'];
    $temp_arr['mname']      = $row['mname'];
    $temp_arr['lname']      = $row['lname'];
    $temp_arr['bday']       = $row['bday'];
    $temp_arr['age']        = $row['age'];
    $temp_arr['gender']     = $row['gender'];
    $temp_arr['phone']      = $row['phone'];
    $temp_arr['email']      = $row['email'];
    $temp_arr['religion']   = $row['religion'];
    $temp_arr['education']  = $row['educ_desc'];
    $temp_arr['occupation'] = $row['occupation'];
    $temp_arr['income']     = $row['inc_name'];
    $temp_arr['barangay']   = $row['br_name'];
    $temp_arr['control_no']      = $row['control_no'];
    $temp_arr['status']          = $status;
    $temp_arr['date_inserted']   = $row['date_insert'];
    $temp_arr['date_issued']   = $row['date_issued'];
    
    $parents[] = $temp_arr;
  }
}
$numbers = range(1, count($parents));

foreach($parents as $key => $value){
   
    $descendants_button = "<button class = 'btn btn-warning' onclick = 'view_descendants(".$value['parent_id'].")'><i class = 'fa fa-users'></i></button>&nbsp;";
    $button= "
    <td class='text-center'>
    <div class='d-flex justify-content-center order-actions'>
    <button class = 'btn btn-success' onclick= 'approve_parent(".$value['parent_id'].")'><i class = 'fa fa-check'></i></button>&nbsp;
   <button class = 'btn btn-danger' onclick= 'delete_parent(".$value['parent_id'].")'><i class = 'fa fa-trash'></i></button>

    </div>
  </td>
    ";
    $current_number = $numbers[$key];

    $data['data'][] = array($value['fname'], $value['mname'],$value['lname'],$value['bday'] ,$value['age'], $value['gender'],$value['barangay'],$value['class_desc'],$value['control_no'],$value['date_issued'],$value['status'],$descendants_button);
  }
  
  
  echo json_encode($data);


?>




