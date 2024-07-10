<!------------------------------------- UPLOAD FILE-------------------------------------------------->
<div class="modal fade" id="upload_excel_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Upload Excel File</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="upload_excel" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" name="excel_1" id="excel_1" class="form-control"><br><br>
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


<!-- Document _download -->
<div class="modal fade" tabindex="-1" role="dialog" id="info_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Solo Parent Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body" id="document_2">

                    <table class="table table-bordered" id="my_table_3">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Descnedants _download -->
<div class="modal fade" tabindex="-1" role="dialog" id="document_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Dependents</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body" id="document_1">

                    <table class="table table-bordered" id="my_table_2">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
            </form>
        </div>
    </div>
</div>




<!------------------------------------- UPLOAD FILE-------------------------------------------------->
<div class="modal fade" id="upload_excel_modal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Upload Excel File</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="upload_excel" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <br>
                        <input type="file" name="excel_1" id="excel_1" class="form-control"><br><br>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
            </form>
        </div>
    </div>
</div>