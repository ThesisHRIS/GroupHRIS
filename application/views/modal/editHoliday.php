<div class="modal fade" id="editHoliday" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#78cd51!important">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Holiday</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
            <form class="form-horizontal editHoliday">
              <input type="hidden" name="" class="holidayId">
                <div class="form-group">
                  <div class="control-label">Holiday Name:</div>
                  <input type="text" class="form-control col-lg-3 holidayname">
                </div>
                <div class="form-group">
                  <div class="control-label">Holiday Date:</div>
                  <input type="date" class="form-control col-lg-3 holidaydate">
                </div>
                <div class="form-group">
                  <div class="control-label">Type:</div>
                  <select name="holiday_type"  class="form-control type" required>
                    <option value="0">--None--</option>
                    <option value="Legal">Legal</option>
                    <option value="Special">Special</option>
                </select>
                </div>
                <div class="form-group">
                  <div class="control-label">Company:</div>
                  <select name="company" class="form-control company">
                      <option value="1">Agorra</option>
                      <option value="2">Optimind</option>
                      <option value="3">All</option>
                  </select>
                </div>
                <div class="form-group"><button class="btn btn-success btn-sm pull-left updateHoliday" >Update</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>