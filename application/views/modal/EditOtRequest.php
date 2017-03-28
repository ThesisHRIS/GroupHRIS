 <div class="modal fade" id="EditotRequest" tabindex="-1" role="dialog" aria-labelledby="edit_clientsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#78cd51!important">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
        <h4 class="modal-title" id="exampleModalLabel"> EDIT OT</h4>
      </div>
      <div class="modal-body">
       <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <section class="panel">
                <p class="message" style="display: none"> </p>
                    <header class="panel-heading">
                       OT Informations
                    </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="update_ot" name="update_ot">
                        <div class="col-lg-12">
                            <div class="col-lg-4 control-label">Emp ID:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <?php foreach ($emp_id as $list) { 
                                    if($list['emp_id']===$this->session->userdata('emp_id')){?>
                                        <input class="form-control" readonly="readonly" name="emp_id" type="text" value="<?php echo $list['emp_no'].' - '. $list['last_name']?>"> 
                                <?php } }?>
                            </div>
                            <input type="hidden"  class = "ot_id" name="">
                            <?php 
                                date_default_timezone_set('Asia/Manila');
                                $date=date('Y-m-d');
                            ?>
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>Date Filed:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                            <?php date_default_timezone_set('Asia/Manila');
                                        $date=date('Y-m-d');?>
                                <input type="date" class="form-control" readonly="readonly" name="date_filed" value="<?php echo $date ?>" required>
                            </div>
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>OT Date:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <input type="date" name="ot_date" id="otDate" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>Remarks:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <input class="form-control" type="text" id="remark" name="remarks" required>
                            </div>
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>Time Start:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <input type="time" name="time_start" oninput="getTime()" class="form-control time_start" required>
                            </div>
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>Time End:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <input type="time" name="time_end" oninput="getTime()" class="form-control time_end" required>
                            </div>      
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>Total Hours:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <input class="form-control hours" id="totalHours" readonly="readonly" type="text" name="hours" required>
                            </div>
                            <p class="error_time"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="col-lg-4 control-label">Supervisor ID:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <select name="supervisor_id" class="form-control " id="supervisor_id">
                                    <?php foreach ($supervisor as $list) {?>
                                            <option value="<?php echo $list['supervisor_id'] ?>"><?php echo $list['supervisor_no'].'-'.$list['supervisor_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="col-lg-4 control-label"><label style="color:red">*</label>Task:</div>
                            <div class="col-lg-8" style="margin-left:-8%;">
                                <textarea class="form-control task" name="task" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-12" style="margin-top:5%;">
                            <div class="col-lg-12">
                                
                                <button onclick="resetFieldsOtForm()" style="margin-left:.5%" class="btn btn-default">Cancel</button>
                                <button type ="button" class="btn btn-success editOtRequest1" style="float:right;margin-right: 1%"  name="submit" >Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php echo form_close(); ?>
        </div>
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