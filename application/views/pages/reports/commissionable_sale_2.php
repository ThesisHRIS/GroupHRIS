<section id="main-content">
  <section class="wrapper site-min-height">
    <section class="panel">
        <div class="head">
          <ul class="nav nav-tabs nav-justified ">
            <li class="active">
              <a href="#paid" data-toggle="tab">
                  Paid
              </a>
            </li>
            <li>
              <a href="#future" data-toggle="tab">
                Future
              </a>
            </li>
          </ul>
        </div>        
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div class="tab-pane active" id="paid">
              <div class="panel-body">
                <div class="adv-table editable-table ">
                  <div class="clearfix"></div>
                  <div class="space15"></div>
                  <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                      <h3>Paid Out : Pvalue</h3>
                      <tr>
                        <form>
                        <div class="datesDrop">
                          <div class="col-lg-3 pull-left">
                            <label>Year:</label>
                            <select class="form-control" id="year" name="year">
                            <?php $yr_now = date("Y"); ?>
                            <?php for($i=$yr_now;$i>=1995;$i--){ ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-lg-4 pull-left">
                            <label>From:</label>
                            <select class="form-control">
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                            </select>
                          </div>

                          <div class="col-lg-4 pull-left">
                            <label>To:</label>
                            <select class="form-control">
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                            </select>
                          </div>
                        </div>
                        <button class="btn btn-default pull-left from_to_search" style="margin: 22px 0;padding: 10px 14px;"><i class="fa fa-search"></i></button>
                        </form>
                      </tr>
                        <tr>
                          <th>Date</th>
                          <th>Project Name</th>
                          <th>Payment Term Description</th>
                          <th>Gross Amount</th>
                          <th>Amount Collected</th>
                          <th>% Commission</th>
                          <th>Commission Tax</th>
                          <th>Net Commission</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="">
                        <td>Jondi Rose</td>
                        <td>Alfred Jondi Rose</td>
                        <td>manager</td>
                        <td>1234</td>
                        <td>233</td>
                        <td>50</td>
                        <td>500</td>
                        <td>1000</td>
                      </tr>
                      <tr class="">
                        <td>Dulal</td>
                        <td>Jonathan Smith</td>
                        <td>manager</td>
                        <td>434</td>
                        <td>233</td>
                        <td>50</td>
                        <td>500</td>
                        <td>1000</td>
                      </tr>                         
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="future">
              <div class="panel-body">
                <div class="adv-table editable-table ">
                  <div class="clearfix"></div>
                  <div class="space15"></div>
                  <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                      <h3>Paid Out : Pvalue</h3>
                      <tr>
                        <th>Project Name</th>
                        <th>Payment Term Description</th>
                        <th>Gross Amount</th>
                        <th>Amount Collected</th>
                        <th>% Commission</th>
                        <th>Commission Tax</th>
                        <th>Net Commission</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                        <td>Alfred Jondi Rose</td>
                        <td>manager</td>
                        <td>1234</td>
                        <td>233</td>
                        <td>50</td>
                        <td>500</td>
                        <td>1000</td>
                      </tr>
                      <tr class="">
                        <td>Jonathan Smith</td>
                        <td>manager</td>
                        <td>434</td>
                        <td>233</td>
                        <td>50</td>
                        <td>500</td>
                        <td>1000</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </section>
</section>