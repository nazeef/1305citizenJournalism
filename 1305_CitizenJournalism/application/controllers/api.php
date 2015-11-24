<?php

class API extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('registration_model');
        $this->load->library('form_validation');
        //$l_id = $this->session->userdata('l_id');
        /*if(!l_id){
            $this->logout();
        }  */
    }
/* ------------------------------------------------------------------------------------------------------------------------- */

    public function logout() {

        $this->session->sess_destroy();
        redirect('/');
    }
    //--------------------------------------------------------------------------------------------------------------
    public function register(){
        
       /* $this->output->set_content_type('application_json');
        
        $this->form_validation->set_rules('login', 'Login', 'required|min_length[4]|max_length[16]|is_unique[user.login]'); 
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]'); 
        $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[16]|matches[confirm_password]'); 
        
        /*$this->form_validation->set_message('valid_email','Cats dont know how to type');
        $this->form_validation->set_message('required','only a dog knows you nedd this!');
        */
    /*    if($this->form_validation->run() == false){
            //echo validation_errors();
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }*/
        
        $login=$this->input->post('login');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $confirm_password=$this->input->post('confirm_password');
        
         $this->load->model('user_model');
        $l_id = $this->user_model->insert([
            'login' => $login,
            'password' => hash('sha256', $password . SALT),
            'email' => $email
        ]);
        
                
        if($l_id){
            $this->session->set_userdata(['l_id' => $l_id]);
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        $this->output->set_output(json_encode(['result' => 0, 'error' => 'User not created !']));
    } 
    
   
    


//--------------------------------------------------------------------------------------------------------------
    public function regis() {       
        $this->load->view('templates/header');
        $this->load->helper('form');
        
        $this->load->view('registration');     
    }
    //--------------------------------------------------------------------------------------------------------------
    public function profile() {

        $this->load->view('profile');
    }
  //--------------------------------------------------------------------------------------------------------------   
    public function test(){
        $q=  $this->db->get('member');
        print_r($q->result());
        
        $this->db->insert('login',[
            'email' => 'kaushal@gmail.com',
            'password' => '123456'
        ]);
    }
    //--------------------------------------------------------------------------------------------------------------  
    public function new_registration()
	{
		$this->load->view('welcome_message');
                // echo '<script>alert("You have registered successfully now login!")</script>';
	}
   //--------------------------------------------------------------------------------------------------------------  
     public function test_get(){
        $data = $this->registration_model->get(2);
        print_r($data);
          
        $this->output->enable_profiler(true);
    }
     //--------------------------------------------------------------------------------------------------------------
    public function test_insert(){
        $result = $this->registration_model->insert([
            'm_id' => '10',
            'email' => 'kaushalk@gmail.com',
            'password' => '123456'
        ]);
        print_r($result);
    }
     //--------------------------------------------------------------------------------------------------------------
   /* public function test_update(){
        $result = $this->registration_model->update([
            'login' => 'Gaurav'
        ],8);
        print_r($result);
    }
    public function test_delete($l_id){
        //$result = $this->user_model->delete(3);
        //pass value by url
        $result = $this->registration_model->delete($l_id);
        print_r($result);
    }*/
    
    //--------------------------------------------------------------------------------------------------------------

    public function login() {

        $this->output->set_content_type('application_json');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]|max_length[100]');

        if ($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }

        $this->load->model('LoginModel');

        $email = $this->input->post('email');
        $password = $this->input->post('pass');



        $result = $this->LoginModel->get([
            'email' => $email,
            'password' => hash('sha256', $password . SALT)
        ]);


        if($result){
            $this->session->set_userdata(['l_id' => $result[0]['l_id']]);
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        $this->output->set_output(json_encode(['result' => 0, 'error' => 'Invalid Username or Password']));
    }
        

    

}