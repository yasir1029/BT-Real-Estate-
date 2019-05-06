<?php include_once('header.php')?>

    <!--== Register Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="register-page-inner">
                            <div class="col-lg-10 m-auto">
                                <div class="register-form-content">
                                    <div class="row">
                                        <!-- Signin Area Content Start -->
                                        <div class="col-lg-4 col-md-10 text-center">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                    <div class="signin-area-wrap">
                                                        <h4>Already a Member?</h4>
                                                        <div class="sign-form">
                                                            <form method="post" action="<?php echo base_url(); ?>alumni_login/alumnilogin" enctype="form-data">
                                                            <form <?php echo form_open('alumni_login/alumnilogin')?>
                                                        
                                                                <input type="text" name="email" placeholder="Enter your ID">
                                                                <p <?php echo form_error('email');?></p>
                                                                <input type="password" name="password" placeholder="Password">
                                                                <p <?php echo form_error('password');?></p>

                                                                <?php if($error = $this->session->flashdata('failed')): ?>
                                                                 <div class="alert alert-dismissible alert-danger">
                                                                 <strong>Oh snap !!</strong> <?= $error ?>
                                                                 </div>
                                                                  
                                                                <?php endif; ?>
                                                                <button type="submit" name="submit" class="btn btn-reg">Login</button>
                                                  
                                                           </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Signin Area Content End -->

                                        <!-- Regsiter Form Area Start -->
                                        <div class="col-lg-7 col-md-6 ml-auto">
                                            <div class="register-form-wrap">
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
                                                <h3>registration Form</h3>
                                                <div class="register-form">
                                                    <form role="form" <?php echo form_open_multipart('alumni_login/register')?>
                                                    <?php echo form_hidden('registered_on',date('Y-M-d')); ?>

                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_email">Email *</label><br>
                                                                    <?php echo form_input(['name'=>'a_email','class'=>'form_control','id'=>'register_email','value'=>set_value('a_email')]);?>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                <?php echo form_error('a_email');  ?>
                                                                </div>                                                                    
                                                            </div>

                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_password">Password *</label>
                                                                    <?php echo form_input(['name'=>'a_password','class'=>'form_control','id'=>'register_password','type'=>'password']);?> 
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                    <?php echo form_error('a_password');  ?>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_name">Name *</label><br>
                                                                    <?php echo form_input(['name'=>'a_name','class'=>'form_control','id'=>'register_name','value'=>set_value('a_name')]);?>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                    <?php echo form_error('a_name');  ?>
                                                                </div>                                                                 
                                                            </div>

                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_stuid">Student Id</label>
                                                                    <?php echo form_input(['name'=>'a_student_id','class'=>'form_control','id'=>'register_stuid','value'=>set_value('a_student_id')]);?>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_year">Passing Year</label>
                                                                    <?php echo form_input(['name'=>'a_passing_year','class'=>'form_control','id'=>'register_year','value'=>set_value('a_passing_year')]);?>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_deptno">Depertment Name</label>
                                                                    <?php echo form_input(['name'=>'a_department_name','class'=>'form_control','id'=>'register_deptno','value'=>set_value('a_department_name')]);?>                                                            
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group file-input">
                                                          <label>Upload Image *</label>  
                                                          <input type="file" <?php echo form_upload(['name'=>'a_image','class'=>'form-control']) ;   ?>
                                                          <div class="col-lg-12">
                                                          <?php if(isset($upload_error)) echo $upload_error   ?>
                                                          <div>
                                                        </div><br>
                                                        
                                                        <div class="gender form-group">
                                                            <label class="g-name d-block">Gender</label>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                            <?php echo form_input(['name'=>'a_gender','class'=>'custom_control_input','id'=>'register_gender_male','type'=>'radio','value'=>'Male']);?>
                                                            <label for="register_gender_male" >Male</label>                                                                
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                            <?php echo form_input(['name'=>'a_gender','class'=>'custom_control_input','id'=>'register_gender_female','type'=>'radio','value'=>'Female']);?>                                     
                                                            <label for-"register_gender_female">Female</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                           <button <?php echo form_submit([ 'name'=>'submit','class'=>'btn btn-reg'])?>Submit </button> 
                                                        </div>                                                         
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Regsiter Form Area End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Register Page Content End ==-->
<?php include_once('footer.php')?>