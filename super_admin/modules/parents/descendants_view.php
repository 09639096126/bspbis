<?php
include("../../../utils/connection.php");

$data            = array();
$result_descendants = array();
$res_success = 0;
$res_message = "";
extract($_POST);

$descendant = array();

$query = "
SELECT ch.*, educ.description
FROM tbl_child as ch
LEFT JOIN tbl_educational_level as educ ON educ.education_id = ch.education_id
WHERE parent_id = '$parent_id' AND ch.status = 0
";

$result = $db->query($query);
$numRows = $result->num_rows;

if ($numRows > 0) {
    while ($row = $result->fetch_assoc()) {
      $temp_arr = array();
      $res_success = 1;

      $temp_arr['child_id']         = $row['child_id'];
      $temp_arr['c_name']           = $row['c_name'];
      $temp_arr['age']              = $row['age'];
      $temp_arr['description']      = $row['description'];

      $descendant[] = $temp_arr;
    }

  }

  foreach ($descendant as $rows) {
    array_push($result_descendants, $rows);  
} 

$data['descendants']            = $result_descendants;


echo json_encode($data);


?>