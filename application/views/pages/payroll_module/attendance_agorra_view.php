
<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<?php $attributes = array('class'=>'form-horizontal'); echo form_open_multipart('UploadCsv/', $attributes); ?>
					<section class="panel">
						<header class="panel-heading">
							<h4>Upload CSV</h4>
						</header>
						<div class="panel-body">
							<label class="control-label col-md-3">Image Upload</label>
                    <div class="col-md-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Icon_delete.svg" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                             <span class="btn btn-white btn-file">
                             <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select CSV File</span>
                             <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                             <input type="file" required name="file[]" value="/uploads/2017-02-16/sample.csv" class="default" />
                             </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                       
                    </div>
               
                      <input class="btn btn-success pull-right" type="submit" value="Validate" />
                  
                </div>
                <?php  if($validate){
                    $error = '1';
                     foreach ($validate as $key) { 
                        if(empty($key['error'])){
                            $error = '0'; 
                        }
                      }
                 } ?>
                <table class ="table table-strips">
                  <tr>
                  <th><?php if(@$GLOBALS['startDate']){echo 'start Date : '.' '.$GLOBALS['startDate'];}else{echo 'Start Date : 0000-00-00';} ?></th>
                  <th><?php if(@$GLOBALS['endDate']){echo 'end Date : '.' '.$GLOBALS['endDate'];}else{echo 'End Date : 0000-00-00';} ?></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><?php if(@$error === '0'){ ?>
                  <button class="btn btn-success " type ="button" onclick="submitCSV('<?php echo $GLOBALS['file_name'];?>');">Submit</button>

                   <?php } ?></th>
                  </tr>
                  <tr>
                  <th>Emp_id</th>
                  <th>Date</th>
                  <th>Day</th>
                  <th>Time in</th>
                  <th>Time out</th>
                  <th>Errors</th>
                  <?php if($validate){
                     foreach ($validate as $key) { ?>
                        <tr>
                        <td><?php echo ($key['emp_id']); ?></td>
                        <td><?php echo ($key['day_date']); ?></td>
                        <td><?php echo ($key['day']); ?></td>
                        <td><?php echo ($key['time_in']); ?></td>
                        <td><?php echo ($key['time_out']); ?></td>
                        <td style="color:red"><?php echo ($key['error']); ?></td>
                      
                        </tr>
                      
                  <?php } } ?>
                </table>
						</div>
					</section>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
