<div class="modal fade" id="addActivity" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#78cd51!important">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Create Activity</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form1">
          <section class="panel">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-lg-12">
                  <div class="col-lg-4 control-label">Name Of Activity:</div>
                  <div class="col-lg-3" style="margin-left:-8%;">
                    <input type="text" class="form-control" name="name">
                  </div>
                  
                  
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <div class="col-lg-4 control-label">Date of Activity:</div>
                  <div class="col-md-6" style="margin-left:-8%;">
                    <input type="date" class="form-control" oninput="getDate();" name="date">
                  </div>
                </div>
              </div>
      
              
              <div class="form-group">
                <div class="col-lg-4">
                  <button href="<?php echo base_url('Activity') ?>" class="btn btn-default" name="cancel">Cancel</button>
                  <button type="button" class="btn btn-success submitActivty" onclick="submitActivty();" name="submit">Submit</button>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
    </div>
  </div>
</div>