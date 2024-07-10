<?php
include("../../../utils/connection.php");


extract($_POST);
$parents     = array();
$result1     = array();
$res_success = 0;
$res_message = '';

$query = "
SELECT sp.*, br.name as br_name
FROM tbl_solo_parent as sp
LEFT JOIN tbl_educational_level as educ ON educ.education_id = sp.education_id
LEFT JOIN tbl_income_per_month as inc ON inc.income_id = sp.income_id
LEFT JOIN tbl_barangays as br ON br.barangay_id = sp.barangay_id
WHERE sp.on_status = 0 and sp.status = 1 AND sp.barangay_id = '$barangay_id'
ORDER BY sp.lname ASC
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();
    $res_success = 1; 

    $status = "";
    if($row['status'] == 0){
      $status = '<span class="text-white bg-warning" style="padding: 3px 8px; border-radius: 5px;">Not Validated</span>';

    }
    if($row['status'] == 1){
      $status = '<span class="text-white bg-success" style="padding: 3px 8px; border-radius: 5px;">Validated</span>';

    }



    $temp_arr['parent_id']  = $row['parent_id'];
    $temp_arr['fname']      = $row['fname'];
    $temp_arr['mname']      = $row['mname'];
    $temp_arr['lname']      = $row['lname'];
    $temp_arr['barangay']   = $row['br_name'];


    $parents[] = $temp_arr;
  }
}

foreach ($parents as $rows) {
    array_push($result1, $rows);  
} 

  
$data['parents']      = $result1;
$data['res_success']  = $res_success;
$data['res_message']  = $res_message;

echo json_encode($data);


?>




