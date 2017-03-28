<?php  if($this->session->userdata('msg')){  $alert_msg = $this->session->userdata('msg');  ?>
<script>alert('<?php echo $alert_msg; ?>')</script>
<?php } ?>
<style>
   .space{
      width: 10px;
    float: left;
    border: 1px solid white;

   }
   
</style>
<section id="main-content">
<section class="wrapper">
   <!--state overview start-->
   <!--state overview end-->
   <div class="row">
      <div class="col-lg-8">
         <!--custom chart start-->
         <div class="create">
             <?php $attributes  = array('class' => '', 'id' => ''); echo form_open_multipart('Sales/create', $attributes); ?>
               <right><h2>Create New Sale</h2></right>
                 <div class="form-group pull-left ">
                <label>Client:</label>
               <select class="form-control client " name="client">
               <option value="">Select Client</option>
            <?php for ($i=0; $i < count($fetchClient); $i++) { ?>
                <option value="<?php echo $fetchClient[$i]['contact_name'] ?>"><?php echo $fetchClient[$i]['contact_name']?></option> 
                <?php }?>
                 <!--  <?php foreach ($fetchClient as $client) {
                  ?>
                  <option value="<?php echo $client['contact_name'];?>"><?php echo $client['contact_name']; ?></option> 
                  <?php } ?> -->
               </select>
            </div>
            <div class="space"></div>
            <div class="form-group  pull-left">
               <label>Quotation No:</label>
               <select class="form-control quotationSel" name="quatationNo">
               </select>
               <br>
            </div>
            <div class="space"></div>
            <div class="form-group  pull-left">
               <label>Date Signed</label>
                  <input type="date" class="form-control" name="signed">
            </div>
            <div class="space"></div>
             <div class="form-group  pull-left">
               <label>Amount Without Vat</label>
                  <input type="text" class="form-control" name="amount">
            </div>
             <div class="space"></div>
            <div class="form-group  pull-left">
               <label>vatable</label>
                  <div class="form-group col-lg-6 pull-left"><input type="checkbox" checked  id="vat" name="vat" value="1"></div>
            </div>

         <!--custom chart end-->
         <div class="pull-left col-lg-12 ">
         <right><h2>Payment Terms</h2></right>
       </div>
       <div class="pull-left col-lg-12 ">
         <button id="add_field_button"  class="btn btn-info">Add More Fields</button>
       </div>
      <div class="input_fields_wrap">
        <div class="wrapThis1">
    <div class="form-group col-lg-3  pull-left"><input type="text" name="mypercent[]" placeholder="%"class="form-control"></div>
    <div class="space"></div>
    <div class="form-group col-lg-6 pull-left"><input type="text" placeholder="Description"name="mydescription[]" class="form-control"></div>
    <div class="space"></div>
    <div class="form-group  pull-left">Ex Deal<br><input type="checkbox" checked name="myexdeal[]" onClick="check();" value="1"></div>
    <div class="form-group  pull-left"><br><input type="hidden"  name="exdeal[]"  value="1"><div class="pull-right"></div></div>
    <br>
  </div>
</div>
      <!-- <div class="space"><label><h4>Description<h4></label></div> -->
    

      
      
 <div class="form-group col-lg-12 pull-left">
               <label>Attach Signed Quotation:</label>
               <input type="file" class="form-control" name="file[]" id="file">
               <br>
            </div>
            <div class="pull-left col-lg-12 ">
            <right><h2>For Collection</h2></right>
         </div>
         <br>
             <div class="form-group col-lg-4 pull-left">
               <label>Contact Name:</label>
               <input type="text" name="contactName" class="form-control contactName" required >
               <br>
            </div>
            <div class="form-group col-lg-4 pull-left">
               <label>Contact Number:</label>
               <input type="text" name="contactNumber" class="form-control contactNumber"  required placeholder="Cellphone Number">
               <br>
            </div>
            <div class="form-group col-lg-4 pull-left">
               <label>Email:</label>
               <input type="email" name="email" class="form-control email"  required placeholder="Email">
               <br>
            </div>
             <div class="pull-left">
             <right>
            <button type="submit" class="btn btn-info">Add Sale</button>
            </right>
          </div>
            </div>
           
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
