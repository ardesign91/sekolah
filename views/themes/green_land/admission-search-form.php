
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2><?=strtoupper($page_title)?></h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<div class="form-group row mb-2">
				<label for="registration_number" class="col-sm-4 control-label">Nomor Pendaftaran <span style="color: red">*</span></label>
				<div class="col-sm-8">
					<input type="text" class="form-control form-control-sm rounded-0 border border-secondary" id="registration_number" name="registration_number">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label for="birth_date" class="col-sm-4 control-label">Tanggal Lahir <span style="color: red">*</span></label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" readonly class="form-control form-control-sm rounded-0 border border-secondary date" id="birth_date" name="birth_date">
						<div class="input-group-append">
							<span class="btn btn-sm btn-outline-secondary rounded-0"><i class="fa fa-calendar text-dark"></i></span>
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
		
					<button type="button" onclick="<?=$onclick?>; return false;" class="btn btn-success pull-right"><i class="fa fa-send"></i> <?=$button?></button>
			
			</div>
		</div>
	</div>
</div>
</div>
</section>
<?php $this->load->view('themes/green_land/sidebar')?>
