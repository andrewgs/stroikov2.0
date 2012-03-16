<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Interiorsmodel extends CI_Model{

    var $id   		= 0;
    var $title 		= '';
    var $address 	= '';
    var $rooms  	= 0;
    var $note   	= '';
    var $insdate	= '';
    var $type		= '';
    var $translit	= '';
    var $area		= '';

    function __construct(){
       
	    parent::__construct();
    }
	
	function insert_record($data,$translit,$type){
			
		$this->title 	= htmlspecialchars($data['title']);
		$this->address	= htmlspecialchars($data['address']);
		$this->rooms 	= $data['rooms'];
		$this->note 	= strip_tags($data['note']);
		$this->insdate 	= date("Y-m-d");
		$this->type 	= $type;
		$this->translit = $translit;
		$this->area		= $data['area'];
		
		$this->db->insert('interiors',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data){
			
		$this->db->set('title',htmlspecialchars($data['title']));
		$this->db->set('address',htmlspecialchars($data['address']));
		$this->db->set('rooms',$data['rooms']);
		$this->db->set('note',strip_tags($data['note']));
		$this->db->set('translit',$data['translit']);
		$this->db->set('area',$data['area']);
		$this->db->where('id',$id);
		
		$this->db->update('interiors');
		return $this->db->affected_rows();
	}
	
	function exist_translit($translit){
		
		$this->db->where('translit',$translit);
		$query = $this->db->get('interiors');
		$data = $query->result_array();
		if(count($data)) return TRUE;
		return FALSE;
	}
	
	function read_record($translit,$type){
		
		$this->db->where('type',$type);
		$this->db->where('translit',$translit);
		$query = $this->db->get('interiors',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}
	
	function read_records($type){
		
		$this->db->where('type',$type);
		$this->db->order_by('title');
		$query = $this->db->get('interiors');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function read_limit_records($type,$count,$from){
	
		$this->db->limit($count,$from);
		$this->db->where('type',$type);
		$this->db->order_by('insdate','DESC');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('interiors');
		return $query->result_array();
	}
	
	function limit_interiors($count,$from){
	
		$this->db->limit($count,$from);
		$this->db->order_by('insdate','DESC');
		$query = $this->db->get('interiors');
		return $query->result_array();
	}
	
	function read_field($id,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get('interiors',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function delete_record($id){
	
		$this->db->where('id',$id);
		$this->db->delete('interiors');
		return $this->db->affected_rows();
	}

	function read_field_translit($translit,$field){
		
		$this->db->where('translit',$translit);
		$query = $this->db->get('interiors');
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
}