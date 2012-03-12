<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Interiorstypemodel extends CI_Model{

    var $id   		= 0;
    var $title 		= '';
    var $translit	= '';

    function __construct(){
       
	    parent::__construct();
    }
	
	function insert_record($title,$translit){
			
		$this->title 	= htmlspecialchars($title);
		$this->translit	= htmlspecialchars($translit);
		
		$this->db->insert('interiorstype',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data){
			
		$this->db->set('title',$data['title']);
		$this->db->set('translit',$data['translit']);
		$this->db->where('id',$id);
		$this->db->update('interiorstype');
		return $this->db->affected_rows();
	}
	
	function read_record($id){
		
		$this->db->where('id',$id);
		$query = $this->db->get('interiorstype',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}
	
	function read_records(){
		
		$this->db->order_by('title');
		$query = $this->db->get('interiorstype');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function read_field($id,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get('interiorstype',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function delete_record($id){
	
		$this->db->where('id',$id);
		$this->db->delete('interiorstype');
		return $this->db->affected_rows();
	}	
}