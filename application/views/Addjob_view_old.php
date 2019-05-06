<?php include_once('admin_header.php')?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a job</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"<?php echo form_open_multipart('admin_job/job_store')?>
                                    <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>                                    
                                    <?php echo form_hidden('j_date_posted',date('Y-m-d H:i:s')); ?>
                                        <div class="form-group">
                                            <label>job Name</label>
                                            <input <?php echo form_input([ 'name'=>'j_name','class'=>'form-control','placeholder'=>'example job Name goes here', 'value'=>set_value('j_name')]);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?php echo form_error('j_name');  ?>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleSelect1">Example select</label>
                                        <select class="form-control" id="exampleSelect1" <?php echo form_input([ 'name'=>'j_status','class'=>'form-control', 'value'=>set_value('j_status')]);?>
                                        <option>APPLY</option>
                                        <option>EXPIRED</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Photo</label>
                                            <input  <?php echo form_upload(['name'=>'j_image','class'=>'form-control']) ;   ?>
                                            <div class="col-lg-12">
                                            <?php if(isset($upload_error)) echo $upload_error   ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>job description</label>
                                            <textarea class="form-control" rows="5" <?php echo form_input([ 'name'=>'j_desc','class'=>'form-control', 'value'=>set_value('j_desc')]);?></textarea>
                                        </div>
                                        
                                        
                                        
                                        <button <?php echo form_submit([ 'name'=>'submit'])?>Submit job</button>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</div>    

<?php include_once('admin_footer.php')?>