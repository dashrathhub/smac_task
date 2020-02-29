<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	  function __construct() { 
        parent::__construct(); 
        $this->load->helper(array('url','form', 'url')); 
        $this->load->database(); 
        $this->load->library(array('session','upload'));
    	$this->load->model('data_model');
      } 
	
 function index()
	{
		if (!empty($_SESSION['id'])) { redirect('data/task_view'); }
		$this->load->view('loginpage');
		// $data['result'] = $this->data_model->getdata();
		// $this->load->view('task_view',$data);
	}

 	function login()
	{
		if (!empty($_SESSION['id'])) { redirect('data/task_view'); }
			$logindata = $this->input->post();
			$res = $this->data_model->login($logindata);
			if ($res==1) {
				redirect('data/task_view');
			}else{
				$this->session->set_flashdata('msg','Please enter correct Email and Password');
				redirect('data');
			}
	}

	function logout(){ $this->session->sess_destroy(); redirect('data'); }




	 function register()
	{
		if (!empty($_SESSION['id'])) { redirect('data'); }
		$userdata = $this->input->post();
		$userdata['password'] = md5($userdata['password']);
		// print_r($userdata); exit();
		$res = $this->data_model->register($userdata);
		if ($res==1) {
			$this->session->set_flashdata('msg','Registration completed. You can login with Email and Password');
			redirect('data');
		}
		if($res==2){
			$this->session->set_flashdata('msg','Registration not completed. Please try again with Email and Password');
			redirect('data');
		}

	}

	 function task_view()
	{
		if (empty($_SESSION['id'])) { redirect('data'); }
		$data['result'] = $this->data_model->task_view();
		$data['project'] = $this->data_model->project_list();
		// print_r($data); exit();
		$res = $this->load->view('task_view',$data);

	}

 function task_add()
	{
		if (empty($_SESSION['id'])) { redirect('data'); }
		$data = $this->input->post();
		$data['created_by']=$this->session->userdata['id'];
		// print_r($data); exit();
		$data['result'] = $this->data_model->task_add($data);
		if ($res==1) {
			$this->session->set_flashdata('msg','Task Added in task list');
			redirect('data/task_view');
		}else{
			$this->session->set_flashdata('msg','Task Not Added in task list');
			redirect('data');
		}
		// $res = $this->load->view('task_view',$data);

	}

	



}
