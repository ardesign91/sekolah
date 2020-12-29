<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title><?=__session('school_name')?></title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="keywords" content="<?=__session('meta_keywords');?>"/>
	<meta name="description" content="<?=__session('meta_description');?>"/>
	<meta name="subject" content="Situs Pendidikan">
	<meta name="copyright" content="<?=__session('school_name')?>">
	<meta name="language" content="Indonesia">
	<meta name="robots" content="index,follow" />
	<meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />
	<meta name="Classification" content="Education">
	<meta name="url" content="https://www.ardesign.web.id">
	<meta name="identifier-URL" content="https://www.ardesign.web.id">
	<meta name="category" content="Admission, Education">
	<meta name="coverage" content="Worldwide">
	<meta name="distribution" content="Global">
	<meta name="rating" content="General">
	<meta name="revisit-after" content="7 days">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Copyright" content="<?=__session('school_name');?>" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="revisit-after" content="7" />
	<meta name="webcrawlers" content="all" />
	<meta name="rating" content="general" />
	<meta name="spiders" content="all" />
	<meta itemprop="name" content="<?=__session('school_name');?>" />
	<meta itemprop="description" content="<?=__session('meta_description');?>" />
	<meta itemprop="image" content="<?=base_url('media_library/images/'. __session('logo'));?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?=base_url('media_library/images/'.__session('favicon'));?>">
	<?=link_tag('assets/plugins/bootstrap-3/bootstrap.min.css');?>
	<?=link_tag('assets/css/font-awesome.min.css');?>
	<?=link_tag('assets/plugins/toastr/toastr.css');?>
	<?=link_tag('assets/plugins/datetimepicker/datetimepicker.css');?>
	<?=link_tag('assets/plugins/adminLTE/AdminLTE.css');?>
	<?=link_tag('assets/plugins/select2/select2.css');?>
	<?=link_tag('assets/plugins/jquery.tagsinput/jquery.tagsinput.min.css');?>
	<?=link_tag('assets/css/loading.css');?>
	<?=link_tag('assets/css/backend.style.css');?>
	<?=link_tag('assets/css/skins.css');?>
	<script type="text/javascript">
	const _BASE_URL = '<?=base_url();?>';
	const _CURRENT_URL = '<?=current_url();?>';
	const _SCHOOL_LEVEL = '<?=__session('school_level');?>';
	const _MAJOR_COUNT = '<?=__session('major_count');?>';
	const _ACADEMIC_YEAR = '<?=__session('_academic_year');?>';
	const _STUDENT = '<?=__session('_student');?>';
	const _IDENTITY_NUMBER = '<?=__session('_identity_number');?>';
	const _EMPLOYEE = '<?=__session('_employee');?>';
	const __EMPLOYEE = '<?=__session('__employee');?>';
	const _HEADMASTER = '<?=__session('_headmaster');?>';
	const _MAJOR = '<?=__session('_major');?>';
	const _SUBJECT = '<?=__session('_subject');?>';
	</script>
	<script src="<?=base_url('assets/plugins/shim.js');?>"></script>
   <script src="<?=base_url('assets/plugins/xlsx.full.min.js');?>"></script>
   <script src="<?=base_url('assets/plugins/Blob.js');?>"></script>
   <script src="<?=base_url('assets/plugins/FileSaver.js');?>"></script>
	<script src="<?=base_url('assets/js/backend.min.js');?>"></script>
</head>
<!-- sidebar-collapse -->
<body class="hold-transition skin-black-light sidebar-mini <?=__session('sidebar_collapse') ? 'sidebar-collapse':''?>">
	<noscript>
      You need to enable javaScript to run this app.
   </noscript>
	<div class="wrapper">
		<header class="main-header">
			<a href="<?=site_url('dashboard')?>" class="logo">
				<span class="logo-mini"><i class="fa fa-cogs"></i></span>
				<span class="logo-lg"><b>Admin</b> Panel</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a onclick="_H.SidebarCollapse(); return false;" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question-circle-o"></i> Help <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="https://www.sekolahku.web.id" target="_blank"><i class="fa fa-globe"></i> Situs Resmi</a></li>
								<li><a href="https://www.facebook.com/groups/cmssekolahku" target="_blank"><i class="fa fa-facebook"></i> Forum Diskusi</a></li>
								<li><a href="https://www.lapak.ardesign.web.id" target="_blank"><i class="fa fa-laptop"></i>Themes</a></li>
								<li><a href="#" data-toggle="modal" data-target="#cms-info"><i class="fa fa-info-circle"></i> Tentang</a></li>

							</ul>
						</li>
						<?php if (__session('user_type') === 'super_user' || __session('user_type') === 'administrator') { ?>
							<li <?=isset($user_profile) ? 'class="active"' : '';?>><a href="<?=site_url('profile');?>"><i class="fa fa-edit"></i> Edit Profil</a></li>
						<?php } ?>
						<li <?=isset($change_password) ? 'class="active"' : '';?>><a href="<?=site_url('change_password');?>"><i class="fa fa-key"></i> Edit Password</a></li>
						<li><a href="<?=site_url('logout');?>"><i class="fa fa-power-off"></i> Logou</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<?php $this->load->view('backend/sidebar');?>
		</aside>
		<div class="content-wrapper">
			<?php $this->load->view($content);?>
		</div>
		<div class="modal" id="cms-info">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span></button>
							<h4 class="modal-title"><i class="fa fa-info-circle"></i> Tentang</h4>
						</div>
						<div class="modal-body">
							<table class="table table-condensed table-bordered">
								<tbody>
									<tr>
										<td width="20%">Code Name</td>
										<td width="1px">:</td>
										<td><?=config_item('apps')?></td>
									</tr>
									<tr>
										<td>Author</td>
										<td>:</td>
										<td><a href="https://www.facebook.com/antonsofyan">Anton Sofyan</a></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><?=config_item('email')?></td>
									</tr>
									<tr>
										<td>Version</td>
										<td>:</td>
										<td><?=config_item('version')?></td>
									</tr>
									<tr>
										<td>Link</td>
										<td>:</td>
										<td><a href="<?=config_item('website')?>">sekolahku.web.id</a></td>
									</tr>
									<tr>
										<td>Copyright</td>
										<td>:</td>
										<td>&copy; 2014-<?=date('Y')?></td>
									</tr>
								</tbody>
							</table>
							<p>SYARAT DAN KETENTUAN :</p>
							<ol>
								<li>Tidak diperkenankan memperjualbelikan CMS ini tanpa seizin dari <a href="https://www.facebook.com/antonsofyan">Pengembang CMS Sekolahku</a>.</li>
								<li>Tidak diperkenankan membuat Aplikasi turunan dari CMS ini dengan nama baru.</li>
								<li>Tidak diperkenankan menghapus kode sumber aplikasi yang berada di bagian footer CMS.</li>
								<li>Tidak diperkenankan menyertakan link komersil seperti Layanan Hosting maupun domain yang menguntungkan sepihak.</li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<p>Powered by <a href="<?=$this->config->item('website');?>" target="_blank">	 <?=$this->config->item('version');?></a></p>
				</div>
				<p>Copyright &copy; <?=date('Y');?> <?=__session('school_name')?>. All rights reserved.</p>
			</footer>
			<div class="control-sidebar-bg"></div>
		</div>
		<a href="javascript:" id="return-to-top"><i class="fa fa-angle-double-up"></i></a>
	</body>
	</html>
