
<!-- //ADD USER -->
<div class="modal fade" id="list_add_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold">Add New User</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-lable="close">&times;</button>
      </div>
      <form id="form_insert">
        <div class="modal-body mx-4">
          <div class="md-form">
            <label data-error="wrong" data-success="right">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control validate" id="add_username">
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control validate" id="add_fname">
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control validate" id="add_lname">
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">Gender <span class="text-danger">*</span></label>
            <select class='form-control' id="add_gender">
              <option value="" selected hidden>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="md-form">
            <label data-error="wrong" data-success="right">Email</label>
            <input type="email" class="form-control validate" id="add_email">
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary btn-block z-depth-1a" id="btn_add">SUBMIT</button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>



<!-- //edit USER -->
<div class="modal fade" id="list_edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold">Edit New User</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-lable="close">&times;</button>
      </div>
      <form id="form_update">
        <div class="modal-body mx-4">
          <div class="md-form">
            <label data-error="wrong" data-success="right">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control validate" id="edit_user_id" hidden>
            <input type="text" class="form-control validate" id="edit_username" disabled>
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control validate" id="edit_fname">
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control validate" id="edit_lname">
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">Gender <span class="text-danger">*</span></label>
            <select class='form-control' id="edit_gender">
              <option value="" selected hidden>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="md-form">
            <label data-error="wrong" data-success="right">Email</label>
            <input type="email" class="form-control validate" id="edit_email">
          </div>
          <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary btn-block z-depth-1a" id="btn_add">SUBMIT</button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>


<!-------------------------------------------- Change Password modal ------------------------------------------------->
<div class="modal fade" id="changepassword_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- username, lname, fname, gender, phone, user_type_id -->

      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold">Change Password</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-lable="close">&times;</button>
      </div>

      <form id="d_form_cp">
        <div class="modal-body mx-4">

          <input type="hidden" id="cp_id" value="">

          <div class="md-form">
            <label data-error="wrong" data-success="right">Username</label>

            <input type="text" class="form-control validate" id="cp_username" readonly>
          </div>

          <div class="md-form">
            <label data-error="wrong" data-success="right">Enter New Password</label>
            <span class="text-danger">*</span></label>
            <input type="password" class="form-control validate" id="cp_new_password" required>
          </div>

          <div class="md-form">
            <label data-error="wrong" data-success="right">Re-enter New Password</label>
            <span class="text-danger">*</span></label>
            <input type="password" class="form-control validate" id="cp_re_new_password" required>
          </div>

          <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary btn-block z-depth-1a" name="signupbtn">SUBMIT</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>