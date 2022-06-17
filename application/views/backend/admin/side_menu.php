<?php 
	$admin_id = $this->session->userdata('admin_id');
   	$data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
?>

<div class="sidebar sidebar-main">
	<div class="sidebar-content">
	<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<!-- <div style="background: black;width:92%;border:2px solid blue">
					<h4 style="padding-left: 8%">Dashboard</h4>
				</div> -->
				<div class="media">
					<?php if($data['user_info']->user_image){ ?>
					<a href="#" class="media-left"><img style="width:150px;height:150px; border-radius: 15px;"src="<?php echo base_url('assets/images/'.$data['user_info']->user_image) ?>" alt=""></a>
					<?php }
					else { ?>
						<a href="#" class="media-left"><img style="width:150px;height:150px; border-radius: 15px;"src="<?php echo base_url('assets/images/person.JPG') ?>" alt=""></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /user menu -->
		<!-- Main navigation -->
			<div class="sidebar-category sidebar-category-visible">
				<div class="category-content no-padding">
					<ul class="navigation navigation-main navigation-accordion">
						<!-- Main -->
						<!-- <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li> -->
						<li class="<?php echo $active_nav =="dashboard"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Manage Profile</span></a>
							<ul>
								<li class="<?php echo $active_nav =="add_teacher"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_teacher') ?>">Add Teacher</a></li>
								<li class="<?php echo $active_nav =="add_graduate_student"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_graduate_student') ?>">Add Student</a></li>
								<li class="<?php echo $active_nav =="add_stuff"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_stuff') ?>">Add Stuff</a></li>
								<!-- <li class="<?php echo $active_nav =="add_planning_committee_member"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_planning_committee_member') ?>">Add Planning Committee Member</a></li> -->
								<li class="<?php echo $active_nav =="profile_list"?"active":""; ?>"><a href="#">Profile List</a>
									<ul>
										<li class="<?php echo $active_nav =="teacher_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/teacher_list') ?>">Teacher</a></li>
										<li class="<?php echo $active_nav =="student_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/student_list') ?>">Student</a></li>
										<li class="<?php echo $active_nav =="stuff_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/stuff_list') ?>">Stuff</a></li>
									</ul>
								</li>

							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Session</span></a>
							<ul>
								<li class="<?php echo $active_nav =="add_session"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_session') ?>">Add Session</a></li>
								<li class="<?php echo $active_nav =="session_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/session_list') ?>">Session List</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Library System</span></a>
							<ul>
								<li class="<?php echo $active_nav =="add_book"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/addBook') ?>">Add Book</a></li>
								<li class="<?php echo $active_nav =="assign_book_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/getAllAssignedBookList') ?>">Assigned Book List</a></li>
								<li class="<?php echo $active_nav =="book_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/getBookList') ?>">Book List</a></li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Activites</span></a>
							<ul>
								<li class="<?php echo $active_nav =="meetings"?"active":""; ?>"><a href="#">Meetings</a>
									<ul>
										<li class="<?php echo $active_nav =="add_meeting"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_meeting') ?>">Add Meetings</a>
										<li class="<?php echo $active_nav =="meeting_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/meeting_list') ?>">Meeting List</a>		
										<li class="<?php echo $active_nav =="ac_meetings"?"active":""; ?>"><a href="#">Academic Committee Meetings</a>
										<ul>
											<!-- <li class="<?php echo $active_nav =="ac_meeting_invitation"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/ac_meeting_invitation') ?>">Meeting Invitation</a></li> -->
											<li class="<?php echo $active_nav =="ac_meeting_agenda"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/ac_meeting_agenda') ?>">Meeting Agenda</a></li>
											<li class="<?php echo $active_nav =="ac_meeting_cancel"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/ac_meeting_cancel') ?>">Meeting Cancel</a></li>
											<li class="<?php echo $active_nav =="ac_meeting_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/ac_meeting_list') ?>">Meeting List</a></li>

										</ul>
										</li>
										<li class="<?php echo $active_nav =="pc_meetings"?"active":""; ?>"><a href="#">Planning Committee Meetings</a>
										<ul>
											<!-- <li class="<?php echo $active_nav =="pc_meeting_invitation"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/pc_meeting_invitation') ?>">Meeting Invitation</a></li> -->
											<li class="<?php echo $active_nav =="pc_meeting_agenda"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/pc_meeting_agenda') ?>">Meeting Agenda</a></li>
											<li class="<?php echo $active_nav =="pc_meeting_cancel"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/pc_meeting_cancel') ?>">Meeting Cancel</a></li>
											<li class="<?php echo $active_nav =="pc_meeting_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/pc_meeting_list') ?>">Meeting List</a></li>
										</ul>
										</li>
									</ul>
								</li>
								<li class="<?php echo $active_nav =="class_notice"?"active":""; ?>"><a href="#">Class</a>
									<ul>
										
										<li class="<?php echo $active_nav =="assign_course"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/assign_course') ?>">Assign Course</a></li>
										<li class="<?php echo $active_nav =="assign_course_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/assign_course_list') ?>">Assign Course List</a></li>
										<li class="<?php echo $active_nav =="assign_teacher1"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/assign_teacher1')?>">Assign Teacher</a></li>
										<li class="<?php echo $active_nav =="assign_teacher_list1"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/assign_teacher_list1')?>">Assign Teacher List</a></li>
										<li class="<?php echo $active_nav =="class_routine_list1"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/class_routine_list1') ?>">Routine List</a></li>
									</ul>
								</li>
								<li class="<?php echo $active_nav =="exam_notice"?"active":""; ?>"><a href="#">Exam</a>
									<ul>
										<li class="<?php echo $active_nav =="add_exam_routine"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_exam_routine') ?>">Add Exam Routine</a>
										</li>
										<li class="<?php echo $active_nav =="see_exam_list1"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/see_exam_list1') ?>">Exam Routine List</a>
										</li>
									</ul>
								</li>
								<li class="<?php echo $active_nav =="notice"?"active":""; ?>"><a href="#">Notice</a>
									<ul>
										<li class="<?php echo $active_nav =="send_notice"?"active":""; ?>"><a href="#">Send Notice</a>
											<ul>
											<li class="<?php echo $active_nav =="send_notice_all"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/send_notice_all') ?>">To All</a>
											<li class="<?php echo $active_nav =="send_notice_teacher"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/send_notice_teacher') ?>">To Teacher</a>
											</li>
											<li class="<?php echo $active_nav =="send_notice_student"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/send_notice_student') ?>">To Student</a>
											</li>
											<li class="<?php echo $active_nav =="send_notice_stuff"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/send_notice_stuff') ?>">To Stuff</a>
											</li>
											</ul>
										</li>
										<li class="<?php echo $active_nav =="see_sent_notice"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/see_sent_notice') ?>">Sent Notice</a>
										</li>
									</ul>
								</li>
								
								<li class="<?php echo $active_nav =="appliction"?"active":""; ?>"><a href="#">Application</a>
									<ul>
										<li class="<?php echo $active_nav =="send_application"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/send_application') ?>">Send Application</a>
										</li>
										<li class="<?php echo $active_nav =="view_application"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/view_application') ?>">View Application</a>
										</li>
									</ul>
								</li>
							</ul>

						</li>
						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Settings</span></a>
							<ul>
								<li class="<?php echo $active_nav =="change_settings"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/change_settings') ?>">Change Settings</a></li>
								<li class="<?php echo $active_nav =="slider_settings"?"active":""; ?>"><a href="#">Slider Settings</a>
								<ul>
									<li class="<?php echo $active_nav =="add_slider"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/add_slider') ?>">Add Slider</a></li>
									<li class="<?php echo $active_nav =="slider_list"?"active":""; ?>"><a href="<?php echo base_url('dashboard_admin/slider_list') ?>">Slider List</a></li>
								</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		<!-- /main navigation -->
	</div>
</div>
			