<?php
include("../../../utils/connection.php");

extract($_POST);

$data = array();
$res_success = 0;
$res_message = "";

$query = "
DELETE FROM
tbl_cash_assistance
WHERE cash_id = '$cash_id'
";

if($db->query($query)){
    $res_success = 1;
}else{
    $res_message = "Failed";
}

$data['res_success']  = $res_success;
$data['res_message'] = $res_message;

echo json_encode($data);
?>  