<?php
 class SiswaModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('siswa');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('siswa');
 	}

 	function add($data){
 		return $this->db->insert('siswa',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('siswa',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('siswa');
 	}
 }
