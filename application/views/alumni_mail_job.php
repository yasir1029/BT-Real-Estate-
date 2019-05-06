<?php include_once('header.php')?>

<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Send Invitation for a Job</h1>
                    <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the
                        need</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Contact Page Content Start ==-->
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
                                  <h3>send message</h3>
                                    <form method="post" action="<?php echo base_url(); ?>alumni/send_job" enctype="form-data">
									<?php form_hidden('job_id',$job->id);  ?>
                                        <div class="row">
                                          

                                          <div class="col">
                                            <div class="form-group">
                                              <label for="cbxemail">Email *</label>
                                              <input type="email"  required id="cbxemail" <?php echo form_input([ 'name'=>'j_mail','class'=>'form-control']);?>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="cbxsubject">Subject</label>
                                          <input type="text"  id="cbxsubject" <?php echo form_input([ 'name'=>'j_name','class'=>'form-control','placeholder'=>'example Event Subject goes here', 'value'=>'job Application - '.$job->j_name]);?>
                                        </div>

                                        <div class="form-group">
                                          <label for="cbxmessage">Message</label>
                                          <textarea <?php echo form_textarea([ 'name'=>'e_desc','rows'=>'12','class'=>'form-control', 'value'=>$job->j_desc]);?></textarea>
                                        </div>
                                        
                                        <button name="submit" type="submit" class="btn btn-reg">Send</button>
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
<!--== Contact Page Content End ==-->



<?php include_once('footer.php')?>

