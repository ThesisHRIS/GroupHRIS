 <?php  if($this->session->userdata('msg')){  $alert_msg = $this->session->userdata('msg');  ?>
    <script>alert('<?php echo $alert_msg; ?>')</script>
<?php } ?>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-10 col-lg-offset-1">
                    <!--custom chart start-->
                    <p id= "message"></p>
                    <center><h2>Create New Client</h2></center>
                    <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
                     <?php $attributes = array('class' => '', 'id' => ''); echo form_open_multipart('Clients/saveClient', $attributes); ?>
                         <label>Name:</label><div class="contain"><div class="name">
                         <input type="text" placeholder="FirstName"name="fname" class="form-control" required></div>
                         <div class="name"><input type="text" name="lname" placeholder="LastName" class="form-control" required></div></div>
                         <label><br>Company Name: </label><input type="text" name="com_name" placeholder="" class="form-control" required>
                         <label><br>Personal Email:</label><input type="email" name="personal_email"class="form-control" required>
                         <label><br>Work Email:</label><input type="email" name="work_email"class="form-control" required>
                         <label>Position:</label><input type="text" name="position" class="form-control">
                         <label>Address:</label><input type="text" name="address" class="form-control">
                         <label>Mobile:</label><input type="text" name="mobile" class="form-control">
                         <label>Phone:</label><input type="text" name="phone" class="form-control">
                         <label>Birthday:</label><input type="date" name="date" class="form-control">
                         <label>Value:</label><input type="text" name="value" class="form-control">
                          <br>
                        <button type="submit" name="submit" class="btn btn-info sub-newC">Register Client</button>
                      </form> 
                  
                      <!--custom chart end-->
                  </div>
              </div>
          </section>