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
                <span style="font-size:36px;"><?php echo $employee ?></span>
                <p><strong>No of Employees</strong></p>
              </div>
      			</section>
      		</div>
          <div class="col-lg-3 col-sm-6">
            <section class="panel">
              <div class="symbol red">
                <i class="fa fa-tags"></i>
              </div>
              <div class="value">
                <span style="font-size:36px;"><?php echo $leaves ?></span>
                <p><strong>No of Leaves not yet Approved</strong></p>
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
                <p><strong>No of Items</strong></p>
              </div>
            </section>
          </div>
          <div class="col-lg-3 col-sm-6">
            <section class="panel">
              <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
              </div>
              <div class="value">
                <span style="font-size:36px;"><?php echo $activity ?></span>
                <p><strong>No of Activities</strong></p>
              </div>
            </section>
          </div>
      </div>
      <!-- user info -->
      <div class="row">
        <div class="col-lg-3">
          <section class="panel">
            <div class="panel-body">
              <div class="task-thumb-details">
                <h1>Leave Requests</h1>
              </div>
            </div>
            <table class="table table-hover personal-task">
            <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($leave_request as $data){ ?>
                <tr>
                  <td><?php echo $data['first_name']." ".$data['last_name'] ?></td>
                  <td><?php echo $data['type'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </section>
        </div>

        <div class="col-lg-3">
          <section class="panel">
            <div class="panel-body">
              <div class="task-thumb-details">
                <h1>Ot Requests</h1>
              </div>
            </div>
            <table class="table table-hover personal-task">
                 <thead>
                <tr>
                  <th>Name</th>
                  <th>Total Hours</th>
                </tr>
              </thead> 
              <tbody>
                <?php foreach($ot_forms as $data){ ?>
                <tr>
                  <td><?php echo $data['first_name']." ".$data['last_name'] ?></td>
                  <td><?php echo $data['total_hours'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </section>
        </div>

        <div class="col-lg-6">
          <section class="panel">
            <div class="panel-body progress-panel">
              <div class="task-progress">
                <h1>Items to be Claimed</h1>
              </div>
            </div>
            <table class="table table-hover personal-task">
              <thead>
                <tr>
                  <th>Claimed By</th>
                  <th>Item Name</th>
                  <th>Claimed On</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($claimInfo as $data){ ?>
                <tr>
                  <td><?php echo $data['first_name'] ." ".$data['last_name'] ?></td>
                  <td><?php echo $data['item'] ?></td>
                  <td><?php echo $data['date'] ?></td>
                  <td style="text-align:left">
                    <?php if($data['status']==0){ ?>
                      <button class="btn btn-success btn-xs" id="confirm" data_attr="<?php echo $data['claim_history_id'] ?>">Confirm</button>
                    <?php } else { ?>
                      <span class="badge bg-info">Claimed!</span>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </section>
        </div>

      </div>
  </section>
</section>