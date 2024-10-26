<?php
 class DownloadModel extends CI_Model{

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
		$additional_data = $this->add_additional();
		return $this->db->insert('download', $additional_data + $data);
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
