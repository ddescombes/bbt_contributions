<?php  
    class Report_model extends CI_Model 
    {
        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }

        public function get_annual_report_aggregate($year, $env_no)
        {
            $this->db->select("SUM(deductable) AS agg_regular");
            $this->db->from('Contributions2');
            $this->db->where('YEAR(`giftdate`)',$year);
            $this->db->where('env_no',$env_no);
            $this->db->group_by('env_no');
            $regular_contributions = $this->db->get();
            foreach ($regular_contributions->result() as $row)
            {
                return $row->agg_regular;
            }
        }

        public function get_annual_report_detail($year, $env_no)
        {
            $this->db->select("giftdate, deductable");
            $this->db->from('Contributions2');
            $this->db->where('YEAR(`giftdate`)',$year);
            $this->db->where('env_no',$env_no);
            $this->db->order_by('giftdate');
            $contributions = $this->db->get();
            return $contributions->result_array();

        }

        public function get_name($env_no)
        {
            $this->db->select("name");
            $this->db->from('assignments');
            $this->db->where('env_no',$env_no);
            $env_name = $this->db->get();
            foreach ($env_name->result() as $row)
            {
                return $row->name;
            }
        }

        public function get_env_names()
        {
            $this->db->select('env_no, name');
            $this->db->from('assignments');
            $this->db->order_by('env_no');
            $this->db->where('active', 1);
            $query = $this->db->get();
            return $query->result_array();
        }
    }