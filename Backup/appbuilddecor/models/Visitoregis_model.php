<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Visitoregis_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
		    $this->load->database();
    }

    // Insert data
  	public function insertData($data = array()){
  		//$this->db->db_debug = FALSE;
  		$this->db->insert("tb_visitor2019",$data);
  		return $this->db->insert_id();
  	}

    public function updateData($data = array()){
      $this->db->where(array('visitor_id' => $data['visitor_id']));
  		$this->db->update("tb_visitor2019",$data);
  		return $data['visitor_id'];
    }

    public function listCountry($data = array()){
  		$this->db->select($data['fide']);
  		if(!empty($data['where'])){$this->db->where($data['where']);}
  		if(!empty($data['like'])){ $this->db->like($data['like']); }
  		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
  		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
  		$query = $this->db->get('tb_countries');
  		return $query->result_array();
  	}

    public function get_visitor($data=array())
      {
  		$this->db->select('*');
  		if($data['visitor_id'] != ''){
  			$this->db->where('visitor_id', $data['visitor_id']);
  		}
  		if($data['visitor_firstname'] != ''){
  			$this->db->like('visitor_firstname', $data['visitor_firstname']);
  		}
      if($data['visitor_company'] != ''){
  			$this->db->like('visitor_company', $data['visitor_company']);
  		}
      if($data['visitor_country'] != ''){
  			$this->db->like('visitor_country', $data['visitor_country']);
  		}
      if($data['visitor_phone1'] != ''){
  			$this->db->like('visitor_phone1', $data['visitor_phone1']);
  		}
      if($data['visitor_email'] != ''){
  			$this->db->like('visitor_email', $data['visitor_email']);
  		}
      $this->db->where(array('visitor_status !=' => 0));
  		if($data['sort'] != ''){
  			$this->db->order_by($data['sort'],$data['order']);
  		}else{
  			$this->db->order_by('visitor_id', 'desc');
  		}
  		if($data['per_page'] != ''){
  			$this->db->limit($data["per_page"],$data["start_item"]);
  		}
  		$query = $this->db->get('tb_visitor2019');
  		if($query->num_rows() == 0) {
  			return 0;
  		} else {
  			return $query->result();
  		}
  	}

    public function count_visitor($data=array())
      {
  		$this->db->select('visitor_id');
      if($data['visitor_id'] != ''){
  			$this->db->where('visitor_id', $data['visitor_id']);
  		}
  		if($data['visitor_firstname'] != ''){
  			$this->db->like('visitor_firstname', $data['visitor_firstname']);
  		}
      if($data['visitor_company'] != ''){
  			$this->db->like('visitor_company', $data['visitor_company']);
  		}
      if($data['visitor_country'] != ''){
  			$this->db->like('visitor_country', $data['visitor_country']);
  		}
      if($data['visitor_phone1'] != ''){
  			$this->db->like('visitor_phone1', $data['visitor_phone1']);
  		}
      if($data['visitor_email'] != ''){
  			$this->db->like('visitor_email', $data['visitor_email']);
  		}
      $this->db->where(array('visitor_status !=' => 0));
  		$this->db->from('tb_visitor2019');
  		$query = $this->db->get();
  		return $query->num_rows();
  	}

    function get_visitordetail($data=array())
      {
  		if($data['visitor_id'] != ''){
  			$this->db->where('visitor_id', $data['visitor_id']);
  		}
  		$this->db->from('tb_visitor2019');
  		$query = $this->db->get();
  		if($query->num_rows() == 0) {
  			return 0;
  		} else {
  			return $query->result();
  		}
  	}

    // Get data
  	public function listdata($data = array()){
      $query = $this->db->query("SELECT ".$data['fide']." FROM tb_visitor2019 WHERE visitor_status != 0");
  		return $query->result_array();
  	}


	public function listVisitordetail($data = array()){
		$this->db->select($data['fide']);
		if(!empty($data['where'])){$this->db->where($data['where']);}
		if(!empty($data['orderby'])){$this->db->order_by($data['orderby']);}
		if(!empty($data['limit'])){$this->db->limit($data['limit'][0],$data['limit'][1]);}
		$query = $this->db->get('tb_visitor2019');
		return $query->result_array();
	}

}
?>
