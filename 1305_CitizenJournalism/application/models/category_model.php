<?php
class category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
    public function get_category()
   { 
		
			$this -> db -> select('*');
			$this -> db -> from('category');
			$query = $this -> db -> get();	
			return $query->result_array();
   }
}   