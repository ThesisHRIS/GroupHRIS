<section id="main-content">
<section class="wrapper site-min-height">
<!-- page start-->
<section class="panel">
<section class="panel">
   <div class="head">
      <ul class="nav nav-tabs nav-justified ">
         <li class="active">
            <a href="#popular" data-toggle="tab">
            Paid
            </a>
         </li>
         <li>
            <a href="#comments" data-toggle="tab">
            Future
            </a>
         </li>
      </ul>
   </div>
   <div class="panel-body">
   <div class="tab-content tasi-tab">
   <div class="tab-pane active" id="popular">
      <div class="panel-body">
         <div class="adv-table editable-table ">
            <div class="clearfix">
            </div>
            <div class="space15"></div>
            <table class="table table-striped table-hover table-bordered">
               <thead>
                  <h3>Paid Out : Pvalue</h3>
                  <tr>
                     <div class="datesDrop">
                        <div class="divide">
                           <label>Year:</label>
                           <select class="form-control _year">
                              <?php
                                 for ($i=2000; $i <2100 ; $i++) { 
                                   ?> 
                              <option value="<?php echo $i;?>"><?php echo $i?></option>
                              <?php
                                 }
                                 ?>
                           </select>
                        </div>
                        <div class="divide">
                           <label>From:</label>
                           <select class="form-control _from">
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                           </select>
                        </div>
                        <div class="divide">
                           <label>To:</label>
                           <select class="form-control _to">
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                           </select>
                        </div>
                        <div class="filter">
                           <label> <br></label>
                           <button type="button"  class="btn btn-primary _filter">filter</button>
                        </div>
                     </div>
                  <tr>
                     <th>Date</th>
                     <th>Project Name</th>
                     <th>Payment Term Description</th>
                     <th>Amount</th>
                  </tr>
               </thead>
               <tbody id="tbody">
                  <tr>
                     <?php
                        foreach ($fetchpayment as $value) {
                          if($value['date_collected']!="0000-00-00"){
                            ?>
                     <td><?php echo $value['date_collected']?></td>
                     <td><?php echo $value['project_name']?></td>
                     <td><?php echo $value['description']?></td>
                     <td><?php echo number_format($value['amount_collected'],2)?></td>
                  </tr>
                  <?php
                     }                           }
                     ?>     
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div class="tab-pane" id="comments">
      <div class="panel-body">
         <div class="adv-table editable-table ">
            <div class="clearfix">
            </div>
            <div class="space15"></div>
            <table class="table table-striped table-hover table-bordered" id="editable-sample">
               <thead>
                  <h3>Future : Pvalue</h3>
                  <tr>
                  <tr>
                     <th>Project Name</th>
                     <th>Payment Term Description</th>
                     <th>Amount</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <?php
                        foreach ($fetchpayment as $value) {
                          if($value['date_collected']=="0000-00-00"){
                            ?>
                     <td><?php echo $value['project_name']?></td>
                     <td><?php echo $value['description']?></td>
                     <td><?php echo number_format($value['amount_collected'],2)?></td>
                  </tr>
                  <?php
                     }                           }
                     ?>     
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>
