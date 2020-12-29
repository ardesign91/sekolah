<style type="text/css">
.mapouter {
	position:relative;
	text-align:right;
}
.gmap_canvas {
	overflow:hidden;
	background:none!important;
}
</style> 
<!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?=strtoupper($page_title)?></h2>
          <ol>
            <li><a href="<?=base_url()?>">Home</a></li>
            <li><?=strtoupper($page_title)?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
		<div class="container">
			<!-- ROW -->
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 " data-aos="fade-right" data-aos-delay="200">
					<div class="mapouter border border-secondary mb-3">
						<div class="gmap_canvas">
							<?=__session('map_location') ?>
						</div>
					</div>
					<div class="card mb-3">
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
									<input type="text" class="form-control form-control-sm " id="comment_url" name="comment_url">
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="comment_content" class="col-sm-3 control-label">Pesan <span style="color: red">*</span></label>
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
							
									<button type="button" onclick="send_message(); return false;" class="btn btn-info pull-right"><i class="fa fa-send"></i> Submit</button>
								
							</div>
						</div>
					</div>
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
