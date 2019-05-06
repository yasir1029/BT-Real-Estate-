<?php include_once('admin_header.php')?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">jobs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

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
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>job Tittle</th>
                                        <th>job Status</th>
                                        <th>job Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if  (count($job_model)):
                                       $count = $this->uri->segment(3,0);
                                       foreach ($job_model as $job): ?>
                                    <tr >
                                        <td><?= ++$count ?></td>
                                        <td><?= $job->j_name ?></td>
                                        <td><?= $job->j_status ?></td>
                                        <td><?= $job->j_date_posted ?></td>
                                        <td class="center">
                                         <div class="row">
                                             <div class="col-lg-3">
                                              <?= anchor("admin_job/job_edit/{$job->id}",'Edit',['class'=>'btn btn-primary'])  ?>
                                                <!--<a href="" class="btn btn-primary">Edit</a>-->
                                             </div>   
                                             <div class="col-lg-3">   
                                              <?=
                                                   form_open('admin_job/job_delete'),
                                                   form_hidden('job_id',$job->id),
                                                   form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
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
                            <!-- /.table-responsive -->
                            <?= $this->pagination->create_links();?>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                 

<?php include_once('admin_footer.php')?>
