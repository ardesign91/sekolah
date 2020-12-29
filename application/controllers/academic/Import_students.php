<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CMS Sekolahku | CMS (Content Management System) dan PPDB/PMB Online GRATIS
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    2.4.9
 * @author     Anton Sofyan | https://facebook.com/antonsofyan | 4ntonsofyan@gmail.com | 0857 5988 8922
 * @copyright  (c) 2014-2020
 * @link       https://sekolahku.web.id
 *
 * PERINGATAN :
 * 1. TIDAK DIPERKENANKAN MENGGUNAKAN CMS INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 3. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI.
 */

class Import_students extends Admin_Controller {

	/**
	 * Class Constructor
	 *
	 * @return Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Index
	 * @return Void
	 */
	public function index() {
		$this->vars['title'] = 'Import ' . __session('_student');
		$this->vars['academic'] = $this->vars['academic_import'] = $this->vars['import_students'] = TRUE;
		$this->vars['content'] = 'academic/import_students';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Save
	 */
	public function save() {
		if ($this->input->is_ajax_request()) {
			$rows = explode("\n", $this->input->post('students'));
			foreach($rows as $row) {
				$exp = explode("\t", $row);
				if (count($exp) != 6) continue;
				$identity_number_exists = $this->model->is_exists('identity_number', trim($exp[0]), 'students');
				if ( $identity_number_exists ) continue;
				$this->db->set('identity_number', trim($exp[0]));
				$this->db->set('full_name', trim($exp[1]));
				$this->db->set('gender', trim($exp[2]) == 'L' ? 'M' : 'F');
				$this->db->set('street_address', trim($exp[3]));
				$this->db->set('birth_place', trim($exp[4]));
				$this->db->set('birth_date', trim($exp[5]));
				$this->db->set('is_transfer', 'false');
				$this->db->set('is_prospective_student', 'false');
				$this->db->set('is_alumni', 'false');
				$this->db->set('is_student', 'true');
				$this->db->set('citizenship', 'WNI');
				$this->db->set('student_status_id', get_option_id('student_status', 'aktif'));
				$this->db->set('email', trim($exp[0]).'@'.str_replace(['http://', 'https://', 'www.'], '', rtrim(__session('website'), '/')));
				$this->db->set('created_at', date('Y-m-d H:i:s'));
				$this->db->set('created_by', __session('user_id'));
				$query_string = $this->db->get_compiled_insert('students');
				$query_string = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $query_string);
        		$this->db->query($query_string);
			}
			$this->vars['status'] = 'success';
			$this->vars['message'] = 'Data ' . __session('_student') . ' sudah tersimpan';
			$this->output
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
				->_display();
			exit;
		}
	}
}
