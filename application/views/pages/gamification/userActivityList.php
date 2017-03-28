<div id="main-content">
   <!-- Main Content Section with everything -->
   <div class="wrapper">
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading">
                  <h4>Activity List</h4>
               </header>
               <table class="table table-striped table-advance table-hover">
                  <thead>
                     <tr>
                        <th>Activity Name</th>
                        <th>Activity Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <?php 
                           if(!empty($activity)){
                           foreach($activity as $data){
                              $count='0';
                              foreach ($history as $list) {
                                 if($list['activity_id'] === $data['id']){
                                    $count='1';
                                 }
                              }
                        ?>
                        <?php if($count === '1'){?>
                        <td><?php echo $data['activity_name'] ?></td>
                        <td><?php echo $data['activity_date'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <td>
                              <?php if($data['status']=='Ongoing' || $data['status']=='Preparing Game'){ ?>
                              <button readonly class="btn btn-warning btn-xs" data-toggle="modal" data-target="#generateList" title="Generate">
                                 <i class="fa fa-check"></i> Already joined
                              </button>
                              <?php } else {?>
                                 <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#generateList" title="Status" >
                                    <i class="fa fa-check-square-o"></i> Game Has Ended!
                                 </button>
                              <?php } ?>
                        </td>
                        <tr>
                        <?php }else{ ?>
                        <td><?php echo $data['activity_name'] ?></td>
                        <td><?php echo $data['activity_date'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <td>
                           <?php if($data['status']=='Ongoing') {?>
                              <button class="btn btn-default btn-xs joinOngoing" data-toggle="modal" data-target="#generateList" title="Generate">
                           		<i class="fa fa-check"></i> Join
                              </button>
                           <?php } else if($data['status']=='Preparing Game'){ ?>
                              <button class="btn btn-success btn-xs joinGame" data_attr="<?php echo $data['id'] ?>" data-toggle="modal" data-target="#generateList" title="Generate">
                                 <i class="fa fa-check"></i> Join
                              </button>
                           <?php } else {?>
                              <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#generateList" title="Status" >
                                 <i class="fa fa-check-square-o"></i> Game Has Ended!
                              </button>
                           <?php } ?>
                        </td>
                     </tr>
                     <?php }}} ?>
                  </tbody>
               </table>
            </section>
         </div>
      </div>
   </div>
</div>s