<script src="<?=base_url('assets/plugins/Chart.js');?>"></script>
<script type="text/javascript">
$( document ).ready( function() {
	var element_id = document.getElementById('canvas');
	new Chart(element_id, {
		type: 'bar',
		data: {
			labels: <?=$labels;?>,
			datasets: [{
				label: '',
				data: <?=$data;?>,
				borderWidth: 2,
				backgroundColor: 'rgba(75, 192, 192, 0.2)',
				borderColor: 'rgba(75, 192, 192, 1)'
			}]
		},
		options: {
			responsive: true,
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
});
</script>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
         <a href="<?=base_url()?>" class="logo mr-auto"><img src="<?=base_url('media_library/images/' . __session('logo'))?>" alt="" class="img-fluid" width="90px"></a> 
    	<h2 class="page-title mb-3"><?=strtoupper($page_title)?></h2>
      </div>
    </div><!-- End Breadcrumbs -->
   <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 ">

	<canvas id="canvas"></canvas>
</div>
<?php $this->load->view('themes/green_land/sidebar')?>
</div>
</div>
</section>