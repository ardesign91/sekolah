<?php defined('BASEPATH') OR exit('No direct script access allowed');



class M_menus extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'menus';

	/**
	 * Class Constructor
	 *
	 * @return Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get All Menus
	 * @return Resource
	 */
	public function get_menus() {
		return $this->db
			->select('id, menu_title, menu_url, menu_type, is_deleted')
			->order_by('menu_parent_id', 'ASC')
			->order_by('menu_position', 'ASC')
			->get(self::$table);
	}

	/**
	 * Fungsi untuk menu recursive : TOP Navigasi
	 * @param Integer $menu_parent_id
	 * @return Array
	 */
	public function nested_menus($menu_parent_id = 0) {
		$menu = [];
		$this->db->select('id, menu_title, menu_url, menu_target, menu_type');
		$this->db->where('menu_parent_id', $menu_parent_id);
		$this->db->where('is_deleted', 'false');
		$this->db->order_by('menu_position', 'ASC');
		$this->db->order_by('menu_title', 'ASC');
		$query = $this->db->get(self::$table);
		foreach ($query->result() as $row) {
			$menu[] = [
				'id' => $row->id,
				'menu_title' => $row->menu_title,
				'menu_url' => $row->menu_url,
				'menu_target' => $row->menu_target,
				'menu_type' => $row->menu_type,
				'children' => $this->nested_menus($row->id),
			];
		}
		return $menu;
	}

	/**
	 * Recursive function for save menu position
	 * @param Integer $menu_parent_id
	 * @param Integer $children
	 * @return Void
	 */
	public function save_menu_position($menu_parent_id, $children) {
		if ( ! is_null($children) ) {
			$i = 1;
			foreach ($children as $key => $value) {
				$id = $children[$key]['id'];
				$dataset = [
					'menu_parent_id' => $menu_parent_id,
					'menu_position' => $i
				];
				$this->db->where(self::$pk, $id)->update(self::$table, $dataset);
				if (isset($children[$key]['children'][0])) {
					$this->save_menu_position($id, $children[$key]['children']);
				}
				$i++;
			}
		}
	}
}
