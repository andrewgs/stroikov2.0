<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Interiorsmodel extends CI_Model{

    var $id   		= 0;
    var $title 		= '';
    var $city    	= '';
    var $address 	= '';
    var $rooms  	= 0;
    var $note   	= '';
    var $insdate	= '';
    var $type		= '';
    var $translit	= '';

    function __construct(){
       
	    parent::__construct();
    }
	
	function insert_record($data,$type){
			
		$this->title 	= $data['title'];
		$this->city		= $data['city'];
		$this->address	= $data['address'];
		$this->rooms 	= $data['rooms'];
		$this->note 	= $data['note'];
		$this->insdate 	= date("Y-m-d");
		$this->type 	= $type;
		$this->translit = $data['translit'];
		
		$this->db->insert('interiors',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data){
			
		$this->db->set('title',$data['title']);
		$this->db->set('city',$data['city']);
		$this->db->set('address',$data['address']);
		$this->db->set('rooms',$data['rooms']);
		$this->db->set('note',$data['note']);
		$this->db->set('translit',$data['translit']);
		$this->db->where('id',$id);
		$this->db->update('interiors');
		return $this->db->affected_rows();
	}
	
	function read_record($id){
		
		$this->db->where('id',$id);
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
}