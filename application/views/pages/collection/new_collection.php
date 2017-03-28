<?php  if($this->session->userdata('msg')){  $alert_msg = $this->session->userdata('msg');  ?>
<script>alert('<?php echo $alert_msg; ?>')</script>
<?php } ?>
<section id="main-content">
   <section class="wrapper">
      <div class="row">
         <div class="col-lg-10 col-lg-offset-1">
            <section class="panel">
               <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
               <header class="panel-heading">
                  Create New Collection
               </header>
               <div class="panel-body">
                  <div class=" form">
                     <?php $attributes = array('class' => 'cmxform form-horizontal tasi-form', 'id' => '','validate'=>'validate'); echo form_open_multipart('Collection/create', $attributes); ?>
                     <div class="form-group col-lg-6 pull-left">
                        <label for="QB_REF_NO" class="control-label col-lg-4">QB_REF_NO</label>
                        <div class="col-lg-10">
                           <select class="form-control" required="" name="qb_ref_no">
                              <?php foreach ($fetchCollection as $pt) { if($pt['qb_ref_no']!=0){?>

                              <option value="<?php echo $pt['qb_ref_no']?>"><?php echo $pt['qb_ref_no']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group col-lg-6 pull-left">
                        <label for="amount" class="control-label col-lg-4">Collected_Amount:</label>
                        <div class="col-lg-10">
                           <input type="text" class="form-control" id="amount" name="amount" required=""></textarea>
                        </div>
                     </div>
                     <div class="form-group col-lg-6 pull-left">
                        <label for="qoutation" class="control-label col-lg-4">scanned check :</label>
                        <div class="col-lg-10">
                           <input type="file" class="form-control" multiple="" name="file[]" id="file" required="">
                        </div>
                     </div>
                      <div class="form-group col-lg-6 pull-left">
                        <label for="qoutation" class="control-label col-lg-4">scanned_desposit_Slip:</label>
                        <div class="col-lg-10">
                           <input type="file" class="form-control" multiple="" name="file1[]" id="file1" required="">
                        </div>
                     </div>
                     <div class="form-group col-lg-6 pull-left">
                        <label for="date_collected" class="control-label col-lg-4">Date Collected</label>
                        <div class="col-lg-10">
                           <input type="date" class="form-control" id="date_collected" name="date_collected" required=""></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-11">
        
                           <button class="btn btn-danger" type="submit" style="width:16%;">Save</button>
                
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </section>
</section>
