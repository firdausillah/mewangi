<?php
class PostModel extends CI_Model
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
		return $this->db->get('posts');
	}

	function findBy($id)
	{
		$this->db->where($id);
		return $this->db->get('posts');
	}

	function get_for_global()
	{
		$this->db->select('users.nama as author, post_category.nama as post_category_nama, posts.nama, posts.created_on, posts.content, posts.slug, posts.foto, posts.tags, posts.post_type');
		$this->db->from('posts');
		$this->db->join('users', 'users.id = posts.id_user');
		$this->db->join('post_category', 'post_category.id = posts.id_post_category');
		$this->db->limit(5);
		return $this->db->get();
	}

	function add($data)
	{
		$additional_data = $this->add_additional();
		return $this->db->insert('posts', $additional_data + $data);
	}

	function update($id, $data)
	{
		$this->db->where($id);
		return $this->db->update('posts', $data);
	}

	function delete($id)
	{
		$this->db->where($id);
		return $this->db->delete('posts');
	}
}
