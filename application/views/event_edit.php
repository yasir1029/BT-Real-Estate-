<?php include_once('admin_header.php')?>


            <div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Edit Event</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?php echo site_url('admin_panel')?>">Dashboard</a></li>
							<li><a href="<?php echo site_url('admin_panel/event_view')?>"><span>Event</span></a></li>
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
											<form role="form" <?php echo form_open("admin_panel/event_update/{$event->id}")?> 
												<div class="form-group">
													<label class="control-label mb-10 text-left">Event <span class="help"> Name</span></label>
													<input <?php echo form_input([ 'name'=>'e_name','class'=>'form-control','placeholder'=>'example Event Name goes here', 'value'=>set_value('e_name',$event->e_name)]);?>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left" for="example-email">Event <span class="help"> Venue</span></label>
													<input  placeholder="Enter Venue" <?php echo form_input([ 'name'=>'e_venue','class'=>'form-control', 'value'=>set_value('e_venue',$event->e_venue)]);?>

												</div>
												
												
												<div class="form-group">
													<label class="control-label mb-10 text-left">Event Description</label>
												    <textarea <?php echo form_textarea([ 'name'=>'e_desc','rows'=>'5','class'=>'form-control', 'value'=>set_value('e_desc',$event->e_desc)]);?></textarea>
                                                    

												</div>
												

												<div class="form-group input-group">
                                                  <label>Event Date/Time</label>
                                                  <input type="date" <?php echo form_input([ 'name'=>'e_date','class'=>'form-control', 'value'=>set_value('e_date',$event->e_date)]);?>
                                                   <?php echo form_input([ 'name'=>'e_time','class'=>'form-control','type'=>'time', 'value'=>set_value('e_time',$event->e_time)]);?>
                                            
                                                </div>
                                        
                                        
                                        
                                                <button <?php echo form_submit([ 'name'=>'submit','class'=>'btn btn-primary'])?>Submit Event</button>
												
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