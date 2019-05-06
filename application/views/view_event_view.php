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
									<h6 class="panel-title txt-dark">Manage Events</h6><br>
									<div class="pull-right">
										 <a class="btn btn-success" <?php echo anchor('admin_panel/event_report',"Generate Report") ?></a>				            
									</div>&nbsp;&nbsp;
									<div class="pull-left">
										 <a class="btn btn-primary" <?php echo anchor('admin_panel/event_add',"Add Event") ?></a>				            
								  </div>	 
								</div>
								
								<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						      <ol class="breadcrumb">
							     <li><a href="<?php echo site_url('admin_panel')?>">Dashboard</a></li>
							     <li><a href="<?php echo site_url('admin_panel/event_view')?>"><span>Event</span></a></li>
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
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Event Name</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Event Venue</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Event Date</th>
													  <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php if  (count($event_model)):
                                                    $count = $this->uri->segment(3,0);
													foreach ($event_model as $event): 
													?>
													<tr>
													  <td><?= ++$count ?></td>
                                                      <td><?= $event->e_name ?></td>
                                                      <td><?= $event->e_venue ?></td>
                                                      <td><?= $event->e_date ?></td>
                                                      <td class="center">
                                                      <div class="row">
                                                       <div class="col-lg-3">
														<?= 
																 form_open("admin_panel/event_edit/{$event->id}");?>
															<button class="btn btn-primary btn-icon-anim btn-circle"<?= form_submit(['name'=>'submit']);?><i class="icon-pencil"></i></button>																								 																								 
														  <?=  form_close();
														?>
														 </div> 
													  <div class="col-lg-3">	   
											    	  <div class="social-info">
									            	  <button class="btn btn-danger btn-icon-anim btn-circle" data-toggle="modal" data-target="#<?=$event->id?>"><i class="icon-trash"></i><span class="btn-text"></span></button>
									            	  <div id="<?=$event->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									            	  														<label class="control-label mb-10" for="exampleInputuname_1">Do you want to delete this Event ? </label>
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
                                                                      form_open('admin_panel/event_delete'),
											                      	form_hidden('event_id',$event->id);
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
																 form_open("admin_mail/event_invitation/{$event->id}");
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
				<!-- /Row -->
				
				<!-- /Row -->	
			</div>


<?php include_once('admin_footer.php') ?>