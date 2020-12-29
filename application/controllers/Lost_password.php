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

class Lost_password extends CI_Controller {

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
		$this->load->view('users/lost-password');
	}

	/**
	 * Lost Password Process
	 * @return Object
	 */
	public function process() {
		if ($this->input->is_ajax_request()) {
			if ($this->validation()) {
				$user_email = $this->input->post('email', TRUE);
				$this->load->model('m_users');
				$query = $this->m_users->get_user_by_email($user_email);
				if (NULL == $query) {
					$this->vars['status'] = 'warning';
					$this->vars['message'] = 'Email anda tidak terdaftar pada database kami';
				} else {
					$forgot_password_key = sha1($user_email . uniqid(mt_rand(), true));
					$sendgrid_api_key = __session('sendgrid_api_key');
					$from = new \SendGrid\Email(__session('school_name'), __session('email'));
					$to = new SendGrid\Email($query['user_full_name'], $query['user_email']);
					$message = "Dear " . $query['user_full_name'];
					$message .= "<br><br>";
					$message .= "Silahkan klik tautan berikut untuk melakukan perubahan kata sandi Anda.";
					$message .= "<br>";
					$message .= "<a href=".base_url() . 'reset-password/' . $forgot_password_key.">".base_url() . 'reset-password/' . $forgot_password_key."</a>";
					$message .= "<br><br>";
					$message .= "Abaikan email ini jika Anda tidak mengajukan perubahan kata sandi ini.";
					$message .= "<br><br>";
					$message .= "Terima Kasih.";
					$message .= "<br><br>";
					$message .= "Admin";
					$message .= "<br>";
					$message .= __session('school_name');
					$content = new SendGrid\Content("text/html", $message);
					$mail = new SendGrid\Mail($from, 'Lost Password', $to, $content);
					$sendgrid = new \SendGrid($sendgrid_api_key);
					$send_mail = $sendgrid->client->mail()->send()->post($mail);
					if ($send_mail->statusCode() == 202) {
						// update users tables
						$update = $this->m_users->set_forgot_password_key($user_email, $forgot_password_key);
						if ($update) {
							$this->vars['status'] = 'success';
							$this->vars['message'] = 'Tautan untuk mengubah kata sandi sudah kami kirimkan melalui email. Jika email tidak ditemukan, silahkan periksa pada folder spam.';
						} else {
							$this->vars['status'] = 'warning';
							$this->vars['message'] = 'Terjadi kesalahan dalam proses ubah kata sandi. Silahkan hubungi operator website untuk konfirmasi.';
						}
					} else {
						$this->vars['status'] = 'warning';
						$this->vars['message'] = 'Tautan untuk mengubah kata sandi tidak terkirim. Silahkan kirim email ke ' . __session('email');
					}
				}
			} else {
				$this->vars['status'] = 'error';
				$this->vars['message'] = validation_errors();
			}
			$this->output
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))
				->_display();
			exit;
		}
	}

	/**
	 * Validation Form
	 * @return Boolean
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('email', 'Email', 'trim|required|valid_email');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}
