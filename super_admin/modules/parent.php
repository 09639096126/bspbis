<?php include "../header.php"; ?>


<style>
    table {
        table-layout: auto;
        width: 100%;

    }

    td,
    th {
        text-wrap: wrap;
    }

    thead {
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .table-wrapper {

        overflow-y: scroll;
        overflow-x: scroll;
        height: fit-content;
        max-height: 66.4vh;

        margin-top: 22px;

        margin: 15px;
        padding-bottom: 20px;

    }
</style>


<main class="content px-3 py-2">
    <div class="mb-3">
        <h4>Solo Parents</h4>
    </div>
    <div class="d-flex">
        <a href="../../assets/template/parent_template.xlsx" class="btn btn-success"><i class="fa fa-file-excel"></i> Excel Template</a>&nbsp;&nbsp;
        <button type="button" class="btn btn-success" style="float:right;" onclick="upload_file()"><i class="fa fa-file-excel"></i> Import List</button><br>
    </div>
    <br>
    <!-- Table Element -->
    <div class="card border-0">
        <div class="card-body table-wrapper " style="overflow-x:auto;">
            <table class="table" id="my_table">
                <thead>
                    <tr>
                        <!-- <th class="text-center" scope="col">NO.</th> -->
                        <th class="text-center" scope="col">FIRST NAME</th>
                        <th class="text-center" scope="col">MIDDLE NAME</th>
                        <th class="text-center" scope="col">LAST NAME</th>
                        <th class="text-center" scope="col">BIRTHDAY</th>
                        <th class="text-center" scope="col">AGE</th>
                        <th class="text-center" scope="col">GENDER</th>
                        <th class="text-center" scope="col">BARANGAY</th>
                        <th class="text-center" scope="col">ClASSIFICATION</th>
                        <th class="text-center" scope="col">CONTROL NO.</th>
                        <th class="text-center" scope="col">DATE ISSUED</th>
                        <th class="text-center" scope="col">STATUS</th>
                        <th class="text-center" scope="col">DESCENDANTS</th>
                        <!-- <th class="text-center" scope="col">ACTION</th> -->
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
<?php include "modal/modal_parent.php"; ?>
<?php include "../footer.php"; ?>

<script>
    function upload_file() {
        $('#upload_excel_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#upload_excel_modal').modal('show')
    }

    function view_descendants(parent_id) {
        let table = "<thead>";
        table += "<tr>" +
            "<th class=\"text-center\">Name</th>" +
            "<th class=\"text-center\">Age</th>" +
            "<th class=\"text-center\">Educational Level</th>" +
            "</tr>" +
            " </thead>" +
            " <tbody>";

        $.ajax({
            url: 'parents/descendants_view',
            type: 'POST',
            data: {
                parent_id: parent_id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $('#btn_edit').prop("disabled", true);
            }
        }).done(function(res) {

            if (res.descendants.length !== 0) {
                $.each(res.descendants, function(key, value) {
                    table += '<tr>' +
                        '<td class="text-center">' + value.c_name + '</td>' +
                        '<td class="text-center">' + value.age + '</td>' +
                        '<td class="text-center">' + value.description + '</td>' +
                        '<tr>'
                    $('#my_table_2').html(table)
                })
            } else {
                table += `<tr class="text-center">
                            <td class="text-center text-danger" colspan="2">No Data Found</td>
                        </tr>`
                $('#my_table_2').html(table)
            }
            $('#document_modal').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#document_modal').modal('show');
        })
    }

    function delete_parent(parent_id) {
        if (confirm("Are you sure you want to remove Parent?")) {
            $.ajax({
                url: 'parents/parent_delete',
                type: 'POST',
                data: {
                    parent_id: parent_id

                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    alert('Successfully Deleted');

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


    function approve_parent(parent_id) {
        if (confirm("Are you sure you want to Validate Parent?")) {
            $.ajax({
                url: 'parents/parent_approve',
                type: 'POST',
                data: {
                    parent_id: parent_id

                },
                dataType: 'JSON',
                beforeSend: function() {

                }
            }).done(function(res) {
                if (res.res_success == 1) {
                    alert('Successfully Validated');
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



    function upload_file() {
        $('#upload_excel_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#upload_excel_modal').modal('show')
    }

    // $('#my_table thead tr')
    //     .clone(true)
    //     .addClass('filters')
    //     .appendTo('#my_table thead');

    // Initialize DataTable
    var table = $('#my_table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        ajax: 'parents/parent', // API endpoint to fetch data
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
            },
            {
                data: [10],
                "className": "text-center"
            },
            {
                data: [11],
                "className": "text-center"
            },
            // {
            //     data: [12],
            //     "className": "text-center"
            // }
        ],
        lengthMenu: [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, 'All']
        ],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" + // Place the search input and print button in a row
            "<'row'<'col-sm-12'tr>>" + // Place the table in a row
            "<'row'<'col-sm-5'i><'col-sm-7'p>>", // Place the table information and pagination in a row
        buttons: [{
                extend: "pageLength",
                className: "btn-sm btn-danger"
            },
            {
                extend: "csv",
                className: "btn-sm btn-danger",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
            {
                extend: "excelHtml5",
                className: "btn-sm btn-danger",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                }
            },
            {
                extend: "print",
                className: "btn-sm btn-danger",
                title: '.',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                },
                message: '<img src="../../assets/img/bunawan.webp" height="100px" width="100px" style="position: absolute;top:0;left:50px;"><center><h4 style="margin-top:-40px;">Municipality of Bunawan</h4>\
                <h6>AGUSAN DEL SUR</h6></center><br><br><br><center>SOLO PARENTS</center>'
            }
        ],
        initComplete: function() {
            var select = $('<br><br><select class = "form-control"><option value="" selected hidden>Select Solo Parent Classification</option></select>')
                .appendTo('.col-sm-6:first')
                .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    table.column(7)
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            table.column(7).data().unique().sort().each(function(d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
            });
        }
    });





    $(document).ready(function() {

        // -----------------------------FIRST EXCEL-------------------------------------------//

        $("#upload_excel").on("submit", function(e) {
            e.preventDefault();

            var fd = new FormData($("#upload_excel")[0]);
            var files = $("#excel_1")[0].files;

            for (item of fd) {
                console.log(item[0], item[1]);
            }
            // Check file selected or not
            if (files.length > 0) {
                fd.append('excel_1', files[0]);

                $.ajax({
                    url: 'parents/parent_upload_excel',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(res) {

                        if (res == 1) {
                            alert("Successfully Validated");
                            var currentPageIndex = table.page.info().page;
                            table.ajax.reload(function() {
                                table.page(currentPageIndex).draw(false);
                            }, false);
                            $('#upload_excel_modal').modal('hide');
                        } else if (res == 2) {
                            alert("Has Exists ID Number");
                            $('#upload_excel_modal').modal('hide');
                        } else {
                            alert('file not uploaded');
                        }
                    },
                });
            } else {
                alert("Please select a file.");
            }
        })


    });
</script>