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
		if($this->input->post('isubmit')):
			$_POST['isubmit'] = NULL;
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",$_POST['pranslit']);
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				$this->interiorstypemodel->insert_record($_POST['title'],$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
		if($this->input->post('osubmit')):
			$_POST['osubmit'] = NULL;
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",$_POST['pranslit']);
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				$this->estatetypemodel->insert_record($_POST['title'],$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
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
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus['status'],
					'userinfo'		=> $this->user,
					'msg'			=> $this->session->userdata('msg')
			);
		$this->session->unset_userdata('msg');
		if($this->input->post('submit')):
			$_POST['submit'] == NULL;
			$userinfo = $this->adminmodel->auth_user($_POST['login'],$_POST['password']);
			if(!$userinfo):
				$this->session->set_userdata('msg','Имя пользователя и пароль не совпадают');
				redirect($this->uri->uri_string());
			else:
				$session_data = array('logon'=>md5($userinfo['login']),'userid'=>$userinfo['id']);
                $this->session->set_userdata($session_data);
                redirect('');
			endif;
		endif;
		if($this->loginstatus['status']):
			redirect('');
		endif;
		$this->load->view("users_interface/admin-login",$pagevar);
	}
	
	public function logoff(){
		
		$this->session->sess_destroy();
        redirect('');
	}
	
	public function translite($string){
	
		$rus = array("ё","й","ю","ь","ч","щ","ц","у","к","е","н","г","ш","з","х","ъ","ф","ы","в","а","п","р","о","л","д","ж","э","я","с","м","и","т","б","Ё","Й","Ю","Ч","Ь","Щ","Ц","У","К","Е","Н","Г","Ш","З","Х","Ъ","Ф","Ы","В","А","П","Р","О","Л","Д","Ж","Э","Я","С","М","И","Т","Б"," ");
		$eng = array("yo","iy","yu","'","ch","sh","c","u","k","e","n","g","sh","z","h","'","f","y","v","a","p","r","o","l","d","j","е","ya","s","m","i","t","b","Yo","Iy","Yu","CH","'","SH","C","U","K","E","N","G","SH","Z","H","'","F","Y","V","A","P","R","O","L","D","J","E","YA","S","M","I","T","B","-");
		$string = str_replace($rus,$eng,$string);
		if(!empty($string)):
			return strtolower($string);
		else:
			return FALSE;
		endif;
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