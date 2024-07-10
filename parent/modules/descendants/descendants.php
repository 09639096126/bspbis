<?php

$descendant = array();

$query = "
SELECT ch.*, educ.description
FROM tbl_child as ch
LEFT JOIN tbl_educational_level as educ ON educ.education_id = ch.education_id
WHERE parent_id = '".$_SESSION['solo_parent']['parent_id']."' AND ch.status = 0
";

$result = $db->query($query);
$numRows = $result->num_rows;

if ($numRows > 0) {
    while ($row = $result->fetch_assoc()) {
      $temp_arr = array();


      $temp_arr['child_id']         = $row['child_id'];
      $temp_arr['c_name']           = $row['c_name'];
      $temp_arr['age']              = $row['age'];
      $temp_arr['description']      = $row['description'];


      $descendant[] = $temp_arr;

    }

  }


?>