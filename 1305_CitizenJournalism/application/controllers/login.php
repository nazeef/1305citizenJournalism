<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Login';

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() === FALSE)                          
		{
			$this->load->view('templates/header', $data);
			$this->load->view('login/login');
			$this->load->view('templates/footer');

		}
		else{
		
		    $data['row'] = $this->news_model->get_login();
			$cnt=count($this->news_model->get_login());
			
			if($cnt<1){                                               // invalid password
			    $this->load->view('templates/header', $data);
				$this->load->view('error/invalidPass');
				$this->load->view('login/login');
				$this->load->view('templates/footer');		
            }
            else{   
                                                                      // valid password
				$m_id=$data['row']['m_id'];													  
				$name=$this->news_model->get_member_name($m_id);	
                $info=$this->news_model->get_member_info($m_id);	
				
				$newdata = array(
                   'name'  => $name,
                   'logged_in' => TRUE,
				   'm_id' => $m_id,
				   'l_id' => $data['row']['l_id'],
				   'email' => $data['row']['email']
               );
			   $this->session->set_userdata($newdata);
			   //var_dump($info);
               $this->session->set_userdata($info);
			   
			   $this->load->view('templates/header');
			   
				   
			                             // if admin, show admin's profile page
			      // $this->load->view('profile/admin');	 
                                                               // if citizen, show citizen's profile page
			      // $this->load->view('profile/citizen');				   
				   
			  // $this->load->view('templates/footer');
                           $this->load->view('profile');
			}
		}		
	}
	
	public function logout(){
	
	    $this->session->sess_destroy();
		
		$this->session->set_userdata('msg','Logged out Successfully!'); 
		$this->index();
	}
	public function aboutus()
	{
		
			$this->load->view('templates/header');
			$this->load->view('templates/about');
			
			$this->load->view('templates/footer');

		
	}
}	