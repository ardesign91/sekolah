<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
var page = 1;
var total_page = "<?=$total_page;?>";
$(document).ready(function() {
	if (parseInt(total_page) == page || parseInt(total_page) == 0) {
		$('.more-employees').remove();
	}
});

function get_employees() {
	page++;
	var data = {
		page_number: page
	};
	if ( page <= parseInt(total_page) ) {
		_H.Loading( true );
		$.post( _BASE_URL + 'public/employee_directory/get_employees', data, function( response ) {
			_H.Loading( false );
			var res = _H.StrToObject( response );
			var rows = res.rows;
			var str = '';
			var no = parseInt($('.number:last').text()) + 1;
			for (var z in rows) {
				var row = rows[ z ];
				str += '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
				str += '<div class="member">';
				str += '<img src="' + row.photo + '" class="img-fluid">'
				str += '<div class="member-content">';
				str += '<h4>' + row.full_name + '</h4>';
				str += '<span>' + row.nik + '</span>';
				str += '<p>' + row.employment_type + '</p>';
				str += '</div>';
				str += '</div>';
				str += '</div>';
			}
			var elementId = $("div.profile-alumni:last");
			$( str ).insertAfter( elementId );
			if ( page == parseInt(total_page) ) $('.more-employees').remove();
		});
	}
}
</script>
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2><?=strtoupper($page_title)?></h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
    <br>
     <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
		<div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php foreach($query->result() as $row) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch profile-alumni">
            <div class="member">
              <?php
              $photo = 'no-image.png';
              if ($row->photo && file_exists($_SERVER['DOCUMENT_ROOT'] . '/media_library/employees/'.$row->photo)) {
                $photo = $row->photo;
              }
              echo '<img src="' . base_url('media_library/employees/'.$photo).'" class="card-img rounded-0 img-fluid p-2">';
              ?>
              <div class="member-content">
                <h4><?=$row->full_name?></h4>
                <span><?=$row->nik?></span>
                <p> 
                  <?=$row->employment_type?>
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>

                </div>
              </div>
            </div>
          </div>
      <?php } ?>
      </div>
	<div class="justify-content-between align-items-center float-right mb-3 w-100 more-employees">
		<button type="button" onclick="get_employees()" class="btn btn-danger action-button rounded-0 float-right"><i class="fa fa-refresh"></i> Tampilkan Lebih Banyak</button>
	</div>

</div>
</section>
