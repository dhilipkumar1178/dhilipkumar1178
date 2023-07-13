<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller 
{
     public function __construct(){
               parent::__construct();
               $this->load->model('registraion_model');
			$this->load->library('form_validation');

     }
public function dum()
{
         
          $this->load->view('admin/header');
          $this->load->view('final/dum');
          $this->load->view('admin/footer');
}

public function index()
{
         
          $this->load->view('admin/header');
          $this->load->view('final/registrations');
          $this->load->view('admin/footer');
}
public function submit()
{
          if($this->input->is_ajax_request())
          {
          $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('email', 'Email', 'trim|required');
          $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('department', 'Department', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('dob', 'Dob', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('password', 'Password','trim|required');
          if ($this->form_validation->run() != FALSE)
          {
                    $id = $this->input->post('id');
                    $name=$this->input->post('name');
                    $email=$this->input->post('email');
                    $mobile_no=$this->input->post('mobile_no');
                    $department=$this->input->post('department');
				$year=$this->input->post('year');
				$dob=$this->input->post('dob');
                    $password=$this->input->post('password');

          
                   $data=array(
                    'name'=>$name,
                    'email'=>$email,
                    'mobile_no'=>$mobile_no,
				'department'=>$department,
				'year'=>$year,
                    'dob'=>$dob,
                    'password'=>password_hash($password, PASSWORD_DEFAULT),
                   );
                    
               //     $id = $this->input->POST('id');
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $reg=$this->registraion_model->reg_insert($data);
          
                    if($reg == true)
                         {
                              echo json_encode(array('STATUS'=>'TRUE','message'=>'Register Successfully'));
                             
                         }    
          
                         else{
                              echo json_encode(array('STATUS'=>'FALSE','message'=>'Something Went Wrong'));
                             
                              exit;
                         }                  
                    }
                         else{
                              echo json_encode(array('STATUS'=>'FALSE','message'=>$this->form_validation->error_array()));
                              exit; 
                         }
                    }
          
}

public function login_index()
{
          // $get = $this->input->get();
          $this->load->view('admin/header');
          $this->load->view('final/login');
          $this->load->view('admin/footer');
}
public function login()
{
    
     if($this->input->is_ajax_request())
     {
          
          $this->form_validation->set_rules('name', 'name', 'trim|required');
          $this->form_validation->set_rules('password', 'Password','trim|required');
     
     if ($this->form_validation->run() != FALSE)
     {
          $name=$this->input->post('name');
          $password=$this->input->post('password');
          $log=$this->registraion_model->login_insert($name);
          if($log!=false){
               if(!empty($log[0]['password']))
               {
                    if (password_verify($password, $log[0]['password'])) {
                         $name=$this->input->post('name');
                         // var_dump($first_name);die;
                         $this->session->set_userdata('name',$name);
                         $message = 'Password is Valid';
                         $report  = array(
                             'status' => 1,
                             'message' => $message,
                             
                         );
                         echo json_encode($report);
                         exit;
                     } 
                    else
                    {
                    $status = 0;
                    $message = 'Something went wrong';
                    }

                    $report  = array(
                         'status' => 0,
                         'message' => 'User Name and Password is Invalid',
                         'name'=>$name,
                         'password'=>password_verify($password, $password),
                         
                         );
                         echo json_encode($report);
                         exit;  
                     }

                    else
                    {
                    $message = $this
                         ->form_validation
                         ->error_array();
                    $report = array(
                         'status' => 0,
                         'message' => $message
                    );
                    echo json_encode($report);
                    exit;
                    }
               }


          }
                    else{
                         echo json_encode(array('STATUS'=>'FALSE','message'=>'Something Went Wrong'));
                         exit;
                    }
          // else{
          //      show_error("No direct access allowed");
          // } 
          
     }
}
          
	public function admin()
	{
		    
			$this->load->view('admin/header');
			$this->load->view('final/admin');
			$this->load->view('admin/footer');
	}

	public function login_process()
	{
	    $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
 
	    if ($this->form_validation->run() == FALSE)
	    {
		   $this->load->view('login_view');
	    }
	    else
	    {
		   $username = $this->input->post('username');
		   $password = $this->input->post('password');
		   $user = $this->registraion_model->get_user($username, $password);
 
		   if ($user)
		   {
			  $user_data = array(
				 'user_id' => $user->id,
				 'username' => $user->username,
				 'logged_in' => TRUE
			  );
 
			  $this->session->set_userdata($user_data);
			  redirect('admin/dashboard');
		   }
		   else
		   {
			  $this->session->set_flashdata('error', 'Invalid username or password.');
			  redirect('login');
		   }
	    }
	}
	public function admin_index()
{
         
          $this->load->view('admin/header');
          $this->load->view('final/admin_signup');
          $this->load->view('admin/footer');
}
public function admin_submit()
{
          if($this->input->is_ajax_request())
          {
          $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('password', 'Password','trim|required');
          if ($this->form_validation->run() != FALSE)
          {
                    $id = $this->input->post('id');
                    $name=$this->input->post('name');
                    $password=$this->input->post('password');

          
                   $data=array(
                    'name'=>$name,
                    'password'=>password_hash($password, PASSWORD_DEFAULT),
                   );
                    
                    $reg=$this->registraion_model->admin_insert($data);
          
                    if($reg == true)
                         {
                              echo json_encode(array('STATUS'=>'TRUE','message'=>'Register Successfully'));
                             
                         }    
          
                         else{
                              echo json_encode(array('STATUS'=>'FALSE','message'=>'Something Went Wrong'));
                             
                              exit;
                         }                  
                    }
                         else{
                              echo json_encode(array('STATUS'=>'FALSE','message'=>$this->form_validation->error_array()));
                              exit; 
                         }
                    }
          
}
public function admin_login_index()
{
          // $get = $this->input->get();
          $this->load->view('admin/header');
          $this->load->view('final/admin_login');
          $this->load->view('admin/footer');
}
public function admin_login()
{
    
     if($this->input->is_ajax_request())
     {
          
          $this->form_validation->set_rules('name', 'name', 'trim|required');
          $this->form_validation->set_rules('password', 'Password','trim|required');
     
     if ($this->form_validation->run() != FALSE)
     {
          $name=$this->input->post('name');
          $password=$this->input->post('password');
          $log=$this->registraion_model->admin_login_insert($name);
          if($log!=false){
               if(!empty($log[0]['password']))
               {
                    if (password_verify($password, $log[0]['password'])) {
                         $name=$this->input->post('name');
                         // var_dump($first_name);die;
                         $this->session->set_userdata('name',$name);
                         $message = 'Password is Valid';
                         $report  = array(
                             'status' => 1,
                             'message' => $message,
                             
                         );
                         echo json_encode($report);
                         exit;
                     } 
                    else
                    {
                    $status = 0;
                    $message = 'Something went wrong';
                    }

                    $report  = array(
                         'status' => 0,
                         'message' => 'User Name and Password is Invalid',
                         'name'=>$name,
                         'password'=>password_verify($password, $password),
                         
                         );
                         echo json_encode($report);
                         exit;  
                     }

                    else
                    {
                    $message = $this
                         ->form_validation
                         ->error_array();
                    $report = array(
                         'status' => 0,
                         'message' => $message
                    );
                    echo json_encode($report);
                    exit;
                    }
               }


          }
                    else{
                         echo json_encode(array('STATUS'=>'FALSE','message'=>'Something Went Wrong'));
                         exit;
                    }
          // else{
          //      show_error("No direct access allowed");
          // }
     

              
                   
          
     }
}
public function user_dashboard()
{
          // $get = $this->input->get();
          $this->load->view('admin/header');
          $this->load->view('final/user_dashboard');
          $this->load->view('admin/footer');
}
public function admin_dashboard()
{
          // $get = $this->input->get();
          $this->load->view('admin/header');
          $this->load->view('final/admin_dashboard');
          $this->load->view('admin/footer');
}
}
