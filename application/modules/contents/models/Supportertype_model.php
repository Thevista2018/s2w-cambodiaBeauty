<?php
class Supportertype_model extends CI_Model {

	// Get data
	public function listData($data = array()){
		$this->db->select($data['fide']);
		if(!empty($data['where'])){$this->db->where($data['where']);}
		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
		$query = $this->db->get('tb_supporterdetail');
		return $query->result_array();
	}

	// Get data contents
	public function listContents($data = array()){
		$this->db->select($data['fide']);
		if(!empty($data['where'])){$this->db->where($data['where']);}
		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
		$query = $this->db->get('tb_supporter');
		return $query->result_array();
	}

	// Insert data
	public function insertData($data = array()){
		$this->db->insert("tb_supporterdetail",$data);
		return $this->db->insert_id();
	}

	// Update data or delete data (status 0 = deactive 1 = active)
	public function updateData($data = array()){
		$this->db->where(array('supportertype_id' => $data['supportertype_id']));
		$this->db->update("tb_supporterdetail",$data);
		return $data['supportertype_id'];
	}

}
?>
