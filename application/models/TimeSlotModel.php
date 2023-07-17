<?php
class TimeSlotModel extends CI_Model {
    public function getAvailableTimeSlots($selectedDate) {
        // Query the database for available time slots on the selected date
        $this->db->select('*');
        $this->db->from('date_slots');
        $this->db->where('date', $selectedDate);
        $query = $this->db->get();
        
        return $query->result_array();
    }
	
}
?>
