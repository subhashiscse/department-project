<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/jquery.fancybox.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/owl.carousel.min.css')?>" >
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/animate.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/all.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/icofont.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/style.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/new_layout/css/responsive.css')?>">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">
</head>
<body>
	<div class="wrapping">
      <!-- University name Area Start -->
      <section class="university">
        <div class="row">
          <div class="col-md-1">
            <div class="university-img" >
              <img src="assets/new_layout/images/university.jpg" alt="">
            </div>
          </div>
          <div class="col-md-10">
            <div class="university-in" style="border: none;"> 
              <h1 style="margin-top: 5px;">Department of Computer Science & Engineering</h1>
              <h2 style="margin-top: 5px;font-weight: bold;text-transform: uppercase;">Islamic University, Bangladesh</h2>
            </div><!-- ./university-in -->
          </div>
          <div class="col-md-1">
            <div class="btn-group" style="margin-top:30%">
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
              </button>
              <div class="dropdown-menu"style="background: #00254E">
                <a style="background: #00254E;color:white" class="dropdown-item" href="login_admin">Login as Admin</a>
                <a style="background: #00254E;color:white" class="dropdown-item" href="login_teacher">Login as Teacher</a>
                <a style="background: #00254E;color:white" class="dropdown-item" href="login_student">Login as Student</a>
                <a style="background: #00254E;color:white" class="dropdown-item" href="login_stuff">Login as Stuff</a>
              </div>
            </div>
        </div>
      </section><!-- ./university -->
      <!-- University name Area End -->
      <!-- Slider Area Start -->
      <section id="slider_section" class="hero-section">
          <div class="slider owl-carousel" id="hero-slider">
              <?php foreach ($slider as $row) {?>
                  <div class="single-slide-item hero-bg-1" style="background-image: url('<?php echo base_url(); ?>assets/images/<?php echo $row->slider_image; ?>');">
                      <div class="overlay-bg"></div>
                      <div class="hero-content">
                          <div class="hero-cont-table-cell">
                              <div class="container">
                                  <div class="row" >
                                      <div class="col-md-10" >
                                          <h1>Online Department<h1>
                                          <h1>Automation System</h1>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php } ?>
          </div>
      </section>
      <!-- Slider Area End -->

      <!-- Welcome Area Start -->
      <section class="welcome">
        <div class="container">
          <div class="welcome-in">
            <h2>Welcome to CSE IU. Thank You To Watch Our Website </h2>
          </div>
        </div><!-- ./container -->
      </section><!-- ./welcome -->
      <!-- Welcome Area End -->
    </div><!-- ./wrapping -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/new_layout/js/jquery3.4.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/new_layout/js/proper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/new_layout/js/bootstrap.min.js') ?>"></script>
    <!-- Fancybox JS -->
    <script src="<?php echo base_url('assets/new_layout/js/jquery.fancybox.min.js') ?>"></script>
    <!-- Mixitup JS -->
    <script src="<?php echo base_url('assets/new_layout/js/mixitup.min.js') ?>"></script>
    <!-- Owlcarousel JS -->
    <script src="<?php echo base_url('assets/new_layout/js/owl.carousel.min.js') ?>"></script>
    <!-- Wow JS -->
    <script src="<?php echo base_url('assets/new_layout/js/wow.min.js') ?>"></script>
    <!-- Custom JS -->
    <script src="<?php echo base_url('assets/new_layout/js/main.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/frontend/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
</html>