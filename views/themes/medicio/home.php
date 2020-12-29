<?php
include 'medicio.php';
?>
<!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Link Cepat</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><?=$icon1?></div>
              <h4 class="title"><a href="<?=$link1?>" target="_BLANK"><?=$judul1?></a></h4>
              <p class="description"><?=$des1?></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><?=$icon2?></div>
              <h4 class="title"><a href="<?=$link2?>" target="_BLANK"><?=$judul2?></a></h4>
              <p class="description"><?=$des2?></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><?=$icon3?></div>
              <h4 class="title"><a href="<?=$link3?>" target="_BLANK"><?=$judul3?></a></h4>
              <p class="description"><?=$des3?></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><?=$icon4?></div>
              <h4 class="title"><a href="<?=$link4?>" target="_BLANK"><?=$judul4?></a></h4>
              <p class="description"><?=$des4?></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <?php $query = get_quotes(); if ($query->num_rows() > 0) { ?>

               
              <div  class="text-center">
                <h3 class="section-title">KUTIPAN</h3>
                 <div class="quote">
                 
                  <ul id="quote" class="quote">
                    <?php foreach($query->result() as $row) { ?>
                      <li><?=$row->quote?>. <span class="font-weight-bold"><?=$row->quote_by?></span>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
                <a class="cta-btn scrollto" href="<?=site_url('formulir-penerimaan-peserta-didik-baru')?>">Daftar PPDB</a>
              </div>
          
      <?php } ?>
          </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <?php $query = get_banners(1); if ($query->num_rows() > 0) { ?>
          <div class="col-lg-6" data-aos="fade-right">
            <?php foreach($query->result() as $row) { ?>
            <a href="<?=$row->link_url?>" title="<?=$row->link_title?>"><img src="<?=base_url('media_library/banners/'.$row->link_image)?>" class="img-fluid" width="100%" alt="<?=$row->link_title?>"></a>
            <?php } ?>
          </div>
          <?php } ?>
      
          <div class="col-lg-6 pt-4 pt-lg-0 content text-center" data-aos="fade-left">
             <h3><?=__session('headmaster')?></h3>
            <img src="<?=base_url('media_library/images/').__session('headmaster_photo');?>" class="img-fluid img-thumbnail rounded-circle" width="250px">
            <p class="font-italic">
              - <?=__session('_headmaster')?> -
            </p>
           <p><?=word_limiter(strip_tags(get_opening_speech()), 20);?></p>
           <div class="form-group">
             <a href="" class="btn btn-info">Selengkapnya</a>
           </div>
          </div>
          
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>DAFTAR PPDB</h2>
          </div>
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-laptop-alt"></i>
              <span data-toggle="counter-up">1</span>
              <p><strong>Calon Siswa</strong> mendaftar secara online dan mencetak Tanda Bukti Pendaftaran</p>
   
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-paper"></i>
              <span data-toggle="counter-up">2</span>
              <p><strong>Calon Siswa</strong> Menyerahkan Tanda Bukti beserta persyartan lain kepada operator</p>

            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-tasks"></i>
              <span data-toggle="counter-up">3</span>
              <p><strong>Calon Siswa</strong> menerima Tanda Bukti Verivikasi</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-thumbs-up"></i>
              <span data-toggle="counter-up">4  </span>
              <p><strong>Calon Siswa</strong> melihat hasil secara online,kapan saja dan dimana saja</p>
              <a href="<?=site_url('hasil-seleksi-penerimaan-peserta-didik-baru')?>">Cek Hasil Seleksi &raquo;</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
            <div class="icon-box mt-5 mt-lg-0">
              <?=$icon_1?>
              <h4><?=$judul_1?></h4>
              <p><?=$des_1?></p>
            </div>
            <div class="icon-box mt-5">
              <?=$icon_2?>
              <h4><?=$judul_2?></h4>
              <p><?=$des_2?></p>
            </div>
            <div class="icon-box mt-5">
              <?=$icon_3?>
              <h4><?=$judul_3?></h4>
              <p><?=$des_3?></p>
            </div>
            <div class="icon-box mt-5">
              <?=$icon_4?>
              <h4><?=$judul_4?></h4>
              <p><?=$des_4?></p>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2">
            <?=$video?>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>TULISAN TERBARU</h2>
            </div>
<?php $query = get_latest_posts(6); if ($query->num_rows() > 0) { ?>
        <div class="row">
        <?php foreach($query->result() as $row) { ?>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="icofont-papers"></i></div>
            <h4 class="title"><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h4>
            <p class="description"><?=substr(strip_tags($row->post_content), 0, 110)?></p>
          </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Services Section -->
<?php } ?>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">
<?php $query = get_albums(10); if ($query->num_rows() > 0) { ?>
        <div class="section-title">
          <h2>Gallery Album</h2>
       </div>
      
        <div class="owl-carousel gallery-carousel" data-aos="fade-up" data-aos-delay="100">
        <?php foreach($query->result() as $row) { ?>
          <img src="<?=base_url('media_library/albums/'.$row->album_cover)?>" alt="" onclick="photo_preview(<?=$row->id?>)">
          <?php } ?>
        </div>
      
       <?php } ?>
      </div>
    </section><!-- End Gallery Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

      <div class="section-title">
          <h2>Contact</h2>
        </div>
        <div class="card shadow">
          <?=__session('map_location') ?>
        </div>
      </div>

      

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p><?=__session('street_address')?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?=__session('email')?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><?=__session('phone')?></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text"  class="form-control" id="comment_author" name="comment_author" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" id="comment_email" name="comment_email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="comment_url" name="comment_url" placeholder="Url" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" id="comment_content" name="comment_content" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <?php if (NULL !== __session('recaptcha_status') && __session('recaptcha_status') == 'enable') { ?>
              <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="<?=$recaptcha_site_key?>"></div>
              </div>
              <?php } ?>
              <div class="text-center"><button type="submit" onclick="send_message(); return false;">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->