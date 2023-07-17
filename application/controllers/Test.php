<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
public function __construct(){

		parent::__construct();
		$this->load->model('Test_m');
	}
	public function index()
	{
		$key=$this->input->post('key',true);
		$data['store']=$this->Test_m->set($key);
		$this->load->view('final/test',$data);
	}
}
