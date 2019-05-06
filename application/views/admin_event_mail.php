<?php include_once('admin_header.php')  ?>



				
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Invitation Message</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Dashboard</a></li>
								<li><a href="#"><span>Events</span></a></li>
								<li><a href="#"><span>List</span></a></li>
								<li class="active"><span>Message</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					
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
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Send Invitation Message for this Event To the Relevant Alumni.</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="panel-wrapper collapse in">
									    <div class="panel-body">
										<div class="form-wrap">
											 <form method="post" action="<?php echo base_url(); ?>admin_mail/send" enctype="form-data">
											 <?php form_hidden('event_id',$event->id);  ?>
												<p class="text-muted"> Select <code>Mailing Addressess</code>to send your mail. *</p>
												<div class="form-group">
        										<div class="row mt-40">
        											<div class="col-sm-12" >
        												<select multiple id="public-methods" name="public-methods[]" class="form-control" >
        													<?php foreach($alumni_email as $alumni):  ?>
        													 <option value="<?= $alumni->a_email  ?>" ><?= $alumni->a_email  ?></option>
        					                                <?php endforeach; ?>
        												</select>
        												<div class="button-box"> 
        													<a id="select-all" class="btn btn-danger btn-outline mr-10 mt-15" href="#">select all</a> 
        													<a id="deselect-all" class="btn btn-info btn-outline mr-10 mt-15" href="#">deselect all</a> 
        												</div>
        											</div>
												</div> 
				                                </div>
												<div class="form-group">
													<label class="control-label mb-10 text-left">Subject <span class="help"></span></label>
													<input <?php echo form_input([ 'name'=>'e_name','class'=>'form-control','placeholder'=>'example Event Name goes here', 'value'=>'You are Invited to '.$event->e_name]);?>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left">Message Body</label>
													<textarea <?php echo form_textarea([ 'name'=>'e_desc','rows'=>'12','class'=>'form-control', 'value'=>$event->e_desc]);?></textarea>
												</div>
												<div class="form-group mb-0">
													<button name="submit" type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Send</span></button>
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
					<!-- /Row -->
				</div>
        	              	


<?php include_once('admin_footer.php')  ?>