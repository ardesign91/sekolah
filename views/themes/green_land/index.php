<!DOCTYPE html>
<html lang="en">

<head>
	<title><?=isset($page_title) ? $page_title . ' | ' : ''?><?=__session('school_name')?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="keywords" content="<?=__session('meta_keywords');?>"/>
	<meta name="description" content="<?=__session('meta_description');?>"/>
	<meta name="subject" content="Situs Pendidikan">
	<meta name="copyright" content="<?=__session('school_name')?>">
	<meta name="language" content="Indonesia">
	<meta name="robots" content="index,follow" />
	<meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />
	<meta name="Classification" content="Education">
	<meta name="category" content="Admission, Education">
	<meta name="coverage" content="Worldwide">
	<meta name="distribution" content="Global">
	<meta name="rating" content="General">
	<meta name="revisit-after" content="7 days">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Copyright" content="<?=__session('school_name');?>" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="revisit-after" content="7" />
	<meta name="webcrawlers" content="all" />
	<meta name="rating" content="general" />
	<meta name="spiders" content="all" />
	<meta itemprop="name" content="<?=__session('school_name');?>" />
	<meta itemprop="description" content="<?=__session('meta_description');?>" />
	<meta itemprop="image" content="<?=base_url('media_library/images/'. __session('logo'));?>" />
	<meta name="csrf-token" content="<?=__session('csrf_token')?>">
	<?php if (isset($post_type) && $post_type == 'post') { ?>
		<meta property="og:url" content="<?=current_url()?>" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="<?=$query->post_title?>" />
		<meta property="og:description" content="<?=word_limiter(strip_tags($query->post_content), 30)?>" />
		<meta property="og:image" content="<?=base_url('media_library/posts/large/'.$query->post_image)?>" />
	<?php } ?>
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
  <!-- Favicons -->
  <link rel="icon" href="<?=base_url('media_library/images/'.__session('favicon'));?>">
  <link rel="alternate" type="application/rss+xml" title="<?=__session('school_name');?> Feed" href="<?=base_url('feed')?>" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <?=link_tag('assets/css/font-awesome.min.css')?>
  <?=link_tag('assets/css/owl.carousel.min.css');?>
  <?=link_tag('assets/css/owl.theme.default.min.css');?>
 <?=link_tag('assets/vendor/bootstrap/css/bootstrap.min.css');?>
 <?=link_tag('assets/vendor/icofont/icofont.min.css');?>
 <?=link_tag('assets/vendor/boxicons/css/boxicons.min.css');?>
 <?=link_tag('assets/vendor/remixicon/remixicon.css');?>
 <?=link_tag('assets/vendor/owl.carousel/assets/owl.carousel.min.css');?>
 <?=link_tag('assets/vendor/animate.css/animate.min.css');?>
 <?=link_tag('assets/vendor/aos/aos.css');?>
 <?=link_tag('assets/plugins/toastr/toastr.css')?>
 <?=link_tag('assets/plugins/datetimepicker/datetimepicker.css');?>
  <?=link_tag('assets/plugins/jquery.smartmenus/jquery.smartmenus.bootstrap-4.css')?>
  <?=link_tag('assets/plugins/jquery.smartmenus/sm-core.css')?>
  <?=link_tag('assets/plugins/jquery.smartmenus/sm-clean.css')?>
  <?=link_tag('assets/plugins/magnific-popup/magnific-popup.css')?>
  

  <!-- Template Main CSS File -->
  <?=link_tag('assets/css/style.css');?>

<script type="text/javascript">
	const _BASE_URL = '<?=base_url();?>';
	const _CURRENT_URL = '<?=current_url();?>';
	const _SCHOOL_LEVEL = '<?=__session('school_level');?>';
	const _ACADEMIC_YEAR = '<?=__session('_academic_year');?>';
	const _STUDENT = '<?=__session('_student');?>';
	const _IDENTITY_NUMBER = '<?=__session('_identity_number');?>';
	const _EMPLOYEE = '<?=__session('_employee');?>';
	const _HEADMASTER = '<?=__session('_headmaster');?>';
	const _MAJOR = '<?=__session('_major');?>';
	const _SUBJECT = '<?=__session('_subject');?>';
	const _RECAPTCHA_STATUS = '<?=(NULL !== __session('recaptcha_status') && __session('recaptcha_status') == 'enable') ? 'true': 'false';?>'=='true';
	</script>
	<?php if (NULL !== __session('recaptcha_status') && __session('recaptcha_status') == 'enable') { ?>
		<script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
	<?php } ?>
	<script src="<?=site_url('assets/js/frontend.min.js')?>"></script>
</head>

