<?php include_once('admin_header.php')?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add an Job</h1>
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
                                    <form role="form"<?php echo form_open("admin_job/job_update/{$job->id}")?>                                        
                                        <div class="form-group">
                                            <label>Job Name</label>
                                            <input <?php echo form_input([ 'name'=>'j_name','class'=>'form-control','placeholder'=>'example Job Name goes here', 'value'=>set_value('j_name',$job->j_name)]);?>
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
                                            <input type="file" >
                                        </div>
                                        <div class="form-group">
                                            <label>Job description</label>
                                            <?php echo form_textarea([ 'name'=>'j_desc','rows'=>'5','class'=>'form-control', 'value'=>set_value('j_desc',$job->j_desc)]);?>
                                        </div>

                                        <button <?php echo form_submit([ 'name'=>'submit'])?>Submit Job</button>
                                        
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