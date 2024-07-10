<?php include "../header.php"; ?>
<main class="content px-3 py-2">
    <div class="mb-3">
        <h4>Solo Parents Account</h4>
    </div>
    <div class="card radius-10">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Username</th>
                            <th class="text-center">Firstname</th>
                            <th class="text-center">Lastname</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
include "modal/modal_parent_account.php";
include "../footer.php";
?>

<script>
    function change_user(parent_id, username) {

        $('#cp_id').val(parent_id);
        $('#cp_username').val(username);
        $('#cp_new_password').val('');
        $('#cp_re_new_password').val('');
        $('#changepassword_modal').modal('show');

    }

    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#myTable').DataTable({
            ajax: 'parents/parents_account_view', // API endpoint to fetch data
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
        });


         // -----------------------CHANGE PASSWORD AJAX----------------------------- //
         $('#d_form_cp').on('submit', function(e) {
            e.preventDefault();

            let parent_id = $('#cp_id').val();
            let new_password = $('#cp_new_password').val()
            let re_new_password = $('#cp_re_new_password').val()

            if (new_password == '' || re_new_password == '') {
                swal('Please input Password','','error')
            } else if (new_password != re_new_password) {
                swal('Password do not match!','','error')

            } else if (new_password == re_new_password) {

                $.ajax({
                    url: 'parents/parent_changepass',
                    type: 'POST',
                    data: {
                        parent_id: parent_id,
                        new_password: new_password,
                        re_new_password: re_new_password,
                    },
                    dataType: 'JSON',
                    beforeSend: function() {

                    }
                }).done(function(res) {
                    if (res.res_success == 1) {
                        swal('Password Changed!','','success');
                        $('#changepassword_modal').modal('hide');
                    } else {
                        swal('Invalid Password!','','error');

                    }
                })

            }


        })
    })
</script>