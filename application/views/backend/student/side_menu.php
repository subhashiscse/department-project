<?php 
	$student_id = $this->session->userdata('student_id');
	$data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
?>

<div class="sidebar sidebar-main">
	<div class="sidebar-content">
	<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<?php if($data['student_info']->student_image){ ?>
					<a href="#" class="media-left"><img style="width:150px;height:150px; border-radius: 15px;"src="<?php echo base_url('assets/images/'.$data['student_info']->student_image) ?>" alt=""></a>
					<?php }
					else { ?>
						<a href="#" class="media-left"><img style="width:150px;height:150px; border-radius: 15px;"src="<?php echo base_url('assets/images/person.JPG') ?>" alt=""></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- Main navigation -->
			<div class="sidebar-category sidebar-category-visible">
				<div class="category-content no-padding">
					<ul class="navigation navigation-main navigation-accordion">
						<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
						<li class="<?php echo $active_nav =="dashboard"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Notice</span></a>
							<ul>
								<li class="<?php echo $active_nav =="see_notice"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/see_notice') ?>">See Notice</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Class Information</span></a>
							<ul>
								<li class="<?php echo $active_nav =="class_routine"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/class_routine') ?>">Class Routine</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Exam Information</span></a>
							<ul>
								<li class="<?php echo $active_nav =="exam_routine"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/exam_routine') ?>">Exam Routine</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Library System</span></a>
							<ul>
								<li class="<?php echo $active_nav =="book_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/getBookList') ?>">Book List</a></li>
								<li class="<?php echo $active_nav =="issued_book_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/getAllIssuedBookList') ?>">Issued Book</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Application</span></a>
							<ul>
								<li class="<?php echo $active_nav =="send_app_admin"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/send_app_admin') ?>">Send Application To Chairman</a></li>
								<!-- <li class="<?php echo $active_nav =="send_app_teacher"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/send_app_teacher') ?>">Send Application To Teacher</a></li> 
								-->
								<li class="<?php echo $active_nav =="view_application"?"active":""; ?>"><a href="<?php echo base_url('dashboard_student/view_application') ?>">View Application</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
	</div>
</div>
			