<?php
 class DownloadModel extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
 	
 	function get(){
		$this->db->select('id, nama, keterangan, if(is_file=1,file,link) as link_download, link, is_file, file');
 		return $this->db->get('download');
 	}

 	function findBy($id){
		$this->db->select('id, nama, keterangan, if(is_file=1,file,link) as link_download, link, is_file, file');
 		$this->db->where($id);
 		return $this->db->get('download');
 	}

 	function add($data){
 		return $this->db->insert('download',$data);
 	}
 	
 	function update($id,$data){
 		$this->db->where($id);
 		return $this->db->update('download',$data);
 	}

 	function delete($id){
 		$this->db->where($id);
 		return $this->db->delete('download');
 	}
 }
