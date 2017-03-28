<?php  if($this->session->userdata('msg')){  $alert_msg = $this->session->userdata('msg');  ?>
    <script>alert('<?php echo $alert_msg; ?>')</script>
<?php } ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <section class="panel">
                    <p class="message" style="background:#34A953;color:white;font-size:25px;font-family:times new romans;text-align:center"></p>
                    <header class="panel-heading">
                        Create New Proposal
                    </header>
                    <div class="panel-body">
                        <div class=" form">
                            <?php $attributes = array('class' => 'cmxform form-horizontal tasi-form', 'id' => '','validate'=>'validate'); echo form_open_multipart('Proposals/proposalCreate', $attributes); ?>
                                <div class="form-group col-lg-6 pull-left">
                                    <label for="client" class="control-label col-lg-4">Client</label>
                                    <div class="col-lg-10">
                                    <select class="form-control" required="" name="client_name">
                                      <?php foreach ($clients as $cli) { ?>
                                      <option value="<?php echo $this->encrypt->encode($cli['client_id']); ?>"><?php echo $cli['contact_name']; ?></option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                 <div class="form-group col-lg-6 pull-left">
                                    <label for="proj_name" class="control-label col-lg-4">Project Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="project_name" name="project_name" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 pull-left">
                                    <label for="sales_category" class="control-label col-lg-4">Sales Category</label>
                                    <div class="col-lg-10">
                                        <input type="checkbox" value="" class="check all" name="sales_category_all" onClick="checkAll(this)">Select All
                                      <br/>
                                      <ul>
                                      <?php foreach($categories as $catego) { ?>
                                        <li><input type="checkbox" value="<?php echo $catego['category_name']; ?>" name="sales_category[]" class="check">&nbsp;<?php echo $catego['category_name']; ?>
                                        </li>
                                      <?php } ?>
                                      </ul>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 pull-left">
                                    <label for="amount" class="control-label col-lg-4">Amount (in Php)</label>
                                    <div class="col-lg-10">
                                         <input type="text" class="form-control" name="amount" id="amount" required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 pull-left">
                                    <label for="qoutation" class="control-label col-lg-4">Attach Quotation</label>
                                    <div class="col-lg-10">
                                         <input type="file" class="form-control" multiple="" name="file[]" id="file" required="">
                                    </div>
                                </div>
                               
                                 <div class="form-group col-lg-12">
                                    <label for="proposal_date" class="control-label col-lg-2">Proposal Date</label>
                                    <div class="col-lg-10">
                                        <input type="date" class="form-control" id="proposal_date" name="proposal_date" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-danger" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
  </section>
</section>

