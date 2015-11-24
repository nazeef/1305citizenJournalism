<?php
class news_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
    public function get_news($slug = FALSE)
   { 
		if ($slug == FALSE)
		{
			$this -> db -> select('*');
			$this -> db -> from('news');
			$this->db->order_by("n_id","desc");
			$this->db->limit('5');
			$query = $this -> db -> get();	
			return $query->result_array();
		}
		   
            $query = $this->db->get_where('news', array('n_id' => $slug));
	        return $query->row_array();
   }
   
   public function report_news($n_id)
   { 
			$this->db->query("update news set status=2 where n_id=".$n_id);	
           
            $this->load->helper('url');
		
		    $data = array(
				'reason' => $this->input->post('reason'),
				'email' => $this->input->post('email'),
				'n_id'=> $n_id
				
	        );
	        if($this->input->post('reason')!="") 
				$this->db->insert('report', $data);
			
   }
   
   public function get_reasons($n_id)
   { 
			$this -> db -> select('*');
			$this -> db -> from('report');
			$this -> db -> where('n_id',$n_id);
			
			$query = $this -> db -> get();	
			return $query->result_array();		
	       
   }
   
   public function get_reported_list()
   { 
			$this -> db -> select('*');
			$this -> db -> from('news');
			$this -> db -> where('status',2);
			$this->db->order_by("n_id","desc");
			$query = $this -> db -> get();	
			return $query->result_array();		
	       
   }
   
   public function get_news_by_category($slug = FALSE,$limit)
   { 	   
            $query = $this->db->query("select * from news n,category c where n.c_id=c.c_id and c.cname='".$slug."' order by n.n_id desc limit ".$limit);	
			return $query->result_array();
   }
   
   public function get_videos()
   { 
			$query = $this->db->query("select * from multimedia m,news n where m.n_id=n.n_id and m.type like 'video%' order by m.media_id desc limit 5");	
			return $query->result_array();
   
   }
   
   public function get_images()
   { 
			$query = $this->db->query("select * from multimedia m,news n where m.n_id=n.n_id and m.type like 'image%' order by m.media_id desc limit 4");	
			return $query->result_array();
   
   }
   
   public function get_all_images()
   { 
			$query = $this->db->query("select * from multimedia m,news n where m.n_id=n.n_id and m.type like 'image%' order by m.media_id desc limit 8");	
			return $query->result_array();
   
   }
   
   public function get_news_between()
   { 
			$query = $this->db->query("select * from multimedia m,news n where m.n_id=n.n_id and m.type like 'image%' order by m.media_id desc limit 5,10");	
			return $query->result_array();
   
   }
   
   public function get_multimedia($slug = FALSE)
   { 		
			$this -> db -> select('*');
			$this -> db -> from('multimedia');
			$this->db->where("n_id",$slug);
			$this->db->limit('3');
			$query = $this -> db -> get();	
			return $query->result_array();		
   }
   
   
   public function get_searched_news($slug = FALSE,$dat = FALSE,$category = FALSE)                             //---------search news items
   { 
			//var_dump($dat);
			if(strlen($dat)>0)
			    $query = $this->db->query("select * from news where title like '%".$slug."%' and date = '$dat' ");	
			else if(strlen($category)>0)
			    $query = $this->db->query("select * from news n,category c where n.c_id = c.c_id and cname like '%".$category."%' ");		
			else
                $query = $this->db->query("select * from news where title like '%".$slug."%'  limit 10");		
            
				
	        return $query->result_array();			
   }
   
   
   
   public function get_news_list($slug = FALSE)
   { 
		if ($slug == FALSE)
		{
			$this -> db -> select('*');
			$this -> db -> from('news');
			$this -> db -> where('status',0);
			$this->db->order_by("n_id","desc");
			$query = $this -> db -> get();	
			return $query->result_array();
		}
           // $query = $this->db->where('news', array('m_id' => $slug));
			$this -> db -> select('*');
			$this -> db -> from('news');
			$this -> db -> where('m_id', $slug);
			$this->db->order_by("n_id","desc");
			$query = $this -> db -> get();	
			return $query->result_array();
	       
   }
   
    public function get_ads()
   { 
		
			$this -> db -> select('*');
			$this -> db -> from('advertise');
			$this->db->where("status","0");
			$this->db->order_by("a_id","desc");
			
			$query = $this -> db -> get();	
			return $query->result_array();	
           
	       
   }
   
       public function get_ads_homepage()
   { 
		
			$this -> db -> select('*');
			$this -> db -> from('advertise');
			$this->db->order_by("a_id","desc");
			$this->db->where("status","1");
			$this->db->limit('2');
			$query = $this -> db -> get();	
			return $query->result_array();	
           
	       
   }
   
   
    public function select_ad($a_id)
   { 
		   // $this->db->query("update advertise set status=0");
			$this->db->query("update advertise set status=1 where a_id=".$a_id);			
   }
   
   
    public function record_count() {
        return $this->db->count_all("news");
    }

	
    public function fetch_news($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("news");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   
   public function set_news($mid = FALSE)
   {
		$this->load->helper('url');
		//var_dump($this->input->post('hidden'));
		$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'c_id'=> $this->input->post('category'),
				'date' => date('Y/m/d'),
				'time'=> date("h:i:sa"),
				'm_id' => $mid,
				'font'=>$this->input->post('hidden')
	        );
	
		    $this->db->insert('news', $data);
			
			//$this->uploadImage($this->input->post('attach'));
			
			$query = $this->db->query("select max(n_id) as max from news");	
			$row=$query->row_array();
			
			return $row['max'];
    }
	
	
	public function update_news($n_id)
   {
		$this->load->helper('url');
		
		$status=0;
		if($this->session->userdata('role')=="admin")
		    $status=1;                                        // if admin status=1 , others status=0 for recheck
		
		$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'c_id'=> $this->input->post('category'),
				'status'=> $status
	        );
			
	        $where = "n_id=".$n_id; 
			$str=$this->db->update_string('news', $data, $where); 
			$this->db->query($str);
			//return $row['max'];
    }
	
	
	 public function add_member()
   {
		$this->load->helper('url');
				
		$data = array(
				'fname' => $this->input->post('author')	,
				'tempEmail' => $this->input->post('email')	,
                'role'  => 'citizen'				
	        );
			
		    $this->db->insert('member', $data);
			$query = $this->db->query("select max(m_id) as max from member");	
			$row=$query->row_array();
			
			return $row['max'];
			
    }
	
	public function get_member_name($m_id)
   {
			
			$query = $this->db->query("select fname as aname from member where m_id=".$m_id);	
			$row=$query->row_array();
			
			return $row['aname'];
			
    }
	
	public function get_member_email($m_id)
   {
			
			$query = $this->db->query("select tempEmail as email from member where m_id=".$m_id);	
			$row=$query->row_array();
			
			return $row['email'];
			
    }
	
	public function get_member_info($m_id)
   {
			
			$query = $this->db->query("select * from member where m_id=".$m_id);	
			$row=$query->row_array();
			
			return $row;
			
    }
	
	public function get_login(){
       
		$username = $this->input->post('email');
		$password = $this->input->post('password');
        //$password =hash('sha256', $password . SALT);
		
		//var_dump($username);
		$this -> db -> select('l_id,m_id,email, password');
        $this -> db -> from('login');
		$this -> db -> where('email', $username);
		$this -> db -> where('password',$password);
		$this -> db -> limit(1);
 
		$query = $this -> db -> get();
	   
		return($query->row_array());
   }
   
   
   public function delete_news($n_id)
   {			
			$this->db->query("delete from news where n_id=".$n_id);		
    }
	
	public function delete_media($m_id)
   {			
			$this->db->query("delete from multimedia where media_id=".$m_id);		
    }
	
	public function approve_news($n_id)
   {			
			$this->db->query("update news set status=1 where n_id=".$n_id);		
    }
	
	public function get_last_news_id()
   {
			
			$query = $this->db->query("select max(n_id) as n_id from news ");	
			$row=$query->row_array();
			
			return $row['n_id'];
			
    }
	
	
   public function set_advertise($url)
   {
		$this->load->helper('url');
				$name = $this->input->post('name')	;			
			$this->db->query("update advertise set name='".$name."' where path='".$url."'");				
		
    }
	
	
}   