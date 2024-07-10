<?php include '../header.php';
include 'assistance/cash_assistance_view_search.php';
?>
<main class="content px-3 py-2">
    <div class="page-heading">
        <a href="cash_assistance"><i class="fa fa-arrow-left"></i> BACK</a>
    </div><br>

    <div class="">
        <h6 class="font-weight-bold">FILTER:</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center fw-bold bg-success text-white" style="width: 130px;">Barangay</th>
                    <th class="text-center fw-bold bg-success text-white" style="width: 2px;">:</th>
                    <th><?php echo $barangay;  ?></th>
                </tr>

            </thead>
        </table>
    </div>

    <div class="page-content ttable">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-dark" id="my_table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-left" scope="col">NAME</th>
                                <th class="text-left" scope="col">TOTAL AMOUNT RELEASED</th>
                                <th class="text-left" scope="col">DATE(S) RECEIVED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($parents) {
                                $grouped_parents = [];
                                foreach ($parents as $par) {
                                    $name = $par['lname'] . ' ' . $par['fname'] . ' ' . $par['mname'];
                                    if (!isset($grouped_parents[$name])) {
                                        $grouped_parents[$name] = [
                                            'total_amount' => $par['amount'],
                                            'dates_amounts' => [$par['date_received'] => $par['amount']],
                                            'parent_id' => $par['parent_id']
                                        ];
                                    } else {
                                        $grouped_parents[$name]['total_amount'] += $par['amount'];
                                        if (isset($grouped_parents[$name]['dates_amounts'][$par['date_received']])) {
                                            $grouped_parents[$name]['dates_amounts'][$par['date_received']] += $par['amount'];
                                        } else {
                                            $grouped_parents[$name]['dates_amounts'][$par['date_received']] = $par['amount'];
                                        }
                                    }
                                }
                                foreach ($grouped_parents as $name => $data) {
                            ?>
                                    <tr>
                                        <td class="text-left"><a href="#" onclick="get_solo_parent('<?php echo $barangay_id; ?>','<?php echo $month; ?>',
                                        '<?php echo $year_select; ?>', '<?php echo $data['parent_id']; ?>')"><?php echo $name; ?></a></td>
                                        <td class="text-left">₱ <?php echo number_format($data['total_amount']); ?></td>
                                        <td class="text-left">
                                            <?php
                                            foreach ($data['dates_amounts'] as $date => $amount) {
                                                echo $date . ' : ₱ ' . number_format($amount) . ',&nbsp;&nbsp;<br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td class="text-center text-danger" colspan="3">No Data Found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>

<?php

function numberToMonth($number)
{
    // Ensure the number is between 1 and 12
    if ($number < 1 || $number > 12) {
        return '';
    }

    // Create a DateTime object with the given month number
    $dateObj = DateTime::createFromFormat('!m', $number);
    // Return the full month name
    return $dateObj->format('F');
}

// Example month value (replace this with your actual month value)
$monthNumber = 5; // May
$month = numberToMonth($monthNumber);
?>


<?php include '../footer.php'; ?>

<script>
    function get_solo_parent(barangay_id, month, year, parent_id) {
        let data = '';
        data += 'barangay_id=' + barangay_id + '&';
        data += 'month=' + month + '&';
        data += 'year=' + year + '&';
        data += 'parent_id=' + parent_id;

        window.location.href = "cash_assistance_solo_parent?" + data;
    }


    $(document).ready(function() {
        $('#my_table').DataTable({
            dom: 'Bfrtip',
            buttons: [{

                extend: "print",
                className: "btn-sm btn-danger",
                title: '.',
                message: '<img src="../../assets/img/bunawan.webp" height="100px" width="100px" style="position: absolute;top:0;left:50px;"><center><h4 style="margin-top:-40px;font-weight: bold;">Municipality of Bunawan</h4>\
                <img src="../../assets/image/dswd.png" height="100px" width="130px" style="position: absolute;top:0;left:130px;"><center><br>\
                    <h6 style="font-weight: bold;">AGUSAN DEL SUR</h6>\
							</center><br><br><br>\
             <div style = "text-align: left; font-weight:bold;"><span class= "font-weight-bold">Barangay:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $barangay ? $barangay : ''; ?></span><br></div><br>\
             <div style = "text-align: left; font-weight:bold;"><span class= "font-weight-bold">Date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $month ? $month : ''; ?> <?php echo $year_select ? $year_select : ''; ?></span><br></div><br>',



            }]
        });
    });
</script>