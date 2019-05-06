<?php include_once('admin_header.php') ?>


        <div class="page-wrapper">
            <div class="container-fluid pt-30">
		      <!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Alumni List</h5>
					  <div class="pull-left">
										 <a class="btn btn-success" <?php echo anchor('admin_alumni/alumni_report',"Generate Report") ?></a>				            
									</div>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Alumni</span></a></li>
						<li class="active"><span>List</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div><br><br>
				<?php if($feedback = $this->session->flashdata('feedback')): 
                         $feedback_class = $this->session->flashdata('feedback_class');
                         ?>
                            <div class="row">
                             <div class="col-lg-6 col-lg-offset-3">                         
                                <div class="alert alert-dismissible <?= $feedback_class ?>">
                                  <?= $feedback ?>
                                </div>
                             </div>
                            </div>
                <?php endif; ?>
				<?php if($Approval = $this->session->flashdata('Approval')): 
                         $feedback_class = $this->session->flashdata('feedback_class');
                         ?>
                            <div class="row">
                             <div class="col-lg-6 col-lg-offset-3">                         
                                <div class="alert alert-dismissible <?= $feedback_class ?>">
                                  <?= $Approval ?>
                                </div>
                             </div>
                            </div>
                <?php endif; ?>					
				<!-- Row -->
				<?php if  (count($alumni_list)):
                $count = $this->uri->segment(3,0);
				foreach ($alumni_list as $alumni): 
				?>
			    <div class="container">	
				  <div class="row">
					<div class="col-sm-4">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="profile-image-overlay" ><img src="<?= $alumni->a_image ?>" alt="user"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="<?= $alumni->a_image ?>" alt="user"/>
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-orange"><?= $alumni->a_name ?></h5>
											<h6 class="block capitalize-font pb-20"><?= $alumni->a_email ?></h6>
										</div>
										 <?php if(!$alumni->a_approval):?>
                                             <div class="col-lg-12">
                                              <?= anchor("admin_alumni/approve_alumni/{$alumni->id}",'Approve',['class'=>'btn btn-success btn-block  btn-anim mt-30'])  ?>
                                                <!--<a href="" class="btn btn-primary">Edit</a>-->
                                             </div>
                                        <?php endif; ?>	
										
										<div class="col-lg-12">	   
									    <div class="social-info">
										  <button class="btn btn-danger btn-block  btn-anim" data-toggle="modal" data-target="#01<?= $alumni->id ?>"><i class="fa fa-trash"></i><span class="btn-text">Delete Alumni</span></button>											
									   	  <div id="01<?= $alumni->id ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									   	  	<div class="modal-dialog">
									   	  		<div class="modal-content">
									   	  			<div class="modal-header">
									   	  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									   	  				<h5 class="modal-title" id="myModalLabel">Alert !</h5>
									   	  			</div>
									   	  			<div class="modal-body">
									   	  				<!-- Row -->
									   	  				<div class="row">
									   	  					<div class="col-lg-12">
									   	  						<div class="">
									   	  							<div class="panel-wrapper collapse in">
									   	  								<div class="panel-body pa-0">
									   	  									<div class="col-sm-12 col-xs-12">
									   	  										<div class="form-wrap">
									   	  											<form action="#">
									   	  												<div class="form-body overflow-hide">
									   	  													<div class="form-group">
									   	  														<label class="control-label mb-10" for="exampleInputuname_1">Are you sure ? You want to delete this Alumni <?= $alumni->a_name ?> . </label>
									         		                                            </div>	
									   	  												</div>	
									   	  											</form>
									   	  										</div>
									   	  									</div>
									   	  								</div>
									   	  							</div>
									   	  						</div>
									   	  					</div>
									   	  				</div>
									   	  			</div>
									   	  			<div class="modal-footer">
									     	          <?=
                                                        form_open('admin_alumni/delete_alumni'),
										                form_hidden('alumni_id',$alumni->id);
										            	?>
										            	<button class="btn btn-success waves-effect" <?= form_submit(['name'=>'submit']);?>Yes</button>
										              	<?= form_close(); ?>  
										            </div>
										            </div>
									                </div>
									                	<!-- /.modal-content -->
									                </div>
									                    <!-- /.modal-dialog -->
										</div>
										</div>	
										<div class="social-info">
											<button class="btn btn-warning btn-block  btn-anim mt-30" data-toggle="modal" data-target="#<?= $alumni->id ?>"><i class="fa fa-pencil"></i><span class="btn-text">View profile</span></button>
											<div id="<?= $alumni->id ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel">Profile</h5>
														</div>
														<div class="modal-body">
															<!-- Row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="">
																		<div class="panel-wrapper collapse in">
																			<div class="panel-body pa-0">
																				<div class="col-sm-12 col-xs-12">
																					<div class="form-wrap">
																						<form action="#">
																							<div class="form-body overflow-hide">
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-user"></i></div>
																										<input type="text" class="form-control" id="exampleInputuname_1" placeholder="<?php echo $alumni->a_name ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																										<input type="email" class="form-control" id="exampleInputEmail_1" value="<?= $alumni->a_email ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Student ID</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="pe-7s-wallet"></i></div>
																										<input type="email" class="form-control" id="exampleInputEmail_1" value="<?= $alumni->a_student_id ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Department Name</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="pe-7s-wallet"></i></div>
																										<input type="email" class="form-control" id="exampleInputEmail_1" value="<?= $alumni->a_department_name ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Passing Year</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="pe-7s-wallet"></i></div>
																										<input type="email" class="form-control" id="exampleInputEmail_1" value="<?= $alumni->a_passing_year ?>">
																									</div>
																								</div>

				                                                                            </div>	
																											
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
										</div>
									</div>
								</div>
							</div>
					   </div>
				    </div>   	


			  <?php endforeach; ?>
              <?php else:  ?>
                <h4>No Record Found </h4>
              <?php endif ; ?>
  	        </div>
	    </div>
<?php include_once('admin_footer.php') ?>