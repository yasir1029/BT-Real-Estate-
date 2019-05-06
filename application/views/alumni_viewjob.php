<?php include_once('header.php'); ?>

<section id="page-content-wrap">
        <div class="directory-page-content-warp section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="directory-text-wrap">
                            <h2>Now  we have Total <strong class="funfact-count"><?= $all_jobs?></strong> jobs</h2>
                            <div class="row">
                                <div class="col-lg-12 col-lg-offset-12">
                                    <a class="btn btn-lg btn-primary pull-right" <?php echo anchor('alumni/add_job',"Add Job") ?></a>
                                </div>
                            </div>
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
                            <div class="directory-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date posted</th>
                                           <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php if  (count($job_model)):
                                       $count = $this->uri->segment(3,0);
                                       foreach ($job_model as $job): ?>
                                        <tr>
                                            
                                            <td><?= $job->j_name ?></td>
                                            <td><?= $job->j_status ?></td>
                                            <td><?= $job->j_date_posted ?></td>
                                            <td class="center">
                                             <div class="row">
                                             <div class="col-lg-3">
                                              <?= anchor("alumni/edit_job/{$job->id}",'Edit',['class'=>'btn btn-lg btn-primary'])  ?>                                             </div>   
                                              
                                             <div class="col-lg-3">	   
									         <div class="social-info">
									         <button class="btn btn-lg btn-danger" data-toggle="modal" data-target="#<?=$job->id?>"><span class="btn-text">Delete</span></button>
									         <div id="<?=$job->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									     	 <div class="modal-dialog">
									     		<div class="modal-content">
									  			<div class="modal-header">
                                                    <blockquote class="blockquote">
                                                        Are you Sure , You want to delete this Job ?
                                                    </blockquote>
									  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									  			</div>
									  			<div class="modal-body">
									  				<!-- Row -->
									  				<div class="row">
									  					<div class="col-lg-12">
									  						<div class="">
									  							<div class="panel-wrapper collapse in">
									  								<div class="panel-body pa-0">
									  									
									  								</div>
									  							</div>
									  						</div>
									  					</div>
									  				</div>
									  			</div>
									  			<div class="modal-footer">
									  				<?=
                                                      form_open('alumni/delete_job'),
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
                                             <div class="col-lg-3"> 
                                             <?=
                                                   form_open("alumni/mail_job/{$job->id}"),
                                                   form_submit(['name'=>'submit','value'=>'Invitation','class'=>'btn btn-lg btn-success']),
                                                   form_close();

                                              ?> 
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
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>

<?php include_once('footer.php'); ?>


