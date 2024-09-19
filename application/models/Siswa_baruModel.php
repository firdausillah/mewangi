<?php
 class Siswa_baruModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('siswa_baru');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('siswa_baru');
 	}

 	function add($data){
 		return $this->db->insert('siswa_baru',$data);
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
