<?php 
	class User extends CI_Controller{
			public function __construct(){
				parent::__construct();
				$this->load->helper('url');
				$this->load->library('form_validation');
				$this->load->model('user_model');
				$this->load->database();
				$this->load->library('session');
			}
			public function signup(){
				$this->load->view('signup_form');
			}

			public function submit(){
				$this->form_validation->set_rules('email','Email','required|is_unique[user.email]',array('is_unique'=>'Email already exists!'));
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('password','Password','required');
				if($this->form_validation->run()==FALSE){
					$this->load->view('signup_form');
				}else{
					$data['name'] = $this->input->post('name');
					$data['email'] = $this->input->post('email');
					$data['password'] = $this->input->post('password');
				
					$response = $this->user_model->store($data);
					if($response==true){
						redirect('user/login');
					}else{
						echo 'Failed to register';	
					}
				}
				
			}
			public function login(){
				// if($this->session->has_userdata('id')){
				// 	redirect('user/home');
				// }
				$this->load->view('login_form');
			}

			public function login_user(){
			
				$this->form_validation->set_rules('email','Email','required');
				$this->form_validation->set_rules('password','Password','required');
				if($this->form_validation->run()==FALSE){
					$this->load->view('login_form');
				}else{
					$email = $this->input->post('email');
					$password = $this->input->post('password');
					if($user = $this->user_model->getUser($email)){
						if($user->password==$password){
							$this->session->set_userdata('id',$user->id);
							redirect('user/home');
							
						}else{
							echo "Login Error!";
						}
					}else{
						echo "No account exists with this email!";
					}
				}

			
			}

			public function home(){
				$this->load->view('dashboard');
			}

			public function logout(){
				$this->session->unset_userdata('id');
				redirect('user/login');
			}

		
			public function add_event(){
				$events = $this->user_model->getevents();
				$this->load->view('final/add_event',array('events'=>$events));
			}

			// public function dum(){
			// 	$this->load->view('final/dum');
			// }

	public function addevent_management()
     {
        //  var_dump($_POST);die;
     if($this->input->is_ajax_request())
     {
     	$this->load->library('form_validation');

		$this->form_validation->set_rules('event_name', 'Event Name', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('start_date', 'Start Date','trim|required');
		$this->form_validation->set_rules('end_date', 'End Date','trim|required');
		$this->form_validation->set_rules('time_slot', 'Time Slot','trim|required');
		$this->form_validation->set_rules('amount', ' Amount','trim|required');
		$this->form_validation->set_rules('gst', 'Gst','trim|required');
		$this->form_validation->set_rules('total', 'Total','trim|required');
		// $this->form_validation->set_rules('event_name', 'Event Name','trim|required');
                  
          if ($this->form_validation->run())
          {
               $id = $this->input->post('id');
               $event_name=$this->input->post('event_name');
               $start_date=$this->input->post('start_date');
               $end_date=$this->input->post('end_date');
               $time_slot=$this->input->post('time_slot');
			   $amount=$this->input->post('amount');
               $gst=$this->input->post('gst');
               $total=$this->input->post('total');
			    // $event_name=$this->input->post('event_name');

             
               $data=array(
               // 'emp_id'=>$emp_id,
               'event_name'=>$event_name,
               'start_date'=>$start_date,
               'end_date'=>$end_date,
			   'time_slot'=>$time_slot,
               'amount'=>$amount,
               'gst'=>$gst,
               'total'=>$total,
               );
               
            //    $data['created_at'] = date("Y-m-d H:i:s");
               $reg=$this->user_model->add_event_insert($data);
               if($reg == true)
                    {
						echo json_encode(array('STATUS'=>'TRUE','message'=>'Add Successfully'));
                         
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
     public function event_view()
     {
          $data['event']=$this->user_model->getAll_event();
          // var_dump($data['payslip']);die;
          $this->load->view('admin/header');
          $this->load->view('final/event_view',$data);
          $this->load->view('admin/footer');
     }

	 public function index(){
		$this->load->view('final/event_view');
	}
	public function user_data(){
		$draw = $this->input->get('draw');
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$order = $this->input->get('order');

		$col=0;
		$sort ="";

		if(!empty($order)){
			foreach($order as $o){
				$col = $o['column'];
				$sort = $o['dir'];
			}
		}

		$columns_valid = [
			"event_name",
			"start_date",
			"end_date",
			"time",
			"amount",
			"gst",
			"total"
			
		];
		$order_by=null;

		if(isset($columns_valid[$col])){
			$order_by = $columns_valid[$col];
		}


		$total_books = $this->user_model->getTotalBooks();

		$books = $this->user_model->getBooks($start,$length,$order_by,$sort);
		
		$data = array();
		foreach($books->result() as $book){
			$data[] = array(
				$book->event_name,
				$book->start_date,
				$book->end_date,
				$book->time,
				$book->amount,
				$book->gst,
				$book->total
			);
		}

		$output = array(
			'draw'=>$draw,
			'recordsTotal'=>$total_books,
			'recordsFiltered'=>$total_books,
			'data'=>$data
		);

		echo json_encode($output);
		exit();
	}

	public function times(){
		$event_id = $this->input->get('event_id');
		$times = $this->user_model->gettimes($event_id);
		$html = '<option value="">Select State</option>';
		foreach($times as $time){
			$html .= '<option value="'.$time->time_slot.'">'.$time->time_slot.'</option>';
		}
		echo $html;
	}

	public function Amounts(){
		$time_id = $this->input->get('time_id');
		$amounts = $this->user_model->getamounts($time_id);
		$html = '<option value="">Select City</option>';
		foreach($amounts as $amount){
			$html .= '<option value="'.$amount->amount.'">'.$amount->amount.'</option>';
		}
		echo $html;
	}
	


	public function deletes()
     {
          if($this->input->is_ajax_request())
          {
               $this->load->library('form_validation');
               $this->form_validation->set_rules('id','ID','required|numeric');
               if($this->form_validation->run())
               {
                    $id = $this->input->POST('id');
                    $ress=$this->user_model->deleteevent($id);
                    if($ress == true){
                         echo json_encode(array('STATUS'=>'TRUE','message'=>'Delete Successfully'));
                         exit;
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

	 public function add_cat(){
	
		$Categorys = $this->user_model->getcategory();
		$this->load->view('final/add_category',array('Categorys'=>$Categorys));
	}

	 
}
			

	


?>
