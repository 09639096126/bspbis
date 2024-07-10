<?php include "../header.php"; ?>

<main class="content px-3 py-2">
    <button type="button" class="btn btn-success" onclick="cash_assistance()"><i class="fa fa-money-bill"></i> Cash Assistance</button><br><br>
    <!-- Table Element -->
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

<?php include "../footer.php";
include "modal/modal_cash_assistance.php";
?>


<script>
    //ADD AMOUNT
    function add_amount_cash(inputElement, parent_id) {
        let amount = $(inputElement).val();
        let date_receive = $('#date_received').val();

        if (date_receive !== "") {
            if (amount !== "") {
                $.ajax({
                    url: 'assistance/add_amount',
                    type: 'POST',
                    data: {
                        amount: amount,
                        parent_id: parent_id,
                        date_receive: date_receive
                    },
                    dataType: 'JSON',
                    beforeSend: function() {

                    }
                }).done(function(res) {
                    if (res.res_success == 1) {
                        $('tr#' + parent_id + '').fadeOut('slow');
                        var currentPageIndex = table.page.info().page;
                        table.ajax.reload(function() {
                            table.page(currentPageIndex).draw(false);
                        }, false);

                    } else {
                        $('tr#' + parent_id + '').fadeOut('slow');
                    }

                }).fail(function() {
                    console.log("FAIL")
                });

            } else {
                swal("Please Input Amount", "", "info")
            }

        } else {
            swal("Please Input Date to Receive", "", "info")
        }
    }


    function delete_cash(cash_id) {
        if (confirm("Are you sure you want to remove cash assistance?")) {
            $.ajax({
                url: 'assistance/assistance_remove',
                type: 'POST',
                data: {
                    cash_id: cash_id

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


    function cash_assistance() {
        $('#cash_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#cash_modal').modal('show')
    }
    // Initialize DataTable
    var table = $('#my_table').DataTable({

        ajax: 'assistance/cash_assistance', // API endpoint to fetch data
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
        ],
        lengthMenu: [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, 'All']
        ],
        dom: "Bfrtip",
        buttons: [{
                extend: "pageLength",
                className: "btn-sm btn-danger"
            },
            {
                extend: "csv",
                className: "btn-sm btn-danger",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: "excelHtml5",
                className: "btn-sm btn-danger",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: "print",
                className: "btn-sm btn-danger",
                title: '.',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                },
                message: '<img src="../../assets/img/bunawan.webp" height="100px" width="100px" style="position: absolute;top:0;left:50px;"><center><h4 style="margin-top:-40px;">Municipality of Bunawan</h4>\
                    <h6 style="font-weight: bold;">AGUSAN DEL SUR</h6>\
							</center><br><br><br>\
              <center>SOLO PARENTS</center>',

            }
        ]
    })

    $(document).ready(function() {
        $('#barangay_change').change(function() {

            let date_receive = $('#date_received').val();
            let tvalue = this.value;
            let table = "<thead>";
            table += "<tr>" +
                "<th class=\"text-center\">LAST NAME</th>" +
                "<th class=\"text-center\">FIRST NAME</th>" +
                "<th class=\"text-center\">BARANGAY</th>" +
                "<th class=\"text-center\">CASH AMOUNT</th>" +
                "</tr>" +
                " </thead>" +
                " <tbody>";

            if (date_receive !== "") {
                $.ajax({
                    type: "POST",
                    url: "assistance/per_barangay_cash",
                    dataType: 'JSON',
                    data: {
                        barangay_id: tvalue,
                        date_receive: date_receive

                    },
                }).done(function(res) {

                    if (res.res_success == 1) {

                        $.each(res.parents, function(key, value) {
                            table += '<tr id="' + value.parent_id + '">' +
                                '<td class="text-center">' + value.lname + '</td>' +
                                '<td class="text-center">' + value.fname + '</td>' +
                                '<td class="text-center">' + value.barangay + '</td>' +
                                '<td class="text-center"><input type="text" name="" class="add_amount" onblur="add_amount_cash(this, ' + value.parent_id + ')" style="width:100px;" required></td>' +

                                '<tr>'
                            $('#populate_table').html(table)

                        })
                    } else {
                        table += `<tr class="text-center">
                            <td class="text-center text-danger fw-bold" colspan="4">No Data Found</td>
                        </tr>`
                        $('#populate_table').html(table)
                    }
                });

            } else {
                swal("Please Input Date to Receive", "", "info")
            }
        })
    })


    $(document).ready(function() {

        $('#search').keyup(function() {
            search_table($(this).val());
        });

        function search_table(value) {
            $("#populate_table tr").each(function() {

                var found = "false";
                $(this).each(function() {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = "true";
                    }
                })
                if (found == "true") {
                    $(this).show();
                } else {
                    $(this).hide();
                }

            })
        }

    })
</script>