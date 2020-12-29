<?php
include 'tempo.php';
?>
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_1?></span>
            <p><?=$judul_1?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_2?></span>
            <p><?=$judul_2?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_3?></span>
            <p><?=$judul_3?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_4?></span>
            <p><?=$judul_4?></p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
          	<?php if ( ! in_array($this->uri->segment(1), ['sambutan-kepala-sekolah', 'sambutan-rektor', 'sambutan-ketua', 'sambutan-direktur'])) { ?>
            <div class="content">
              <h3><?=__session('headmaster')?></h3>
              <p>
               <?=word_limiter(strip_tags(get_opening_speech()), 20);?>
              </p>
              <i>- <?=__session('_headmaster')?> -</i>
              <div class="text-center">
                <a href="<?=site_url(opening_speech_route());?>" class="more-btn">Selengkapnya<i class="bx bx-chevron-right"></i></a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4><?=$title_1?></h4>
                    <p><?=$des_1?>/p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4><?=$title_2?></h4>
                    <p><?=$des_2?></p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4><?=$title_3?></h4>
                    <p><?=$des_3?></p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Popular Post</p>
        </div>
<?php $query = get_latest_posts(3); if ($query->num_rows() > 0) { ?>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
		<?php foreach($query->result() as $row) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch ">
            <div class="course-item">
              <img src="<?=base_url('media_library/posts/medium/'.$row->post_image)?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <!-- <h4>Web Development</h4> -->
                  <p class="price"><?=date('d/m/Y H:i', strtotime($row->created_at))?></p>
                </div>

                <h3><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
                <p><?=substr(strip_tags($row->post_content), 0, 165)?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span><?=$row->post_author?></span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-show-alt"></i>&nbsp;<?=$row->post_counter?>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
<?php } ?>

        </div>

	<?php } ?>
      </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
    <?php $query = get_albums(3); if ($query->num_rows() > 0) { ?>
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>GAllery</h2>
          <p>Our Gallery</p>
        </div>
        
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php foreach($query->result() as $row) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?=base_url('media_library/albums/'.$row->album_cover)?>" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?=$row->album_title?></h4>
                <!-- <span>Web Development</span> -->
                <p>
                  <?=$row->album_description?>
                </p>
                <div class="social">
                  <button type="button" onclick="photo_preview(<?=$row->id?>)" class="btn action-button rounded-0"><i class="icofont-instagram"></i> Lihat Album</button>
                </div>
              </div>
            </div>
          </div>
<?php } ?>
        </div>
        
      </div>
    </section>
    <?php } ?>

