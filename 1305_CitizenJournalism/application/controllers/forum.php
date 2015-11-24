<?php

Class forum extends CI_Controller{
		public function __construct()
	{
		parent::__construct();
		$this->load->model('forum_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library("pagination");
		
		$this->load->library('unit_test');
	}

	
	public function tests()
	{

		echo $this->unit->run($this->forum_model->get_forum(),'is_array', 'Get Forums');
		echo $this->unit->run($this->forum_model->get_member_name(19),'is_array', 'Get member name');
		echo $this->unit->run($this->forum_model->get_member_pic(21),'is_array', 'Get member picture');
		echo $this->unit->run($this->forum_model->get_category_name(9),'is_string', 'Get category name');
		echo $this->unit->run($this->forum_model->get_comment(),'is_array', 'Get comments');
	}

	// public function index()
	// {
		// $data['forum'] = $this->forum_model->get_forum();
		// $data['title'] = 'News archive';

		// $this->load->view('templates/header', $data);
		// $this->load->view('forum/index', $data);
		// $this->load->view('templates/footer');
	// }
	
	
	
		public function upload()
    {
	    
		if(!$this->session->userdata('fname')){                        // if user is not logged in redirect
		    $this->session->set_userdata('back_url', 'forum/upload');
		    $this->session->set_userdata('message', 'Please login to post in forums!');
	        redirect('login', 'refresh');
		}
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a post';

		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('fpost', 'body', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('forum/forumPost');
			$this->load->view('templates/footer');

		}
		else{
		
		    //$mid=$this->forum_model->add_member();	
		    $id=$this->forum_model->set_forum($this->session->userdata('m_id'));
			
			$data['forum'] = $this->forum_model->get_forum();
			
			$this->load->view('templates/header', $data);
			$this->load->view('forum/index', $data);
			$this->load->view('templates/footer');
		}	
			
	}
	
	public function commentPost()
    {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a post';

		$this->form_validation->set_rules('comment', 'comment', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('forum/comment');
			$this->load->view('templates/footer');

		}
		else{
		
		   // $mid=$this->forum_model->add_member();	
		    $f_id=$this->forum_model->set_comment();
			
		//	$data['forum'] = $this->forum_model->get_forum();
			
			$this->view($f_id);
			//echo "Added";
		}	
			
	}
	
	
	
		public function view($slug)
	{
		$data['forum_item'] = $this->forum_model->get_forum($slug);

		if (empty($data['forum_item']))
		{
			show_404();
		}

		$data['category']= $this->forum_model->get_category_name($data['forum_item']['c_id']);
		$data['name']= $this->forum_model->get_member_name($data['forum_item']['m_id']);
		
		$data['fpost'] = $data['forum_item']['fpost'];
		$data['f_id']=$data['forum_item']['f_id'];
		$f_id=$data['forum_item']['f_id'];
		
		$data['comment'] = $this->forum_model->get_comment($f_id);
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('forum/view', $data);
		$this->load->view('forum/comment', $data);
		$this->load->view('templates/footer');
	}
	
	public function index($pgNo=false) {
		
	    $data['forum'] = $this->forum_model->get_forum();
		 $data['title'] = 'Forum';
        $config = array();
        $config["base_url"] = base_url() . "index.php/forum/index";
        $config["total_rows"] = $this->forum_model->record_count();
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
		//var_dump($config);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		//var_dump($this->uri->segment(3));
        $data["results"] = $this->forum_model->fetch_forum($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
		$this->load->view('templates/header', $data);
		$this->load->view('forum/index', $data);
		$this->load->view('templates/footer');
	}
	

}