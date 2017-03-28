 <div class="modal fade" id="edit_clients" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">EDIT INFORMATION</h4>
      </div>
      <div class="modal-body">
        <form id="lstCmd">
          <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="contact_name" name="contact_name" value="">
          </div>
          <div class="form-group">
            <label><b>Contact Numbers:</b></label><br/>
              <div class="col-lg-6 pull-left"><label>Phone Number: </label><input type="text" class="form-control" name="phone_number" id="phone_number"></div>
              <div class="col-lg-6 pull-left"><label>Cellular Number: </label><input type="text" class="form-control" name="cel_number" id="cel_number"><br/></div>
          </div>
          
          <div class="form-group">
            <label><b>Email Addresses:</b></label><br/>
            <label>Personal Email: </label><input type="email" name="personal_email" class="form-control" id="personal_email">
            <label>Work Email: </label><input type="email"  name="work_email"  class="form-control" id="work_email">
            <!-- <label>Company Email: </label><input type="email"  name="company_email"  class="form-control" id="company_email"> -->
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Value:</label>
            <input type="text" class="form-control" name="value" id="value">
          </div>
          <input type="hidden" id="unq" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
        <div class="btnEdit edit_cl"><button type="button" class="btn btn-primary attrib_d">Update</button></div>
      </div>
      </form>
    </div>
  </div>
</div>