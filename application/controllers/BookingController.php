<?php
class BookingController extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('TimeSlotModel');
	}
    public function index() {
        $this->load->view('final/calendar_view');
    }
    
    public function getTimeSlots() {
        $selectedDate = $this->input->post('selected_date');
        
        // Query the database for available time slots
        $availableTimeSlots = $this->TimeSlotModel->getAvailableTimeSlots($selectedDate);
        
        // Return the response as JSON
        $response['time_slots'] = $availableTimeSlots;
        echo json_encode($response);
    }
	
}
?>
