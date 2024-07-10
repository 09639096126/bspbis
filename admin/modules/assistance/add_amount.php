<?php
include("../../../utils/connection.php");
date_default_timezone_set('Asia/Manila');

extract($_POST);

$res_success = 0;
$res_message = "";
$data        = array();

$query_check = "
SELECT * FROM tbl_cash_assistance
WHERE DATE(date_inserted) = '$date_receive' AND parent_id = '$parent_id'
";
$result = mysqli_query($db, $query_check);
if(!mysqli_num_rows($result)){

$query = "
INSERT INTO tbl_cash_assistance(parent_id,
amount,
date_inserted)VALUES(
'$parent_id',
'$amount',
'$date_receive'
)
";

if (mysqli_query($db, $query)) {
    $res_success = 1;

} else {
    $res_message = "Query Failed";
}

} else {
    $res_message = "You already Inputed Cash Assistance to this parent on this Date";
}


$data['res_success'] = $res_success;
$data['res_message'] = $res_message;


echo json_encode($data);

?>