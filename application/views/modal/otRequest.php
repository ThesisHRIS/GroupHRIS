 <div class="modal fade" id="otRequest" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#78cd51!important">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
        <h4 class="modal-title" id="exampleModalLabel"> APPROVE OT?</h4>
      </div>
      <div class="modal-body">
       <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <section class="panel">
                <p class="message" style="display: none"> </p>
                    <header class="panel-heading">
                       OT Information
                    </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="update_leave">
                                    <div class="form-group">
                                        <label>Employee Name:</label>
                                        <input type="text" name="emp_name" class="form-control col-lg-6 emp_name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 pull-left">
                                            <label>Date Requested:</label>
                                            <input type="text" name="date_requested " class="form-control date_requested" disabled>
                                        </div>
                                         <div class="col-lg-4 pull-left">
                                            <label>OT Date:</label>
                                            <input type="text" name="ot_date" class="form-control leave_dates" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 pull-left">
                                             <label>Total Hours:</label>
                                             <input type="text" name="total_hours" class="form-control no_days" disabled>
                                        </div>
                                    </div>
                                        <input type="hidden" name="ot_id" class="ot_id">
                                    <div class="form-group">
                                     <label>Task:</label>
                                    <textarea class="form-control task" disabled></textarea>
                                    </div>
                                <div class="form-group" style="margin-top: 10px">
                                    <div class="col-lg-12">
                                        <button class="btn btn-success pull-right update_Ot_button" type="button">Approved</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
  </div>
</div>