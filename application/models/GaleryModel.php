<?php
 class GaleryModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
 		return $this->db->get('galery');
 	}

 	function findBy($id){
 		$this->db->where($id);
 		return $this->db->get('galery');
 	}

 	function add($data){
 		return $this->db->insert('galery',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('galery',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('galery');
 	}
 }
