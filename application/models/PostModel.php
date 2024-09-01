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
		$this->db->select("posts.id, posts.id_user, posts.id_post_category, posts.nama, posts.kode, posts.keterangan, posts.is_active, posts.created_on, posts.created_by, posts.is_approve, posts.slug, posts.content, posts.foto, posts.views, posts.post_type, posts.category_nama, posts.author, ( SELECT GROUP_CONCAT(tags_t.nama SEPARATOR ',') FROM tags_t WHERE tags_t.id_post = posts.id ) AS tags_t_nama");
		return $this->db->get('posts');
	}

	function findBy($id)
	{
		$this->db->select("posts.id, posts.id_user, posts.id_post_category, posts.nama, posts.kode, posts.keterangan, posts.is_active, posts.created_on, posts.created_by, posts.is_approve, posts.slug, posts.content, posts.foto, posts.views, posts.post_type, posts.category_nama, posts.author, ( SELECT GROUP_CONCAT(tags_t.nama SEPARATOR ',') FROM tags_t WHERE tags_t.id_post = posts.id ) AS tags_t_nama");
		$this->db->where($id);
		return $this->db->get('posts');
	}

	function get_for_global()
	{
		$this->db->select('posts.author, posts.category_nama, posts.nama, posts.created_on, posts.content, posts.slug, posts.foto, posts.post_type');
		$this->db->from('posts');
		$this->db->order_by("posts.created_on", "desc");
		$this->db->where(["posts.is_active !=" => 0]);
		return $this->db->get();
	}

	function add($data)
	{
		$additional_data = $this->add_additional();
		$this->db->insert('posts', $additional_data + $data);
		return $this->db->insert_id();
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
