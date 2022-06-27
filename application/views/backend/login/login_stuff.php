<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title><?php echo $tittle ?></title> -->
	<title>Department Digitalization System</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/bootstrap.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/core.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/components.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/colors.css') ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/style.css')?>">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/loaders/pace.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/libraries/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/libraries/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/loaders/blockui.min.js') ?>"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/app.js') ?>"></script>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> 
	<!-- /theme JS files -->
</head>
<body class="login-container">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<div class="dropdown">
					<button style="margin: 15%" class="btn btn-success dropdown-toggle login-button" type="button" data-toggle="dropdown">Login
					<span class="caret"></span></button>
					<ul class="dropdown-menu bacground-00254E">
						<li><a class="bg-00254E" href="login_admin">Login as Admin</a></li>
					    <li><a class="bg-00254E" href="login_teacher">Login as Teacher</a></li>
					    <li><a class="bg-00254E" href="login_student">Login as Student</a></li>
					    <li><a class="bg-00254E" href="login_stuff">Login as Stuff</a></li>
					</ul>
				</div>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
<!-- Page container -->
<section class="registration">
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">
				<!-- Simple login form -->
                <form method="POST" action="<?php echo site_url('login_stuff/authentication_process') ?>">
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div style="border-radius: 50%;"><i><img height=100% src="<?php echo base_url('assets/images/cse_logo.jpg') ?>" alt=""></i>
							</div>
							<h5 class="content-group">Login to your account</h5>
							<?php
								if ( $error = $this->session->flashdata('error')) {
								?>
								  <div class="alert alert-danger">
								    <strong>Error!</strong> <?= $error; ?>
								  </div>
								<?php
								$this->session->sess_destroy();

								 } ?>
						</div>
						<div class="form-group has-feedback has-feedback-left">
							<input type="email" data-validation="length" data-validation-length="min1"  class="form-control" placeholder="user email" name="email">
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>
						<div class="form-group has-feedback has-feedback-left">
							<input type="password" name="password" class="form-control" placeholder="Password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
						</div>
					</div>
				</form>
				<!-- /simple login form -->
			</div>
			
			<!-- /content area -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
</div>
</section>
<!-- /page container -->
 <script>
      $.validate({
      	reCaptchaSiteKey: '...',
  		reCaptchaTheme: 'light',
        lang: 'en'
      });
    </script>
</body>
</html>
