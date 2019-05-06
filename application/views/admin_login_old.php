<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/vendor/admin_bootstrap/css/bootstrap.min.css" rel="stylesheet');?>">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet');?>">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css" rel="stylesheet');?>">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('login/admin_login')       ?>
                            <fieldset>
                                <div class="form-group">
                                <?php echo form_input(['class'=>'form-control', 'placeholder'=>'Username', 'name'=>'username', 'value'=>set_value('username')]); ?>
                                 <div class="col-lg-12">
                                     <?php echo form_error('username');  ?>
                                 </div>    
                                 <!--   <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>-->
                                </div>
                                <div class="form-group">
                                <?php echo form_password(['class'=>'form-control', 'placeholder'=>'Password', 'name'=>'password']);?>
                                 <div class="col-lg-12">
                                     <?php echo form_error('password');  ?>
                                 </div>
                                <!--    <input class="form-control" placeholder="Password" name="password" type="password" value="">  -->
                                </div>
                                
                                <?php if($error = $this->session->flashdata('Login failed')): ?>
                                <div class="alert alert-dismissible alert-danger">
                                 <strong>Oh snap !!</strong> <?= $error ?>
                                </div>
                                <?php endif; ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php 
                                     echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']),
                                          form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']);
                                
                                ?>
                               <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('/vendor/admin_jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('/vendor/admin_bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('/vendor/metisMenu/metisMenu.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('/dist/js/sb-admin-2.js');?>"></script>

</body>

</html>
