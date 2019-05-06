<?php include_once('admin_header.php')?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add an Event</h1>
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
                                    <form role="form"<?php echo form_open_multipart('admin_panel/event_store')?>
                                    <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input <?php echo form_input([ 'name'=>'e_name','class'=>'form-control','placeholder'=>'example Event Name goes here', 'value'=>set_value('e_name')]);?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?php echo form_error('e_name');  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Event Venue</label>
                                            <input  placeholder="Enter text" <?php echo form_input([ 'name'=>'e_venue','class'=>'form-control', 'value'=>set_value('e_venue')]);?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input  <?php echo form_upload(['name'=>'e_image','class'=>'form-control']) ;   ?>
                                            <div class="col-lg-12">
                                            <?php if(isset($upload_error)) echo $upload_error   ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Event description</label>
                                            <textarea class="form-control" rows="5" <?php echo form_input([ 'name'=>'e_desc','class'=>'form-control', 'value'=>set_value('e_desc')]);?></textarea>
                                        </div>

                                        <div class="form-group input-group">
                                            <label>Event Date/Time</label>
                                            <input type="date" <?php echo form_input([ 'name'=>'e_date','class'=>'form-control', 'value'=>set_value('e_date')]);?>
                                            <input type="time" <?php echo form_input([ 'name'=>'e_time','class'=>'form-control', 'value'=>set_value('username')]);?>
                                            
                                        </div>
                                        
                                        
                                        
                                        <button <?php echo form_submit([ 'name'=>'submit'])?>Submit Event</button>
                                        
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