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
                              
                     </div>
                      <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                              <th><i class="fa fa-user"></i> Seller Name</th>
                              <th><i class="fa fa-bullhorn"></i> Project Name</th>
                              <th><i class="fa fa-bullhorn"></i> Payment Details </th>
                              <th><i class="fa fa-phone"></i> Date Collected</th>
                              <th><i class="fa fa-envelope"></i>Commission Rate</th>
                              <th><i class="fa fa-cog"></i> Commission Amount</th>
                           
                              </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($fetchAll as $listC) {
                                if($listC['date_collected']!="0000-00-00"){
                          ?>

                           <tr>
                              <td><?php echo $listC['contact_name']; ?></td>
                              <td><?php echo $listC['project_name']; ?></td>
                              <td><?php echo $listC['description']; ?></td>
                              <td><?php echo $listC['date_collected']; ?></td>
                              <td><?php echo $listC['percent_commission']."%"; ?></td>
                              <td><?php echo $listC['amount_collected']*($listC['percent_commission']/100) ?></td>
                                
                           </tr> 
                           <?php } } ?>
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