<?php
include("../../../utils/connection.php");
date_default_timezone_set('Asia/Manila');

$control_no = date("Y-m-d H:i:s");
// For the contatanation of the qr/bar code
$q   = substr($control_no, 0, 4);
$w   = substr($control_no, 5, -12);
$e   = substr($control_no, 8, -9);
$r   = substr($control_no, 11, -6);
$t   = substr($control_no, 14, -3);
$y   = substr($control_no, -2);

// $concatqr = $q .'-'.$w .'-'. $e .' '. $r .':'.$t.':'.$y;
$concatqr = $r . $t . $y;

$res_success = 0;
$res_message = "";
$data = array();

$fname             = mysqli_real_escape_string($db, trim($_POST['fname']));
$mname             = mysqli_real_escape_string($db, trim($_POST['mname']));
$lname             = mysqli_real_escape_string($db, trim($_POST['lname']));
$age               = mysqli_real_escape_string($db, trim($_POST['age']));
$bday              = mysqli_real_escape_string($db, trim($_POST['bday']));
$gender            = mysqli_real_escape_string($db, trim($_POST['gender']));
$barangay          = mysqli_real_escape_string($db, trim($_POST['barangay']));
$income            = mysqli_real_escape_string($db, trim($_POST['income']));
$education_level   = mysqli_real_escape_string($db, trim($_POST['education_level']));
$phone             = mysqli_real_escape_string($db, trim($_POST['phone']));
$email             = mysqli_real_escape_string($db, trim($_POST['email']));
$occupation        = mysqli_real_escape_string($db, trim($_POST['occupation']));
$religion          = mysqli_real_escape_string($db, trim($_POST['religion']));
$classification    = mysqli_real_escape_string($db, trim($_POST['classification']));

$child_name       = $_POST['newReq'];
$age_children     = $_POST['newReq1'];
$educ_level       = $_POST['newReq2'];
$requirement      = $_POST['requirement'];

$query = "
UPDATE tbl_solo_parent
SET
    fname        = '$fname',
    mname        = '$mname',
    lname        = '$lname',
    bday         = '$bday',
    age          = '$age',
    gender       = '$gender',
    phone        = '$phone',
    email        = '$email',
    religion     = '$religion',
    education_id = '$education_level',
    occupation   = '$occupation',
    income_id    = '$income',
    class_id     = '$classification',
    barangay_id  = '$barangay',
    control_no   = '$concatqr'
WHERE parent_id   = '" . $_SESSION['solo_parent']['parent_id'] . "'
";

$result = $db->query($query);

if ($result) {
    $res_success = 1;

    foreach ($child_name as $key => $value) {

        if ($value != "" && $age_children[$key] != "" && $educ_level[$key] != "") {

            $query = "
        INSERT INTO tbl_child(
        parent_id,
        c_name,
        age,
        education_id,
        date_inserted)VALUES(
        '" . $_SESSION['solo_parent']['parent_id'] . "',
        '" . $value . "',
        '" . $age_children[$key] . "',
        '" . $educ_level[$key] . "',
        '" . date("Y-m-d H:i:s") . "'
        )
        ";
            if (mysqli_query($db, $query)) {
                $res_success = 1;
            } else {
                $res_message = "Query Failed Inserting descendants";
            }
        }
    }

    //FOR REQUIREMENTS
    foreach ($requirement as $key => $value) {

        $query_check = "
        SELECT * FROM tbl_submitted_req
        WHERE class_req_id = '$value' AND parent_id = '" . $_SESSION['solo_parent']['parent_id'] . "'
        ";

        $result_check = mysqli_query($db, $query_check);

        if (!mysqli_num_rows($result_check)) {

            if ($value != "") {

                $query = "
               INSERT INTO tbl_submitted_req
                (parent_id,
                 class_req_id
                )VALUES
                ('" . $_SESSION['solo_parent']['parent_id'] . "',
                '" . $value . "'
                )
               ";
                if (mysqli_query($db, $query)) {
                    $res_success = 1;
                } else {
                    $res_message = "Please Check Requirements Need";
                }
            }
        }else{
            $res_message = "You Already Submitted That Requirement";
        }
    }
} else {
    $res_message = "Failed Query";
}

$data['res_success'] = $res_success;
$data['res_message'] = $res_message;

echo json_encode($data);
