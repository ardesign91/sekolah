<script type="text/javascript">
$( document ).ready(function() {
	var values = get_values();
	if (values['academic_year_id'] && values['class_group_id']) {
		get_students();
	}
});

function get_values() {
	var values = {
		academic_year_id: $('#academic_year_id').val(),
		class_group_id: $('#class_group_id').val()
	};
	return values;
}

function get_students() {
	var values = get_values();
	if (values['academic_year_id'] && values['class_group_id']) {
		_H.Loading( true );
		$.post( _BASE_URL + 'public/student_directory/get_students', values, function( response ) {
			_H.Loading( false );
			var res = _H.StrToObject( response );
			var rows = res.rows;
			var str = '';
			for (var z in rows) {
				var row = rows[ z ];
				str += '<div class="col-md-6 mb-4">';
				str += '<div class="card h-100">';
				str += '<div class="row">';
				str += '<div class="col-md-4">';
				str += '<img src="' + row.photo + '" class="card-img rounded-0 img-fluid p-2">'
				str += '</div>';
				str += '<div class="col-md-8">';
				str += '<div class="card-body pt-2 pb-2">';
				str += '<dl class="row">';
				str += '<dt class="col-sm-5">Nama</dt>';
				str += '<dd class="col-sm-7">' + row.full_name + '</dd>';
				str += '<dt class="col-sm-5">' + _IDENTITY_NUMBER + '</dt>';
				str += '<dd class="col-sm-7">' + row.identity_number + '</dd>';
				str += '<dt class="col-sm-5">Jenis Kelamin</dt>';
				str += '<dd class="col-sm-7">' + row.gender + '</dd>';
				str += '<dt class="col-sm-5">Tempat Lahir</dt>';
				str += '<dd class="col-sm-7">' + row.birth_place + '</dd>';
				str += '<dt class="col-sm-5">Tanggal Lahir</dt>';
				str += '<dd class="col-sm-7">' + row.birth_date + '</dd>';
				str += '</dl>';
				str += '</div>';
				str += '</div>';
				str += '</div>';
				str += '</div>';
				str += '</div>';
			}
			var elementId = $("div.student-directory");
			elementId.html( str );
		});
	}
}
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
			<!-- ROW -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="200">
					<form onsubmit="return false;" class="mb-3">
						<div class="form-row align-items-center">
							<div class="col-auto my-1">
								<label class="mr-sm-2 sr-only" for="academic_year_id"><?=__session('_academic_year')?></label>
								<?=form_dropdown('academic_year_id', $academic_years, __session('current_academic_year_id'), 'class="custom-select mr-sm-2 " id="academic_year_id"');?>
							</div>
							<div class="col-auto my-1">
								<label class="mr-sm-2 sr-only" for="class_group_id">Kelas</label>
								<?=form_dropdown('class_group_id', $class_groups, '', 'class="custom-select mr-sm-2 " id="class_group_id"');?>
							</div>
							<div class="col-auto my-1">
								<button type="button" onclick="get_students()" class="btn btn-info"><i class="fa fa-search"></i> CARI</button>
							</div>
						</div>
					</form>
					<div class="row student-directory"></div>
				</div>
			</div>
		</div>
	</section>