<?php

$parents = array();
$data = array();

$barangay_id        = mysqli_real_escape_string($db, trim($_GET['barangay_id']));
$month              = mysqli_real_escape_string($db, trim($_GET['month']));
$year_select        = mysqli_real_escape_string($db, trim($_GET['year']));
$barangay          = "";
$year              = "";

$query = "
SELECT cash.*, sp.parent_id, br.name as br_name, sp.fname, sp.lname,  sp.mname, DATE(cash.date_inserted) as date_received
FROM tbl_cash_assistance as cash
LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = cash.parent_id
LEFT JOIN tbl_barangays as br ON br.barangay_id = sp.barangay_id
WHERE sp.on_status = 0 and sp.status = 1 and cash.status = 0
";

$hasWhere = 1;

if ($barangay_id) {
  if (!$hasWhere) {
    $query .= " WHERE br.barangay_id = '$barangay_id' ";
  } else {
    $query .= " AND br.barangay_id = '$barangay_id' ";
  }
  $hasWhere = 1;
}

if ($month) {
  if (!$hasWhere) {
    $query .= " WHERE MONTH(cash.date_inserted) = '$month' ";
  } else {
    $query .= " AND MONTH(cash.date_inserted) = '$month' ";
  }
  $hasWhere = 1;
}

if ($year_select) {
  if (!$hasWhere) {
    $query .= " WHERE YEAR(cash.date_inserted) = '$year_select' ";
  } else {
    $query .= " AND YEAR(cash.date_inserted) = '$year_select' ";
  }
  $hasWhere = 1;
}


$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();

    $temp_arr['parent_id']         = $row['parent_id'];
    $temp_arr['cash_id']           = $row['cash_id'];
    $temp_arr['fname']             = $row['fname'];
    $temp_arr['mname']             = $row['mname'];
    $temp_arr['lname']             = $row['lname'];
    $temp_arr['amount']            = $row['amount'];
    $barangay                      = $row['br_name'];
    $temp_arr['date_received']     = $row['date_received'];

    $parents[] = $temp_arr;
  }
}


?>