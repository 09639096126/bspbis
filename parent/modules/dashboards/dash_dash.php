<?php

$announcements = array();

$query = "
SELECT * FROM tbl_beneficiary_news
ORDER BY date_inserted DESC
";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();

    $temp_arr['bene_id']       = $row['bene_id'];
    $temp_arr['activity_desc']     = $row['activity_desc'];
    $temp_arr['title']             = $row['title'];
    $temp_arr['photo']             = $row['photo'];
    $temp_arr['date_inserted']     = date('F d,Y', strtotime($row['date_inserted']));
    $temp_arr['date_created']      = date('Y-m-d', strtotime($row['date_inserted']));
    $temp_arr['purpose']           = $row['purpose'];
 

    $announcements[] = $temp_arr;
  }
}
?>
