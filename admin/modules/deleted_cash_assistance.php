<?php include "../header.php"; ?>
<main class="content px-3 py-2">
    <div class="mb-3">
        <h4>Deleted Released Cash Assistance</h4>
    </div>

    <div class="card border-0">
        <div class="card-body" style="overflow-x:auto;">
            <table class="table" id="my_table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">FIRST NAME</th>
                        <th class="text-center" scope="col">MIDDLE NAME</th>
                        <th class="text-center" scope="col">LAST NAME</th>
                        <th class="text-center" scope="col">BARANGAY</th>
                        <th class="text-center" scope="col">CASH AMOUNT</th>
                        <th class="text-center" scope="col">DATE RECEIVED</th>
                        <th class="text-center" scope="col">ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include "../footer.php"; ?>

<script>

function delete_cash(cash_id) {
        if (confirm("Are you sure you want to permamently delete cash assistance?")) {
            $.ajax({
                url: 'deleted_assistance/assistance_remove',
                type: 'POST',
                data: {
                    cash_id: cash_id

                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    swal('Successfully Deleted','','success');

                    var currentPageIndex = table.page.info().page;
                    table.ajax.reload(function() {
                        table.page(currentPageIndex).draw(false);
                    }, false);

                } else {
                    alert(res.res_message);
                }
            }).fail(function() {
                console.log("FAIL");
            })
        }
    }

    function restore_cash(cash_id) {
        if (confirm("Are you sure you want to restore cash assistance?")) {
            $.ajax({
                url: 'deleted_assistance/assistance_restore',
                type: 'POST',
                data: {
                    cash_id: cash_id

                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    swal('Successfully Restored','','success');

                    var currentPageIndex = table.page.info().page;
                    table.ajax.reload(function() {
                        table.page(currentPageIndex).draw(false);
                    }, false);

                } else {
                    alert(res.res_message);
                }
            }).fail(function() {
                console.log("FAIL");
            })
        }
    }
     // Initialize DataTable
     var table = $('#my_table').DataTable({
        
        ajax: 'deleted_assistance/assistance', // API endpoint to fetch data
        columns: [{
                data: [0],
                "className": "text-center"
            },
            {
                data: [1],
                "className": "text-center"
            },
            {
                data: [2],
                "className": "text-center"
            },
            {
                data: [3],
                "className": "text-center"
            },
            {
                data: [4],
                "className": "text-center"
            },
            {
                data: [5],
                "className": "text-center"
            },
            {
                data: [6],
                "className": "text-center"
            }
        ]
    })
</script>