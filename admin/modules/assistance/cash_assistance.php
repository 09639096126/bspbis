<?php
include("../../../utils/connection.php");

$parents = array();
$data     = array();


$query = "
SELECT cash.*, sp.parent_id, br.name as br_name, sp.fname, sp.lname,  sp.mname, DATE(cash.date_inserted) as date_received
FROM tbl_cash_assistance as cash
LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = cash.parent_id
LEFT JOIN tbl_barangays as br ON br.barangay_id = sp.barangay_id
WHERE sp.on_status = 0 and sp.status = 1 and cash.status = 0
ORDER BY cash.date_inserted ASC
";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $temp_arr = array();



    $temp_arr['parent_id']  = $row['parent_id'];
    $temp_arr['cash_id']    = $row['cash_id'];
    $temp_arr['fname']      = $row['fname'];
    $temp_arr['mname']      = $row['mname'];
    $temp_arr['lname']      = $row['lname'];
    $temp_arr['amount']     = $row['amount'];
    $temp_arr['barangay']   = $row['br_name'];
    $temp_arr['date_received']     = $row['date_received'];

    $parents[] = $temp_arr;
  }
}

foreach($parents as $key => $value){
    $amount = "";

    if($value['amount'] != ""){
        $amount = "₱ " .$value['amount'];
    }else{
        $amount = "";
    }

    $button= "
    <td class='text-center'>
    <div class='d-flex justify-content-center order-actions'>
   <button class = 'btn btn-danger' onclick= 'delete_cash(".$value['cash_id'].")'><i class = 'fa fa-trash'></i></button>
    </div>
  </td>
    ";

    $data['data'][] = array($value['fname'], $value['mname'],$value['lname'],$value['barangay'],$amount,$value['date_received'],$button);
  }
  
  
  echo json_encode($data);


?>




