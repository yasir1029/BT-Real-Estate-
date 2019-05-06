<?php include_once('admin_header.php')?>


            <div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Edit Job</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?php echo site_url('admin_panel')?>">Dashboard</a></li>
							<li><a href="<?php echo site_url('admin_job/job_view')?>"><span>Jobs</span></a></li>
							<li class="active"><span>Edit</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
                      <form role="form"<?php echo form_open("admin_job/job_update/{$job->id}")?>                                        
												<div class="form-group">
													<label class="control-label mb-10 text-left">Job <span class="help">Tittle</span></label>
													<input <?php echo form_input([ 'name'=>'j_name','class'=>'form-control','placeholder'=>'example Job Name goes here', 'value'=>set_value('j_name',$job->j_name)]);?>
                        </div>
                        <div class="col-lg-12">
                  				 <?php echo form_error('j_name');  ?>
                       </div>
												<div class="form-group">
                          <label for="exampleSelect1">Job Status</label>
                          <select class="form-control" id="exampleSelect1" <?php echo form_input([ 'name'=>'j_status','class'=>'form-control', 'value'=>set_value('j_status')]);?>
                          <option>APPLY</option>
                          <option>EXPIRED</option>
                          </select>
                        </div>
												
												
												<div class="form-group">
													<label class="control-label mb-10 text-left">Job Description</label>
												    <textarea <?php echo form_textarea([ 'name'=>'j_desc','rows'=>'5','class'=>'form-control', 'value'=>set_value('j_desc',$job->j_desc)]);?></textarea>
                                                    

												</div>          
                        <button <?php echo form_submit([ 'name'=>'submit','class'=>'btn btn-primary'])?>Submit</button>
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					
					
					
				</div>
			

<?php include_once('admin_footer.php')?>