<?php
include("../../../utils/connection.php");
include '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$data_1 = array();
$res_success = 0;
$res_message = '';


$fileName = $_FILES['excel_1']['name'];
$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

$allowed_ext = ['xls', 'csv', 'xlsx'];

if (in_array($file_ext, $allowed_ext)) {
    $inputFileNamePath = $_FILES['excel_1']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
    $data = $spreadsheet->getActiveSheet()->toArray();

    $count = "0";

    foreach ($data as $row) {
        if ($count > 0) {

            $lname        = $row['0'];
            $fname        = $row['1'];
            $mname        = $row['2'];
            $bday         = $row['3'];
            $age          = $row['4'];
            $gender       = $row['5'];
            $barangay     = $row['6'];
            $control_no   = $row['7'];
            $date_issued  = $row['8'];

            // Fetch the course ID based on the course name
            $query_barangay = "SELECT barangay_id FROM tbl_barangays WHERE name = '$barangay'";
            $result_barangay = mysqli_query($db, $query_barangay);

            if ($row_barangay = mysqli_fetch_assoc($result_barangay)) {
                $barangay_idd = $row_barangay['barangay_id'];


    $query = "
        INSERT INTO tbl_solo_parent
        (username,
        password,
        lname,
        fname,
        mname,
        bday,
        age,
        gender,
        barangay_id,
        control_no,
        date_issued,
        status)VALUES(
        '".$lname.$age."',
        '" . md5(123) . "',
        '$lname',
        '$fname',
        '$mname',
        '$bday',
        '$age',
        '$gender',
        '$barangay_idd',
        '$control_no',
        '$date_issued',
        '1'
        )
        ";

    if ($db->query($query)) {
        $res_success = 1;
    } else {
        $res_success = 2;
    }
}

            //IF COUNT
        } else {
            $count = "1";
        }
        //FOREACH
    }
}

echo $res_success;
