<?php
include("../../../utils/connection.php");
date_default_timezone_set('Asia/Manila');

$data = array();

$password = mysqli_real_escape_string($db, trim($_POST['password']));

$query  = "
  UPDATE tbl_solo_parent
  SET password = '".md5($password)."' 
  WHERE parent_id= '".$_SESSION['solo_parent']['parent_id']."'
";
mysqli_query($db, $query);

echo json_encode($data);

?>
