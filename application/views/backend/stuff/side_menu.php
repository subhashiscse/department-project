<div class="sidebar sidebar-main">
	<div class="sidebar-content">
	<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<?php if($stuff_info->stuff_image){ ?>
					<a href="#" class="media-left"><img style="width:150px;height:150px; border-radius: 15px;"src="<?php echo base_url('assets/images/'.$stuff_info->stuff_image) ?>" alt=""></a>
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
						<li class="<?php echo $active_nav =="dashboard"?"active":""; ?>"><a href="<?php echo base_url('dashboard_stuff') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
						<li class="<?php echo $active_nav =="see_notice"?"active":""; ?>">
							<a href="<?php echo base_url('dashboard_stuff/see_notice') ?>"><i class="icon-stack2"></i> <span>Notice</span></a>
						</li>
					</ul>
				</div>
			</div>
		<!-- /main navigation -->
	</div>
</div>
			