<?php
class Activity_model extends CI_Model {

	// Get data
	public function listData($data = array()){
		$this->db->select($data['fide']);
		if(!empty($data['where'])){$this->db->where($data['where']);}
		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
		$query = $this->db->get('tb_gallery');
		return $query->result_array();
	}

	// Get data sub gallery
	public function listsubData($data = array()){
		$this->db->select($data['fide']);
		if(!empty($data['where'])){$this->db->where($data['where']);}
		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
		$query = $this->db->get('tb_subgallery');
		return $query->result_array();
	}

	// Insert data
	public function insertData($data = array()){
		$this->db->insert("tb_gallery",$data);
		return $this->db->insert_id();
	}

	public function images($data = array()){
		$this->db->insert("tb_subgallery",$data);
		return $this->db->insert_id();
	}

	// Update data or delete data (status 0 = deactive 1 = active)
	public function updateData($data = array()){
		$this->db->where(array('gallery_id' => $data['gallery_id']));
		$this->db->update("tb_gallery",$data);
		return $data['gallery_id'];
	}

	public function updateImage($data = array()){
		$this->db->where(array('subgallery_id' => $data['subgallery_id']));
		$this->db->update("tb_subgallery",$data);
		return $data['subgallery_id'];
	}

}
?>
