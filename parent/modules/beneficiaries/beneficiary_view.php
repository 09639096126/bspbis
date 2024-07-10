<?php

$benefeciary = array();

$query = "
SELECT b.*, educ.description
FROM tbl_benefeciary as b
LEFT JOIN tbl_educational_level as educ ON educ.education_id = b.education_id
WHERE parent_id = '".$_SESSION['solo_parent']['parent_id']."' AND b.status = 0
";

$result = $db->query($query);
$numRows = $result->num_rows;

if ($numRows > 0) {
    while ($row = $result->fetch_assoc()) {
      $temp_arr = array();


      $temp_arr['beneficiary_id']      = $row['beneficiary_id'];
      $temp_arr['parent_id']           = $row['parent_id'];
      $temp_arr['b_name']              = $row['b_name'];
      $temp_arr['age']                 = $row['age'];
      $temp_arr['description']         = $row['description'];


      $benefeciary[] = $temp_arr;

    }

  }


?>