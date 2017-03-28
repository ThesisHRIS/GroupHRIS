<?php  if($this->session->userdata('msg')){  $alert_msg = $this->session->userdata('msg');  ?>
 <script>alert('<?php echo $alert_msg; ?>')</script>
<?php } ?>
<div id="main-content">
   <div class="wrapper">
     <form name="201" class="form-horizontal 201"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <section class="panel">
               <header class="panel-heading">
                  <h4>Information Form</h4>
                  <p class="message" style="display: none">
               </header>
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Personal Information</h5></legend>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Employee No:</label>
                        <div class="col-lg-2">
                           <input type="text" class="form-control" name="emp_no" placeholder="e.g.(123456)" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Company:</label>
                        <div class="col-lg-2">
                           <select name="company" class="form-control m-bot15"required >
                              <?php foreach ($company as $list ){ ?>
                                 <option  value="<?php echo $list['company_id']?>"><?php echo $list['company_name'] ?></option>
                              <?php }  ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Legal Name:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="Last Name" name="last_name" required></input>
                        </div>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="First Name" name="first_name" required></input>
                        </div>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Date of Birth:</label>
                        <div class="col-lg-3">
                           <input class="form-control" name="birth_date" type="date" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-4">
                           <label class="col-sm-2 control-label col-lg-2">Status:</label>
                              <div class="col-lg-10">
                                 <label class="checkbox-inline">
                                    <input type="radio" name="civil_status" value="Single" checked></input>
                                    Single
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="radio" name="civil_status" value="Married"></input>
                                    Married
                                 </label>
                              </div>
                        </div>
                        <div class="col-lg-4">
                           <label class="col-sm-2 control-label col-lg-2">Gender:</label>
                              <div class="col-lg-10">
                                 <label class="checkbox-inline">
                                    <input type="radio" name="gender" value="1"checked></input>
                                    Male
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="radio" name="gender" value="2"></input>
                                    Female
                                 </label>
                              </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Place of Birth:</label>
                        <div class="col-lg-2">
                           <input type="text" class="form-control" placeholder="..." name="birth_place" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Nationality:</label>
                        <div class="col-lg-2" style="margin-left: -5%">
                           <input type="text" class="form-control" placeholder="..." name="nationality" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Religion:</label>
                        <div class="col-lg-2" style="margin-left: -7%">
                           <input type="text" class="form-control" placeholder="..." name="religion" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Email Address:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="email@example.com" name="email" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Mobile Number:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="(+63)" name="mobile" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Home Address:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..." name="address" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Phone Number:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="(+32)" name="phone" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="ol-sm-2 control-label col-lg-2">No. of Children</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control"  name="children">
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>SSS No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..." name="sss" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Tin No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control"  name="tin" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>PhilHealth No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..." name="philhealth" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Pag Ibig No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control"  name="pag_ibig" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Tax Status:</label>
                        <div class="col-lg-2">
                           <select name="tax_status" class="form-control" required>
                             <?php foreach ($tax_status as $list ){ ?>
                                 <option  value="<?php echo $list['tax_id']?>"><?php echo $list['tax_status'] ?></option>
                              <?php }  ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Position:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..." name="position" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Department:</label>
                        <div class="col-lg-2">
                           <select name="department" class="form-control">
                              <?php foreach ($department as $list ){ ?>
                                 <option  value="<?php echo $list['department_id']?>"><?php echo $list['department_name'] ?></option>
                              <?php }  ?>
                           </select>
                        </div>
                        
                        <label class="col-sm-2 control-label col-lg-2">Supervisor:</label>
                        <div class="col-lg-2" style="margin-left: -5%">
                           <select name="supervisor_id" class="form-control">
                             <?php foreach ($supervisor_id as $list ){ ?>
                                 <option  value="<?php echo $list['supervisor_id']?>"><?php echo $list['supervisor_last_name']?></option>
                              <?php }  ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hired Date:</label>
                        <div class="col-lg-2">
                           <input type="date" class="form-control" name="hire_date" required></input>
                        </div>
                     </div>
            </section>
            <section class="panel">
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Salary Information</h5></legend>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Basic:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="basic" required></input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>ECOLA:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="ecola" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Other:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="other"></input>
                        </div>
                     </div>
                  </fieldset>
               </div>
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Spouse Information</h5></legend>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Name:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="spouse_name"></input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2">Occupation:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="spouse_job"></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Company:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="spouse_company"></input>
                        </div>
                     </div>
                  </fieldset>
               </div>
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Emergency Contact Person Information</h5></legend>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Name:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="contact_emergency" required></input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Relationship:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="contact_relation" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Contact Number:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="contact_number" required></input>
                        </div>
                     </div>
                  </fieldset>
               </div>
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Educational Attainment</h5></legend>
                  </fieldset>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label"></label>
                     <div style="margin-left: 23%">
                        <label class="col-sm-2 col-sm-2 control-label">Name of School</label>
                     </div>
                     <div style="margin-left: 51%">
                        <label class="col-sm-2 col-sm-2 control-label">Address</label>
                     </div>
                     <div style="margin-left: 30%"></div>
                     <div>
                        <label class="col-sm-2 control-label">Year(s) Attended</label>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Elementary:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="elementary"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="elem_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="elem_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">High School:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="highschool"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="hs_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="hs_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Vocational:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="vocational"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="voc_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="voc_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Course:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="voc_course"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">College:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="college"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="col_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="col_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Course:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="col_course"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Post-Graduate:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="post_graduate"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="postgrad_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="postgrad_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Degree:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" name="postgrad_degree"></input>
                     </div>
                  </div>
               </div>
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Employment Record</h5></legend>
                  </fieldset>
                  <div class="form-group">
                     <div class="col-lg-3 control-label">Name of Company</div>
                     <div class="col-lg-3 control-label">Address</div>
                     <div class="col-lg-3 control-label">Position</div>
                     <div class="col-lg-3 control-label">From-To</div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="company_name1"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="company_address1"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="position1"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="duration1"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="company_name2"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="company_address2"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="position2"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="duration2"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="company_name3"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="company_address3"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="position3"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="duration3"></input>
                     </div>
                  </div>
               </div>
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Character Reference</h5></legend>
                  </fieldset>
                  <div class="form-group">
                     <div class="col-lg-3 control-label">Name of Company</div>
                     <div class="col-lg-3 control-label">Company</div>
                     <div class="col-lg-3 control-label">Position</div>
                     <div class="col-lg-3 control-label">Contact Number</div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_name1"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_company1"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_position1"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_number1"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_name2"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_company2"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_position2"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_number2"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_name3"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_company3"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_position3"></input>
                     </div>
                     <div class="col-lg-3">
                        <input class="form-control col-lg-3" name="ref_number3"></input>
                     </div>
                  </div>
               </div>
                <p class="message" style="display: none">
            </section>
            <button type="button" style ="width: 80px;" class="pull-left btn btn-success cancel_201" >Cancel</button>
           <button class="pull-right btn btn-success add201File" name="add_201" type="button">Submit</button>
      <?php echo form_close(); ?>
   </div>
</div>
