<?php
class AuthModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function cekLogin($table, $where)
	{
		$this->db->where($where);
		return $this->db->get($table);
	}

	function cekLoginMember($where)
	{
		$this->db->select('users.nama as nama, users.username as username, members.id as id, members.foto as foto, members.file as file, members.keterangan as keterangan, members.email as email, members.nomor_telepon as nomor_telepon, members.instansi as instansi, members.is_approve as is_approve, events.nama as event_nama, users.password as password, users.role as role, members.id_event as id_event');
		$this->db->from('members');
		$this->db->join('users', 'users.id = members.id_user');
		$this->db->join('events', 'events.id = members.id_event');
		$this->db->where($where);
		return $this->db->get();
	}

	function cekLoginTrainer($where)
	{
		$this->db->select('*');
		$this->db->from('trainers');
		$this->db->join('users', 'users.id = trainers.id_user');
		$this->db->where($where);
		return $this->db->get();
	}
}
