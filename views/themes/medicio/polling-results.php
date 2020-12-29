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
			<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 ">
			<canvas id="canvas"></canvas>
		</div>
		<div class="col-md-4">
			<?php $this->load->view('themes/medicio/sidebar')?>
		</div>
	</div>
</div>
</section>
