<?php
include "../header.php";
?>
<main class="content px-3 py-2">
    <button class="btn btn-md btn-rasied btn-success " onclick="add_user()"><i class="fa fa-plus"></i> Add User</button><br><br>
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
                            <th class="text-center">User Role</th>
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
include "../footer.php";
include('modal/user_modal.php');
?>

<script>
    function add_user() {
        $('#list_add_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#list_add_modal').modal('show');
    }

    function change_user(user_id, username) {

        $('#cp_id').val(user_id);
        $('#cp_username').val(username);
        $('#cp_new_password').val('');
        $('#cp_re_new_password').val('');
        $('#changepassword_modal').modal('show');

    }


    // -------------------------------EDIT USER --------------------------------//

    function edit_user(user_id) {

        $.ajax({
            url: 'usser/user_edit',
            type: 'POST',
            data: {
                user_id: user_id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $('#btn_edit').prop("disabled", true);
            }
        }).done(function(res) {


            $("#edit_user_id").val(res.user_id);
            $("#edit_username").val(res.username);
            $("#edit_lname").val(res.lname);
            $("#edit_fname").val(res.fname);
            $("#edit_email").val(res.email);
            $("#edit_gender").val(res.gender);
            $("#edit_user_type").val(res.user_type_id);
            $('#btn_edit').prop("disabled", false);
            $('#list_edit_modal').modal('show');

        })

    }


    function delete_user(user_id) {
        if (confirm("Are you sure you want to remove Parent?")) {
            $.ajax({
                url: 'usser/user_delete',
                type: 'POST',
                data: {
                    user_id: user_id

                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    alert('Successfully Deleted');
                    location.reload();
                } else {
                    alert(res.res_message);
                }
            }).fail(function() {
                console.log("FAIL");
            })
        }
    }

    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#myTable').DataTable({
            ajax: 'usser/users_view', // API endpoint to fetch data
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


        //-------------------------------------------- ADD USER SUMBIT ---------------------------------------//
        $('#form_insert').on('submit', function(e) {
            e.preventDefault();

            let username   = $('#add_username').val();
            let lname      = $('#add_lname').val();
            let fname      = $('#add_fname').val();
            let gender     = $('#add_gender').val();
            let email      = $('#add_email').val();
            let user_type  = $('#add_user_type').val();


            let errors = new Array();
            let input = "Please Input";

            if (username == '') {
                errors.push('Username');
            }
            if (lname == '') {
                errors.push('Last Name');
            }
            if (fname == '') {
                errors.push('First Name');
            }
            if (gender == '') {
                errors.push('Gender');
            }
            if (email == '') {
                errors.push('Email');
            }
            if (errors.length > 0) {
                let error = '';
                $.each(errors, function(key, value) {
                    if (error == '') {
                        error += '• ' + value;
                    } else {
                        error += '\n• ' + value;
                    }
                });
                alert(input + '\n' + error);
            } else {

                $.ajax({
                    url: 'usser/user_add',
                    type: 'POST',
                    data: {
                        username: username,
                        fname: fname,
                        lname: lname,
                        gender: gender,
                        email: email,
                        user_type : user_type

                    },
                    dataType: 'JSON',
                    beforeSend: function() {

                    }
                }).done(function(res) {
                    if (res.res_success == 1) {
                        swal('The password the username', '', 'success');
                        var currentPageIndex = table.page.info().page;
                        table.ajax.reload(function() {
                            table.page(currentPageIndex).draw(false);
                        }, false);

                        $('#list_add_modal').modal('hide');
                    } else {
                        swal(`${res.res_message}`, '', 'error');
                    }

                }).fail(function() {
                    console.log('fail')
                })

            }
        })


        // ---------------------UPDATE edit user----------------------------------------//

        $('#form_update').on('submit', function(e) {
            e.preventDefault();

            let user_id      = $('#edit_user_id').val();
            let lname        = $('#edit_lname').val();
            let fname        = $('#edit_fname').val();
            let gender       = $('#edit_gender').val();
            let email        = $('#edit_email').val();
            let user_type_id = $('#edit_user_type').val();


            let errors = [];
            let input = "Please Input";

            if (lname == '') {
                errors.push('Last Number')
            }
            if (fname == '') {
                errors.push('First Name')
            }
            if (email == '') {
                errors.push('Email')
            }

            if (errors.length > 0) {
                let error = '';
                $.each(errors, function(key, value) {
                    if (error == '') {
                        error += '• ' + value;
                    } else {
                        error += '\n• ' + value;
                    }
                });
                alert(input + '\n' + error);
            } else {

                $.ajax({

                    url: 'usser/user_update',
                    type: 'POST',
                    data: {
                        user_id      : user_id,
                        lname        : lname,
                        fname        : fname,
                        gender       : gender,
                        email        : email,
                        user_type_id : user_type_id

                    },
                    dataType: 'JSON',
                    beforeSend: function() {

                    }
                }).done(function(res) {
                    if (res.res_success == 1) {
                        swal('Successfully Update Information', '', 'success')
                        var currentPageIndex = table.page.info().page;
                        table.ajax.reload(function() {
                            table.page(currentPageIndex).draw(false);
                        }, false);

                        $('#list_edit_modal').modal('hide');
                    } else {
                        alert(res.res_message);
                    }
                }).fail(function() {
                    console.log('Fail!');
                });
            }
        })



        // -----------------------CHANGE PASSWORD AJAX----------------------------- //
        $('#d_form_cp').on('submit', function(e) {
            e.preventDefault();

            let user_id = $('#cp_id').val();
            let new_password = $('#cp_new_password').val()
            let re_new_password = $('#cp_re_new_password').val()

            if (new_password == '' || re_new_password == '') {
                swal('Please input Password', '', 'error')
            } else if (new_password != re_new_password) {
                swal('Password do not match!', '', 'error')

            } else if (new_password == re_new_password) {

                $.ajax({
                    url: 'usser/user_changepass',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        new_password: new_password,
                        re_new_password: re_new_password,
                    },
                    dataType: 'JSON',
                    beforeSend: function() {

                    }
                }).done(function(res) {
                    if (res.res_success == 1) {
                        swal('Password Changed!', '', 'success');
                        $('#changepassword_modal').modal('hide');
                    } else {
                        swal('Invalid Password!', '', 'error');

                    }
                })

            }


        })

    })
</script>