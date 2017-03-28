<div id="main-content">
	<div class="wrapper">
		<div class="row">
			<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
                  <div class="form-group">
                  <div class="col-lg-3 pull-right">
                         <select name="company" class="form-control m-bot15" id='selectGame' required >
                         <option>Game List</option>
                              <?php foreach($activity as $data){ ?>
                                 <option value="<?php echo $data['id'] ?>"><?php echo $data['activity_name'] ?></option>
                              <?php } ?>
                        </select>
                     </div>
                     <h4>Player List</h4>
                     
                  </div>
            </header>
   				<table class="table table-striped table-advance table-hover">
                  <thead>
                     <tr>
                        <th>Player Name</th>
                        <th>Current Points</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="playerList">
                  </tbody>
               </table>
			</section>
			</div>
		</div>
	</div>
</div>