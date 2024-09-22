<?php
 class Siswa_baruModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function add_additional()
	{
		// $user_id = $_SESSION['id'];
		date_default_timezone_set('Asia/Jakarta');
		return $data = [
			'created_by' => '',
			'created_on' => date('Y-m-d H:i:s')
		];
	}
 	
 	function get(){
 		return $this->db->get('siswa_baru');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('siswa_baru');
 	}

	function add($data)
	{
		$additional_data = $this->add_additional();
		$this->db->insert('siswa_baru', $additional_data + $data);
		return $this->db->insert_id();
	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('siswa_baru',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('siswa_baru');
 	}
 }
