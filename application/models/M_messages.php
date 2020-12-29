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

class M_messages extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'comments';

	/**
	 * Class Constructor
	 *
	 * @return Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get Data
	 * @param String $keyword
	 * @param String $return_type
	 * @param Integer $limit
	 * @param Integer $offset
	 * @return Resource
	 */
	public function get_where($keyword = '', $return_type = 'count', $limit = 0, $offset = 0) {
		$this->db->select('id, comment_author, comment_email, comment_url, created_at, comment_content, is_deleted');
		$this->db->where('comment_type', 'message');
		if ( ! empty($keyword) ) {
			$this->db->group_start();
			$this->db->like('comment_author', $keyword);
			$this->db->or_like('comment_email', $keyword);
			$this->db->or_like('created_at', $keyword);
			$this->db->or_like('comment_content', $keyword);
			$this->db->group_end();
		}
		if ( $return_type == 'count' ) return $this->db->count_all_results(self::$table);
		if ( $limit > 0 ) $this->db->limit($limit, $offset);
		return $this->db->get(self::$table);
	}

	/**
	 * Reply Inbox
	 * @param Integer $id
	 * @param Array $dataset
	 * @return Integer
	 */
	public function reply($id, $dataset) {
		$this->model->update($id, self::$table, $dataset);
		$query = $this->model->RowObject(self::$pk, $id, self::$table);
      $sendgrid_api_key = __session('sendgrid_api_key');
		$from = new \SendGrid\Email(__session('school_name'), __session('email'));
		$to = new SendGrid\Email($query->comment_author, $query->comment_email);
		$content = new SendGrid\Content("text/plain", $dataset['comment_reply']);
		$mail = new SendGrid\Mail($from, $dataset['comment_subject'], $to, $content);
		$sendgrid = new \SendGrid($sendgrid_api_key);
		$response = $sendgrid->client->mail()->send()->post($mail);
		return $response->statusCode();
	}
}
