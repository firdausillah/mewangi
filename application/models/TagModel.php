<?php
class TagModel extends CI_Model
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
		return $this->db->get('tags_t');
	}

	function findBy($id)
	{
		$this->db->where($id);
		return $this->db->get('tags_t');
	}

	function add($data)
	{
		$additional_data = $this->add_additional();
		return $this->db->insert('tags_t', $additional_data + $data);
	}

	function update($id, $data)
	{
		$this->db->where($id);
		return $this->db->update('tags_t', $data);
	}

	function delete($id)
	{
		$this->db->where($id);
		return $this->db->delete('tags_t');
	}
}
