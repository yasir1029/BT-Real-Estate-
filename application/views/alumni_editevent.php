<?php include_once('header.php')?>

<section id="page-content-wrap">
    <div class="contact-page-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-content-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <!-- Map Area Start -->
                                <div class="map-area-wrap">
                                   <!--  cbx-gmap start
                                    <div id="cbx-gmap">
                                        <div id="map_canvas" class="cbx-map map_canvas" data-lat="44.5403" data-lng="-78.5463" data-title="" data-content="<strong>6H Dilara Tower</strong><br /> <br />77 Bir Uttam C.R. Dutta Road <br /> Dhaka 1205 "></div>
                                    </div>
                                     cbx-gmap end -->
                                    <iframe src="https://snazzymaps.com/embed/75079"></iframe>
                                </div>
                                <!-- Map Area End -->
                            </div>

                            <div class="col-lg-6 m-auto">
                                <div class="contact-form-wrap">
                                  <h3>Add An Event</h3>
                                  <form role="form"<?php echo form_open_multipart("alumni/update_event/{$event->id}")?>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label for="cbxname">Event Name</label>
                                              <input <?php echo form_input([ 'name'=>'e_name','class'=>'form-control','id'=>'cbxname','type'=>'text','placeholder'=>'Event Name goes here', 'value'=>set_value('e_name',$event->e_name)]);?>                                            
                                            </div>
                                            <div class="col-lg-12">
                                              <?php echo form_error('e_name');  ?>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="cbxsubject">Event Venue</label>
                                          <input <?php echo form_input([ 'name'=>'e_venue','class'=>'form-control','id'=>'cbxsubject','type'=>'text', 'value'=>set_value('e_venue',$event->e_venue)]);?>
                                        </div>

                                        <div class="form-group">
                                          <label for="cbxmessage">Description</label>
                                          <textarea class="form-control" rows="5" <?php echo form_input([ 'name'=>'e_desc','id'=>'cbxmessage','class'=>'form-control', 'value'=>set_value('e_desc',$event->e_desc)]);?></textarea>
                                        </div>
                                        <div class="form-group input-group">
                                            <label>Event Date/Time</label>
                                            <input type="date" <?php echo form_input([ 'name'=>'e_date','class'=>'form-control', 'value'=>set_value('e_date',$event->e_date)]);?>
                                            <input type="time" <?php echo form_input([ 'name'=>'e_time','class'=>'form-control', 'value'=>set_value('e_time',$event->e_time)]);?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input  <?php echo form_upload(['name'=>'e_image','class'=>'form-control','value'=>set_value('e_image',$event->e_image)]) ;   ?>
                                            <div class="col-lg-12">
                                            <?php if(isset($upload_error)) echo $upload_error   ?>
                                            </div>
                                        </div>

                                        <button class="btn btn-reg"  <?php echo form_submit([ 'name'=>'submit'])?>Submit Event</button>
                                        <div id="cbx-formalert"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('footer.php')?>
