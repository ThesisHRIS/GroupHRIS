<div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#78cd51!important">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">EDIT Item</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
            <div class="form">
              <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-md-3">Image Upload</label>
                    <div class="col-md-9">
                      <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                              <span class="btn btn-white btn-file">
                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                <input type="file"  name="file[]" class="default" />
                              </span>
                              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                          </div>
                        </div>
                     </div>
                </div>
                <div class="form-group">
                  <label>Item Name:</label>
                  <input type="text" class="form-control col-lg-6 itemName">
                </div>
                <div class="form-group">
                  <label>Points to Gain:</label>
                  <input type="text" class="form-control col-lg-6 points">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>