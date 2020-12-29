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
				str += '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
				str += '<div class="member">';
				str += '<img src="' + row.photo + '" class="img-fluid">'
				str += '<div class="member-content">';
				str += '<h4>' + row.full_name + '</h4>';
				str += '<span>' + row.identity_number + '</span>';
				str += '<p>' + row.birth_date + '</p>';
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
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2><?=strtoupper($page_title)?></h2>
      </div>
    </div><!-- End Breadcrumbs -->
    <br>
<section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">
<div class="col-lg-12 col-md-12 col-sm-12">
	<form onsubmit="return false;" class="mb-3">
		<div class="form-row align-items-center">
			<div class="col-auto my-1">
				<label class="mr-sm-2 sr-only" for="academic_year_id"><?=__session('_academic_year')?></label>
				<?=form_dropdown('academic_year_id', $academic_years, __session('current_academic_year_id'), 'class="custom-select mr-sm-2 rounded-0 border border-secondary" id="academic_year_id"');?>
			</div>
			<div class="col-auto my-1">
				<label class="mr-sm-2 sr-only" for="class_group_id">Kelas</label>
				<?=form_dropdown('class_group_id', $class_groups, '', 'class="custom-select mr-sm-2 rounded-0 border border-secondary" id="class_group_id"');?>
			</div>
			<div class="col-auto my-1">
				<button type="button" onclick="get_students()" class="btn  btn-primary action-button rounded-0"><i class="fa fa-search"></i> CARI</button>
			</div>
		</div>
	</form>
	<section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
	<div class="row student-directory"></div>
</div>
</section>
	 
</div>
</div>
</section>

<?php $this->load->view('themes/green_land/sidebar')?>