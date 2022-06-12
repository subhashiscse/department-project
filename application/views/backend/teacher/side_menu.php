<div class="sidebar sidebar-main">
	<div class="sidebar-content">
	<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<?php if($teacher_info->teacher_image){ ?>
					<a href="#" class="media-left"><img style="width:150px;height:150px; border-radius: 15px;"src="<?php echo base_url('assets/images/'.$teacher_info->teacher_image) ?>" alt=""></a>
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
						<!-- Main -->
						<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
						<li class="<?php echo $active_nav =="dashboard"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Notice</span></a>
							<ul>
								<li class="<?php echo $active_nav =="send_notice"?"active":""; ?>"><a href="#">Send Notice</a>
									<ul>
									<li class="<?php echo $active_nav =="send_notice_all"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/send_notice_all') ?>">To All</a>
									<li class="<?php echo $active_nav =="send_notice_admin"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/send_notice_admin') ?>">To Chairman</a>		
									<li class="<?php echo $active_nav =="send_notice_teacher"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/send_notice_teacher') ?>">To Teacher</a></li>
									<li class="<?php echo $active_nav =="send_notice_student"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/send_notice_student') ?>">To Student</a></li>
									<li class="<?php echo $active_nav =="send_notice_stuff"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/send_notice_stuff') ?>">To Stuff</a></li>
									</ul>
								</li>
								<li class="<?php echo $active_nav =="see_notice"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/see_notice') ?>">See Notice</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Class Information</span></a>
							<ul>
								<li class="<?php echo $active_nav =="class_course"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/class_course') ?>">Class Course</a></li>
								<li class="<?php echo $active_nav =="class_notice"?"active":""; ?>"><a href="<?php echo base_url('dashboard_teacher/class_notice') ?>">Class Notice</a></li>
							</ul>
						</li>
						<li class="<?php echo $active_nav =="meeting_info"?"active":""; ?>">
							<a href="<?php echo base_url('dashboard_teacher/meeting_info') ?>"><i class="icon-stack2"></i> <span>Meeting Information</span></a>
						</li>
					</ul>
				</div>
			</div>
		<!-- /main navigation -->
	</div>
</div>
			