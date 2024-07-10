<?php

$sql = "SELECT name, barangay_id FROM tbl_barangays";
$result = mysqli_query($db, $sql) or die("Bad SQL: $sql");

$opt1 = "<select class='form-control' name='type' id = 'add_barangay' required>";
$opt1 .= "<option value='' selected hidden>Select Barangay</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt1 .= "<option value='" . $row['barangay_id'] . "'>" . $row['name'] . "</option>";
}
$opt1 .= "</select>";
?>

<!-- ADD Activity -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Add Activty Post</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_announcement">
                <div class="modal-body">
                <div class="md-form">
                        <label data-error="wrong" data-success="right">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control validate" id="add_title" required>
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right">Activity Description<span class="text-danger">*</span></label>
                        <textarea name="" id="add_desc" class="tinymce form-control" cols="10" rows="7"></textarea>
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right">Purpose<span class="text-danger">*</span></label>
                        <input type="text" class="form-control validate" id="add_purpose" required>
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right">Date of Activity<span class="text-danger">*</span></label>
                        <input type="date" name="add_date" class="form-control" id="add_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- EDIT Activity -->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Edit Activty Post</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_udpate">
                <div class="modal-body">
                <div class="md-form">
                        <label data-error="wrong" data-success="right">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control validate" id="edit_title" required>
                    </div>
                    <div class="md-form">
                        <input type="hidden" class="form-control validate" id="edit_id" required>
                        <label data-error="wrong" data-success="right">Activity Description<span class="text-danger">*</span></label>
                        <textarea name="" id="edit_desc" class="tinymce form-control" cols="10" rows="7"></textarea>
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right">Purpose<span class="text-danger">*</span></label>
                        <input type="text" class="form-control validate" id="edit_purpose" required>
                    </div>
                    <div class="md-form">
                        <label data-error="wrong" data-success="right">Date of Activity<span class="text-danger">*</span></label>
                        <input type="date" name="edit_desc" class="form-control" id="edit_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>



<!------------------------------------- UPLOAD PHOTO-------------------------------------------------->
<div class="modal fade" id="upload_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="upload_form" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="announcement_id" id="announcement_id">
            <input type="file" name="file" id="file" accept="image/*" class="form-control"><br><br>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>

  </div>
</div>