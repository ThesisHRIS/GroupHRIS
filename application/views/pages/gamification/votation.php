<div id="main-content">
   <!-- Main Content Section with everything -->
   <div class="wrapper">
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading">
                  <h4>My Activities</h4>
               </header>
               <table class="table table-striped table-advance table-hover">
                  <thead>
                     <tr>
                        <th>Activity Name</th>
                        <th>Current Points</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <?php foreach($activity as $data){ ?>
                        <td><?php echo $data['activity_name'] ?></td>
                        <td><?php echo $data['points'] ?></td>
                     </tr>
                     <?php }?>
                  </tbody>
               </table>
            </section>
         </div>
      </div>
   </div>
</div>s