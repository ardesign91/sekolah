<!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>HASIL SELEKSI <?=date('Y')?></h2>
          <ol>
            <li><a href="<?=base_url()?>">Home</a></li>
            <li>HASIL SELEKSI</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
		<div class="container">
			<!-- ROW -->
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 " data-aos-delay="200">
					<h5 class="page-title mb-3 text-info"><?=strtoupper($page_title)?></h5>
					<div class="card mb-3">
						<div class="card-body">
							<div class="form-group row mb-2">
								<label for="registration_number" class="col-sm-4 control-label">Nomor Pendaftaran <span style="color: red">*</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control form-control-sm r" id="registration_number" name="registration_number">
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="birth_date" class="col-sm-4 control-label">Tanggal Lahir <span style="color: red">*</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<input type="text" readonly class="form-control form-control-sm  date" id="birth_date" name="birth_date">
										<div class="input-group-append">
											<span class="btn btn-sm btn-outline-secondary"><i class="fa fa-calendar text-dark"></i></span>
										</div>
									</div>
								</div>
							</div>
							<?php if (NULL !== __session('recaptcha_status') && __session('recaptcha_status') == 'enable') { ?>
								<div class="form-group row mb-2">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-8">
										<div class="g-recaptcha" data-sitekey="<?=$recaptcha_site_key?>"></div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="card-footer">
							<div class="form-group">
									<button type="button" onclick="<?=$onclick?>; return false;" class="btn btn-info pull-right"><i class="fa fa-send"></i> <?=$button?></button>
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
