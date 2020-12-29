
<?php if ( ! in_array($this->uri->segment(1), ['sambutan-kepala-sekolah', 'sambutan-rektor', 'sambutan-ketua', 'sambutan-direktur'])) { ?>
<div class="card mb-4" data-aos="fade-up" data-aos-delay="200">
    <div class="card-header bg-info text-white">
        <h5><i class="icofont-id"></i> Kepala Sekolah</h5>
    </div>
    <div class="card-body">
        <img src="<?=base_url('media_library/images/').__session('headmaster_photo');?>" class="card-img-top img-fluid" width="250px">
        <div class="mt-2">
            <h5 class="text-info text-center"><?=__session('headmaster')?></h5>
            <p class="card-text text-justify"><?=word_limiter(strip_tags(get_opening_speech()), 20);?></p>
        </div>
    </div>
    <div class="card-footer text-center">
		<small class="text-muted text-uppercase"><a href="<?=site_url(opening_speech_route());?>">Selengkapnya</a></small>
	</div>
</div>
<?php } ?>

<div class="card mb-4" data-aos="fade-up" data-aos-delay="200">
    <?php $links = get_links(); if ($links->num_rows() > 0) { ?>
		<div class="card-header bg-info text-white">
        <h5><i class="icofont-share <?=!in_array($this->uri->segment(1), ['sambutan-kepala-sekolah', 'sambutan-rektor', 'sambutan-ketua', 'sambutan-direktur']) ? 'mt-3' : ''?>"></i> Tautan</h5>
        </div>
        <div class="card-body">
		<div class="list-group">
			<?php foreach($links->result() as $row) { ?>
				<a href="<?=$row->link_url?>" class="list-group-item list-group-item-action list-group-item-info" target="<?=$row->link_target?>"><?=$row->link_title?></a>
			<?php } ?>
        </div>
        </div>
    <?php } ?>
</div>

<?php $query = get_active_question(); if ( $query ) { ?>
<div class="card mb-4" data-aos="fade-up" data-aos-delay="200">
		<div class="card-header bg-info text-white">
            <h5><i class="icofont-bars"></i> Jajak Pendapat</h5>
        </div>
		
			<div class="card-body">
				<p><?=$query->question?></p>
				<?php $options = get_answers($query->id); foreach($options->result() as $option) { ?>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="answer_id" id="answer_id_<?=$option->id?>" value="<?=$option->id?>">
						<label class="form-check-label" for="answer_id_<?=$option->id?>"><?=$option->answer?></label>
					</div>
				<?php } ?>
            </div>
			<div class="card-footer text-center">
					<button type="button" name="button" onclick="vote(); return false;" class="btn btn-info btn-md"><i class="icofont-paper-plane"></i> Submit</button>
					<a href="<?=site_url('hasil-jajak-pendapat')?>" class="btn btn-danger btn-md"><i class="icofont-dashboard-web"></i> Hasil</a>
                </div>
</div>
   <?php } ?>

<?php $query = get_banners(2); if ($query->num_rows() > 0) { ?>
	<div class="card" data-aos="fade-up" data-aos-delay="200">
		<h5 class="card-header bg-info text-white"><i class="icofont-favourite"></i> Iklan</h5>
		<?php foreach($query->result() as $row) { ?>
			<a href="<?=$row->link_url?>" title="<?=$row->link_title?>"><img src="<?=base_url('media_library/banners/'.$row->link_image)?>" class="img-fluid mb-2 w-100" alt="<?=$row->link_title?>"></a>
		<?php } ?>
	</div>
	<?php } ?>