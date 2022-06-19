<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/user_layout/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/user_layout/css/bootstrap.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/user_layout/css/core.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/user_layout/css/components.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/user_layout/css/colors.css') ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/loaders/pace.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/core/libraries/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/core/libraries/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/loaders/blockui.min.js') ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/visualization/d3/d3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/visualization/d3/d3_tooltip.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/forms/styling/switchery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/forms/styling/uniform.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/forms/selects/bootstrap_multiselect.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/ui/moment/moment.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/pickers/daterangepicker.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/core/app.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/forms/selects/select2.min.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/js/pages/datatables_advanced.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/user_layout/ckeditor/ckeditor.js') ?>"></script>
	<script src="<?php echo base_url('assets/user_layout/js/sweetalert.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/user_layout/js/jquery.form-validator.min.js') ?>"></script>
	<!-- /theme JS files -->
	<?php 
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
	?>
</head>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-inverse"  style="width: 100%">
		<div class="navbar-header">
			<!-- <h6 style="padding-left: 5%">Department Digitalization System</h6> -->
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user" style="margin-top: 3%;background-color: #151815;border-radius: 5%">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<?php if($data['student_info']->student_image){ ?>
						<img src="<?php echo base_url('assets/images/'.$data['student_info']->student_image) ?>">
						<?php } 
						else {?>
							<img src="<?php echo base_url('assets/images/person.JPG') ?>">
						<?php } ?>
						<span><?= $data['student_info']->student_username;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right" >
						<li><a href="<?php echo base_url('dashboard_student/see_own_profile'); ?>"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="<?php echo base_url('dashboard_student/password_change') ?>"><i class="icon-cog5"></i> Update Password</a></li>
						<li><a href="<?php echo base_url('login_student/student_logout'); ?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<?php echo $side_menu; ?>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<?php echo $main_content; ?>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
</html>
