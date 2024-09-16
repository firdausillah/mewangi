<?php
class BannerModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function add_additional()
	{
		$user_id = $_SESSION['id'];
		date_default_timezone_set('Asia/Jakarta');
		return $data = [
			'created_by' => $user_id,
			'created_on' => date('Y-m-d H:i:s')
		];
	}

	function get()
	{
		$this->db->order_by("banner.created_on", "desc");
		return $this->db->get('banner');
	}

	function getLimit5(){
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->order_by('urutan', 'ASC');
		$this->db->limit(5);
		return $this->db->get();
	}

	function findBy($id)
	{
		$this->db->where($id);
		$this->db->order_by("banner.created_on", "desc");
		return $this->db->get('banner');
	}

	function add($data)
	{
		$additional_data = $this->add_additional();
		return $this->db->insert('banner', $additional_data + $data);
	}

	function update($id, $data)
	{
		$this->db->where($id);
		return $this->db->update('banner', $data);
	}

	function delete($id)
	{
		$this->db->where($id);
		return $this->db->delete('banner');
	}
}
