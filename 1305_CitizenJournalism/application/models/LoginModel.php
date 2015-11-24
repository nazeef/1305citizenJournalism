<?php

class LoginModel extends CI_Model{

    
    public function get($l_id = null){
        if($l_id === null){
            $q = $this->db->get('login');
        }elseif(is_array($l_id)){
            $q = $this->db->get_where('login', $l_id);
        }
        else{
            $q = $this->db->get_where('login',['l_id' => $l_id]);
        }
        return $q->result_array();
    }
        
    /*public function login($email,$password){
        $this->db->select('email,password');
        $this->db->from('login_info');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
       
        $query=$this->db->get();
        // echo $password ;
        //echo $email ;
        
        if($query->num_rows() == 1){           
            return true;
        }else{          
            return false;
        }
    }*/
    
    
    public function insert_volunteer_login($data){
        $this->db->insert('volunteer_login',$data);        
        return $this->db->insert_id();
    }
    
    public function insert_volunteer_address($data){
        $this->db->insert('volunteer_address',$data);
        
        return null;
    }
    
     public function insert_volunteer_info($data){
        $this->db->insert('volunteer_info',$data);
       
        return null;
    }
    
    /*public function register($email,$password){
        $this->db->select('email,password');
        $this->db->from('login_info');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
       
        $query=$this->db->get();
    }*/
    
}
