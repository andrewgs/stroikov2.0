<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends CI_Controller{
	
	var $user = array('uid'=>0,'cid'=>0,'ufullname'=>'','ulogin'=>'','uemail'=>'');
	var $loginstatus = array('status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля","08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
		
		parent::__construct();
		
		$this->load->model('adminmodel');
		$this->load->model('interiorsmodel');
		$this->load->model('objectstypemodel');
		$this->load->model('estatemodel');
		$this->load->model('photosmodel');
		$this->load->model('constructionmodel');
		
		$cookieuid = $this->session->userdata('logon');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['uid'] = $this->session->userdata('userid');
			if($this->user['uid']):
				$userinfo = $this->adminmodel->read_record($this->user['uid']);
				if($userinfo):
					$this->user['ulogin'] 			= $userinfo['login'];
					$this->user['uemail'] 			= '';
					$this->loginstatus['status'] 	= TRUE;
				else:
					redirect('');
				endif;
			endif;
			
			if($this->session->userdata('logon') != md5($userinfo['login'])):
				$this->loginstatus['status'] = FALSE;
				redirect('');
			endif;
		else:
			redirect('');
		endif;
	}
	
	public function index(){

		$this->load->view("admin_interface/index");
	}
	
	public function admin_panel(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'РосЦентр ДПО - Панель администрирования',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'newcourses'	=> $this->coursesmodel->read_new_courses(5)
			);
		$this->load->view("admin_interface/admin-panel",$pagevar);
	}
	
	public function admin_cabinet(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'РосЦентр ДПО - Личный кабинет',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'newcourses'	=> $this->coursesmodel->read_new_courses(5)
			);
		$this->load->view("admin_interface/admin-cabinet",$pagevar);
	}

	public function admin_logoff(){
		
		$this->adminmodel->deactive_user($this->session->userdata('userid'));
		$this->session->sess_destroy();
        redirect('');
	}

	public function admin_delete_image(){
		
		$image = $this->uri->segment(7);
		if($this->photosmodel->image_delete($image)):
			$this->session->set_userdata('msgs','Фотогафия удалена успешно.');
		else:
			$this->session->set_userdata('msgr','Ошибка при удалении фотографии.');
		endif;
		redirect($this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
	}

	public function photo_album_delete_image(){
		
		$image = $this->uri->segment(5);
		if($this->photosmodel->image_delete($image)):
			$this->session->set_userdata('msgs','Фотогафия удалена успешно.');
		else:
			$this->session->set_userdata('msgr','Ошибка при удалении фотографии.');
		endif;
		redirect('o-kompanii/photo-album');
	}
	
	public function admin_delete_interior(){
		
		$interior = $this->uri->segment(7);
		if($this->interiorsmodel->delete_record($interior)):
			$this->photosmodel->images_delete($interior,'interiors');
			$this->session->set_userdata('msgs','Интерьер удален успешно.');
		else:
			$this->session->set_userdata('msgr','Ошибка при удалении интерьера.');
		endif;
		redirect($this->uri->segment(2));
	}
	
	public function admin_delete_estate(){
		
		$estate = $this->uri->segment(7);
		if($this->estatemodel->delete_record($estate)):
			$this->photosmodel->images_delete($estate,'estate');
			$this->session->set_userdata('msgs','Объект удален успешно.');
		else:
			$this->session->set_userdata('msgr','Ошибка при удалении Объект.');
		endif;
		redirect($this->uri->segment(2));
	}
	
	public function admin_delete_object(){
		
		$object = $this->uri->segment(7);
		if($this->constructionmodel->delete_record($object)):
			$this->photosmodel->images_delete($object,'construction');
			$this->session->set_userdata('msgs','Объект удален успешно.');
		else:
			$this->session->set_userdata('msgr','Ошибка при удалении объекта.');
		endif;
		redirect($this->uri->segment(2));
	}
	
	public function admin_delete_objecttypes(){
		
		$type = $this->uri->segment(4);
		if(!count($this->interiorsmodel->read_records($type))):
			$this->objectstypemodel->delete_record($type);
		endif;
		/*if($this->objectstypemodel->delete_record($type)):
			$this->interiorsmodel->delete_records($type);
			$this->photosmodel->images_type_delete($type,'interiors');
		endif;*/
		redirect('');
	}
}