<div id="main-content">
   <div class="wrapper">
      <?php $attributes = array('class'=>'form-horizontal'); echo form_open_multipart('Add201File/saveForm', $attributes); ?>
         <?php foreach ($data as $data) { ?>
            <div class="col-lg-12">
               <section class="panel">
                  <header class="panel-heading">
                     <h4>Information Form</h4>
                  </header>
                  <div class="panel-body">
                     <fieldset>
                        <legend><h5>Personal Information</h5></legend>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Employee No:</label>
                           <div class="col-lg-2">
                              <input type="text" class="form-control" name="emp_no" value="<?php echo $data['emp_no'] ?>" required></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Company:</label>
                           <div class="col-lg-2">
                              <select name="company" class="form-control m-bot15" required>
                                 <?php foreach ($company as $list) { ?>
                                    <option value="<?php echo $list["company_id"]?>"><?php echo $list['company_name']?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Legal Name:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["last_name"] ?>" name="last_name" required></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["first_name"] ?>" name="first_name" required></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["middle_name"] ?>" name="middle_name" required></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Date of Birth:</label>
                           <div class="col-lg-3">
                              <input type="date" name="birth_date" class="form-control" value="<?php echo $data['birth_date'] ?>" required></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-lg-4">
                              <label class="col-sm-2 control-label col-lg-2">Status:</label>
                              <div class="col-lg-10">
                                 <?php if($data['civil_status']=="Single"){ ?>
                                    <label class="checkbox-inline">
                                       <input type="radio" name="civil_status" value="Single" checked></input>
                                       Single
                                    </label>
                                    <label class="checkbox-inline">
                                       <input type="radio" name="civil_status" value="Married"></input>
                                       Married
                                    </label>
                                 <?php } ?>
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
                              <input type="text" class="form-control" value="<?php echo $data["birth_place"] ?>" name="birth_place" required>
                              </input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Nationality:</label>
                           <div class="col-lg-2" style="margin-left: -5%">
                              <input type="text" class="form-control" value="<?php echo $data["nationality"] ?>" name="nationality" required>
                              </input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Religion:</label>
                           <div class="col-lg-2" style="margin-left: -7%">
                              <input type="text" class="form-control" value="<?php echo $data["religion"] ?>" name="religion" required>
                              </input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Email Address:</label>
                           <div class="col-lg-3">
                              <input type="email" class="form-control" value="<?php echo $data["email"] ?>" name="email" required>
                              </input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Mobile Number:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" placeholder="(+63)"value="<?php echo $data["phone"] ?>" name="phone" required>
                              </input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Home Address:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["address"] ?>" name="address" required>
                              </input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Phone Number:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["phone"] ?>" name="phone" required>
                              </input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="ol-sm-2 control-label col-lg-2">No. of Children</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control"  name="children" value="<?php echo $data["children"] ?>">
                              </input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>SSS No.:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["sss"] ?>" name="sss" required>
                              </input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Tin No.:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["tin"] ?>" name="tin" required>
                              </input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>PhilHealth No.:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data["philhealth"] ?>" name="philhealth" required>
                              </input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Pag Ibig No.:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control"  value="<?php echo $data["pag_ibig"] ?>" name="pag_ibig" required>
                              </input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2">Tax Status:</label>
                           <div class="col-lg-2">
                              <select name="tax_status" class="form-control">
                                 <?php foreach ($tax_status as $list ){ ?>
                                    <option  value="<?php echo $list['tax_id']?>"><?php echo $list['tax_status'] ?></option>
                                 <?php }  ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Position:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" value="<?php echo $data['position'] ?>" name="position" required>
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
                                    <option  value="<?php echo $list['supervisor_id']?>"><?php echo $list['supervisor_last_name'].", ". $list['supervisor_first_name'] ?></option>
                                 <?php }  ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Hired Date:</label>
                           <div class="col-lg-2">
                              <input type="date" name="hire_date" class="form-control" value="<?php echo $data['hire_date'] ?>" required></input>
                           </div>
                     </fieldset>
                  </div>
               </section>
            </div>
            <div class="col-lg-12">
               <section class="panel">
                  <div class="panel-body">
                     <fieldset>
                        <legend><h5>Salary Information</h5></legend>
                        <div class="form-group">
                           <div class="col-lg-6">
                              <label class="col-sm-2 control-label col-lg-2">Daily:</label>
                              <div class="col-lg-10">
                                 <label class="checkbox-inline">
                                    <input type="radio" name="daily" value="1" checked></input>
                                    Daily
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="radio" name="daily" value="0"></input>
                                    Monthly
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="radio" name="daily" value="1"></input>
                                    Monthly with Saturdays
                                 </label>
                              </div>
                           </div>
                        </div>
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
                           <div class="col-lg-6">
                              <label class="col-sm-2 control-label col-lg-2">Flex:</label>
                              <div class="col-lg-10">
                                 <label class="checkbox-inline">
                                    <input type="radio" name="flexi" value="1" checked></input>
                                    Yes
                                 </label>
                                 <label class="checkbox-inline">
                                    <input type="radio" name="flexi" value="2"></input>
                                    No
                                 </label>
                              </div>
                           </div>
                        </div>
                     </fieldset>
                  </div>
               </section>
            </div>
            <div class="col-lg-12">
               <section class="panel">
                  <div class="panel-body">
                     <fieldset>
                        <legend><h5>Spouse Information</h5></legend>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2">Name:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="spouse_name" value="<?php echo $data["spouse_name"] ?>"></input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2">Occupation:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="spouse_job" value="<?php echo $data["spouse_job"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2">Company:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="spouse_company" value="<?php echo $data["spouse_company"] ?>"></input>
                           </div>
                        </div>
                     </fieldset>
                  </div>
               </section>
            </div>
            <div class="col-lg-12">
               <section class="panel">
                  <div class="panel-body">
                     <fieldset>
                        <legend><h5>Emergency Contact Person Information</h5></legend>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Name:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="contact_emergency" value="<?php echo $data["contact_emergency"] ?>" required></input>
                           </div>
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Relationship:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="contact_relation" value="<?php echo $data["contact_relation"] ?>" required></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Contact Number:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="contact_number" value="<?php echo $data["contact_number"] ?>" placeholder= "(+63)"required></input>
                           </div>
                        </div>
                     </fieldset>
                  </div>
               </section>
            </div>
            <div class="col-lg-12">
               <section class="panel">
                  <div class="panel-body">
                     <fieldset>
                        <legend><h5>Educational Attainment</h5></legend>
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
                              <input type="text" class="form-control" name="elementary" value="<?php echo $data["elementary"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="elem_address" value="<?php echo $data["elem_address"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="elem_graduated" value="<?php echo $data["elem_graduated"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">High School:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="highschool" value="<?php echo $data["highschool"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="hs_address" value="<?php echo $data["hs_address"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="hs_graduated" value="<?php echo $data["hs_graduated"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Vocational:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="vocational" value="<?php echo $data["vocational"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="voc_address" value="<?php echo $data["voc_address"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="voc_graduated" value="<?php echo $data["voc_graduated"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Course:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="voc_course" value="<?php echo $data["voc_course"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">College:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="college" value="<?php echo $data["college"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="col_address" value="<?php echo $data["col_address"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="col_graduated" value="<?php echo $data["col_graduated"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Course:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="col_course" value="<?php echo $data["col_course"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Post-Graduate:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="post_graduate" value="<?php echo $data["post_graduate"] ?>"></input>
                           </div>
                                <div class="col-lg-3">
                              <input type="text" class="form-control" name="postgrad_address" value="<?php echo $data["postgrad_address"] ?>"></input>
                           </div>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="postgrad_graduated" value="<?php echo $data["postgrad_graduated"] ?>"></input>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Degree:</label>
                           <div class="col-lg-3">
                              <input type="text" class="form-control" name="postgrad_degree" value="<?php echo $data["postgrad_degree"] ?>"></input>
                           </div>
                        </div>
                      </fieldset>
                  </div>
               </section>
            </div>
            <div class="col-lg-12">
               <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Employment Record</h5></legend>
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
                  </fieldset>
               </div>
               </section>
            </div>
            <div class="col-lg-12">
               <section class="panel">
                  <div class="panel-body">
                     <fieldset>
                        <legend><h5>Character Reference</h5></legend>
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
                     </fieldset>
                  </div>
               </section>
            </div>
            <div class="col-lg-12">
               <input type="button" style ="width: 80px;" class="pull-left btn btn-success"  value="Cancel"></a>
               <input class="pull-right btn btn-success" name="add_201" type="submit" value="Submit">
            </div>
         <?php } ?>
      <?php echo form_close(); ?>
   </div>
</div>