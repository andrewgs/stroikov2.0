<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends CI_Controller{
	
	var $user = array('uid'=>0,'ulogin'=>'','uemail'=>'');
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
					'objects'		=> $this->objectstypemodel->read_records(),
					'estate'		=> array(),
					'interiors'		=> array(),
					'slideshow'		=> array(),
					'images'		=> $this->photosmodel->read_limit_records(10,0,'interiors')
			);
		
		if(count($pagevar['objects']) == 1):
			$pagevar['estate'] = $this->estatemodel->read_limit_records($pagevar['objects'][0]['id'],5,0);
			$pagevar['interiors'] = $this->interiorsmodel->read_limit_records($pagevar['objects'][0]['id'],5,0);
		endif;
		
		$pagevar['slideshow'] = $this->interiorsmodel->limit_interiors(10,0);
		for($i=0;$i<count($pagevar['slideshow']);$i++):
			$pagevar['slideshow'][$i]['object']	= $this->objectstypemodel->read_field($pagevar['slideshow'][$i]['type'],'translit');
			$pagevar['slideshow'][$i]['images'] = $this->photosmodel->get_one_record($pagevar['slideshow'][$i]['id'],'interiors');
			if(mb_strlen($pagevar['slideshow'][$i]['note'],'UTF-8') > 200):									
				$pagevar['slideshow'][$i]['note'] = mb_substr($pagevar['slideshow'][$i]['note'],0,200,'UTF-8');	
				$pos = mb_strrpos($pagevar['slideshow'][$i]['note'],' ',0,'UTF-8');
				$pagevar['slideshow'][$i]['note'] = mb_substr($pagevar['slideshow'][$i]['note'],0,$pos,'UTF-8');
			endif;
		endfor;
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",$_POST['pranslit']);
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				if(!$this->objectstypemodel->exist_translit($translit)):
					$this->objectstypemodel->insert_record($_POST['title'],$translit);
				endif;
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
					'objects'		=> $this->objectstypemodel->read_records(),
					'interior'		=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['objects']);$i++):
			$pagevar['objects'][$i]['interiors'] = $this->interiorsmodel->read_records($pagevar['objects'][$i]['id']);
		endfor;
		
		$pagevar['interior'] = $this->interiorsmodel->read_limit_records($pagevar['objects'][0]['id'],1,0);
		if(count($pagevar['interior'])):
		   $pagevar['interior'][0]['images'] = $this->photosmodel->read_records($pagevar['objects'][0]['id'],$pagevar['interior'][0]['id'],'interiors');
		endif;
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('rooms',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('area',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",$_POST['pranslit']);
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				
				if(!$this->interiorsmodel->exist_translit($translit)):
					$this->interiorsmodel->insert_record($_POST,$translit,$_POST['type']);
				endif;
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		$this->load->view("users_interface/design-interierov",$pagevar);
	}
	
	public function design_interiera(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
					'objects'		=> $this->objectstypemodel->read_records(),
					'interior'		=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['objects']);$i++):
			$pagevar['objects'][$i]['interiors'] = $this->interiorsmodel->read_records($pagevar['objects'][$i]['id']);
		endfor;
		$type = $this->objectstypemodel->read_field_translit($this->uri->segment(2),'id');
		$pagevar['interior'] = $this->interiorsmodel->read_record($this->uri->segment(3),$type);
		$pagevar['interior']['images'] = $this->photosmodel->read_records($type,$pagevar['interior']['id'],'interiors');
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('rooms',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('area',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",htmlspecialchars($_POST['pranslit']));
				else:
					$translit = $this->translite(htmlspecialchars($_POST['title']));
				endif;
				if(!$this->interiorsmodel->exist_translit($translit)):
					$this->interiorsmodel->insert_record($_POST,$translit,$_POST['type']);
					$this->session->set_userdata('msgs','Интерьер добавлен успешно.');
				endif;
				redirect('design-interierov/'.$this->uri->segment(2).'/'.$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		if($this->input->post('imgsubmit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('userfile',' ','callback_userfile_check');
			if($this->form_validation->run()):
				if($_FILES['userfile']['error'] != 4):
//					$_POST['image'] = $this->resize_img($_FILES['userfile']['tmp_name'],540,320,FALSE);
					$_POST['image'] = $this->resize_image($_FILES['userfile']['tmp_name'],540,320,TRUE);
//					$_POST['small'] = $this->resize_img($_FILES['userfile']['tmp_name'],141,104,TRUE);
					$_POST['small'] = $this->resize_image($_FILES['userfile']['tmp_name'],141,104,TRUE);
				endif;
				$type = $this->objectstypemodel->read_field_translit($this->uri->segment(2),'id');
				if($this->interiorsmodel->exist_translit($this->uri->segment(3)) && $type):
					$object = $this->interiorsmodel->read_field_translit($this->uri->segment(3),'id');
					$this->photosmodel->insert_record($_POST,$type,$object,'interiors');
					$this->session->set_userdata('msgs','Фотогафия добавлена успешно.');
				endif;
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		if($this->input->post('edsubmit')):
			$this->form_validation->set_rules('interior',' ','required|trim');
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('rooms',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('area',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = htmlspecialchars($_POST['pranslit']);
				else:
					$translit = $this->translite(htmlspecialchars($_POST['title']));
				endif;
				if(!$this->interiorsmodel->exist_translit_nonid($_POST['interior'],$translit)):
					$this->interiorsmodel->update_record($_POST['interior'],$translit,$_POST);
					$this->session->set_userdata('msgs','Интерьер сохранен успешно.');
				endif;
				redirect('design-interierov/'.$this->uri->segment(2).'/'.$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		$this->load->view("users_interface/design-interiera",$pagevar);
	}
	
	public function obektu_stroitelstva(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user
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
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('email',' ','required|valid_email|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			if($this->form_validation->run()):
				$message = "Имя: ".$_POST['name']."\nПочта: ".$_POST['email']."\nСообщение: ".$_POST['note'];
				if($this->sendmail('admin@sk-stroikov.ru',$message,"Сообщение от ".$_POST['name'],$_POST['email'])):
					$this->session->set_userdata('msgs','Сообщение отправлено успешно.');
				endif;
			else:
				$this->session->set_userdata('msgr','Сообщение не отправлено.');
			endif;
			redirect($this->uri->uri_string());
		endif;
		
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
					'objects'		=> array()
			);
		
		$pagevar['objects']['current'] = $this->constructionmodel->read_limit_records(0,5,0);
		$pagevar['objects']['over'] = $this->constructionmodel->read_limit_records(1,5,0);
		
		if(count($pagevar['objects']['current'])):
			$pagevar['objects']['current'][0]['images'] = $this->photosmodel->read_records(0,$pagevar['objects']['current'][0]['id'],'construction');
		endif;
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!isset($_POST['over'])):
					$_POST['over'] = 0;
				endif;
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",$_POST['pranslit']);
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				if(!$this->constructionmodel->exist_translit($translit)):
					$this->constructionmodel->insert_record($_POST,$translit);
				endif;
			endif;
			redirect($this->uri->uri_string());
		endif;
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
					'objects'		=> $this->objectstypemodel->read_records(),
					'estate'		=> array()
			);
		for($i=0;$i<count($pagevar['objects']);$i++):
			$pagevar['objects'][$i]['estate'] = $this->estatemodel->read_records($pagevar['objects'][0]['id']);
		endfor;
		if(count($pagevar['objects']) == 1):
			$pagevar['estate'] = $this->estatemodel->read_limit_records($pagevar['objects'][0]['id'],1,0);
			if(count($pagevar['estate'])):
			   $pagevar['estate'][0]['images'] = $this->photosmodel->read_records($pagevar['objects'][0]['id'],$pagevar['estate'][0]['id'],'estate');
			endif;
		endif;
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('rooms',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('area',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",$_POST['pranslit']);
				else:
					$translit = $this->translite($_POST['title']);
				endif;
				
				if(!$this->estatemodel->exist_translit($translit)):
					$this->estatemodel->insert_record($_POST,$translit,$_POST['type']);
				endif;
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		$this->load->view("users_interface/agentstvo-nedvijimosti",$pagevar);
	}
	
	public function object_nedvijimosti(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
					'objects'		=> $this->objectstypemodel->read_records(),
					'estate'		=> array(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['objects']);$i++):
			$pagevar['objects'][$i]['estate'] = $this->estatemodel->read_records($pagevar['objects'][0]['id']);
		endfor;
		$type = $this->objectstypemodel->read_field_translit($this->uri->segment(2),'id');
		$pagevar['estate'] = $this->estatemodel->read_record($this->uri->segment(3),$type);
		$pagevar['estate']['images'] = $this->photosmodel->read_records($type,$pagevar['estate']['id'],'estate');
		
		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('rooms',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('area',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",htmlspecialchars($_POST['pranslit']));
				else:
					$translit = $this->translite(htmlspecialchars($_POST['title']));
				endif;
				if(!$this->estatemodel->exist_translit($translit)):
					$this->estatemodel->insert_record($_POST,$translit,$_POST['type']);
					$this->session->set_userdata('msgs','Интерьер добавлен успешно.');
				endif;
				redirect('agentstvo-nedvijimosti/'.$this->uri->segment(2).'/'.$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		if($this->input->post('imgsubmit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('userfile',' ','callback_userfile_check');
			if($this->form_validation->run()):
				if($_FILES['userfile']['error'] != 4):
//					$_POST['image'] = $this->resize_img($_FILES['userfile']['tmp_name'],540,320,FALSE);
					$_POST['image'] = $this->resize_image($_FILES['userfile']['tmp_name'],540,320,TRUE);
//					$_POST['small'] = $this->resize_img($_FILES['userfile']['tmp_name'],141,104,TRUE);
					$_POST['small'] = $this->resize_image($_FILES['userfile']['tmp_name'],141,104,TRUE);
				endif;
				$type = $this->objectstypemodel->read_field_translit($this->uri->segment(2),'id');
				if($this->estatemodel->exist_translit($this->uri->segment(3)) && $type):
					$object = $this->estatemodel->read_field_translit($this->uri->segment(3),'id');
					$this->photosmodel->insert_record($_POST,$type,$object,'estate');
					$this->session->set_userdata('msgs','Фотогафия добавлена успешно.');
				endif;
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		$this->load->view("users_interface/object-nedvijimosti",$pagevar);
	}
	
	public function object_stroitelstva(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user,
					'objects'		=> array(),
					'object'		=> $this->objectstypemodel->read_records(),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		$pagevar['objects']['current'] = $this->constructionmodel->read_limit_records(0,5,0);
		$pagevar['objects']['over'] = $this->constructionmodel->read_limit_records(1,5,0);
		
		$pagevar['object'] = $this->constructionmodel->read_record($this->uri->segment(3));
		$pagevar['object']['images'] = $this->photosmodel->read_records(0,$pagevar['object']['id'],'construction');

		if($this->input->post('submit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('pranslit',' ','trim');
			if($this->form_validation->run()):
				if(!isset($_POST['over'])):
					$_POST['over'] = 0;
				endif;
				if(!empty($_POST['pranslit'])):
					$translit = preg_replace("/\ +/","-",htmlspecialchars($_POST['pranslit']));
				else:
					$translit = $this->translite(htmlspecialchars($_POST['title']));
				endif;
				if(!$this->constructionmodel->exist_translit($translit)):
					$this->constructionmodel->insert_record($_POST,$translit);
					$this->session->set_userdata('msgs','Объект добавлен успешно.');
				else:
					$this->session->set_userdata('msgr','Добавление не возможно. Объект с псевдонимом '.$translit.' уже существует.');
				endif;
				redirect('stroitelstvo/object/'.$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		if($this->input->post('imgsubmit')):
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('userfile',' ','callback_userfile_check');
			if($this->form_validation->run()):
				if($_FILES['userfile']['error'] != 4):
//					$_POST['image'] = $this->resize_img($_FILES['userfile']['tmp_name'],540,320,FALSE);
					$_POST['image'] = $this->resize_image($_FILES['userfile']['tmp_name'],540,320,TRUE);
//					$_POST['small'] = $this->resize_img($_FILES['userfile']['tmp_name'],141,104,TRUE);
					$_POST['small'] = $this->resize_image($_FILES['userfile']['tmp_name'],141,104,TRUE);
				endif;
				if($this->constructionmodel->exist_translit($this->uri->segment(3))):
					$object = $this->constructionmodel->read_field_translit($this->uri->segment(3),'id');
					$this->photosmodel->insert_record($_POST,0,$object,'construction');
					$this->session->set_userdata('msgs','Фотогафия добавлена успешно.');
				endif;
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		if($this->input->post('edsubmit')):
			$this->form_validation->set_rules('object',' ','required|trim');
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('address',' ','required|trim');
			$this->form_validation->set_rules('note',' ','required|trim');
			$this->form_validation->set_rules('translit',' ','trim');
			if($this->form_validation->run()):
				if(!isset($_POST['over'])):
					$_POST['over'] = 0;
				endif;
				if(!empty($_POST['translit'])):
					$translit = htmlspecialchars($_POST['translit']);
				else:
					$translit = $this->translite(htmlspecialchars($_POST['title']));
				endif;
				if(!$this->constructionmodel->exist_translit_nonid($_POST['object'],$translit)):
					$this->constructionmodel->update_record($_POST['object'],$translit,$_POST);
					$this->session->set_userdata('msgs','Объект сохранен успешно.');
				endif;
				redirect('stroitelstvo/object/'.$translit);
			endif;
			redirect($this->uri->uri_string());
		endif;
		
		$this->load->view("users_interface/object-stroitelstva",$pagevar);
	}
	
	public function konkurs_dlya_desainerov(){
		
		$pagevar = array(
			'description'	=> '',
			'author'		=> '',
			'title'			=> 'Конкурс проектных идей в области архитектуры малых форм | Строительная компания Стройковъ',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'userinfo'		=> $this->user,
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr')
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if ( $this->input->post('submit') ) {
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('phone',' ','required|trim');
			$this->form_validation->set_rules('email',' ','required|valid_email|trim');
			$this->form_validation->set_rules('education',' ','trim');
			$this->form_validation->set_rules('userarhiv',' ','callback_userarhiv_check');
			$this->form_validation->set_rules('note',' ','trim');
			
			if ( $this->form_validation->run() ) {
				
				$user = $this->translite(htmlspecialchars($_POST['name']));
				$catalog = getcwd().'/documents/'.$user;
				if ( is_dir($catalog) ) {
					$catalog .= '-'.date("Ymdhis");
				}
				mkdir($catalog, 0777);
				if ( $_FILES['userfile']['error'] != 4 ) {
					$_FILES['userfile']['name'] = preg_replace('/.+(.)(\.)+/',date("Ymdhis")."\$2", $_FILES['userfile']['name']);
					if ( !$this->fileupload('userfile',FALSE,$catalog) ) {
						redirect($this->uri->uri_string());
					}
				}
		
				if ( $_FILES['userarhiv']['error'] != 4 ) {
					$_FILES['userarhiv']['name'] = preg_replace('/.+(.)(\.)+/',date("Ymdhis")."\$2", $_FILES['userarhiv']['name']);
					if ( !$this->fileupload('userarhiv',FALSE,$catalog) ){
						redirect($this->uri->uri_string());
					}
				} else {
					$this->session->set_userdata('msgr','Сообщение не отправлено. Не указан архив с материалами.');
				}
				ob_start();
				?>
<h2>Архив с материалами конкурса Стройка#1</h2>
<p><strong>Участник:</strong> <?=$_POST['name'];?> (тел.: <?=$_POST['phone'];?>)</p>
<p><strong>Образование:</strong> <?=$_POST['education'];?></p> 
<p>Просмотреть фотографию конкурсанта: <a href="<? echo base_url().'/documents/'.$user.'/'.$_FILES['userfile']['name']; ?>">Фотография</a></p> 
<p>Скачать архив c проектом: <a href="<? echo base_url().'/documents/'.$user.'/'.$_FILES['userarhiv']['name']; ?>">Архив с проектом</a></p> 
<p><b>Комментарий к письму:</b> <?= strip_tags($_POST['note']) ;?></p>
				<?
				$mailtext = ob_get_clean();
				
				$this->email->clear(TRUE);
				$config['smtp_host'] = 'localhost';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				
				$this->email->initialize($config);
				$this->email->to('kd@sk-stroikov.ru');
				$this->email->from($_POST['email'], $_POST['name']);
				$this->email->bcc('admin@sk-stroikov.ru');
				$this->email->subject('Архив с материалами (Стройка#1)');
				$this->email->message($mailtext);
					
				if ( $this->email->send() ) {
					$this->sendbackmail($_POST['name'],$_POST['email']);
					$this->session->set_userdata('msgs','Сообщение отправлено успешно.');
				}
			} else {
				$this->session->set_userdata('msgr','Сообщение не отправлено. Так как форма не прошла валидацию.');
			}
			redirect($this->uri->uri_string());
		}
		
		if ( $this->input->post('vsubmit') ) {
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('email',' ','required|valid_email|trim');
			$this->form_validation->set_rules('note',' ','trim');
			if ( $this->form_validation->run() ) {
				ob_start();
				?>
<h2>Выбор мест для установки велопарковок [Стройка#1]</h2>
<p><strong>Сообщение:</strong> <?= strip_tags($_POST['note']); ?></p>
				<?
				$mailtext = ob_get_clean();
				
				$this->email->clear(TRUE);
				$config['smtp_host'] = 'localhost';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				
				$this->email->initialize($config);
				$this->email->to('kd@sk-stroikov.ru');
				$this->email->from($_POST['email'], $_POST['name']);
				$this->email->bcc('admin@sk-stroikov.ru');
				$this->email->subject('Выбор мест для установки велопарковок [Стройка#1]');
				$this->email->message($mailtext);	
				if ( $this->email->send() ) {
					$this->sendbackmail($_POST['name'],$_POST['email']);
					$this->session->set_userdata('msgs','Сообщение отправлено успешно.');
				}
			} else {
				$this->session->set_userdata('msgr','Сообщение не отправлено. Так как форма не прошла валидацию.');
			}
			redirect($this->uri->uri_string());
		}
		
		if ( $this->input->post('wsubmit') ) {
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('email',' ','required|valid_email|trim');
			$this->form_validation->set_rules('note',' ','trim');
			if ( $this->form_validation->run() ) {
				ob_start();
				?>
<h2>Выбор мест для отдыха на лавочках [Стройка#1]</h2>
<p><strong>Сообщение:</strong> <?= strip_tags($_POST['note']); ?></p>
				<?
				$mailtext = ob_get_clean();
				
				$this->email->clear(TRUE);
				$config['smtp_host'] = 'localhost';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				
				$this->email->initialize($config);
				$this->email->to('kd@sk-stroikov.ru');
				$this->email->from($_POST['email'], $_POST['name']);
				$this->email->bcc('admin@sk-stroikov.ru');
				$this->email->subject('Выбор мест для отдыха на лавочках');
				$this->email->message($mailtext);	
				if ( $this->email->send() ) {
					$this->sendbackmail($_POST['name'],$_POST['email']);
					$this->session->set_userdata('msgs','Сообщение отправлено успешно.');
				}
			} else {
				$this->session->set_userdata('msgr','Сообщение не отправлено. Так как форма не прошла валидацию.');
			}
			redirect($this->uri->uri_string());
		}
		
		$this->load->view("users_interface/konkurs-dlya-desainerov",$pagevar);
	}
	
	public function o_kompanii(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Cтроительная компания в Ростове-на-Дону :: ООО СК Стройковъ',
					'baseurl' 		=> base_url(),
					'loginstatus'	=> $this->loginstatus,
					'userinfo'		=> $this->user
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
		$eng = array("yo","iy","yu","","ch","sh","c","u","k","e","n","g","sh","z","h","","f","y","v","a","p","r","o","l","d","j","е","ya","s","m","i","t","b","Yo","Iy","Yu","CH","","SH","C","U","K","E","N","G","SH","Z","H","","F","Y","V","A","P","R","O","L","D","J","E","YA","S","M","I","T","B","-");
		$string = str_replace($rus,$eng,$string);
		if(!empty($string)):
			return preg_replace('/[^a-z,-]/','',strtolower($string));
		else:
			return FALSE;
		endif;
	}
	
	public function viewimage(){
		
		$id = $this->uri->segment(5);
		if(!$id):
			$id = $this->uri->segment(3);
		endif;
		$image = $this->photosmodel->get_image($id);
		header('Content-type: image/gif');
		echo $image;
	}
	
	public function viewsmallimage(){
		
		$id = $this->uri->segment(5);
		if(!$id):
			$id = $this->uri->segment(3);
		endif;
		$image = $this->photosmodel->get_small($id);
		header('Content-type: image/gif');
		echo $image;
	}
	
	public function userfile_check($file){
		
		$tmpName = $_FILES['userfile']['tmp_name'];
		if($_FILES['userfile']['error'] == 4):
			$this->form_validation->set_message('userfile_check','Не указан файл');
			return FALSE;
		endif;
		if($_FILES['userfile']['error'] != 4):
			if(!$this->case_image($tmpName)):
				$this->form_validation->set_message('userfile_check','Формат не поддерживается');
				return FALSE;
			endif;
		endif;
		if($_FILES['userfile']['error'] == 1):
			$this->form_validation->set_message('userfile_check','Размер более 5 Мб!');
			return FALSE;
		endif;
		return TRUE;
	}
	
	public function userarhiv_check($file){
		
		$tmpName = $_FILES['userarhiv']['tmp_name'];
		if($_FILES['userarhiv']['error'] == 4):
			$this->form_validation->set_message('userarhiv_check','Не указан файл');
			return FALSE;
		endif;
		if($_FILES['userarhiv']['error'] == 1):
			$this->form_validation->set_message('userarhiv_check','Размер более 5 Мб!');
			return FALSE;
		endif;
		return TRUE;
	}
	
	public function resize_img($tmpName,$wgt,$hgt,$ratio){
			
		chmod($tmpName,0777);
		$img = getimagesize($tmpName);		
		$size_x = $img[0];
		$size_y = $img[1];
		$wight = $wgt;
		$height = $hgt; 
		if(($size_x < $wgt) or ($size_y < $hgt)):
			$this->resize_image($tmpName,$wgt,$hgt,FALSE);
			$image = file_get_contents($tmpName);
			return $image;
		endif;
		if($size_x > $size_y):
			$this->resize_image($tmpName,$size_x,$hgt,$ratio);
		else:
			$this->resize_image($tmpName,$wgt,$size_y,$ratio);
		endif;
		$img = getimagesize($tmpName);		
		$size_x = $img[0];
		$size_y = $img[1];
		switch ($img[2]){
			case 1: $image_src = imagecreatefromgif($tmpName); break;
			case 2: $image_src = imagecreatefromjpeg($tmpName); break;
			case 3:	$image_src = imagecreatefrompng($tmpName); break;
		}
		$x = round(($size_x/2)-($wgt/2));
		$y = round(($size_y/2)-($hgt/2));
		if($x < 0):
			$x = 0;	$wight = $size_x;
		endif;
		if($y < 0):
			$y = 0; $height = $size_y;
		endif;
		$image_dst = ImageCreateTrueColor($wight,$height);
		imageCopy($image_dst,$image_src,0,0,$x,$y,$wight,$height);
		imagePNG($image_dst,$tmpName);
		imagedestroy($image_dst);
		imagedestroy($image_src);
		$image = file_get_contents($tmpName);
		return $image;
	}

	public function resize_image1($image,$wgt,$hgt,$ratio){
	
		$this->load->library('image_lib');
		$this->image_lib->clear();
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $image; 
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= $ratio;
		$config['width'] 			= $wgt;
		$config['height'] 			= $hgt;
				
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
	
	public function case_image($file){
			
		$info = getimagesize($file);
		switch ($info[2]):
			case 1	: return TRUE;
			case 2	: return TRUE;
			case 3	: return TRUE;
			default	: return FALSE;	
		endswitch;
	}
	
	public function sendmail($email,$msg,$subject,$from){
		
		$this->email->clear(TRUE);
		$config['smtp_host'] = 'localhost';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from($from,$email);
		$this->email->to('kv@sk-stroikov.ru');
		$this->email->bcc('admin@sk-stroikov.ru');
		$this->email->subject('Сообщение от пользователя SK-STROIKOV.RU');
		
		$this->email->message(strip_tags($msg));
		if (!$this->email->send()):
			return FALSE;
		endif;
		return TRUE;
	}
	
	public function resize_image($tmpName,$wgt,$hgt,$ratio){
			
		chmod($tmpName,0777);
		$img = getimagesize($tmpName);
		$this->load->library('image_lib');
		$this->image_lib->clear();
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $tmpName; 
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= $ratio;
		$config['quality'] 			= 100;
		$config['master_dim'] 		= 'width';
		$config['width'] 			= $wgt;
		$config['height'] 			= $hgt;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$image = file_get_contents($tmpName);
		return $image;
	}
	
	public function fileupload($userfile,$overwrite,$catalog){
		
		$config['upload_path'] 		= $catalog;
		$config['allowed_types'] 	= 'zip|rar|7z|7zip|jpg|jpeg|gif|png';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']			= 1024 * 50;
		$config['overwrite'] 		= $overwrite;
		$this->load->library('upload',$config);
		/*
		if (!$this->upload->do_upload($userfile)):
			return FALSE;
		endif;
		 */
		if ( ! $this->upload->do_upload($userfile)) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_userdata('msgr',implode('  | ', $error));
			return false;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return true;
		}
	}

	public function sendbackmail($name,$email){
		
		$mailtext = "<p>Здравствуйте, {$name}.</p> <p>Спасибо за ваше участие. Мы обязательно вам ответим и расскажем о процессе прохождения конкурса и реализации лучших идей.</p> <p>--<br/>С уважением,<br/> Компания Стройковъ</p>";
		$this->email->clear(TRUE);
		$config['smtp_host'] = 'localhost';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('kd@sk-stroikov.ru','Стройковъ');
		$this->email->to($email);
		$this->email->bcc('');
		$this->email->subject('Вашя заявка принята (Стройка#1)');
		$this->email->message($mailtext);
		$this->email->send();
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