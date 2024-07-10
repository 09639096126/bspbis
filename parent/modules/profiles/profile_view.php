<?php

$profile   = array();
$fname     = "";
$mname     = "";
$lname     = "";
$age       = "";
$bday      = "";
$gender    = "";
$barangay  = "";
$education = "";
$income    = "";
$phone     = "";
$email     = "";
$class_id  = "";
$religion  = "";
$occupation = "";


$query = "
SELECT * FROM tbl_solo_parent
WHERE parent_id = '" . $_SESSION['solo_parent']['parent_id'] . "'
";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    

        $fname       = $row['fname'];
        $mname       = $row['mname'];
        $lname       = $row['lname'];
        $age         = $row['age'];
        $bday        = $row['bday'];
        $gender      = $row['gender'];
        $barangay    = $row['barangay_id'];
        $education   = $row['education_id'];
        $income      = $row['income_id'];
        $phone       = $row['phone'];
        $email       = $row['email'];
        $class_name    = $row['class_id'];
        $religion    = $row['religion'];
        $occupation  = $row['occupation'];
    }
