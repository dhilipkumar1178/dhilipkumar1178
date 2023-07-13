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
          $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('email', 'Email', 'trim|required');
          $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('dob', 'Birthday', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('gender', 'Gender', 'trim|required|max_length[150]');
          $this->form_validation->set_rules('password', 'Password','trim|required');
          if ($this->form_validation->run() != FALSE)
          {
                    $id = $this->input->post('id');
                    $first_name=$this->input->post('first_name');
                    $last_name=$this->input->post('last_name');
                    $email=$this->input->post('email');
                    $mobile_no=$this->input->post('mobile_no');
                    $dob=$this->input->post('dob');
                    $gender=$this->input->post('gender');
                    $password=$this->input->post('password');

          
                   $data=array(
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'mobile_no'=>$mobile_no,
                    'dob'=>$dob,
                    'gender'=>$gender,
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
          
          $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
          $this->form_validation->set_rules('password', 'Password','trim|required');
     
     if ($this->form_validation->run() != FALSE)
     {
          $first_name=$this->input->post('first_name');
          $password=$this->input->post('password');
          $log=$this->registraion_model->login_insert($first_name);
          if($log!=false){
               if(!empty($log[0]['password']))
               {
                    if (password_verify($password, $log[0]['password'])) {
                         $first_name=$this->input->post('first_name');
                         // var_dump($first_name);die;
                         $this->session->set_userdata('first_name',$first_name);
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
                         'first_name'=>$first_name,
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
          
    
     public function dashboard_index()
     {
               // $first_name=$this->input->post('first_name');
               // // var_dump($first_name);die;
               // $this->session->set_userdata('first_name',$first_name);
               $this->load->view('admin/header');
               $this->load->view('final/dashboard');
               $this->load->view('admin/footer');
     }
     public function logout()
     {
          $this->session->sess_destroy();
          $this->load->view('final/login_index');
     }
	}
