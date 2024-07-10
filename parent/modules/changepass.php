<?php include "../header.php"; ?>

<h5 class="d-flex" style="margin-bottom: 15px;">
    <h2>Change Password</h2>
</h5>
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Edit Account</h4>
        </div>
        <div class="card-body">

            <form id="change_password">
                <input type="hidden" name="id" value="<?php  ?>" />

                <div class="form-group row text-left text-dark">
                    <div class="col-sm-3 text-danger" style="padding-top: 5px;">
                        Name:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $_SESSION['solo_parent']['fname'];
                                                                                                        echo "&nbsp;";
                                                                                                        echo "&nbsp;";
                                                                                                        echo $_SESSION['solo_parent']['lname']; ?>" readonly>
                    </div>
                </div><br>
                <div class="form-group row text-left text-dark">
                    <div class="col-sm-3 text-danger" style="padding-top: 5px;">
                        Username:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Username" name="username" value="<?php echo $_SESSION['solo_parent']['username']; ?>" readonly>
                    </div>
                </div><br>
                <div class="form-group row text-left text-dark">
                    <div class="col-sm-3 text-danger" style="padding-top: 5px;">
                        Enter New Password <span class="text-danger"> *</span></label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" name="username" id="new_password" value="<?php  ?>">
                    </div>
                </div><br>
                <div class="form-group row text-left text-dark">
                    <div class="col-sm-3 text-danger" style="padding-top: 5px;">
                        Re-enter New Password <span class="text-danger"> *</span></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="username" id="re_new_password" value="<?php  ?>">
                    </div>
                </div><br>


                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check "></i> Submit</button>
            </form>
        </div>
    </div>
</center>


<?php include "../footer.php"; ?>


<script>
    $(document).ready(function() {

        $('#change_password').submit(function(e) {
            e.preventDefault();

            let new_password = $('#new_password').val();
            let re_new_password = $('#re_new_password').val();

            if (new_password == re_new_password && new_password != '') {
                $.ajax({
                    url: 'change/changepass',
                    type: 'POST',
                    data: {
                        password: new_password
                    },
                    dataType: 'JSON',
                    beforeSend: function() {

                    }
                }).done(function(res) {
                    console.log('Done!');
                    swal("Password Changed", "", "success")
                    setTimeout("location.reload();", 2500);
                }).fail(function() {
                    console.log('Fail!');
                });
            } else {
                alert("Invalid password!");
            }

        });

    });
</script>