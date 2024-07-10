<?php date_default_timezone_set('Asia/Manila');

include("../../../utils/connection.php");

$username   = mysqli_real_escape_string($db, trim($_POST['username']));
$lname      = mysqli_real_escape_string($db, trim($_POST['lname']));
$fname      = mysqli_real_escape_string($db, trim($_POST['fname']));
$gender     = mysqli_real_escape_string($db, trim($_POST['gender']));
$email      = mysqli_real_escape_string($db, trim($_POST['email']));


$data = array();
$res_success = 0;
$res_message = "";

$query = "
SELECT * FROM tbl_users
WHERE username = '$username' OR email = '$email'
";

$result = mysqli_query($db, $query);

if (!mysqli_num_rows($result)) {

    $query = "
    INSERT INTO tbl_users(username,
        password,
        fname,
        lname,
        gender,
        email) VALUES('$username',
        '".md5($username)."',
        '$fname',
        '$lname',
        '$gender',
        '$email'
    )
    ";

    if (mysqli_query($db, $query)) {
        $res_success = 1;
    } else {
        $res_message = "Query Failed";
    }

} else {
    $res_message = "Username or Email already Exists ";
}

$data['res_success'] = $res_success;
$data['res_message'] = $res_message;


echo json_encode($data);





?>