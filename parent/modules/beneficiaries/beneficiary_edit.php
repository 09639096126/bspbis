<?php 
include("../../../utils/connection.php");

$beneficiary_id      = mysqli_real_escape_string($db, trim($_POST['beneficiary_id']));
$data                = array();

$name                = '';
$age                 = '';
$education_level     = '';

$query = "
  SELECT *
  FROM tbl_benefeciary
  WHERE beneficiary_id = '$beneficiary_id'
";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_assoc($result);

  $name                = $row['b_name'];
  $age                 = $row['age'];
  $education_level     = $row['education_id'];

}

$data['beneficiary_id']     = $beneficiary_id;
$data['name']               = $name;
$data['age']                = $age;
$data['education_level']    = $education_level;


echo json_encode($data);


?>
