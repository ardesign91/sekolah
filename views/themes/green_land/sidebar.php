

    <!-- ======= Cource Details Tabs Section ======= -->
    <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Kepala Sekolah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Tautan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Jejak Pendapat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Berlangganan</a>
              </li>
              
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <?php if ( ! in_array($this->uri->segment(1), ['sambutan-kepala-sekolah', 'sambutan-rektor', 'sambutan-ketua', 'sambutan-direktur'])) { ?>
                    <h3><?=__session('headmaster')?></h3>
                    <p class="font-italic">- <?=__session('_headmaster')?> -</p>
                    <p><?=word_limiter(strip_tags(get_opening_speech()), 30);?></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?=base_url('media_library/images/').__session('headmaster_photo');?>" alt="" class="img-fluid">
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                  <?php $links = get_links(); if ($links->num_rows(3) > 0) { ?>
                    <h3 class="page-title mb-3 <?=!in_array($this->uri->segment(1), ['sambutan-kepala-sekolah', 'sambutan-rektor', 'sambutan-ketua', 'sambutan-direktur']) ? 'mt-3' : ''?>">Tautan</h3>
                    <div class="list-group">
                      <?php foreach($links->result() as $row) { ?>
                        <a href="<?=$row->link_url?>" class="list-group-item list-group-item-action rounded-0" target="<?=$row->link_target?>"><?=$row->link_title?></a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?=base_url()?>assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    
                    <h3>Jajak Pendapat</h3>
                   
                    <?php $query = get_active_question(); if ( $query ) { ?>
                     
                       <form>
                        <div class="form-group">
                          <p><?=$query->question?></p>
                          <?php $options = get_answers($query->id); foreach($options->result() as $option) { ?>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="answer_id" id="answer_id_<?=$option->id?>" value="<?=$option->id?>">
                              <label class="form-check-label" for="answer_id_<?=$option->id?>"><?=$option->answer?></label>
                            </div>
                          <?php } ?>
                        </div>
                          
                          <div class="form-group pull-right">
                            <button type="button" name="button" onclick="vote(); return false;" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
                            <a href="<?=site_url('hasil-jajak-pendapat')?>" class="btn btn-danger"><i class="fa fa-bar-chart"></i> Hasil</a>
                          </div>
                     </form>
                    <?php } ?>
                    
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?=base_url()?>assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                  </div>
                 
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Berlangganan</h3>
                    <form class="card p-1 border border-secondary mt-2 mb-2 rounded-0">
                      <div class="input-group">
                        <input type="text" id="subscriber" onkeydown="if (event.keyCode == 13) { subscribe(); return false; }" class="form-control rounded-0 border border-secondary" placeholder="Email Address...">
                        <div class="input-group-append">
                          <button type="button" onclick="if (event.keyCode == 13) { subscribe(); return false; }" class="btn action-button rounded-0"><i class="fa fa-envelope"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="<?=base_url()?>assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Tabs Section -->