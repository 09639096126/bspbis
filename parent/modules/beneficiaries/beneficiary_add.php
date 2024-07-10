<?php
include("../../../utils/connection.php");

extract($_POST);

$data        = array();
$res_success = 0;
$res_message = "";

$query = "
INSERT INTO tbl_benefeciary(
parent_id,
b_name,
age,
education_id,
status,
date_inserted
)VALUES(
'" . $_SESSION['solo_parent']['parent_id'] . "',
'$name',
'$age',
'$education_level',
'0',
'" . date("Y-m-d H:i:s") . "'
)
";

if ($db->query($query)) {
    $res_success = 1;
} else {
    $res_message = "Query Failed";
}

$data['res_success'] = $res_success;
$data['res_message'] = $res_message;

echo json_encode($data);
