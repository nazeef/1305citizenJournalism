<?php

class Registration_model extends CI_Model{
    
    /**
    *@Usage
    *Single: $this->user_model->get(2);
    *All: Sthis->user_model->get();
    */
    //--------------------------------------------------------------------------------------------------------------
    
   public function get($l_id = null){
        if($l_id === null){
            $q = $this->db->get('login');
        }elseif(is_array($l_id)){
            $q = $this->db->get_where('l_id', $l_id);
        }
        else{
            $q = $this->db->get_where('login',['l_id' => $l_id]);
        }
        return $q->result_array();
    }
    //--------------------------------------------------------------------------------------------------------------
    public function insert_member_info($data){
        $this->db->insert('member',$data);        
        return $this->db->insert_id();
    }
 //--------------------------------------------------------------------------------------------------------------
    public function insert_login($data){
        $this->db->insert('login',$data);        
        return $this->db->insert_id();
    }
    //--------------------------------------------------------------------------------------------------------------
    public function insert_member_address($data){
        $this->db->insert('member_address',$data);        
        return $this->db->insert_id();
    }
 //--------------------------------------------------------------------------------------------------------------
    /** 
     *  @Usage:   $result = $this->user_model->insert(['login' => 'Rahul']);
    */
    public function insert($data){
        $this->db->insert('login',$data);   
        return $this->db->insert_id();
    }
    
    //--------------------------------------------------------------------------------------------------------------
    
    public function update($data,$l_id){
        $this->db->where(['l_id' => $user_id]);
        $this->db->update('login',$data);
        return $this->db->affected_rows();
        
    }
    
    //--------------------------------------------------------------------------------------------------------------
    
    public function delete($l_id){
        $this->db->delete('login',['l_id' => $user_id]);
        
        return $this->db->affected_rows();
    }
    //--------------------------------------------------------------------------------------------------------------
}