<section id="main-content">
            <section class="wrapper site-min-height">
               <!-- page start-->
               <section class="panel">
                  <header class="panel-heading">
                     List of Sales
                  </header>
                  <div class="panel-body">
                     <div class="adv-table editable-table ">
                        <div class="clearfix">
                          <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
                           
                        </div>
                        
                          
                        <div class="space15"></div>
                        <div class="row">
                                    
                               <div id="editable-sample_length" class="dataTables_length">
                              
                     </div>
                      <table class="table table-striped table-hover table-bordered" id="editable-sample">
                       <!-- <table class="table table-striped table-advance table-hover"> -->
                           <thead>
                              <tr>
                                 Company Name
                                 <th><i class="fa fa-building"></i>Company Name</th>
                                 <th><i class="fa fa-bullhorn">Project Name</th>
                               
                                 <th><i class="fa fa-money">Value</th>
                                 <th><i class="fa fa-check"></i>Status</th>
                                 <th><i class="fa fa-cog"></i>Option</th>
                                 
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="">
                              <?php
                                 foreach ($fetchSaleList as $value) {
                                   ?>
                                   <td><?php  echo $value['company_name']?></td>
                                   <td><?php  echo $value['project_name']?></td>
                                   <td><?php  echo number_format($value['amount'],2)?></td>
                                   <td><?php  echo $value['status']?></td>
                                    <td><button class="btn btn-default btn-xs edit_sale" data_attr="<?php echo $this->encrypt->encode($value['sales_id']); ?>" data-toggle="modal" data-target="#edit_sale" title="edit"><i class="fa fa-pencil"></i></button>
                                     <button class="btn btn-danger btn-xs delete_sale" mAtt="<?php echo $this->encrypt->encode($value['sales_id']); ?>" title="trash"><i class="fa fa-trash-o "></i></button>
                                   </td>
                                 </tr>
                                   <?php
                                 }
                              ?>
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

         <!--footer end-->
      </section>