<body>
<noscript>
      You need to enable javaScript to run this app.
   </noscript>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="<?=base_url()?>" class="logo mr-auto"><img src="<?=base_url('media_library/images/' . __session('logo'))?>" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block" id="navbarNavDropdown">
        <ul id="main-menu">
          <li class="active"><a href="<?=base_url()?>">HOME</a></li>
          <?php
              $menus = get_menus();
              foreach ($menus as $menu) {
                $haveDropdown = count($menu['children']) > 0;
                echo $haveDropdown ? '<li class="drop-down">' : '<li>';
                $url = $menu['menu_url'] == '#' ? $menu['menu_url'] : base_url() . $menu['menu_url'];
                if ($menu['menu_type'] == 'links') $url = $menu['menu_url'];
                echo '<a href="'. $url .'" target="'. $menu['menu_target'] .'">' . strtoupper($menu['menu_title']) . '</a>';
                $sub_nav = recursive_list($menu['children']);
                if ($sub_nav) echo '<ul>' . $sub_nav . '</ul>';
                echo '</li>';
              }?>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
<?php if ( ! $this->uri->segment(1)) { ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container text-center" data-aos="zoom-in" data-aos-delay="100">
      <a href="<?=base_url()?>" class="logo mr-auto"><img src="<?=base_url('media_library/images/' . __session('logo'))?>" alt="" class="img-fluid"></a>
      <h1><?=strtoupper(__session('school_name'))?></h1>
      <h2><?=__session('tagline')?></h2>
      <a href="<?=site_url('formulir-penerimaan-peserta-didik-baru')?>" class="btn-get-started">Daftar PPDB</a>
    </div>
  </section><!-- End Hero -->
<?php } ?>
  <main id="main">
    <?php if ( ! $this->uri->segment(1)) { ?>
      <!-- IMAGE SLIDERS -->
      
      <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kutipan</h2>
          <p>Kutipan</p>
        </div>

        <div class="row ">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <?php $query = get_image_sliders(); if ($query->num_rows() > 0) { ?>
            <div id="slide-indicators" class="owl-carousel owl-theme ">
              <?php $idx = 0; foreach($query->result() as $row) { ?>
              <div class="item <?=$idx == 0 ? 'active' : ''?>" style="width:600px">
                <img src="<?=base_url('media_library/image_sliders/'.$row->image);?>" class="img-fluid">
              </div>
              <?php $idx++; } ?>
            </div>
          </div>
        <?php } ?>
        <?php $query = get_quotes(3); if ($query->num_rows() > 0) { ?>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3><?=strtoupper(__session('school_name'))?></h3>
            <p class="font-italic">
              <?=__session('tagline')?>
            </p>
         
            <ul id="quote" class="owl-carousel">
              <?php foreach($query->result() as $row) { ?>
                <li class="item" style="width: 550px"><i class="icofont-check-circled"></i> <?=$row->quote?>.</li>
              <?php } ?>
            </ul>
        
            <a href="about.html" class="learn-more-btn">Learn More</a>
          </div>
        <?php } ?>
        </div>

      </div>
    </section><!-- End About Section -->
<?php } ?>
    <?php $this->load->view($content)?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Contact Us</h3>
            <p>
              <strong>Alamat:</strong> <?=__session('street_address')?><br>
              <strong>Phone:</strong> <?=__session('phone');?><br>
              <strong>Email:</strong> <?=__session('email');?><br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Tags</h4>
            <ul>
              <?php $query = get_tags(3); if ($query->num_rows() > 0) { ?>
					<?php foreach ($query->result() as $row) { ?>
						<li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('tag/'.$row->slug)?>"><?=$row->tag?></a></li>
					<?php } ?>
				<?php } ?>
            </ul>
          </div>

          

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4> 
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form >
             <input type="email" id="subscriber" name="email" onkeydown="if (event.keyCode == 13) { subscribe(); return false; }"  placeholder="Email Address..."><input type="submit" onclick="if (event.keyCode == 13) { subscribe(); return false; }"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; <?=copyright(2020, base_url(), __session('school_name'))?>
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://ardesign.web.id/">ARDESIGN.WEB.ID</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
      	<?php if (NULL !== __session('twitter') && __session('twitter')) { ?>
        <a href="<?=__session('twitter')?>" class="twitter"><i class="bx bxl-twitter"></i></a>
        <?php } ?>
        <?php if (NULL !== __session('facebook') && __session('facebook')) { ?>
        <a href="<?=__session('facebook')?>" class="facebook"><i class="bx bxl-facebook"></i></a>
        <?php } ?>
        <?php if (NULL !== __session('instagram') && __session('instagram')) { ?>
        <a href="<?=__session('instagram')?>" class="instagram"><i class="bx bxl-instagram"></i></a>
        <?php } ?>
        <?php if (NULL !== __session('youtube') && __session('youtube')) { ?>
        <a href="<?=__session('youtube')?>" class="youtube"><i class="bx bxl-youtube"></i></a>
        <?php } ?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?=base_url()?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>assets/js/main.js"></script>
  <script type="text/javascript">
   var owl = $('.owl-carousel');
owl.owlCarousel({
    margin:10,
    loop:true,
    autoWidth:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
});

  </script>

</body>
 
</html>