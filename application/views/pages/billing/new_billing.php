<?php  if($this->session->userdata('msg')){  $alert_msg = $this->session->userdata('msg');  ?>
<script>alert('<?php echo $alert_msg; ?>')</script>
<?php } ?>
<section id="main-content">
<section class="wrapper">
   <!--state overview start-->
   <!--state overview end-->
   <div class="row">
      <div class="col-lg-8">
         <!--custom chart start-->
         <div class="create">
            <center>
               <h2>Create Billing</h2>
            </center>
            <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
            <hr style="border-top:2px solid #eee">
            <?php $attributes = array('class' => '', 'id' => ''); echo form_open_multipart('bills/create', $attributes); ?>
           
            <h3>Information:</h3>
            <hr style="border-top:2px solid #eee"> 
            <div class="form-group col-lg-6 pull-left">
               <label>Client:</label>
               <select class="form-control clients " name="client">
               <option value="">Select Client</option>
                  <?php foreach ($fetchClient as $client) {
                  ?>
                  <option value="<?php echo $client['contact_name'];?>"><?php echo $client['contact_name']; ?></option> 
                  <?php } ?>
               </select>
               <br>
            </div>
            <div class="form-group col-lg-6 pull-left">
               <label>Quotation No:</label>
               <select class="form-control quotationSel" name="quatationNo">
               </select>
               <br>
            </div>
            <div class="form-group col-lg-6 pull-left">
               <label>Payment Description:</label>
               <textarea  class="form-control description" name="description"></textarea>
               </select>
               <br>
            </div>
            <div class="form-group col-lg-6 pull-left">
               <label>Percentage:</label>
               <input type="text"  class="form-control percent" value="" name="percent">   
               <label>Ex deal:</label>
               <input type="text"  class="form-control exDeal" name="exDeal">             </select>
               <br>
            </div>
             <div class="form-group col-lg-6 pull-left">
               <label>qb_ref_no:</label>
               <input type="text"  class="form-control ref_no" value="" name="qb_ref_no">   
               <br>
            </div>
            <div class="form-group col-lg-6 pull-left">
               <label>Upload Scan Copy:</label>
               <input type="file" class="form-control" multiple="" name="file[]" id="file" >
               <br>
            </div> 
            <div class="form-group col-lg-6 pull-left">
               <label>Date Billed:</label>
               <input type="date"  class="form-control billed" name="date_billed">   
               <br>
            </div>
            <div class="form-group col-lg-6 pull-left">
               <input type="text" hidden value=<?php echo $this->session->userdata('user_id')?> name="finance_id">
               <input type="text" hidden class="payment_terms_id" name="payment_terms_id">
            </div>
            <br>
            <center>
            <button type="submit" class="btn btn-info">Add Billing</button>
            </center>
         </div>
         <!--custom chart end-->
      </div>
      <div class="col-lg-4">
         <!--new earning start-->
         <!--total earning end-->
      </div>
   </div>
   <div class="row">
      <div class="col-lg-4">
         <!--user info table start-->
         <!--user info table end-->
      </div>
   </div>
   <!-- Right Slidebar end -->
   <!--footer start-->
   <!--footer end-->
</section>
