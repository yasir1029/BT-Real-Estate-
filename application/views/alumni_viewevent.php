<?php include_once('header.php'); ?>

<section id="page-content-wrap">
        <div class="directory-page-content-warp section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="directory-text-wrap">
                            <h2>Now  we have Total <strong class="funfact-count"><?= $all_events?></strong> Events</h2>
                            <div class="row">
                                <div class="col-lg-12 col-lg-offset-12">
                                    <a class="btn btn-lg btn-primary pull-right" <?php echo anchor('alumni/add_event',"Add Event") ?></a>
                                </div>
                            </div>
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
                            <div class="directory-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Name</th>
                                            <th scope="col">Venue</th>
                                            <th scope="col">Date</th>
                                           <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php if  (count($event_model)):
                                       $count = $this->uri->segment(3,0);
                                       foreach ($event_model as $event): ?>
                                        <tr>
                                            
                                            <td><?= $event->e_name ?></td>
                                            <td><?= $event->e_venue ?></td>
                                            <td><?= $event->e_date ?></td>
                                            <td class="center">
                                             <div class="row">
                                             <div class="col-lg-3">
                                              <?= anchor("alumni/edit_event/{$event->id}",'Edit',['class'=>'btn btn-lg btn-primary'])  ?>                                             </div>   
                                             <div class="col-lg-3">	   
									         <div class="social-info">
									         <button class="btn btn-lg btn-danger" data-toggle="modal" data-target="#<?=$event->id?>"><span class="btn-text">Delete</span></button>
									         <div id="<?=$event->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									     	 <div class="modal-dialog">
									     		<div class="modal-content">
									  			<div class="modal-header">
                                                    <blockquote class="blockquote">
                                                        Are you Sure , You want to delete this Event ?
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
                                                      form_open('alumni/delete_event'),
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
                                             <div class="col-lg-3"> 
                                             <?=
                                                   form_open("alumni/mail_event/{$event->id}"),
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


