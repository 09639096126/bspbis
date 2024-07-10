<?php
include("../../../utils/connection.php");

$classification = mysqli_real_escape_string($db, $_POST['classification']);

$query = "
SELECT cs.*, req.requirement, c.class_desc
FROM tbl_class_req as cs
LEFT JOIN tbl_requirements AS req ON req.req_id = cs.req_id
LEFT JOIN tbl_classification as c ON c.class_id = cs.class_id
WHERE cs.class_id = '$classification'
";
$result = mysqli_query($db, $query) or die('Error in' . $query);

$html = '';
if ($classification != "") {
    while ($row = mysqli_fetch_array($result)) {
        $html .= "<label><input type='checkbox' name='requirement[]' value='" . $row['class_req_id'] . "'> " . $row['requirement'] . "</label><br><br>";
    }
}

echo $html;



?>