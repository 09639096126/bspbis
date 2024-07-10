
<?php
$sql = "SELECT barangay_id, name FROM tbl_barangays";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt3 = "<select class='form-control' name='barangay' id = 'barangay_change' required>";
$opt3 .= "<option value='' selected hidden>Select Barangay</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt3 .= "<option value='" . $row['barangay_id'] . "'>" . $row['name'] . "</option>";
}

$opt3 .= "</select>";
?>

<!--------------------------- Cash Asistance -------------------------->
<div class="modal fade" tabindex="-1" role="dialog" id="cash_modal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Cash Assistance</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_payment">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label>Date To Receive<span class="text-danger">*</span></label>
                          <input type="date" name="" id="date_received" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                        <label>Barangay<span class="text-danger">*</span></label>
                            <?php echo $opt3; ?>
                        </div>
                    </div><br>
                    <div class="md-form">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search"><br>
                        <table class="table" id="populate_table">
                            <thead>

                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
            </form>
        </div>
    </div>
</div>
</div>


<script>

$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#date_received').attr('min', minDate);
});
</script>