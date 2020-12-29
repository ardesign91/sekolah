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

class M_photos extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'photos';

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
		$this->db->select('x1.id, CONCAT("thumbnail/",x1.photo_name) AS photo_name, x2.album_title, x1.is_deleted');
		$this->db->join('albums x2', 'x1.photo_album_id=x2.id', 'left');
		if ( ! empty($keyword) ) $this->db->like('x2.album_title', $keyword);
		if ( $return_type == 'count' ) return $this->db->count_all_results(self::$table . ' x1');
		if ( $limit > 0 ) $this->db->limit($limit, $offset);
		return $this->db->get(self::$table . ' x1');
	}

	/**
	 * Delete Permanently
	 * @param Integer $id
	 * @return Boolean
	 */
	public function delete_permanently($id) {
		$this->db->trans_start();
		$this->db->where(self::$pk, $id)->delete(self::$table);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	/**
	 * Get Photos By ALbum ID
	 * @param Integer $id
	 * @return Resource
	 */
	public function get_photos($id) {
		return $this->db
			->select('photo_name')
			->where('photo_album_id', $id)
			->get(self::$table);
	}
}
