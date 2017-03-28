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
                                    <div class="col-lg-6">
                                      <div id="editable-sample_length" class="dataTables_length">
                                        <label>
                                        <select size="1" name="editable-sample_length" aria-controls="editable-sample" class="form-control xsmall">
                                          <option value="5" selected="selected">5</option>
                                          <option value="15">15</option>
                                          <option value="20">20</option>
                                          <option value="-1">All</option>
                                        </select> records per page</label>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="dataTables_filter" id="editable-sample_filter">
                                        <label>Search: <input type="text" aria-controls="editable-sample" class="form-control medium"></label>
                                      </div>
                                    </div>
                                  </div>
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i> Name of Client</th>
                                        <th><i class="fa fa-bullhorn"></i> Company Name</th>
                                        <th><i class="fa fa-bullhorn"></i> Position</th>
                                        <th><i class="fa fa-phone"></i> Contact No.</th>
                                        <th><i class="fa fa-envelope"></i> Email</th>
                                        <th><i class="fa fa-cog"></i> Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($list_clients as $listC) { ?>
                                    <tr>
                                        <td><?php echo $listC['contact_name']; ?></td>
                                        <td><?php echo $listC['company_name']; ?></td>
                                        
                                        <td><?php echo $listC['position']; ?></td>
                                        <td>
                                          <?php 
                                          $breakDownCont = explode(',',  $listC['contact_no']);
                                          $count_cont = count($breakDownCont);
                                         ?>
                                          <ul>
                                           <?php  if($count_cont>0) { ?>
                                            <?php for($z=0;$z<$count_cont;$z++){  ?>
                                              <li>
                                                  <?php if($z!=1){ ?><i class='fa fa-mobile' title="Cellular Phone Number"></i><?php }else{ ?><i class='fa fa-phone' title="Tel. Number"></i><?php } ?>&nbsp;<small class="text-info"><?php echo $breakDownCont[$z]; ?></small>
                                              </li>
                                            <?php } ?>
                                          <?php } ?>
                                        </ul>
                                        </td>
                                        <td>
                                          <?php 
                                          $breakDown = explode(',', $listC['email']);
                                          $count_file = count($breakDown);
                                        ?>
                                        <ul>
                                           <?php  if($count_file>0) { ?>
                                            <?php for($i=0;$i<$count_file;$i++){  ?>
                                              <li>
                                                  <?php if($i==0){ ?><i class="fa fa-user" title="personal email"></i>
                                                  <?php } if($i==1){ ?><i class="fa fa-cog" title="work email"></i><?php } 
                                                  ?>&nbsp; <small class="text-info"><i class='fa fa-mail'></i><?php echo $breakDown[$i]; ?></small>
                                              </li>
                                            <?php } ?>
                                          <?php } ?>
                                        </ul>
                                        </td>
                                        <td>
                                          <button class="btn btn-default btn-xs edit_client" data_attr="<?php echo $this->encrypt->encode($listC['client_id']); ?>" data-toggle="modal" data-target="#edit_clients" title="edit"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-danger btn-xs delete_client" mAtt="<?php echo $this->encrypt->encode($listC['client_id']); ?>" title="trash"><i class="fa fa-trash-o "></i></button>
                                        </td>
                                    </tr>
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
      