<?php  
    class Report_model extends CI_Model 
    {
        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }

        public function get_annual_data_by_user($id, $start_date, $end_date)
        {
            $this->db->order_by("giftdate", "asc");
            $this->db->select('*');
            $this->db->from('Contributions2');
            $this->db->where('env_no', $id);
            $this->db->where('giftdate' > $start_date);
            $this->db->where('giftdate' < $start_date);
            $query = $this->db->get();
            return $query->result_array();
        }
    }