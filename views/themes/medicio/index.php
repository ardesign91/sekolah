<!-- VERSI : 0.2 -->
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

  <!-- Favicons -->
  <link rel="icon" href="<?=base_url('media_library/images/'.__session('favicon'));?>">
  <link rel="alternate" type="application/rss+xml" title="<?=__session('school_name');?> Feed" href="<?=base_url('feed')?>" />
  <link href="<?=base_url('media_library/images/'.__session('favicon'));?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<script src="<?=base_url()?>views/themes/medicio/assets/vendor/jquery/jquery.min.js"></script>
  <!-- Vendor CSS Files -->
  <?=link_tag('views/themes/medicio/assets/vendor/bootstrap/css/bootstrap.min.css')?>
  <?=link_tag('views/themes/medicio/assets/vendor/icofont/icofont.min.css')?>
  <?=link_tag('views/themes/medicio/assets/vendor/boxicons/css/boxicons.min.css')?>
  <?=link_tag('views/themes/medicio/assets/vendor/animate.css/animate.min.css')?>
  <?=link_tag('views/themes/medicio/assets/vendor/owl.carousel/assets/owl.carousel.min.css')?>
  <?=link_tag('views/themes/medicio/assets/vendor/venobox/venobox.css')?>
  <?=link_tag('views/themes/medicio/assets/vendor/aos/aos.css')?>
	<?=link_tag('assets/css/font-awesome.min.css')?>
	<?=link_tag('assets/plugins/toastr/toastr.css')?>
	<?=link_tag('assets/plugins/datetimepicker/datetimepicker.css');?>
	<?=link_tag('assets/plugins/magnific-popup/magnific-popup.css')?>
  <!-- Template Main CSS File -->
  <?=link_tag('views/themes/medicio/assets/css/style.css')?>
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
  <!-- =======================================================
  * Template Name: Medicio - v2.1.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style type="text/css">
  .quote {
   overflow: hidden;
   background-color: #3fbbc0;
}
ul.quote {
   display: block;
   padding: 0;
   margin: 0;
   list-style: none;
   line-height: 1;
   position: relative;
   overflow: hidden;
   height: 50px;
   background-color: transparent;
}
ul.quote li {
   color: #fff;
   position: absolute;
   top: -950em;
   left: 0;
   display: block;
   white-space: nowrap;
   font: 18px Helvetica, Arial, sans-serif;
   padding: 17px 15px 15px 15px;
}
ul.quote li span {
   color: #fff;
   font-weight: bold;
}
</style>
<body>
<noscript>
      You need to enable javaScript to run this app.
</noscript>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us now <?=__session('phone');?>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="<?=base_url()?>" class="logo mr-auto"><img src="<?=base_url('media_library/images/' . __session('logo'))?>" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="<?=base_url()?>"><?=__session('school_name')?></a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?=base_url()?>">Home</a></li>
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

      <!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->
<?php if ( ! $this->uri->segment(1)) { ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <?php $query = get_image_sliders(); if ($query->num_rows() > 0) { ?>

      <div class="carousel-inner" role="listbox">
        <?php $idx = 0; foreach($query->result() as $row) { ?>
        <!-- Slide 1 -->
       
        <div class="carousel-item  <?=$idx == 0 ? 'active' : ''?>" style="background-image: url(<?=base_url('media_library/image_sliders/'.$row->image);?>)">
          <div class="container">
            <h2>Welcome to <span><?=__session('school_name')?></span></h2>
            <p><?=$row->caption;?>.</p>
          </div>
         
        </div>
        <?php $idx++; } ?>
      <?php } ?>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
<?php } ?>
  <main id="main">

    <?php $this->load->view($content)?>

  </main><!-- End #main -->
  <div id="WAButton"></div>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3><?=__session('school_name')?></h3>
              <p>
                <?=__session('street_address')?> <br>
                <strong>Phone:</strong> <?=__session('phone')?><br>
                <strong>Email:</strong> <?=__session('email')?><br>
              </p>
              <div class="social-links mt-3">
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
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=base_url()?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('read/2/profil')?>">Profil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('direktori-peserta-didik')?>">Data Siswa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('hubungi-kami')?>">Contact us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Tags</h4>
            <ul>
            <?php $query = get_tags(5); if ($query->num_rows() > 0) { ?>
								<?php foreach ($query->result() as $row) { ?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?=site_url('tag/'.$row->slug)?>"><?=$row->tag?></a></li>
                <?php } ?>
							<?php } ?>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form>
              <input type="email" id="subscriber" onkeydown="if (event.keyCode == 13) { subscribe(); return false; }">
              <input type="submit" onclick="if (event.keyCode == 13) { subscribe(); return false; }" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <?=copyright(2020, base_url(), __session('school_name'))?>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | Powered by <a href="http://sekolahku.web.id">sekolahku.web.id</a> | Themes CMS by <a href="http://ardesign.web.id">ardesign.web.id</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?=base_url()?>views/themes/medicio/assets/vendor/aos/aos.js"></script>
  <!--Floating WhatsApp css-->
<link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?=base_url()?>views/themes/medicio/assets/js/main.js"></script>
  <script type="text/javascript">
   var owl = $('.owl-carousel');
owl.owlCarousel({
    margin:3,
    loop:true,
    autoWidth:true,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
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

  <!-- TEXT WHATASAPP -->
  <script>
    $(function() {
  $('#WAButton').floatingWhatsApp({
    phone: '+6289664231114', //WhatsApp Business phone number International format-
    //Get it with Toky at https://toky.co/en/features/whatsapp.
    headerTitle: 'Hubungi kami via WhatsApp!', //Popup Title
    popupMessage: 'Halo, apakah ada yang di tanyakan?', //Popup Message
    showPopup: true, //Enables popup display
    buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
    //headerColor: 'crimson', //Custom header color
    //backgroundColor: 'crimson', //Custom background button color
    position: "left"    
  });
});

     $.ajax({
    url: "http://localhost/sekolah/lisensi.json",
    dataType: "json"
  })
  .done(function(data){
    console.log(data);

  data = data["lisensi"];
  var cari = data.findIndex(function(val){
    return val === "gagal";
  });
  if(cari > -1){
    ketemu();
  }else{
    var pesan = "Cara Membuat Alert, Confirm dan Prompt Dengan JavaScript";
     alert(pesan);
     window.location.replace("https://ardesign.web.id");
  }
});
  </script>
</body>

</html>