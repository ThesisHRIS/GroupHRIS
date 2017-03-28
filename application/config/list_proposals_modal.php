 <div class="modal fade" id="edit_proposals" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
        <h4 class="modal-title" id="exampleModalLabel">EDIT PROPOSALS</h4>
      </div>
      <div class="modal-body">
        <form id="proposalsCmd">
          <!-- <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="contact_name" name="contact_name" value="">
          </div> -->
          <div class="form-group">
            <label><b>Project Name:</b></label><br/>
             <input type="text" class="form-control" id="Pro_Name" name="projectname" value="">
              
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Value:</label>
            <input type="text" class="form-control" name="value" id="value">
          </div>
          <!-- <div class="form-group">
            <label for="message-text" class="control-label">Attached Quotation:</label>
            <input type="file" class="form-control" name="attached" id="attached">
          </div> -->
          <input type="hidden" id="unq" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
        <div class="btnEdit edit_pro"><button type="button" class="btn btn-primary attrib_d">Update</button></div>
      </div>
      </form>
    </div>
  </div>
</div>