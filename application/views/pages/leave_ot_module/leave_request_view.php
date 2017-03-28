    <script type="text/javascript">
   function confirm_action(id, action){
   	if(action == 1){
   		if(confirm("Are you sure you want to approve this Leave request?")){
   			window.location="leave_list.php?approve="+id;
   		}
   	}else{
   		if(confirm("Are you sure you want to reject this Leave request?")){
   			window.location="leave_list.php?reject="+id;
   		}
   	}
   }
</script>

<?php
$to = "somebody@example.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>


<div id="main-content">
   <div class="wrapper">
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading">
                  <h4>Leave Requests</h4>
               </header>
               <table class="table table-striped table-advance table-hover">
                  <thead>
                     <tr>
                        <th>Employee Name</th>
                        <th>Date Filed</th>
                        <th>Leave Date(s)</th>
                        <th>No. of days</th>
                        <th>Leave Type</th>
                        <th>Reason</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php 
                     if(!empty($leaverequest)){
                        foreach($leaverequest as $data){
                  ?>
                     <tr>
                        <td><?php echo $data['first_name'].' '.$data['last_name'] ?></td>
                        <td><?php echo $data['date_filed']?></td>
                        <td><?php echo $data['start_date'].' - '.$data['end_date'] ?></td>
                        <td><?php echo $data['days']?></td>
                        <td><?php echo $data['type']?></td>
                        <td><?php echo $data['comments']?></td>
                        <td>
                           <button class="btn btn-success btn-xs approved" data_attr="<?php echo $this->encrypt->encode($data['leave_id']); ?>" data-toggle="modal" data-target="#approved" title="edit">
                              <i class="fa fa-check"></i>
                           </button>
                           <button class="btn btn-danger btn-xs leaveDecline" data_attr="<?php echo $this->encrypt->encode($data['leave_id']); ?>" data-toggle="modal" data-target="#declinedLeave" title="edit">
                              <i class="fa fa-times"></i>
                           </button>
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



