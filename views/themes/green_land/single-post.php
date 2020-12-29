<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
var page = 1;
var total_page = "<?=$total_page;?>";
$(document).ready(function() {
  if (parseInt(total_page) == page || parseInt(total_page) == 0) {
    $('.more-comments').remove();
  }
});
function get_post_comments() {
  page++;
  var data = {
    page_number: page,
    comment_post_id: '<?=$this->uri->segment(2)?>'
  };
  if ( page <= parseInt(total_page) ) {
    $.post( _BASE_URL + 'public/post_comments/get_post_comments', data, function( response ) {
      var res = _H.StrToObject( response );
      var rows = res.comments;
      var str = '';
      for (var z in rows) {
        var row = rows[ z ];
        str += '<div class="card shadow mb-3 post-comments">';
        str += '<div class="card-body">';
        str += row.comment_content;
        str += '</div>';
        str += '<div class="card-footer">';
        str += '<small class="text-muted float-right">';
        str += row.created_at.substr(8, 2) + '/' + row.created_at.substr(5, 2) + '/' + row.created_at.substr(0, 4);
        str += ' ' + row.created_at.substr(11, 5);
        str += ' - ' + row.comment_author;
        str += '</small>';
        str += '</div>';
        str += '</div>';
      }
      var elementId = $(".post-comments:last");
      $( str ).insertAfter( elementId );
      if ( page == parseInt(total_page) ) $('.more-comments').remove();
    });
  }
}
</script>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
         <a href="<?=base_url()?>" class="logo mr-auto"><img src="<?=base_url('media_library/images/' . __session('logo'))?>" alt="" class="img-fluid" width="90px"></a> 
        <h2><?=strtoupper(__session('school_name'))?></h2> 
        <p><?=__session('tagline')?></p>
      </div>
    </div><!-- End Breadcrumbs -->
   <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <?php if ($post_type == 'post' && file_exists('./media_library/posts/large/'.$query->post_image)) { ?>
            <img src="<?=base_url('media_library/posts/large/'.$query->post_image)?>" class="img-fluid" alt="">
            <?php } ?>
            <h3><?=$query->post_title?></h3>
            <p>
             <?=$query->post_content?>
            </p>
            <!--  Komentar-->
  <?php if ($post_comments->num_rows() > 0) { ?>
    <h5 class="page-title mt-3 mb-3"><?=$post_comments->num_rows()?> Komentar</h5>
    <?php foreach($post_comments->result() as $row) { ?>
      <div class="card shadow mb-3 post-comments">
        <div class="card-body">
          <p class="card-text"><?=strip_tags($row->comment_content)?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted float-right"><?=date('d/m/Y H:i', strtotime($row->created_at))?> - <?=$row->comment_author?></small>
        </div>
      </div>
      <?php if (! empty($row->comment_reply)) { ?>
        <div class="card shadow mb-3 post-comments ml-5">
          <div class="card-body">
            <p class="card-text"><?=strip_tags($row->comment_reply)?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted float-right">Administrator</small>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
    <div class="justify-content-between align-items-center float-right mb-3 w-100 more-comments">
      <button type="button" onclick="get_post_comments()" class="btn btn-success"><i class="fa fa-refresh"></i> Komentar Lainnya</button>
    </div>
  <?php } ?>

  <!-- Form Comment -->
  <?php if (
    (
      $query->post_comment_status == 'open' &&
      filter_var(__session((string) 'comment_registration'), FILTER_VALIDATE_BOOLEAN) &&
      $this->auth->hasLogin()
      ) ||
      (
        $query->post_comment_status == 'open' &&
        __session('comment_registration') == 'false'
        )
      ) { ?>
        <h5 class="page-title mt-3 mb-3">Komentari Tulisan Ini</h5>
        <div class="card shadow mb-3">
          <div class="card-body">
            <div class="form-group row mb-2">
              <label for="comment_author" class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="comment_author" name="comment_author">
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="comment_email" class="col-sm-3 control-label">Email <span style="color: red">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm " id="comment_email" name="comment_email">
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="comment_url" class="col-sm-3 control-label">URL</label>
              <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" id="comment_url" name="comment_url">
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="comment_content" class="col-sm-3 control-label">Komentar <span style="color: red">*</span></label>
              <div class="col-sm-9">
                <textarea class="form-control form-control-sm" id="comment_content" name="comment_content" rows="4"></textarea>
              </div>
            </div>
            <?php if (NULL !== __session('recaptcha_status') && __session('recaptcha_status') == 'enable') { ?>
              <div class="form-group row mb-2">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                  <div class="g-recaptcha" data-sitekey="<?=$recaptcha_site_key?>"></div>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="card-footer">
            <div class="form-group row mb-0">
              <div class="offset-sm-3 col-sm-9">
                <input type="hidden" name="comment_post_id" id="comment_post_id" value="<?=$this->uri->segment(2)?>">
                <button type="button" onclick="post_comments(); return false;" class="btn btn-success pull-right"><i class="fa fa-send"></i> Submit</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
          </div>
           
          <div class="col-lg-4">
          <?php if ( ! in_array($this->uri->segment(1), ['sambutan-kepala-sekolah', 'sambutan-rektor', 'sambutan-ketua', 'sambutan-direktur'])) { ?>
            <div class="card"> 
              <div class="card-header bg-success text-white">
                <h5><?=__session('headmaster')?></h5>
              </div>
              <div class="card-body text-center">
                 <img src="<?=base_url('media_library/images/').__session('headmaster_photo');?>" alt="" class="img-fluid" width="250px">
                  <p class="font-italic">- <?=__session('_headmaster')?> -</p>
                  <p><?=word_limiter(strip_tags(get_opening_speech()), 25);?></p>
              </div>
              <div class="card-footer text-center">
        <small class="text-muted text-uppercase"><a href="<?=site_url(opening_speech_route());?>">Selengkapnya</a></small>
      </div>
            </div>
          <?php } ?>
            <?php $query = get_banners(); if ($query->num_rows() > 0) { ?>
                      <h3>Iklan</h3>
                      <?php foreach($query->result() as $row) { ?>
                        <div class="card-body">
                          <a href="<?=$row->link_url?>" title="<?=$row->link_title?>"><img src="<?=base_url('media_library/banners/'.$row->link_image)?>" class="img-fluid" alt="<?=$row->link_title?>"></a>
                        </div>
                      <?php } ?>
                    <?php } ?>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->
    
    <?php $this->load->view('themes/green_land/sidebar')?>