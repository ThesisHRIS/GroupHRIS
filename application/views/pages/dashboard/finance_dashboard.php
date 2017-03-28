<!--main content start-->
<section id="main-content">
  <section class="wrapper">
        <!--state overview start-->
        <div class="row state-overview">
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="fa fa-percent"></i>
                    </div>
                    <div class="value">
                       <?php 
                        $total=0;
                        $total1=0;
                        foreach ($fetchAll as $all) {
                          if($all['date_collected']=="0000-00-00"){
                            $total=$total+$all['amount'];
                          }else{
                            $total1=$total1+$all['amount_collected'];
                          }
                        }
                      ?>
                        <h1 class="count" attrs="">
                            
                        </h1>
                        <p>percent of sale over quota</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="value">
                     
                        <h1 class="count2" attrs="<?php echo $total?>">
                            0
                        </h1>
                        <p> Total Amount of Unbilled Project </p>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class=" fa fa-usd"></i>
                    </div>
                    <div class="value">
                        
                        <h1 class="count3" attrs="<?php echo $total1?>">
                            0
                        </h1>
                        <p> total of collected_amount</p>
                    </div>
                </section>
            </div>
        </div>
              <!--state overview end-->
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
            <!--custom chart start-->
            <div class="border-head">
                <h3>Percentage of Sales over Quota</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                  <li><span>100</span></li>
                  <li><span>80</span></li>
                  <li><span>60</span></li>
                  <li><span>40</span></li>
                  <li><span>20</span></li>
                  <li><span>0</span></li>
              </ul>
              <div class="bar">
                  <div class="title">JAN-MAR</div>
                  <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
              </div>
              <div class="bar ">
                  <div class="title">APR-JUNE</div>
                  <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
              </div>
              <div class="bar ">
                  <div class="title">JUL-SEPT</div>
                  <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
              </div>
              <div class="bar ">
                  <div class="title">OCT-DEC</div>
                  <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
              </div>
            </div>
          <!--custom chart end-->
          </div>
        </div>
  </section>
</section>