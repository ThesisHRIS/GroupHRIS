<div id="main-content">
	<div class="wrapper">
		<div class="col-lg-8">
			<!-- <form name="edit" class="form-horizontal edit" action="" method="post"> -->
				<section class="panel">
					<header class="panel-heading">
						<h4>Personal Information</h4>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<div class="form-group last">
							<?php $attributes = array('class'=>'form-horizontal'); echo form_open_multipart('AddItem/create', $attributes); ?>
							
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
                                              <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
                                          </div>
                                      </div>
						</div>
						<div class="form-group">
							<table class="table table-advance" style="border-top:;">
								
								<tbody>
								<tr>
									<td>Item Name :</td>
									<td><input type="text" name="ItemName" class="form-control oldpassword"></td>
									<td>
									<td>
								</tr>
								<tr>
									<td>Points to be gained :</td> 
									<td><input type="text" name="points" class="form-control password"></td>
									<td></td>
									<td></td>
								</tr>

								</tbody>
								
							</table>
								<p align="center">
									<input class="" type="submit" value="Submit" />
								</p>	
				</fieldset>
							
					 <?php echo form_close(); ?> 
							</form>
						</div>
					</div>
				</section>
			</form>
		</div>
	</div>
</div>