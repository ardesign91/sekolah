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
				str += '<div class="col-md-6 mb-4 profile-alumni">';
				str += '<div class="card h-100 border border-secondary rounded-0">';
				str += '<div class="row">';
				str += '<div class="col-md-4">';
				str += '<img src="' + row.photo + '" class="card-img rounded-0 img-fluid p-2">';
				str += '</div>';
				str += '<div class="col-md-8">';
				str += '<div class="card-body pt-2 pb-2">';
				str += '<dl class="row">';
				str += '<dt class="col-sm-5">Nama Lengkap</dt>';
				str += '<dd class="col-sm-7">' + row.full_name + '</dd>';
				str += '<dt class="col-sm-5">NIK</dt>';
				str += '<dd class="col-sm-7">' + row.nik + '</dd>';
				str += '<dt class="col-sm-5">Jenis Kelamin</dt>';
				str += '<dd class="col-sm-7">' + row.gender + '</dd>';
				str += '<dt class="col-sm-5">Tempat Lahir</dt>';
				str += '<dd class="col-sm-7">' + row.birth_place + '</dd>';
				str += '<dt class="col-sm-5">Tanggal Lahir</dt>';
				str += '<dd class="col-sm-7">' + row.birth_date + '</dd>';
				str += '<dt class="col-sm-5">Jenis GTK</dt>';
				str += '<dd class="col-sm-7">' + row.employment_type + '</dd>';
				str += '</dl>';
				str += '</div>';
				str += '</div>';
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
<div class="col-lg-12 col-md-12 col-sm-12 ">
	<h5 class="page-title mb-3"><?=strtoupper($page_title)?></h5>
	<div class="row">
		<?php foreach($query->result() as $row) { ?>
			<div class="col-md-6 mb-4 profile-alumni">
				<div class="card h-100 border border-secondary rounded-0">
					<div class="row">
						<div class="col-md-4">
							<?php
							$photo = 'no-image.png';
							if ($row->photo && file_exists($_SERVER['DOCUMENT_ROOT'] . '/media_library/employees/'.$row->photo)) {
								$photo = $row->photo;
							}
							echo '<img src="' . base_url('media_library/employees/'.$photo).'" class="card-img rounded-0 img-fluid p-2">';
							?>
						</div>
						<div class="col-md-8">
							<div class="card-body pt-2 pb-2">
								<dl class="row">
									<dt class="col-sm-5">Nama Lengkap</dt>
									<dd class="col-sm-7"><?=$row->full_name?></dd>

									<dt class="col-sm-5">NIK</dt>
									<dd class="col-sm-7"><?=$row->nik?></dd>

									<dt class="col-sm-5">Jenis Kelamin</dt>
									<dd class="col-sm-7"><?=$row->gender?></dd>

									<dt class="col-sm-5">Tempat Lahir</dt>
									<dd class="col-sm-7"><?=$row->birth_place?></dd>

									<dt class="col-sm-5">Tanggal Lahir</dt>
									<dd class="col-sm-7"><?=indo_date($row->birth_date)?></dd>

									<dt class="col-sm-5">Jenis GTK</dt>
									<dd class="col-sm-7"><?=$row->employment_type?></dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="justify-content-between align-items-center float-right mb-3 w-100 more-employees">
		<button type="button" onclick="get_employees()" class="btn action-button rounded-0 float-right"><i class="fa fa-refresh"></i> Tampilkan Lebih Banyak</button>
	</div>
</div>
