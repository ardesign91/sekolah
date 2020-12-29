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

<!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?=$query->post_title?></h2>
          <ol>
            <li><a href="<?=base_url()?>">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
		<div class="container">
			<!-- ROW -->
			<div class="row">
					<div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
						<?php if ($post_type == 'post' && file_exists('./media_library/posts/large/'.$query->post_image)) { ?>
							<img src="<?=base_url('media_library/posts/large/'.$query->post_image)?>" class="img-fluid">
						<?php } ?>
						<div class="card-body">
							<h4 class="card-title text-info"><?=$query->post_title?></h4>
							<p class="card-text"><?=$query->post_content?></p>
						</div>
						<div class="card-footer bg-info">
							<small class="text-white"><i class="icofont-tasks-alt"></i> <?=date('d/m/Y H:i', strtotime($query->created_at))?> - <i class="icofont-info-circle"></i> <?=$post_author?> - <i class="icofont-eye-alt"></i> <?=$post_counter?> kali</small>
						</div>
						
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
				<div class="card  mb-3 post-comments ml-5">
					<div class="card-body">
						<p class="card-text"><?=strip_tags($row->comment_reply)?></p>
					</div>
					<div class="card-footer bg-info">
						<small class="text-white float-right">Administrator</small>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="justify-content-between align-items-center float-right mb-3 w-100 more-comments">
			<button type="button" onclick="get_post_comments()" class="btn action-button rounded-0"><i class="fa fa-refresh"></i> Komentar Lainnya</button>
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
				<h5 class="page-title mt-3 mb-3 text-info">Komentari Tulisan Ini</h5>
				<div class="card shadow mb-3">
					<div class="card-body">
						<div class="form-group row mb-2">
							<label for="comment_author" class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control form-control-sm " id="comment_author" name="comment_author">
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
								<input type="text" class="form-control form-control-sm " id="comment_url" name="comment_url">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="comment_content" class="col-sm-3 control-label">Komentar <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control form-control-sm " id="comment_content" name="comment_content" rows="4"></textarea>
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
						<div class="form-group">
							
								<input type="hidden" name="comment_post_id" id="comment_post_id" value="<?=$this->uri->segment(2)?>">
								<button type="button" onclick="post_comments(); return false;" class="btn btn-info pull-right"><i class="fa fa-send"></i> Submit</button>
							
						</div>
					</div>
				</div>
			<?php } ?>
					</div>

					<!-- SIDEBAR -->
					<div class="col-md-4" data-aos="fade-left" data-aos-delay="200">
						<?php $this->load->view('themes/medicio/sidebar')?>
					</div>
					<!-- SIDEBAR -->
			</div>
			<!-- END ROW -->
		</div>
    </section>