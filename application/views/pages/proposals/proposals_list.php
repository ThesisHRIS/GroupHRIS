
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">
                            <section class="panel dataTables_wrapper form-inline">
                                <header class="panel-heading">List Of Proposals</header>
                                <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
                                  <div class="row">
                                    
                               <div id="editable-sample_length" class="dataTables_length">
                              
                     </div>
                      <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                               <th><i class="fa fa-sort-numeric-asc"></i> Quotation #</th>
                                        <th><i class="fa fa-calendar"></i> Date Sent</th>
                                        <th><i class="fa fa-user"></i> Client Name</th>
                                        <th><i class="fa fa-barcode"></i> Project Name</th>
                                        <th><i class="fa fa-money"></i> Amount</th>
                                        <th><i class="fa fa-download"></i> Download</th>
                                        <th><i class="fa fa-cog"></i>Option</th>
                                        <th><i class="fa fa-eye"></i>View Proposals</th>
                                        <th><i class="fa fa-calendar"></i>Date Created</th>
                                        <th><i class="fa fa-calendar"></i>Date Modified</th>
                           
                              </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($list_proposals as $list) { if($list['delete_status']!='1'){?>
                              
                                    <tr>
                                        <td ><?php echo $list['proposals_id']+1000; ?></td>
                                        <td><?php echo $list['date_sent']; ?></td>
                                        <td><?php echo $list['contact_name']; ?></td>
                                        <td><?php echo $list['project_name']; ?></td>
                                        <td>Php <?php echo number_format($list['amount'],2); ?></td>
                                        <td><a href="<?php echo "uploads/".$list['folder_name']."/".$list['filename']?>"><?php echo $list['filename']; ?></td>
                                        <?php //if($list['status']=='1'){?>
                                        <!--<td><button class="btn btn-default btn-xs  edit_OnSale" data_attr="<?php echo $this->encrypt->encode($list['proposals_id']); ?>" data-toggle="modal" data-target="#edit_proposalsOnSale" title="edit"><i class="fa fa-pencil"></i></button>
                                        -->
                                        <?php //} else{?>
                                         <td><button class="btn btn-default btn-xs edit_Proposals" data_attr="<?php echo $this->encrypt->encode($list['proposals_id']); ?>" data-toggle="modal" data-target="#edit_proposals" title="edit"><i class="fa fa-pencil"></i></button>
                                        <?php //}?>
                                     <button class="btn btn-danger btn-xs delete_proposals" mAtt="<?php echo $this->encrypt->encode($list['proposals_id']); ?>" title="trash"><i class="fa fa-trash-o "></i></button>
                                   </td>
                                   <td><button class="btn btn-default btn-xs view_proposals" data_attr="<?php echo $this->encrypt->encode($list['proposals_id']); ?>" data-toggle="modal" data-target="#view_proposals" title="see"><i class="fa fa-eye"></i></button></td>
                                    <td><?php echo $list['date_created']; ?></td>
                                    <td><?php echo $list['date_lastModified']; ?></td>
                                    <!-- <td><input type='text'  hidden value="<?php echo $list['status']; ?>" class="status"></td> -->
                                    </tr>
                                   
                                    <?php } }?>
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
    