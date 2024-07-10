<?php include "../header.php";
include "descendants/descendants.php";
?>

<main class="content px-3 py-2">
    <div class="mb-3">
        <h4>Dependents</h4>
    </div>
    <!-- Table Element -->
    <div class="card border-0">
        <div class="card-body" style="overflow-x:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Age</th>
                        <th class="text-center" scope="col">Education Level</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($descendant) {
                        foreach ($descendant as $desc) {
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $desc['c_name']; ?></td>
                                <td class="text-center "><?php echo $desc['age']; ?></td>
                                <td class="text-center"><?php echo $desc['description']; ?> </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" onclick="delete_child(<?php echo $desc['child_id']; ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td class="text-start text-danger" colspan="11">No Record Found</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include "../footer.php"; ?>

<script>
    function delete_child(child_id){
        if (confirm("Are you sure you want to remove Dependent?")) {
            $.ajax({
                    url: 'descendants/descendant_delete',
                    type: 'POST',
                    data: {
                        child_id: child_id

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
</script>