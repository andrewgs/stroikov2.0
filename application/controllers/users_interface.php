<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends CI_Controller{
	
	var $user = array('uid'=>0,'ulogin'=>'','uemail'=>'');
	var $loginstatus = array('status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля","08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('interiorsmodel');
		$this->load->model('interiorstypemodel');
		$this->load->model('estatetypemodel');
		$this->load->model('estatemodel');
		
		$cookieuid = $this->session->userdata('logon');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['uid'] = $this->session->userdata('userid');
			if($this->user['uid']):
				$userinfo = $this->adminmodel->read_record($this->user['uid']);
				if($userinfo):
					$this->user['ulogin'] 			= $userinfo['login'];
					$this->user['uemail'] 			= '';
					$this->loginstatus['status'] 	= TRUE;
				endif;
			endif;
			
			if($this->session->userdata('logon') != md5($userinfo['login'])):
				$this->loginstatus['status'] = FALSE;
				$this->user = array();
			endif;
		endif;
	}
	
	public function index(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
					'interiors'		=> $this->interiorstypemodel->read_records(),
					'estate'		=> $this->estatetypemodel->read_records(),
					'liveinteriors'	=> $this->interiorsmodel->read_records(1),
			);
		
		$this->load->view("users_interface/index",$pagevar);
	}
	
	public function design_interierov(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/design-interierov",$pagevar);
	}
	
	public function obektu_stroitelstva(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/obektu-stroitelstva",$pagevar);
	}
	
	public function kontaktnaya_informacia(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/kontaktnaya-informacia",$pagevar);
	}
	
	public function remont(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/remont",$pagevar);
	}
	
	public function stroitelstvo(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/stroitelstvo",$pagevar);
	}
	
	public function injenernue_seti(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/injenernue-seti",$pagevar);
	}
	
	public function agentstvo_nedvijimosti(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/agentstvo-nedvijimosti",$pagevar);
	}
	
	public function o_kompanii(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
			);
		
		$this->load->view("users_interface/o-kompanii",$pagevar);
	}
	
	public function admin_login(){
	
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'РосЦентр ДПО - Панель администрирования',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus['status'],
					'userinfo'		=> $this->user,
					'form_title'	=> 'Введите логин и пароль для входа в панель администрирования',
					'msg'			=> $this->session->userdata('msg')
			);
		$this->session->unset_userdata('msg');
		if($this->input->post('submit')):
			$_POST['submit'] == NULL;
			$userinfo = $this->adminmodel->auth_user($this->input->post('login'),$this->input->post('password'));
			if(!$userinfo):
				$this->session->set_userdata('msg','Имя пользователя и пароль не совпадают');
				redirect($this->uri->uri_string());
			else:
				$session_data = array('logon'=>md5($userinfo['login']),'userid'=>$userinfo['id'],'utype'=>'adm');
				$this->adminmodel->active_user($userinfo['id']);
                $this->session->set_userdata($session_data);
                redirect("admin-panel/actions/control");
			endif;
		endif;
		if($this->loginstatus['status']):
			if($this->loginstatus['adm']):
				redirect('admin-panel/actions/control');
			elseif($this->loginstatus['cus']):
				redirect('');
			elseif($this->loginstatus['aud']):
				redirect('');
			endif;
		endif;
		$this->load->view("users_interface/admin-login",$pagevar);
	}
	
	public function logoff(){
		
		$model = $this->definition_model($this->session->userdata('utype'));
		$this->$model->deactive_user($this->session->userdata('userid'));
		$this->session->sess_destroy();
        redirect('');
	}
	
	public function randomPassword($length,$allow="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789"){
	
		$i = 1;
		$ret = '';
		while($i<=$length):
			$max   = strlen($allow)-1;
			$num   = rand(0, $max);
			$temp  = substr($allow, $num, 1);
			$ret  .= $temp;
			$i++;
		endwhile;
		return $ret;
	}
}