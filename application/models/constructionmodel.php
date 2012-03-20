<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Constructionmodel extends CI_Model{

    var $id   		= 0;
    var $title 		= '';
    var $address 	= '';
    var $note   	= '';
    var $insdate	= '';
    var $translit	= '';
    var $over		= 0;

    function __construct(){
       
	    parent::__construct();
    }
	
	function insert_record($data,$translit){
			
		$this->title 	= htmlspecialchars($data['title']);
		$this->address	= htmlspecialchars($data['address']);
		$this->note 	= strip_tags($data['note']);
		$this->insdate 	= date("Y-m-d");
		$this->translit = $translit;
		$this->over		= $data['over'];
		
		$this->db->insert('construction',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$translit,$data){
			
		$this->db->set('title',htmlspecialchars($data['title']));
		$this->db->set('address',htmlspecialchars($data['address']));
		$this->db->set('note',strip_tags($data['note']));
		$this->db->set('translit',$translit);
		$this->db->set('over',$data['over']);
		$this->db->where('id',$id);
		
		$this->db->update('construction');
		return $this->db->affected_rows();
	}
	
	function exist_translit($translit){
		
		$this->db->where('translit',$translit);
		$query = $this->db->get('construction');
		$data = $query->result_array();
		if(count($data)) return TRUE;
		return FALSE;
	}
	
	function exist_translit_nonid($id,$translit){
		
		$this->db->where('id !=',$id);
		$this->db->where('translit',$translit);
		$query = $this->db->get('construction');
		$data = $query->result_array();
		if(count($data)) return TRUE;
		return FALSE;
	}
	
	
	function read_record($translit){
		
		$this->db->where('translit',$translit);
		$query = $this->db->get('construction',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}
	
	function read_records($over){
		
		$this->db->where('over',$over);
		$this->db->order_by('title');
		$query = $this->db->get('construction');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function read_limit_records($over,$count,$from){
		
		$this->db->where('over',$over);
		$this->db->limit($count,$from);
		$this->db->order_by('insdate','DESC');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('construction');
		return $query->result_array();
	}
	
	function limit_construction($count,$from){
	
		$this->db->limit($count,$from);
		$this->db->order_by('insdate','DESC');
		$query = $this->db->get('construction');
		return $query->result_array();
	}
	
	function read_field($id,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get('construction',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function delete_record($id){
	
		$this->db->where('id',$id);
		$this->db->delete('construction');
		return $this->db->affected_rows();
	}

	function read_field_translit($translit,$field){
		
		$this->db->where('translit',$translit);
		$query = $this->db->get('construction');
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
}