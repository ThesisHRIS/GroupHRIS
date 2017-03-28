<div id="main-content">
   <div class="wrapper">
     <form name="update201" class="form-horizontal update201"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <section class="panel">
               <header class="panel-heading">
                  <h4>Information Form</h4>
               </header>

               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Personal Information</h5></legend>
                     <?php foreach ($data as $info) {?>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Employee No:</label>
                        <div class="col-lg-2">
                           <input type="text" class="form-control" name="emp_no" placeholder="e.g.(123456)" required value="<?php echo $info['emp_no'] ?>"></input>
                           <input type="hidden"  class="form-control" name="emp_id" placeholder="e.g.(123456)" required value="<?php echo $emp_id ?>"></input>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Status</label>
                        <div class="col-lg-2">
                           <select class="form-control" name="status">
                              <?php if(strtoupper($info['status']) === 'ACTIVE'){?>
                              <option selected value="Active">Active</option>
                              <option value="Not Active">Not Active</option>
                              <?php }else{ ?>
                              <option value="Active">Active</option>
                              <option value="Not Active">Not Active</option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Company:</label>
                        <div class="col-lg-2">
                           <select name="company" class="form-control m-bot15"required >
                              <?php foreach ($company as $list ){ if($list['company_id']===$list['company_id']){?>
                                 <option selected value="<?php echo $list['company_id']?>"><?php echo $list['company_name'] ?></option>
                              <?php }else{?>
                              <option  value="<?php echo $list['company_id']?>"><?php echo $list['company_name'] ?></option>
                              <?php } } ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Legal Name:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $info['last_name']?>" name="last_name" required></input>
                        </div>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="First Name" value="<?php echo $info['first_name']?>"  name="first_name" required></input>
                        </div>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="Middle Name" value="<?php echo $info['middle_name']?>"  name="middle_name" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"><label style="color:red">*</label>Date of Birth:</label>
                        <div class="col-lg-3">
                           <input class="form-control" name="birth_date" value="<?php echo $info['birth_date']?>"  type="date" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-lg-4">
                           <label class="col-sm-2 control-label col-lg-2">Status:</label>
                              <div class="col-lg-10">
                                 <label class="checkbox-inline">
                                    <?php if($info['civil_status']==='Single'){?>
                                    <input type="radio" name="civil_status" checked value="Single">Single</input>
                                    <input type="radio"  name="civil_status" value="Married">Married</input>
                                    
                                 </label>
                                 <label class="checkbox-inline">
                                    <?php }else{?>
                                   <input type="radio" name="civil_status"  value="Single">Single</input>
                                    <input type="radio"  name="civil_status" checked value="Married">Married</input>
                                    
                                 </label>
                                 <?php } ?>
                              </div>
                        </div>
                        <div class="col-lg-4">
                           <label class="col-sm-2 control-label col-lg-2">Gender:</label>
                              <div class="col-lg-10">
                                 <label class="checkbox-inline">
                                    <?php if($info['gender']==='1'){?>
                                    <input type="radio" name="gender" value="1"checked>Male</input>
                                    <input type="radio" name="gender" value="2">Female</input>  
                                 </label>
                                 <label class="checkbox-inline">
                                    <?php }else{?>
                                    <input type="radio" name="gender" value="1"checked>Male</input>
                                    <input type="radio" name="gender" value="2">Female</input>
                                    <?php }?>
                                 </label>
                              </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Place of Birth:</label>
                        <div class="col-lg-2">
                           <input type="text" class="form-control" value="<?php echo $info['birth_place']?>" placeholder="..." name="birth_place" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Nationality:</label>
                        <div class="col-lg-2" style="margin-left: -5%">
                           <input type="text" class="form-control" value="<?php echo $info['nationality']?>"  placeholder="..." name="nationality" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Religion:</label>
                        <div class="col-lg-2" style="margin-left: -7%">
                           <input type="text" class="form-control" value="<?php echo $info['religion']?>"  placeholder="..." name="religion" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Email Address:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['email']?>"  placeholder="email@example.com" name="email" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Mobile Number:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="(+63)" value="<?php echo $info['mobile']?>"  name="mobile" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Home Address:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..." value="<?php echo $info['address']?>"  name="address" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Phone Number:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="(+32)" value="<?php echo $info['phone']?>"  name="phone" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="ol-sm-2 control-label col-lg-2">No. of Children</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['children']?>"  name="children">
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>SSS No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..."  value="<?php echo $info['sss']?>"  name="sss" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Tin No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['tin']?>"  name="tin" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>PhilHealth No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" placeholder="..." value="<?php echo $info['philhealth']?>"  name="philhealth" required>
                           </input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Pag Ibig No.:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['pag_ibig']?>"  name="pag_ibig" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Tax Status:</label>
                        <div class="col-lg-2">
                           <select name="tax_status" class="form-control" required>
                             <?php foreach ($tax_status as $list ){ if($tax_status['tax_id']===$info['tax_status']){?>
                                 <option  selected value="<?php echo $list['tax_id']?>"><?php echo $list['tax_status'] ?></option>
                              <?php }else{ ?>
                              <option  value="<?php echo $list['tax_id']?>"><?php echo $list['tax_status'] ?></option>
                              <?php }}?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Position:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['position']?>" placeholder="..." name="position" required>
                           </input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Department:</label>
                        <div class="col-lg-2">
                           <select name="department" class="form-control">
                              <?php foreach ($department as $list ){ if($list['department_id'] === $info['department']){?>
                                 <option  selected value="<?php echo $list['department_id']?>"><?php echo $list['department_name'] ?></option>
                              <?php }else{  ?>
                               <option  value="<?php echo $list['department_id']?>"><?php echo $list['department_name'] ?></option>
                               <?php }} ?>
                           </select>
                        </div>
                        
                        <label class="col-sm-2 control-label col-lg-2">Supervisor:</label>
                        <div class="col-lg-2" style="margin-left: -5%">
                           <select name="supervisor_id" class="form-control">
                             <?php foreach ($supervisor as $list ){ if($list['supervisor_id'] === $info['supervisor_id']){?>
                                 <option  selected value="<?php echo $list['supervisor_id']?>"><?php echo $list['supervisor_last_name']?></option>
                              <?php }else{  ?>
                              <option  value="<?php echo $list['supervisor_id']?>"><?php echo $list['supervisor_last_name']?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hired Date:</label>
                        <div class="col-lg-2">
                           <input type="date" class="form-control" value="<?php echo $info['hire_date']?>" name="hire_date" required></input>
                        </div>
                     </div>
            </section>
            <section class="panel">
            </section>
            <section class="panel">
               <div class="panel-body">
                  <fieldset>
                     <legend><h5>Salary Information</h5></legend>
                     <?php $Salary = explode(' ',$this->encrypt->decode($info['basic']));?>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Basic:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="basic" value="<?php echo $Salary[0]?>" required></input>
                           <!-- <input type="hidden"  class="form-control" name="paystart" value="<?php echo $info['pay_start']?>" required></input> -->
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>ECOLA:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="ecola" value="<?php echo $info['ecola']?>" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Other:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['other']?>" name="other"></input>
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
                           <input type="text" value="<?php echo $info['spouse_name']?>" class="form-control" name="spouse_name"></input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2">Occupation:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['spouse_job']?>" name="spouse_job"></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2">Company:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" value="<?php echo $info['spouse_company']?>" name="spouse_company"></input>
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
                           <input type="text" class="form-control" value="<?php echo $info['contact_emergency']?>" name="contact_emergency" required></input>
                        </div>
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Relationship:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="contact_relation" value="<?php echo $info['contact_relation']?>" required></input>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label col-lg-2"><label style="color:red">*</label>Contact Number:</label>
                        <div class="col-lg-3">
                           <input type="text" class="form-control" name="contact_number" value="<?php echo $info['contact_number']?>"required></input>
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
                        <input type="text" class="form-control" value="<?php echo $info['elementary']?>" name="elementary"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['elem_address']?>" name="elem_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['elem_graduated']?>" name="elem_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">High School:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['highschool']?>" name="highschool"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['hs_address']?>" name="hs_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['hs_graduated']?>" name="hs_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Vocational:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control"value="<?php echo $info['vocational']?>" name="vocational"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['voc_address']?>" name="voc_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['voc_graduated']?>" name="voc_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Course:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['voc_course']?>" name="voc_course"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">College:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control"value="<?php echo $info['college']?>"  name="college"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['col_address']?>" name="col_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['col_graduated']?>" name="col_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Course:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['col_course']?>"  name="col_course"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Post-Graduate:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['post_graduate']?>" name="post_graduate"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['postgrad_address']?>" name="postgrad_address"></input>
                     </div>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['postgrad_graduated']?>" name="postgrad_graduated"></input>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Degree:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control" value="<?php echo $info['postgrad_degree']?>" name="postgrad_degree"></input>
                     </div>
                  </div>
               </div>
            </section>
           
            <a href="<?php echo base_url().'View_201'?>" type="button" style ="width: 80px;" class="pull-left btn btn-success cancel_201" >Back</a>
           <button class="pull-right btn btn-success update201file" name="add_201" type="button">Update</button>
      <?php echo form_close(); ?>
   </div>
</div>
<?php } ?>
