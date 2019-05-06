
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Admin Login Page</title>
		<meta name="description" content="Snoopy is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Snoopy Admin, Snoopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/snoopy/favicon.ico');?>">
		<link rel="icon" href="<?php echo base_url('assets/snoopy/favicon.ico');?>" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="<?php echo base_url('assets/snoopy/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets/snoopy/dist/css/style.css');?>" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		
		<!--/Preloader-->
		
		<div class="wrapper  pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="#">
						<img class="brand-img mr-10" src="<?php echo base_url('assets/snoopy/img/logo.png');?>" alt="brand"/>
						<span class="brand-text">UniAlumni</span>
					</a>
				</div>
				
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign in to Admin Portal</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<?php echo form_open('login/admin_login')       ?>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
													<?php echo form_input(['class'=>'form-control','id'=>'exampleInputEmail_2', 'placeholder'=>'Username', 'name'=>'username', 'value'=>set_value('username')]); ?>
													<div class="col-lg-12">
                                                      <?php echo form_error('username');  ?>
                                                    </div>   
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													<div class="clearfix"></div>
													 <?php echo form_password(['class'=>'form-control','id'=>'exampleInputpwd_2', 'placeholder'=>'Password', 'name'=>'password']);?>
													 <div class="col-lg-12">
                                                         <?php echo form_error('password');  ?>
													 </div>
                                                    </div> 
												</div>
												<?php if($error = $this->session->flashdata('Login failed')): ?>
                                                 <div class="alert alert-dismissible alert-danger">
                                                  <strong>Oh snap !!</strong> <?= $error ?>
                                                 </div>
                                                <?php endif; ?>
												
												
												<div class="form-group text-center">
													 <button  class="btn btn-warning  btn-rounded" <?php form_submit(['name'=>'submit','value'=>'Sign In']);?>>Sign In</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('assests/snoopy/vendors/bower_components/jquery/dist/jquery.min.js');?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assests/snoopy/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assests/snoopy/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js');?>"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('assests/snoopy/dist/js/jquery.slimscroll.js');?>"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('assests/snoopy/dist/js/init.js');?>"></script>
	</body>
</html>