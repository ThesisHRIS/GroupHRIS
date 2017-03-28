<!--main content start-->
<section id="main-content">
   <section class="wrapper site-min-height">
      <!-- page start-->
      <section class="panel">
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel dataTables_wrapper form-inline">
                     <header class="panel-heading">List Of Client</header>
                     <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
                     <div class="row">
                
                           <div id="editable-sample_length" class="dataTables_length">
                               <div class="select" style="float:left;margin-left:4%;">
                              <label>CLIENT:&nbsp;</label>
                             <select class="billClient">
                              <option>SELECT</option>
                                 <?php foreach ($fetchAll as $listC) { 
                                  if($listC['date_collected']!="0000-00-00"){
                                  ?>
                                 <option><?php echo $listC['contact_name']; ?></option>
                                 <?php } }?>
                             </select>
                             </div>
                             <div class="select" style="float:left;margin-left:4%;">
                             <label>PROJECT :&nbsp;</label>
                             <select class="quotationSel">
                              
                             </select>
                             </div>
                            
                           </div>
                     
                     </div>
                     <div id="editable-sample_length" class="dataTables_length">
                              
                     </div>
                      <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                           <tr>
                              <th><i class="fa fa-user"></i> Bill NO.</th>
                              <th><i class="fa fa-bullhorn"></i> Description</th>
                              <th><i class="fa fa-bullhorn"></i> Percentage </th>
                              <th><i class="fa fa-phone"></i> Date Collected</th>
                              <th><i class="fa fa-envelope"></i>Date Billed</th>
                              <th><i class="fa fa-cog"></i> qb_ref_no</th>
                              <th><i class="fa fa-cog"></i> downloads</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($fetchCollection as $listC) { 
                          $count=0;
                          if($count==10){
                            break;
                          }
                          if($listC['date_collected']!='0000-00-00'){
                            $file_names= explode(',',$listC['filename']);
                            // print_r($file_names);
                            $count++;
                          ?>

                           <tr>
                              <td><?php echo $listC['payment_terms_id']; ?></td>
                              <td><?php echo $listC['description']; ?></td>
                              <td><?php echo $listC['percentage']; ?></td>
                              <td><?php echo $listC['date_collected']; ?></td>
                              <td><?php echo $listC['date_billed']; ?></td>
                              <td><?php echo $listC['qb_ref_no']; ?></td>
                              <td>Invoice Copy:<a href ="<?php echo "uploads/".$listC['folder_name']."/".$file_names[0]?>"><?php echo $file_names[0] ?></a><br>
                                  Check Copy:<a href ="<?php echo "uploads/".$listC['folder_name']."/".$file_names[1]?>"><?php echo $file_names[1] ?></a><br>
                                  Deposit Slip : <a href ="<?php echo "uploads/".$listC['folder_name']."/".$file_names[2]?>"><?php echo $file_names[2] ?></a><br>
                              </td>
                           </tr> 
                           
                           <?php }?>
                           <?php } ?>
                        </tbody>
                     </table>
                  </section>
               </div>
            </div>
         </div>
      </section>
      <!-- page end-->
   </section>
</section>