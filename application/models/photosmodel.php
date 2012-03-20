<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Photosmodel extends CI_Model{
	
	var $id 	= 0;
	var $title 	= '';
	var $image 	= '';
	var $small 	= '';
	var $type 	= '';
	var $object = '';
	var $table = '';

	function __construct(){
        
		parent::__construct();
    }
	
	function insert_record($data,$type,$object,$table){
		
		$this->title 	= $data['title'];
		$this->image 	= $data['image'];
		$this->small 	= $data['small'];
		$this->type 	= $type;
		$this->object 	= $object;
		$this->table 	= $table;
		
		$this->db->insert('photos', $this);
	}
	
	function get_one_record($object,$table){
	
		$this->db->select('id,title');
		$this->db->where('object',$object);
		$this->db->where('table',$table);
		$query = $this->db->get('photos',1);
		$data = $query->result_array();
		if(count($data)) return $data[0];
		return NULL;
	}
	
	function get_image($id){
		
		$this->db->where('id',$id);
		$query = $this->db->get('photos');
		$data = $query->result_array();
		if(isset($data[0])) return $data[0]['image'];
		return NULL;
	}
	
	function get_small($id){
		
		$this->db->where('id',$id);
		$query = $this->db->get('photos');
		$data = $query->result_array();
		if(isset($data[0])) return $data[0]['small'];
		return NULL;
	}
	
	function read_records($type,$object,$table){
		
		$this->db->select('id,title');
		$this->db->where('type',$type);
		$this->db->where('object',$object);
		$this->db->where('table',$table);
		$query = $this->db->get('photos');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function image_delete($id){
	
		$this->db->where('id',$id);
		$this->db->delete('photos');
		return $this->db->affected_rows();
	}
	
	function images_delete($type,$object){
	
		$this->db->where('type',$type);
		$this->db->where('object',$object);
		$this->db->delete('photos');
		return $this->db->affected_rows();
	}

	function read_limit_records($count,$from,$table){
		
		$this->db->select('id,title');
		$this->db->where('table',$table);
		$this->db->limit($count,$from);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('photos');
		return $query->result_array();
	}
	
}
?>