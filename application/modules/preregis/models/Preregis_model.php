<?php
class Preregis_model extends CI_Model {

	// Get data
	public function listData($data = array()){
		$this->db->select($data['fide']);
		if(!empty($data['where'])){$this->db->where($data['where'],NULL, FALSE);}
		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
		$query = $this->db->get('tb_visitor2019');
		return $query->result_array();
	}

	// Update data or delete data (status 0 = deactive 1 = active)
	public function updateData($data = array()){
		$this->db->where(array('visitor_id' => $data['visitor_id']));
		$this->db->update("tb_visitor2019",$data);
		return $data['visitor_id'];
	}

}
?>
