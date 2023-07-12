<?php 
	class User_model extends CI_Model{
		public function store($data){
			$this->db->insert('user',$data);
			return true;
		}
		public function getUser($email){
			return $this->db->where('email',$email)->get('user')->row();
		}

	

		// public function getEventname() 
        //   {
        //   $rs=$this->db->select('country_id,country_name')->from('country')->get()->result_array();
        //   return $rs;
        //   }
		public function getevents(){
			return $this->db->get('event_name')->result();
		}

		  public function add_event_insert($data)
        {
    
            return $this->db->insert('add_event',$data);
            // return true;
                  
        }

		public function getAll_event()
          {
            // $payslip=$this->db->GET('payslip')->result();
            $event=$this->db->select('a.*,b.event_name')->from('add_event as a')->join('event_name as b','b.event_id=a.event_name')->get()->result_array();
            //  var_dump($this->db->last_query());die;
            return $event;
          }


		  public function getBooks($start,$length,$order_by,$sort){
			if($order_by!=null){
				$this->db->order_by($order_by,$sort);
			}
			return $this->db->offset($start)->limit($length)->get('add_event');
		}

		public function getTotalBooks(){
			$query = $this->db->select('COUNT(*) as add_event')->get('add_event');
			$result = $query->row();
			if($result){
				return $result->total_books;
			}
			return 0;

		}
		public function gettimes($event_id){
			return $this->db->where('event_id',$event_id)->get('time_slot')->result();
		}
		public function getamounts($time_id){
			return $this->db->where('time_id',$time_id)->get('amount')->result();
		}

		

		public function deleteevent($id)
		{
			 return $this->db->where('id',$id)->delete('add_event');
		}

		public function getcategory(){
			return $this->db->get('category_name')->result();
		}
		
	}


?>
