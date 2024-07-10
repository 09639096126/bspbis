<?php include "../header.php"; ?>

<main class="content px-3 py-2">
    <div class="mb-3">
        <h4>Deleted Solo Parents</h4>
    </div>
<!-- Table Element -->
    <div class="card border-0">
        <div class="card-body" style="overflow-x:auto;">
            <table class="table" id="my_table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">FIRST NAME</th>
                        <th class="text-center" scope="col">MIDDLE NAME</th>
                        <th class="text-center" scope="col">LAST NAME</th>
                        <th class="text-center" scope="col">BIRTHDAY</th>
                        <th class="text-center" scope="col">AGE</th>
                        <th class="text-center" scope="col">GENDER</th>
                        <th class="text-center" scope="col">BARANGAY</th>
                        <th class="text-center" scope="col">CONTROL NO.</th>
                        <th class="text-center" scope="col">DATE ISSUED</th>
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


function restore_parent(parent_id) {
        if (confirm("Are you sure you want to restore deleted Parent?")) {
            $.ajax({
                url: 'delete_parent/parent_restore',
                type: 'POST',
                data: {
                    parent_id: parent_id

                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    swal('Successfully Restore','','success');
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


    function delete_parent(parent_id) {
        if (confirm("Are you sure you want to permanently delete Parent?")) {
            $.ajax({
                url: 'delete_parent/parent_delete',
                type: 'POST',
                data: {
                    parent_id: parent_id

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


     // Initialize DataTable
     var table = $('#my_table').DataTable({
            ajax: 'delete_parent/parent', // API endpoint to fetch data
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
                },
                {
                    data: [7],
                    "className": "text-center"
                },
                {
                    data: [8],
                    "className": "text-center"
                },
                {
                    data: [9],
                    "className": "text-center"
                }
            ]
        });
</script>