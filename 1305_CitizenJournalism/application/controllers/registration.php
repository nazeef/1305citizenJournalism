<?php

class Registration extends CI_Controller {

	
	public function index()
	{
			
            $this->load->helper('form');
            $this->load->view('api/regis');
			//$this->load->view('registration');
	}
}
