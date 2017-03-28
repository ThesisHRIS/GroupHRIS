<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <div class="rotate state-overview">
         <div class="col-lg-3 col-sm-6">
            <section class="panel">
               <div class="symbol terques">
                  <i class="fa fa-user"></i>
               </div>
               <div class="value">
                  <span style="font-size:36px;"><?php echo $preparedGames ?></span>
                  <p>Prepared Activities</p>
               </div>
            </section>
         </div>
         <div class="col-lg-3 col-sm-6">
            <section class="panel">
               <div class="symbol red">
                  <i class="fa fa-tags"></i>
               </div>
               <div class="value">
                  <span style="font-size:36px;"><?php echo $ongoingGames ?></span>
                  <p>Ongoing Activities</p>
               </div>
            </section>
         </div>
         <div class="col-lg-3 col-sm-6">
            <section class="panel">
               <div class="symbol yellow">
                  <i class="fa fa-shopping-cart"></i>
               </div>
               <div class="value">
                  <span style="font-size:36px;"><?php echo $items ?></span>
                  <p>Items</p>
               </div>
            </section>
         </div>
         <div class="col-lg-3 col-sm-6">
            <section class="panel">
               <div class="symbol blue">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="value">
                  <span style="font-size:36px;"><?php foreach($points as $data){ echo $data['points']; } ?></span>
                  <p>Total Points</p>
               </div>
            </section>
         </div>
      </div>
      <!-- user info -->
      <div class="row">
         <div class="col-lg-8">
            <section class="panel">
               <header class="panel-heading">
                  <h4>Prices List</h4>
               </header>
               <table class="table table-striped table-advance table-hover">
                  <thead>
                     <tr>
                        <th>Item Name</th>
                        <th>Points to gain</th>
                        <th>Image</th>
                        <th>Claim</th>
                     </tr> 
                  </thead>
                  <tbody>
                     <?php 
                        if(!empty($item)){
                        foreach($item as $data){
                     ?>
                     <tr>
                        <td><?php echo $data['item'] ?></td>
                        <td><?php echo $data['points'] ?></td>
                        <td><img  style = "width: 100px;height: 100px;" src="<?php echo 'uploads/'.$data['folder'].'/'.$data['path'] ?>"></td>
                        <td>
                           <?php foreach($pointOwner as $points){ 
                              if($points['points'] > $data['points']){
                           ?>
                              <button class="btn btn-success btn-sm" id="claimPrice" data_attr="<?php echo $data['id'] ?>">Claim</button>
                           <?php } else { ?>
                              Need more points to gain this item
                           <?php }} ?>
                        </td>
                     </tr>
                     <?php }}?>
                  </tbody>
               </table>
            </section>
         </div>
         <div class="col-lg-4">
            <section class="panel">
               <div class="panel-body progress-panel">
                  <div class="task-progress">
                     <h3>Top 10 Players</h3>
                  </div>
               </div>
               <table class="table table-hover personal-task">
                  <tbody>
                     <?php foreach($topten as $data){ ?>
                     <tr>
                        <td><?php echo $data['first_name'];?></td>
                        <td><?php echo $data['last_name']; ?></td>
                        <td><span class="badge bg-success"><?php echo $data['points']; ?></span></td>
                        <td><button class="btn btn-info btn-xs"><i class="fa fa-arrow-up"></i></button></td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </section>
         </div>
      </div>
   </section>
</section>