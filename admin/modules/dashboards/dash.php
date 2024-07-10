<?php

$imelda         = "";
$consuelo       = "";
$Liberted       = "";
$Mambalili      = "";
$nueva_era      = "";
$poblacion      = "";
$san_andres     = "";
$san_marcos     = "";
$san_teodoro    = "";
$bunawan_brook  = "";

//imdelda
$query_imelda = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 1 AND status = 1";
$result_imdelda = mysqli_query($db, $query_imelda) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_imdelda)) {

    $imelda = $row[0];
}

//consuelo
$query_consuelo = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 2 AND status = 1";
$result_consuelo = mysqli_query($db, $query_consuelo) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_consuelo)) {

    $consuelo = $row[0];
}

//libertad
$query_libertad = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 3 AND status = 1";
$result_libertad = mysqli_query($db, $query_libertad) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_libertad)) {

    $libertad = $row[0];
}

//mambalili
$query_mambalili = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 4 AND status = 1";
$result_mambalili = mysqli_query($db, $query_mambalili) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_mambalili)) {

    $Mambalili = $row[0];
}

//neuva Era
$query_era = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 5 AND status = 1";
$result_era = mysqli_query($db, $query_era) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_era)) {

    $nueva_era = $row[0];
}

//poblacion
$query_poblacion = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 6 AND status = 1";
$result_pob = mysqli_query($db, $query_poblacion) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_pob)) {

    $poblacion = $row[0];
}

//san adnres
$query_andres = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 7 AND status = 1";
$result_andres = mysqli_query($db, $query_andres) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_andres)) {

    $san_andres = $row[0];
}


//san marcos
$query_marcos = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 8 AND status = 1";
$result_marcos = mysqli_query($db, $query_marcos) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_marcos)) {

    $san_marcos = $row[0];
}


//san teodoro
$query_teodoro = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 9 AND status = 1";
$result_teodoro = mysqli_query($db, $query_teodoro) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_teodoro)) {

    $san_teodoro = $row[0];
}

//bunawn broopk
$query_brook = "SELECT COUNT(*) FROM tbl_solo_parent WHERE barangay_id = 10 AND status = 1";
$result_brook = mysqli_query($db, $query_brook) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_brook)) {

    $bunawan_brook = $row[0];
}




$imeldaCash         = "";
$consueloCash        = "";
$LibertedCash        = "";
$MambaliliCash       = "";
$nueva_eraCash       = "";
$poblacionCash       = "";
$san_andresCash      = "";
$san_marcosCash      = "";
$san_teodoroCash     = "";
$bunawan_brookCash   = "";

//imdelda
$query_imelda_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 1 and ca.status = 0";
$result_imdelda_cash = mysqli_query($db, $query_imelda_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_imdelda_cash)) {

    $imeldaCash  = $row[0];
}

//consuelo
$query_consuelo_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 2 and ca.status = 0";
$result_consuelo_cash = mysqli_query($db, $query_consuelo_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_consuelo_cash)) {

    $consueloCash  = $row[0];
}

//libertad
$query_libertad_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 3 and ca.status = 0";
$result_libertad_cash = mysqli_query($db, $query_libertad_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_libertad_cash)) {

    $libertadCash  = $row[0];
}

//mambalili
$query_mambalili_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 4 and ca.status = 0";
$result_mambalili_cash = mysqli_query($db, $query_mambalili_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_mambalili_cash)) {

    $MambaliliCash  = $row[0];
}

//neuva Era
$query_era_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 5 and ca.status = 0";
$result_era_cash = mysqli_query($db, $query_era_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_era_cash)) {

    $nueva_eraCash  = $row[0];
}

//poblacion
$query_poblacion_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 6 and ca.status = 0";
$result_pob_cash = mysqli_query($db, $query_poblacion_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_pob_cash)) {

    $poblacionCash  = $row[0];
}

//san adnres
$query_andres_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 7 and ca.status = 0";
$result_andres_cash = mysqli_query($db, $query_andres_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_andres_cash)) {

    $san_andresCash  = $row[0];
}


//san marcos
$query_marcos_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 8 and ca.status = 0";
$result_marcos_cash = mysqli_query($db, $query_marcos_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_marcos_cash)) {

    $san_marcosCash  = $row[0];
}


//san teodoro
$query_teodoro_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 9 and ca.status = 0";
$result_teodoro_cash = mysqli_query($db, $query_teodoro_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_teodoro_cash)) {

    $san_teodoroCash  = $row[0];
}

//bunawn broopk
$query_brook_cash = "SELECT COUNT(*) FROM tbl_cash_assistance as ca LEFT JOIN tbl_solo_parent as sp ON sp.parent_id = ca.parent_id
WHERE sp.barangay_id = 10 and ca.status = 0";
$result_brook_cash = mysqli_query($db, $query_brook_cash) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result_brook_cash)) {

    $bunawan_brookCash  = $row[0];
}



//graph per yeay
// Execute the SQL query
$sql = "SELECT
YEAR(date_inserted) AS year,
SUM(amount) AS total_cash_assistance
FROM
tbl_cash_assistance
WHERE
status = 0
GROUP BY
YEAR(date_inserted)
ORDER BY
YEAR(date_inserted) ASC";

$result = mysqli_query($db, $sql);

// Initialize arrays for Chart.js
$years = [];
$totals = [];

// Format the fetched data
while ($row = mysqli_fetch_assoc($result)) {
    $years[] = $row['year'];
    $totals[] = $row['total_cash_assistance'];
}


// SQL query to retrieve total released cash assistance per barangay
$sql = "SELECT
IFNULL(b.name, 'NO BARANGAY') AS barangay,
SUM(ca.amount) AS total_cash_assistance
FROM
tbl_cash_assistance ca
LEFT JOIN tbl_solo_parent sp ON ca.parent_id = sp.parent_id
LEFT JOIN tbl_barangays b ON sp.barangay_id = b.barangay_id
WHERE
ca.status = 0
GROUP BY
sp.barangay_id
ORDER BY
barangay;";


$result = $db->query($sql);

$labels = [];
$data = [];

// Format data for Chart.js
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row["barangay"];
        $data[] = $row["total_cash_assistance"];
    }
}



//graph per month

$sql = "SELECT
            DATE_FORMAT(date_inserted, ' %M, %Y') AS month,
            SUM(CAST(amount AS DECIMAL(10, 2))) AS total_amount
        FROM
            tbl_cash_assistance
        WHERE
            status = 0
        GROUP BY
            month
        ORDER BY
            month";

$result = $db->query($sql);

$months = [];
$total = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $months[] = $row['month'];
        $total[]  = $row['total_amount'];
    }
}
