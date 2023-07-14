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
          public function login_insert($name)
          {
                    
            $this->db->select('name,email,mobile_no,department,year,dob,password'); 
            $this->db->from('registration');
            $this->db->where('name',$name);
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
		public function admin_insert($data)
		{
				  
		  return $this->db->insert('admin',$data);
		  // return true;
				  
		}
		public function admin_login_insert($name)
          {
                    
            $this->db->select('name,password'); 
            $this->db->from('registration');
            $this->db->where('name',$name);
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

		public function getname(){
			return $this->db->get('hall')->result();
		}

		
    }


    

          