 <div class="modal fade" id="view_proposals" tabindex="-1" role="dialog" aria-labelledby="view_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">PROPOSALS INFORMATION</h4>
      </div>
      <div class="modal-body">
        <form id="proposalsInfo">
          <!-- <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="contact_name" name="contact_name" value="">
          </div> -->
            <div class="form-group">
              <div class="col-lg-6 pull-left"><label>Quotation Number:</label><input disabled type="text" class="form-control" name="QuotationNo" id="QuotationNo"></div>
              <div class="col-lg-6 pull-left"><label>Client Name:</label><input disabled type="text" class="form-control" name="clientName" id="clientName"><br/></div>
          </div>
          <div class="form-group">
              <div class="form-group">
             
            <label><b>Sales Category:</b></label><br/>
             <textarea disabled type="text" class="form-control" id="serviceCategory" name="projectname" value=""></textarea>

          </div>
            <div class="form-group">
               <div class="col-lg-6 pull-left"><label>Project Name:</label><input disabled type="text" class="form-control" name="Pro" id="Pro"></div>
              <div class="col-lg-6 pull-left"><label>Amount:</label><input disabled type="text" class="form-control" name="amount" id="amount"><br/></div>
          </div>
            <div class="form-group">
            <label><b>Date Sent:</b></label><br/>
             <input disabled type="text" class="form-control" id="dateSent" name="projectname" value="">
          </div>  
          </div>
            <div class="form-group">
               <div class="col-lg-6 pull-left"><label>Date Created:</label><input disabled type="text" class="form-control" name="date_created" id="date_created"></div>
              <div class="col-lg-6 pull-left"><label>Date Last Modified:</label><input disabled type="text" class="form-control" name="date_LastModified" id="date_LastModified"><br/></div>

          </div>
          <!-- <div class="form-group">
            <label for="message-text" class="control-label">Attached Quotation:</label>
            <input type="file" class="form-control" name="attached" id="attached">
          </div> -->
          <input type="hidden" id="unq" value="">
      </div>
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
        <div class="btnEdit edit_pro"><button type="button" class="btn btn-primary attrib_d">Update</button></div> -->
      </div>
      </form>
    </div>
  </div>
</div>