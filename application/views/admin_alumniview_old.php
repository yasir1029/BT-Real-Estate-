<?php include_once('admin_header.php')?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumni List</h1>
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
                    <?php if($feedback = $this->session->flashdata('Approval')): 
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Passing Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if  (count($alumni_list)):
                                       $count = $this->uri->segment(3,0);
                                       foreach ($alumni_list as $alumni): ?>
                                    <tr >
                                        <td><?= $alumni->a_name ?></td>
                                        <td><?= $alumni->a_email ?></td>
                                        <td><?= $alumni->a_passing_year ?></td>
                                        <td class="center">
                                         <div class="row">
                                             <div class="col-lg-3">
                                              <?= anchor("admin_alumni/alumni_profile/{$alumni->id}",'View Profile',['class'=>'btn btn-primary'])  ?>
                                                <!--<a href="" class="btn btn-primary">Edit</a>-->
                                             </div>  
                                             <div class="col-lg-3">   
                                              <?=
                                                   form_open('admin_alumni/delete_alumni'),
                                                   form_hidden('alumni_id',$alumni->id),
                                                   form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                                                   form_close();

                                              ?> 
                                             </div>
                                             <?php if(!$alumni->a_approval):?>
                                             <div class="col-lg-3">
                                              <?= anchor("admin_alumni/approve_alumni/{$alumni->id}",'Approve',['class'=>'btn btn-primary'])  ?>
                                                <!--<a href="" class="btn btn-primary">Edit</a>-->
                                             </div>
                                             <?php endif; ?>
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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                 

<?php include_once('admin_footer.php')?>
