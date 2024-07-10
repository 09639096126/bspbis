<?php
include("../../../utils/connection.php");

$solo_parent_classification = mysqli_real_escape_string($db, $_POST['solo_parent_classification']);

$query = "
    SELECT sr.*, r.requirement
    FROM tbl_submitted_req as sr
    LEFT JOIN tbl_class_req as cr ON cr.class_req_id = sr.class_req_id
    LEFT JOIN tbl_requirements as r ON r.req_id = cr.req_id
    LEFT JOIN tbl_classification as c ON c.class_id = cr.class_id
    WHERE c.class_id = '$solo_parent_classification'
    AND sr.parent_id = '" . $_SESSION['solo_parent']['parent_id'] . "'
    ";
$result = mysqli_query($db, $query) or die('Error in' . $query);

$html = '';
if ($solo_parent_classification != "") {
    while ($row = mysqli_fetch_array($result)) {
        // Check if the requirement is already submitted
        $checked = ($row['class_req_id'] != null) ? 'checked' : '';

        $html .= "<label><input type='checkbox' name='requirement[]' value='" . $row['class_req_id'] . "' $checked> " . $row['requirement'] . "</label><br><br>";
    }
}

$query = "
    SELECT r.*, cr.class_req_id
    FROM tbl_requirements as r
    LEFT JOIN tbl_class_req as cr ON r.req_id = cr.req_id
    LEFT JOIN tbl_classification as c ON c.class_id = cr.class_id
    WHERE c.class_id = '$solo_parent_classification'
    AND NOT EXISTS (
        SELECT 1
        FROM tbl_submitted_req as sr
        WHERE sr.class_req_id = cr.class_req_id
        AND sr.parent_id = '" . $_SESSION['solo_parent']['parent_id'] . "'
    )
";
$result = mysqli_query($db, $query) or die('Error in' . $query);


if ($solo_parent_classification != "") {
    while ($row = mysqli_fetch_array($result)) {
        $html .= "<label><input type='checkbox' name='requirement[]' value='" . $row['class_req_id'] . "'> " . $row['requirement'] . "</label><br><br>";
    }
}




echo $html;
