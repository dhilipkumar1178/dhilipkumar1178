<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_m extends CI_Model {
	public function __construct(){

		parent::__construct();
	}
	public function set($key){
		$this->db->select('*');
		$this->db->like('name',$key);
		$this->db->or_like('description',$key);
		return $this->db->get('products')->result();
	}
	
}
