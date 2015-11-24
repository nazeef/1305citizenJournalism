<?php
class forum_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
    public function get_forum($slug = FALSE)
   { 
		if ($slug == FALSE)
		{
			/*$this -> db -> select('*');
			$this -> db -> from('forum');
			//$this -> db -> where('forum.m_id','member.m_id');
			$this->db->order_by("f_id","desc");
			$query = $this -> db -> get();	
			return $query->result_array();*/
			
			$query = $this->db->query("select * from forum f,member m where f.m_id=m.m_id order by f_id desc limit 10");	
			return $query->result_array();
		}
            $query = $this->db->get_where('forum', array('f_id' => $slug));
	        return $query->row_array();
   }
   
	
   public function set_forum($mid = FALSE)
   {
		$this->load->helper('url');
		
		$data = array(
		
				'c_id'=> $this->input->post('category'),
				'fpost' => $this->input->post('fpost'),
				'date' => date('Y/m/d'),
				'time'=> date("h:m:sa"),
				'm_id' => $mid
	        );
	
		    $this->db->insert('forum', $data);
			
			//$this->uploadImage($this->input->post('attach'));
			
			$query = $this->db->query("select max(f_id) as max from forum");	
			$row=$query->row_array();
			
			return $row['max'];
    }
	
	
	 public function add_member()
   {
		$this->load->helper('url');
				
		$data = array(
				'fname' => $this->input->post('author')	,
                'role'  => 'citizen'				
	        );
			
		    $this->db->insert('member', $data);
			$query = $this->db->query("select max(m_id) as max from member");	
			$row=$query->row_array();
			
			return $row['max'];
			
    }
	
		
	public function get_login(){
       
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		
		//var_dump($username);
		$this -> db -> select('l_id,m_id,email, password');
        $this -> db -> from('login');
		$this -> db -> where('email', $username);
		$this -> db -> where('password',$password);
		$this -> db -> limit(1);
 
		$query = $this -> db -> get();
	   
		return($query->row_array());
   }
   
   	public function get_member_name($m_id)
   {
			
			$query = $this->db->query("select fname as aname from member where m_id=".$m_id);	
			$row=$query->row_array();
			
			return $row;
			
    }
	
	public function get_member_pic($m_id)
   {
			
			$query = $this->db->query("select profile_image as aname from member where m_id=".$m_id);	
			$row=$query->row_array();
			
			return $row;
			
    }
	
   	public function get_category_name($c_id)
   {
			
			$query = $this->db->query("select cname from category where c_id=".$c_id);	
			$row=$query->row_array();
			
			return $row['cname'];
			
    }
	
	 public function get_comment($slug = FALSE)
   { 
		if ($slug == FALSE)
		{
			$this -> db -> select('*');
			$this -> db -> from('comment');
			$this->db->order_by("com_id");
			$query = $this -> db -> get();	
			return $query->result_array();
		}
		   $query = $this->db->query("select * from comment c,member m where c.m_id=m.m_id and c.f_id=".$slug);	
			//$row=$query->row_array();
           // $query = $this->db->get_where('comment', array('f_id' => $slug));
	        return $query->result_array();
   }
   	
   public function set_comment()
   {
		$this->load->helper('url');
		
		$data = array(
				'f_id'=> $this->input->post('fpost'),
				'comment' => $this->input->post('comment'),
				'date' => date('Y/m/d'),
				'time'=> date("h:m:sa"),
				'm_id' => $this->session->userdata('m_id')
	        );
	
		    $this->db->insert('comment', $data);
			
			//$this->uploadImage($this->input->post('attach'));
			/*
			$query = $this->db->query("select max(com_id) as max from comment");	
			$row=$query->row_array();*/
			
			return $this->input->post('fpost');
    }
	
	    public function record_count() {
        return $this->db->count_all("forum");
    }

    public function fetch_forum($limit, $start) {
        $this->db->limit(4, $start);
        $query = $this->db->get("forum");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
	
   
 }  