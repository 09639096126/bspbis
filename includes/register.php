<?php
include "../utils/connection.php";

date_default_timezone_set('Asia/Manila');

$data = array();
$res_success = 0;
$res_message = '';

extract($_POST);

$query = "
SELECT * FROM 
tbl_solo_parent
WHERE username = '$username'
OR fname = '$fname'
OR lname = '$lname'
";

$result = mysqli_query($db, $query);
if(!mysqli_num_rows($result)){

$query = "
INSERT INTO tbl_solo_parent(
username,
password,
fname,
lname,
gender,
date_inserted,
date_issued
)VALUES(
'$username',
'".md5($password)."',
'$fname',
'$lname',
'$gender',
 '" . date("Y-m-d H:i:s") . "',
 '" . date("Y-m-d") . "'
)
";
if(mysqli_query($db,$query)){
    $res_success = 1;
}else{

    $res_message = "Query Failed!";
}

}else{
    $res_message = "Username or Email already Exists";
}

$data['res_success'] = $res_success;
$data['res_message'] = $res_message;

echo json_encode($data);

?>