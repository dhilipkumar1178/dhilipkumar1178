<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('BookingModel');
    }

    public function index() {
        $data['available_slots'] = $this->BookingModel->getAvailableSlots();
        $this->load->view('final/booking_view', $data);
    }

    public function bookSlot() {
        $date = $this->input->post('date');
        $time_slot = $this->input->post('time_slot');
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');

        $is_booked = $this->BookingModel->bookTimeSlot($date, $time_slot, $user_name, $user_email);

        if ($is_booked) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Time slot is not available.'));
        }
    }
	public function booking_list() {
        $this->load->view('final/booking_list_view');
		$data['bookings']=$this->BookingModel->getAll_bookings();
    }
}
?>
