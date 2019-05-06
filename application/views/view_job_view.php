<?php include_once('admin_header.php') ?>

<div class="page-wrapper">
			<div class="container-fluid">
		
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
										<?php    
				            if($this->session->flashdata("message"))
                    {
                    echo "
                    <div class='alert alert-success'>
                       ".$this->session->flashdata("message")."
                    </div>
                     ";
                    }
                   ?> 
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Manage Jobs</h6><br>
									<div class="pull-right">
										 <a class="btn btn-success" <?php echo anchor('admin_job/job_report',"Generate Report") ?></a>				            
									</div>&nbsp;&nbsp;	
									<div class="pull-left">
										 <a class="btn btn-primary" <?php echo anchor('admin_job/job_add',"Add Job") ?></a>				            
				        </div> 
								</div>
								<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						      <ol class="breadcrumb">
							     <li><a href="<?php echo site_url('admin_panel')?>">Dashboard</a></li>
							     <li><a href="<?php echo site_url('admin_job/job_view')?>"><span>Jobs</span></a></li>
							     <li class="active"><span>List</span></li>
						      </ol>
						    </div>
								
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="mt-40">
											<table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
												<thead>
													<tr>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">S.NO</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Job Tittle</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Job Status</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Dated</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php if  (count($job_model)):
                                                    $count = $this->uri->segment(3,0);
                                                    foreach ($job_model as $job): ?>
													                          <tr>
													                            <td><?= ++$count ?></td>
                                                      <td><?= $job->j_name ?></td>
                                                      <td><?= $job->j_status ?></td>
                                                      <td><?= $job->j_date_posted ?></td>
                                                      <td class="center">
                                                       <div class="row">
                                                         <div class="col-lg-3">
					                          											<?= 
												                          				 form_open("admin_job/job_edit/{$job->id}");?>
														                          		 <button class="btn btn-primary btn-icon-anim btn-circle"<?= form_submit(['name'=>'submit']);?><i class="icon-pencil"></i></button>																								 																								 
																						                <?=  form_close();
																						              	?>
                                                         </div>   
																												<div class="col-lg-3">	   
											    	                             <div class="social-info">
									                                       	  <button class="btn btn-danger btn-icon-anim btn-circle" data-toggle="modal" data-target="#<?=$job->id?>"><i class="icon-trash"></i><span class="btn-text"></span></button>
									                                       	  <div id="<?=$job->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									                                       	  														<label class="control-label mb-10" for="exampleInputuname_1">Do you want to delete this Job ? </label>
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
                                                                    form_open('admin_job/job_delete'),
											                                              form_hidden('job_id',$job->id);
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
																	          					 <div class="col-lg-6">
																	          						<?= 
																	          							 form_open("admin_mail/job_invitation/{$job->id}");
																	          							 ?>
																	          							 <button class="btn btn-success btn-icon-anim btn-circle"<?= form_submit(['name'=>'submit']);?><i class="icon-envelope"></i></button>
																	          							 <?= form_close(); ?>																								 
                                                       </div>
                                                  </div>     
                                                    </td> 
													                       </tr>
								        					              <?php endforeach; ?>
                                                  <?php else:  ?>
                                                  <tr>
                                                   <td colspan="5">No record found </td>
                                                  </tr>
                                                <?php endif ; ?>
                                        
													
												</tbody>
										    </table>
                        <?= $this->pagination->create_links();?>

										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>


<?php include_once('admin_footer.php') ?>