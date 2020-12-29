<!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>SAMBUTAN <?=strtoupper(__session('_headmaster'))?></h2>
          <ol>
            <li><a href="<?=base_url()?>">Home</a></li>
            <li>SAMBUTAN <?=strtoupper(__session('_headmaster'))?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
     <section class="inner-page">
		<div class="container">
			<!-- ROW -->
			<div class="row">
					<!-- CONTENT -->
					<div class="col-lg-8 col-md-8 col-sm-12 ">
						<h5 class="page-title mb-3">SAMBUTAN <?=strtoupper(__session('_headmaster'))?></h5>
						<div class="card mb-3">
							<div class="card-body">
								<p class="card-text"><?=get_opening_speech()?></p>
							</div>
						</div>
					</div>
					<!-- SIDEBAR -->
					<div class="col-md-4">
						<?php $this->load->view('themes/medicio/sidebar')?>
					</div>
					<!-- SIDEBAR -->
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Get Random Posts -->
				<?php $query = get_random_posts(3); if ($query->num_rows() > 0) { ?>
					<h5 class="page-title mt-3 mb-3">Baca Juga</h5>
					<?php foreach($query->result() as $row) { ?>
						<div class="card mt-2">
							<div class="card-body">
								<h5 class="card-title"><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h5>
								<p class="card-text mb-0"><?=substr(strip_tags($row->post_content), 0, 185)?></p>
							</div>
							<div class="card-footer bg-info">
								<div class="d-flex justify-content-between align-items-center mt-1">
									<small class="text-white"><i class="icofont-tasks-alt"></i> <?=date('d/m/Y H:i', strtotime($row->created_at))?> - <i class="icofont-info-circle"></i> <?=$row->post_author?> - <i class="icofont-eye-alt"></i> <?=$row->post_counter?> kali</small>
									<a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>" class="btn btn-sm action-button rounded-0"><i class="fa fa-search text-white"></i></a>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>
