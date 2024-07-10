<?php include "../header.php"; ?>

<main class="content px-3 py-2">
    <div class="page-heading">
        <h3 class="">Barangay Activities</h3>
    </div>
    <br>
    <div>
        <button onclick="add_activity()" data-toggle="modal" class="btn btn-primary" type="button"><i class="fa fa-plus"></i> Add Activity</button>
   <a href="beneficiary_announcement"><button class="btn btn-outline-dark" style="float:right;">Beneficiary Announcements</button></a>
    </div><br>
    <div class="page-content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Purpose</th>
                                <th class="text-center">Date of Activity</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!------------------------- CONTENT TABLE ------------------------------>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "modal/modal_announcements.php"; ?>
<?php include "../footer.php"; ?>

<script>
    function announcement_upload(announcement_id) {
        $('#announcement_id').val(announcement_id)
        $('#upload_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#upload_modal').modal('show');
    }

    function add_activity() {
        $('#add_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#add_modal').modal('show');
    }

    function delete_activity(activity_id) {
        if (confirm("Are you sure you want to remove Announcement?")) {
            $.ajax({
                url: 'announcements/delete',
                type: 'POST',
                data: {
                    bene_id: bene_id

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

    function edit_activity(activity_id) {
        $.ajax({
            url: 'announcements/edit',
            type: 'POST',
            data: {
                activity_id: activity_id

            },
            dataType: 'JSON',
            beforeSend: function() {

            }
        }).done(function(res) {

            $("#edit_id").val(res.activity_id);
            $("#edit_desc").val(res.activity_desc);
            $("#edit_title").val(res.title);
            $("#edit_purpose").val(res.purpose);
            $("#edit_date").val(res.date_inserted);
            $('#edit_modal').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#edit_modal').modal('show');

        }).fail(function() {
            console.log("FAIL");
        })
    }


    $(document).ready(function() {

        var table = $('#myTable').DataTable({
            ajax: 'announcements/view', // API endpoint to fetch data
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
                }
            ],
            

        });


        $('#form_announcement').submit(function(e) {
            e.preventDefault();

            let description = $('#add_desc').val()
            let purpose     = $('#add_purpose').val()
            let date_s      = $('#add_date').val()
            let title       = $('#add_title').val()

            $.ajax({
                url: 'announcements/add',
                type: 'POST',
                data: {
                    description : description,
                    purpose     : purpose,
                    date_s      : date_s,
                    title       : title
                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    swal("Success Added", "", "success");
                    var currentPageIndex = table.page.info().page;
                    table.ajax.reload(function() {
                        table.page(currentPageIndex).draw(false);
                    }, false);
                    $('#add_modal').modal('hide');
                } else {
                    alert(res.res_message);
                }
            }).fail(function() {
                console.log("FAIL");
            })
        })


        $('#form_udpate').submit(function(e) {
            e.preventDefault();

            let description     = $('#edit_desc').val()
            let purpose         = $('#edit_purpose').val()
            let datee           = $('#edit_date').val()
            let title           = $('#edit_title').val()
            let announcement_id = $('#edit_id').val()

            $.ajax({
                url: 'announcements/update',
                type: 'POST',
                data: {
                    description : description,
                    purpose     : purpose,
                    date        : datee,
                    title       : title,
                    announcement_id : announcement_id
                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    swal("Success Updated", "", "success");
                    var currentPageIndex = table.page.info().page;
                    table.ajax.reload(function() {
                        table.page(currentPageIndex).draw(false);
                    }, false);
                    $('#edit_modal').modal('hide');
                } else {
                    alert(res.res_message);
                }
            }).fail(function() {
                console.log("FAIL");
            })
        })


        //============================================ UPLOAD PICTURE =========================================>

        $("#upload_form").on("submit", function(e) {
            e.preventDefault();

            var fd = new FormData($("#upload_form")[0]);
            var files = $("#file")[0].files;

            for (item of fd) {
                console.log(item[0], item[1]);
            }
            // Check file selected or not
            if (files.length > 0) {
                fd.append('file', files[0]);


                $.ajax({
                    url: 'announcements/announcement_upload',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response != 0) {
                            alert('Successfully Uploaded');
                            var currentPageIndex = table.page.info().page;
                            table.ajax.reload(function() {
                                table.page(currentPageIndex).draw(false);
                            }, false);

                            $('#upload_modal').modal('hide');
                        } else {
                            alert('file not uploaded');
                        }
                    },
                });
            } else {
                alert("Please select a file.");
            }
        })


    })
</script>