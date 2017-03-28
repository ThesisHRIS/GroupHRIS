<div id="main-content">
   <!-- Main Content Section with everything -->
   <div class="wrapper">
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading">
               <div class="pull-right">
                     <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addActivity" title="Add Activity" > 
                        <i class="fa fa-plus"></i> Add Activity
                     </button>
                  </div>
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
                              
                           ?>
                        <td><?php echo $data['activity_name'] ?></td>
                        <td><?php echo $data['activity_date'] ?></td>
                        <td><?php echo $data['status'] ?></td>
                        <td>
                           <?php if($data['status']=='Preparing Game'){ ?>
                              <a href="" class="btn btn-success btn-xs startActivity" data_attr="<?php echo $data['id']; ?>" data-toggle="modal" data-target="" title="edit">
                                 <i class="fa fa-check"></i> Start Game
                              </a>
                           <?php } else if($data['status']=='Ongoing'){?>
                              <button class="btn btn-danger btn-xs endActivity" data_attr="<?php echo $data['id']; ?>" data-toggle="modal" data-target="" title="End">
                                 <i class="fa fa-times"></i> End Game
                              </button>
                           <?php } else {?>
                              <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#generateList" title="Status" >
                                 <i class="fa fa-check-square-o"></i> Game Has Ended!
                              </button>
                           <?php } ?>
                        </td>
                     </tr>
                     <?php }} ?>
                  </tbody>
               </table>
            </section>
         </div>
      </div>
   </div>
</div>