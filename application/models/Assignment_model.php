<?php  
    class Assignment_model extends CI_Model 
    {
        public function __construct()
        {
            $this->load->database();
        }
        public function get_assignments()
        {
            //Return all assignments
            $this->db->order_by("Env_No", "asc");
            $this->db->select('*');
            $this->db->from('assignments');
            $this->db->where('assigned IS NOT NULL');
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_assignment_by_id($id)
        {
            //Return a single assignment matching the $id provided
            $this->db->order_by("Env_No", "asc");
            $this->db->select('*');
            $this->db->from('assignments');
            $this->db->where('env_no', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
        public function get_available_envelope_numbers()
        {
            // Envelope Numbers are only available for assignment if they are not currently assigned and their release date is more than 2 years ago.
            $this->db->order_by("Env_No", "asc");
            $this->db->select('*');
            $this->db->from('assignments');
            $this->db->where('assigned IS NULL');
            $this->db->where('released > ', date('Y-m-d', strtotime('+2 years')));
            $query = $this->db->get();
            return $query->result_array();
        }
        public function update_assignment()
        {
            if(!empty($_POST))
            {
                $this->load->helper('url');
                $assigned =  null;
                $released = null;

                if(strlen($this->input->post('assigned'))==0)
                {
                    $assigned = null;
                }
                else
                {
                    $assigned = $this->input->post('assigned');
                }

                if(strlen($this->input->post('released'))==0)
                {
                    $released = null;
                }
                else
                {
                    $released = $this->input->post('released');
                }
                
                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zip' => $this->input->post('zip'),
                    'env' => $this->input->post('env'),
                    'assigned' => $assigned,
                    'released' => $released,
                    'env_no'=>$this->input->post('env_no')
                );
                $this->db->set($data);
                $this->db->where('env_no', $data['env_no']);
                return $this->db->update('assignments');
                echo "Updated";
            }
        }
        public function add_assignment()
        {
            if(!empty($_POST))
            {
                $this->load->helper('url');
                $assigned =  null;

                if(strlen($this->input->post('assigned'))==0)
                {
                    $assigned = null;
                }
                else
                {
                    $assigned = $this->input->post('assigned');
                }
                
                $data = array(
                    'env_no'=>$this->input->post('env_no'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zip' => $this->input->post('zip'),
                    'env' => $this->input->post('env'),
                    'assigned' => $assigned
                );
                return $this->db->insert('assignments', $data);
            }
        }
    }