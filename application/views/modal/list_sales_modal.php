 <div class="modal fade" id="edit_sale" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">EDIT INFORMATION</h4>
      </div>
      <div class="modal-body">
        <form id="saleForm">
          <div class="form-group">
            <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
            <label for="recipient-name" class="control-label">Company Name:</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="">
          </div>
          <div class="form-group">
            <label>Project Name: </label><input type="text" class="form-control" name="project_name" id="project_name">
          
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Value:</label>
            <input type="text" class="form-control" name="value" id="value">
          </div>
          <input type="hidden" id="salesId" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
        <div class="btnEdit"><button type="button" class="btn btn-primary" id="edit_sl">Update</button></div>
      </div>
      </form>
    </div>
  </div>
</div>