<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('category_model');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->library("pagination");
		$this->load->library('table');
		$this->load->library('unit_test');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['newsBetween'] = $this->news_model->get_news_between();
		$data['videos'] = $this->news_model->get_videos();
		$data['images'] = $this->news_model->get_images();
		$data['imagesAll'] = $this->news_model->get_all_images();
		$data['title'] = 'News archive';

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}
	
	
	public function moderate()
	{
		$data['news'] = $this->news_model->get_news_list();
		$data['title'] = 'News archive';

		$this->load->view('templates/header', $data);
		$this->load->view('news/listNews', $data);
		$this->load->view('templates/footer');
	}
	
	public function viewVideo()
	{

		$this->load->view('templates/header');
		$this->load->view('news/viewVideo');
		$this->load->view('templates/footer');
	}
	
	public function managePosts($m_id)
	{
		$data['news'] = $this->news_model->get_news_list($m_id);
		$data['title'] = 'News archive';

		$this->load->view('templates/header', $data);
		$this->load->view('news/listPosts', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($slug)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
        $data['multimedia'] = $this->news_model->get_multimedia($slug);
		
		if (empty($data['news_item']))
		{
			show_404();
		}

		$data['name']= $this->news_model->get_member_name($data['news_item']['m_id']);
		$data['title'] = $data['news_item']['title'];
		//-------imgs

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function upload()
    {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'body', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('upload/citizenUploadNews');
			$this->load->view('templates/footer');

		}
		else{
		
		    if($this->session->userdata('m_id')){
			    $mid=$this->session->userdata('m_id');
			}
			else
				$mid=$this->news_model->add_member();	
		    $id=$this->news_model->set_news($mid);
			
			
			
			require_once('upload.php');
			$uploadd=new upload();
			$uploadd->do_upload();
			
			//$this->view($id);
            redirect('news/'.$id);			
		}		
	}
	
	public function tests()
	{

		//echo $this->unit->run($test, $expected_result, $test_name);
		
		echo $this->unit->run($this->news_model->get_news(),'is_array', 'Get News');
		echo $this->unit->run($this->news_model->record_count(),'is_int', 'Get News Count');
		echo $this->unit->run($this->news_model->fetch_news(0,5),'is_bool','Fetch News');
		echo $this->unit->run($this->news_model->fetch_news(10,5),'is_array','Fetch News');
		echo $this->unit->run($this->news_model->get_videos(),'is_array','Get Videos');
		echo $this->unit->run($this->news_model->get_images(),'is_array','Get Images');
		echo $this->unit->run($this->news_model->get_news_between(),'is_array','Get News Between');
		echo $this->unit->run($this->news_model->get_multimedia(),'is_array','Get Multimedia');
		echo $this->unit->run($this->news_model->get_searched_news(),'is_array','Get Searched News');
		echo $this->unit->run($this->news_model->get_news_list(),'is_array','Get News List');

		//echo $this->unit->run($this->news_model->set_news(),'is_string','Set News');
		//echo $this->unit->run($this->news_model->update_news(16),'is_array','Get News List');
		//echo $this->unit->run($this->news_model->add_member(),'is_string','Add Member');
		echo $this->unit->run($this->news_model->get_member_name(20),'is_string','Get Member Name');
		echo $this->unit->run($this->news_model->get_member_info(5),'is_array','Get Member Info');
		echo $this->unit->run($this->news_model->get_login(5),'is_array','Get Login');
		echo $this->unit->run($this->news_model->get_last_news_id(),'is_string','Get Last News Id');
	}
	
	public function edit($n_id){                                                     // edit news post
	
	    $this->load->helper('form');
		$this->load->library('form_validation');
	
	    $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'body', 'required');
		
		$data['news'] = $this->news_model->get_news($n_id);                          // get the contents of news of id n_id
		$data['author'] = $this->news_model->get_member_name($data['news']['m_id']); 
		$data['multimedia'] = $this->news_model->get_multimedia($n_id);
		
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('upload/edit',$data);
			$this->load->view('templates/footer');

		}
		else{
		
		    $id=$this->news_model->update_news($n_id);
			
			$this->session->set_userdata('n_id',$n_id);
			
			require_once('upload.php');
			$uploadd=new upload();
			$uploadd->do_upload();
			
            //$this->session->set_userdata('msg', 'News post edited successfully!');			
			$this->view($n_id);	
			
		}	
	
	}
	
	public function showProfile(){ 
            $this->load->view('templates/header');
			$this->load->view('profile');
			$this->load->view('templates/footer');	
				
	}
	
	public function approve($n_id){                                                  // admin approves an article / post
	    		
		 $this->news_model->approve_news($n_id);
		 //$this->session->set_flashdata('message', 'News post successfully approved!');
		 $this->session->set_userdata('message', 'News post successfully approved!');
	     $this->moderate();
	}
	
	public function headlines(){                                                  // admin approves an article / post
	    		
		    $this->load->view('templates/header');
			$this->load->view('news/headlines');
			$this->load->view('templates/footer');
	}
	
	public function delete($n_id){                                                  // admin deletes an article / post
	    		
		 $this->news_model->delete_news($n_id);
		 //$this->session->set_flashdata('message', 'News post successfully deleted!');
		 $this->session->set_userdata('message', 'News post successfully deleted!');
		 if($this->session->userdata('fname')==true && $this->session->userdata('role')=="admin"){ 
	         $this->moderate();
		 }
		 if($this->session->userdata('fname')==true && $this->session->userdata('role')!="admin"){ 
	         $this->managePosts($this->session->userdata('m_id'));
		 }
	}
	
	public function deleteMedia($n_id,$media_id){                                                  // admin deletes an article / post
	    $hello='hello';		
		 $this->news_model->delete_media($media_id);
		 //$this->session->set_flashdata('message', 'News post successfully deleted!');
		 //$this->session->set_userdata('message', 'News post successfully deleted!');
	     $this->edit($n_id);
		 
	}
	
	
	public function search()
	{   
	    $category='';
	    $slug=$this->input->post('searchTxt');
		if(!$slug){
		    $category = $this->input->get('q');
		}
		$dat = $this->input->post('date');
	    $this->load->helper('form');	
		
		$data['news'] = $this->news_model->get_searched_news($slug,$dat,$category);
		//var_dump($data['news']);
		$data['title'] = 'News archive';
        
		$this->load->view('templates/header', $data);
		$this->load->view('news/searchResult', $data);
		$this->load->view('templates/footer');
	}
	
		
	public function searchForPosts()
	{   
	    $category='';
	    $slug=$this->input->post('searchTxt');
		if(!$slug){
		    $category = $this->input->get('q');
		}
		$dat = $this->input->post('date');
	    $this->load->helper('form');	
		
		$data['news'] = $this->news_model->get_searched_news($slug,$dat,$category);
		//var_dump($data['news']);
		$data['title'] = 'News archive';
        
		$this->load->view('templates/header', $data);
		$this->load->view('news/listPosts', $data);
		$this->load->view('templates/footer');
	}
	
	
	public function category()
	{ 
		$data['news']=$this->category_model->get_category();
	    $outp = "";
		foreach ($data['news'] as $rs):
			if ($outp != "") 
			{$outp .= ",";}
				$outp .= '{"Name":"'  . $rs["c_id"] . '",';
				$outp .= '"City":"'   . $rs["cname"]        . '",';
 
		endforeach;
		
		$outp ='{"records":['.$outp.']}';
        var_dump($outp);
        echo($outp);
	}
	
	
	public function archives($pgNo=false) {
	   
        $config = array();
        $config["base_url"] = base_url() . "index.php/news/archives";
        $config["total_rows"] = $this->news_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->news_model->fetch_news($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
		$this->load->view('templates/header', $data);
		$this->load->view('news/archivesView', $data);
		$this->load->view('templates/footer');
	}
	
	/*
	public function paging(){
	
		$config['base_url']="http://localhost/citizen/index.php/news/search";
		$config['total_rows']=$this->db->get('news')->num_rows();
		$config['per_page']=10;
		$config['num_links']=20; 
		
		$this->pagination->initialize($config);
		$data['records']=$this->db->get('news',$config['per_page'],$this->uri->segment(3) );//data,limit,offset
		$this->load->view('site_view',$data);
	}*/
	
	/*
	public function create()
   {
	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Create a post';

	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		//$this->load->view('templates/header', $data);
		$this->load->view('news/create');
		//$this->load->view('templates/footer');

	}
	else
	{
	    $flag=2;
	    $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|bmp|avi|flv|mpeg|mpg|swf|mp4|wmv';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		$i=0;
		
	foreach ($_FILES as $key => $value) {
		if ( ! $this->upload->do_upload($key))		
		{
			$error = array('error' => $this->upload->display_errors());
			$flag--;
            //var_dump($error);
		}
		else
		{
			$data[$i] = array('upload_data' => $this->upload->data($key));
            //var_dump($data); 
		}
		$i++;
	}	
		if($flag!=0)
		    $dat=$this->alert_model->set_news($data);
		else	
		    $dat=$this->alert_model->set_news();
		    $this->view($dat['pid']);
		//$this->load->view('news/successPost');
	}
   }
   
   public function login(){
        
        $this->load->helper('form');
	    $this->load->library('form_validation');
		$data['title'] = 'Login';
		
		$this->form_validation->set_rules('uname', 'uname', 'required');
	    $this->form_validation->set_rules('pass', 'pass', 'required');
		
        if ($this->form_validation->run() === FALSE)
	    {    $this->load->view('news/login');
		}
		else{
		    $data['name'] = $this->alert_model->get_login();
			$cnt=count($this->alert_model->get_login());
			//var_dump($data['name']['type']);
			

            
			
			if($cnt>0){
			   $newdata = array(
                   'username'  => $data['name'],
                   'logged_in' => TRUE,
				   'type' => $data['name']['type']
               );
			   $this->session->set_userdata($newdata);
			   $this->session->unset_userdata('invalid');
			   if($data['name']['type']=='normal')
					//$this->load->view('news/home');
					//$this->home();
					redirect('news/home');
				else if($data['name']['type']=='services')
				  //  $this->homeService();
					redirect('news/homeService');
				else
                    $this->load->view('news/adminHome');						
			}   
			else{
			   $arr = array(
                   'invalid'  => "Invalid username/password"
               );
			   $this->session->set_userdata($arr);
			   $this->load->view('news/login');		
            }			   
		}	
   }
   
    public function adminHome(){
	    $this->load->view('news/adminHome');		
	}
	
	public function home()
   {
   
    
	$this->load->helper('form');
	$this->load->library('form_validation');
    //$this->load->view('news/home');	
	$data['title'] = 'Create a post';

	$this->form_validation->set_rules('title', 'Title', 'required');
	//$this->form_validation->set_rules('text', 'text', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('news/home');
	}
	else
	{
		$data['dat']=$this->alert_model->set_alert();
		$this->session->set_flashdata('data', $data);
		header('Location: http://localhost/Codeigniter/index.php/Smscont/sms');
		//var_dump($dat);
		$this->load->view('news/alertSuccess',$data);
		
	}
   }
   
   public function homeService()
   {   
       $data['alerts'] = $this->alert_model->get_alerts($this->session->userdata['username']);      
       $this->load->view('news/homeService',$data);	
   }
   
    public function viewAlert($slug)
	{
		$data['news_item'] = $this->alert_model->get_view_alert($slug);

		if (empty($data['news_item']))
		{
			show_404();
		}
		
		$this->load->view('news/view_alert', $data);
		
	}
	
	//----------------------------------------------------------------------------------------
	public function message()     //depends on message or reply
	{
		$this->load->helper('form');
	    $this->load->library('form_validation');
		$data['title'] = 'Message';
		
		$this->form_validation->set_rules('aadhar', 'aadhar', 'required');
	    $this->form_validation->set_rules('message', 'message', 'required');
		
        if ($this->form_validation->run() === FALSE)
	    {    $this->load->view('news/message');
		}
		else{
		    $data['name'] = $this->alert_model->send_message();
            $this->load->view('news/messageSuccess',$data);			
		}
		
	}
	
	public function reply($slug)     //depends on message or reply
	{
		$this->load->helper('form');
	    $this->load->library('form_validation');
		$data['title'] = 'Message';
		$arr = array(
                   'slug'  => $slug
               );
		$this->session->set_userdata($arr);
		$arr2=$this->alert_model->set_session_data($slug);
		$this->session->set_userdata($arr2);
		
		$this->form_validation->set_rules('aadhar', 'aadhar', 'required|min_length[2]|max_length[20]');
	    $this->form_validation->set_rules('message', 'message', 'required|min_length[2]|max_length[20]');
		
        if ($this->form_validation->run() === FALSE)
	    {    $this->load->view('news/message');
		}
		else{
		    $data['name'] = $this->alert_model->send_message();
            $this->load->view('news/messageSuccess',$data);			
		}
		
	}
	
	//------------------------------------------------------------------------------
	
	public function messageList()
	{
	    if($this->session->userdata('username')==true){
			$udata=$this->session->all_userdata();
			$un=$udata['username']; 
            $typ=$un['type'];			
        }
		if($typ!="services"){
			$data['msg'] = $this->alert_model->get_messages();
			$data['title'] = 'normal';
			$this->load->view('news/messageList', $data);
		}
        else{
            $data['msg'] = $this->alert_model->get_messages_for_services();
			$data['title'] = 'services';
			$this->load->view('news/messageList', $data);
        }		
	}
	
	public function viewMessage($slug)
	{
		$data['msg_item'] = $this->alert_model->get_view_message($slug);

		if (empty($data['msg_item']))
		{
			show_404();
		}

		//$this->load->view('templates/header', $data);
		$this->load->view('news/viewMessage', $data);
		//$this->load->view('templates/footer');
	}
	
	public function logout(){
	    $this->session->unset_userdata('username');
		$this->session->unset_userdata('invalid');
		//var_dump($this->session->all_userdata());
		$this->session->set_flashdata('item', 'Successfully logged out!');
		header('Location: http://localhost/Codeigniter/index.php/news/login');
	}
	
	public function searchPeople()
   {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname', 'fname', 'required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('lname', 'lname', '');
		
		if ($this->form_validation->run() === FALSE)
	    {    $this->load->view('news/searchPeople');
		}
		else{
		    $data['list'] = $this->alert_model->search_people();
            $this->load->view('news/searchedPeopleList',$data);			
		}
	}
	
	public function aadhar($aadharId){
	    $this->session->set_flashdata('aId', $aadharId);
		header('Location: http://localhost/Codeigniter/index.php/news/message');
	}
	
	public function servicesList($name){
	    $data['list'] = $this->alert_model->get_service_list($name);
		$data['snam']=$name;
	    $this->load->view('news/servicesList',$data);	
	}
	
	public function deleteUser($uid){
	    $this->alert_model->delete_user($uid);
		$arrd = array(
                   'item'  => 'Successfully deleted the user'
               );
		$this->session->set_userdata($arrd);
	    $this->load->view('news/adminHome');
	}
	
	public function deletePost($pid){
	    $this->alert_model->delete_post($pid);
		$arrd = array(
                   'item'  => 'Successfully deleted the post'
               );
		$this->session->set_userdata($arrd);
	    $this->load->view('news/adminHome');
	}
	
	public function method()
{
   $record_id = $_POST[record_id];
   
   $results = $this->alert_model->get_record($record_id);
   $this->load->view('AJAX_record',$results);
   //get the record from the database
}

   public function loadAjax(){
       $this->load->view('aj');
   }*/
}