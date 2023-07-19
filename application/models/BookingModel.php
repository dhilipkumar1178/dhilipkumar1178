<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends CI_Model {
    public function getAvailableSlots() {
        $today = date('Y-m-d');
        $this->db->where('date >=', $today);
        $this->db->where('is_available', 1);
        $this->db->order_by('date', 'asc');
        $this->db->order_by('time_slot', 'asc');
        $query = $this->db->get('available_time_slots');
        return $query->result();
    }

    public function bookTimeSlot($date, $time_slot, $user_name, $user_email) {
        $this->db->where('date', $date);
        $this->db->where('time_slot', $time_slot);
        $this->db->where('is_available', 1);
        $query = $this->db->get('available_time_slots');

        if ($query->num_rows() > 0) {
            $data = array(
                'date' => $date,
                'time_slot' => $time_slot,
                'user_name' => $user_name,
                'user_email' => $user_email
            );

            $this->db->insert('bookings', $data);

            // Mark the time slot as booked
            $this->db->where('date', $date);
            $this->db->where('time_slot', $time_slot);
            $this->db->update('available_time_slots', array('is_available' => 0));

            return true;
        }

        return false;
    }
}
?>
