<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registraion_model extends CI_Model
{
         
          public function reg_insert($data)
          {
                    
                    return $this->db->insert('registration',$data);
                    // return true;
                    
          }
          public function login_insert($first_name)
          {
                    
            $this->db->select('first_name,last_name,email,mobile_no,gender,dob,password'); 
            $this->db->from('registration');
            $this->db->where('first_name',$first_name);
            // $this->db->where('password',$data['password']);
            $query = $this->db->get();
            // var_dump($this->db->last_query());die;
            if ($query->num_rows())
            {
                return $query->result_array();
            }
            else
            {
                return false;
            }
        }


    
}
          