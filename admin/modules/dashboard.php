<?php
include "../header.php";


$sql = "SELECT education_id, description FROM tbl_educational_level";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt1 = "<select class='form-control' name='newReq2[]' id = 'education_level_child' required>";
$opt1 .= "<option value='' selected hidden>Select Educational Level</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt1 .= "<option value='" . $row['education_id'] . "'>" . $row['description'] . "</option>";
}

$opt1 .= "</select>";

$sql = "SELECT education_id, description FROM tbl_educational_level";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt2 = "<select class='form-control' name='education_level' id = 'education_level' required>";
$opt2 .= "<option value='' selected hidden>Select Educational Level</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt2 .= "<option value='" . $row['education_id'] . "'>" . $row['description'] . "</option>";
}
$opt2 .= "</select>";

$sql = "SELECT barangay_id, name FROM tbl_barangays";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt3 = "<select class='form-control' name='barangay' id = 'barangay' required>";
$opt3 .= "<option value='' selected hidden>Select Barangay</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt3 .= "<option value='" . $row['barangay_id'] . "'>" . $row['name'] . "</option>";
}

$opt3 .= "</select>";

$sql = "SELECT income_id, description FROM tbl_income_per_month";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt4 = "<select class='form-control' name='income' id = 'income' required>";
$opt4 .= "<option value='' selected hidden>Select Income</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt4 .= "<option value='" . $row['income_id'] . "'>" . $row['description'] . "</option>";
}

$opt4 .= "</select>";


$all       = '';
$pending   = '';
$validated = '';
?>

<main class="content px-3 py-2">

    <div class="mb-3">
        <h4>Solo Parent Profile</h4>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 d-flex">
            <div class="card flex-fill border-0">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-2 text-success">
                                <?php
                                $query = "SELECT COUNT(*) FROM tbl_solo_parent";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                    $all = $row[0];
                                }
                                ?> Record(s)
                            </h4>
                            <p class="mb-2">
                                Total Solo Parents
                            </p>
                            <div class="mb-0">
                                <span class="badge text-success me-2" style="font-size: 20px;">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 d-flex">
            <div class="card flex-fill border-0">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-2 text-warning">
                                <?php
                                $query = "SELECT COUNT(*) FROM tbl_solo_parent WHERE status = 0";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                    $pending = $row[0];
                                }
                                ?> Record(s)
                            </h4>
                            <p class="mb-2">
                                Not Validated Solo Parents
                            </p>
                            <div class="mb-0">
                                <span class="badge text-success me-2" style="font-size: 20px;">
                                    <i class="fa fa-users-slash"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 d-flex">
            <div class="card flex-fill border-0">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="mb-2 text-success">
                                <?php
                                $query = "SELECT COUNT(*) FROM tbl_solo_parent WHERE status = 1";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                    $validated = $row[0];
                                }
                                ?> Record(s)
                            </h4>
                            <p class="mb-2">
                                Validated Solo Parents
                            </p>
                            <div class="mb-0">
                                <span class="badge text-success me-2" style="font-size: 20px;">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>



            <div class="row">
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <canvas id="cashAssistanceChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

     
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <canvas id="cash_assistance_per_barangay"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <canvas id="radar_graph"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <canvas id="bar_graph"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <canvas id="doughnut_graph"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</main>


<?php
include "dashboards/dash.php";
include "../footer.php";
?>

<script>
    const ctx = document.getElementById('bar_graph');
    const ctx2 = document.getElementById('doughnut_graph');
    const ctx3 = document.getElementById('radar_graph');

    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Total Solo Parents', 'Not Validated Solo Parents', ' Validated Solo Parents'],
            datasets: [{
                label: 'Dashboard',
                data: [<?php echo $all; ?>, <?php echo $pending; ?>, <?php echo $validated; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)', // Color for 'Total Solo Parents'
                    'rgba(54, 162, 235, 0.8)', // Color for 'Not Validated Solo Parents'
                    'rgba(255, 159, 64, 0.8)' // Color for 'Validated Solo Parents'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    //Total Solo Parents Per Barangay
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Imelda', 'Consuelo', 'Libertad', 'Mambalili', 'Nueva Era', 'Poblacion', 'San Andres', 'San Marcos', 'San Teodoro', 'Bunawan Brook'],
            datasets: [{
                label: 'Total Solo Parents Per Barangay',
                data: [<?php echo $imelda; ?>, <?php echo $consuelo; ?>, <?php echo $libertad; ?>, <?php echo $Mambalili; ?>, <?php echo $nueva_era; ?>, <?php echo $poblacion; ?>, <?php echo $san_andres; ?>, <?php echo $san_marcos; ?>, <?php echo $san_teodoro; ?>, <?php echo $bunawan_brook; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)', // Color for 'Imelda'
                    'rgba(255, 205, 86, 0.8)', // Color for 'Consuelo'
                    'rgba(75, 192, 192, 0.8)', // Color for 'Libertad'
                    'rgba(255, 159, 64, 0.8)', // Color for 'Mambalili'
                    'rgba(54, 162, 235, 0.8)', // Color for 'Nueva Era'
                    'rgba(153, 102, 255, 0.8)', // Color for 'Poblacion'
                    'rgba(255, 99, 132, 0.8)', // Color for 'San Andres'
                    'rgba(255, 205, 86, 0.8)', // Color for 'San Marcos'
                    'rgba(75, 192, 192, 0.8)', // Color for 'San Teodoro'
                    'rgba(255, 159, 64, 0.8)' // Color for 'Bunawan Brook'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // //Total of Solo Parents Per Barangay (Cash Assistance Released)
    // new Chart(ctx3, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Imelda', 'Consuelo', 'Libertad', 'Mambalili', 'Nueva Era', 'Poblacion', 'San Andres', 'San Marcos', 'San Teodoro', 'Bunawan Brook'],
    //         datasets: [{
    //             label: 'Total of Solo Parents Per Barangay (Released)',
    //          
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.8)', // Color for 'Imelda'
    //                 'rgba(255, 205, 86, 0.8)', // Color for 'Consuelo'
    //                 'rgba(75, 192, 192, 0.8)', // Color for 'Libertad'
    //                 'rgba(255, 159, 64, 0.8)', // Color for 'Mambalili'
    //                 'rgba(54, 162, 235, 0.8)', // Color for 'Nueva Era'
    //                 'rgba(153, 102, 255, 0.8)', // Color for 'Poblacion'
    //                 'rgba(255, 99, 132, 0.8)', // Color for 'San Andres'
    //                 'rgba(255, 205, 86, 0.8)', // Color for 'San Marcos'
    //                 'rgba(75, 192, 192, 0.8)', // Color for 'San Teodoro'
    //                 'rgba(255, 159, 64, 0.8)' // Color for 'Bunawan Brook'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    //Total Cash Assistance Released Per year
    var ctx4 = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($years); ?>,
            datasets: [{
                label: 'Total Cash Assistance Released Per year',
                data: <?php echo json_encode($totals); ?>,
                fill: false,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

//Total Released Cash Assistance Per Barangay
    var ctx6 = document.getElementById('cash_assistance_per_barangay').getContext('2d');
    var myChart = new Chart(ctx6, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Total Released Cash Assistance Per Barangay',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    const ctx7 = document.getElementById('cashAssistanceChart').getContext('2d');
    const cashAssistanceChart = new Chart(ctx7, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Total Cash Assistance',
                data: <?php echo json_encode($total); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
