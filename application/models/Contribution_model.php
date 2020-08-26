<?php  
class Contribution_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_contributions($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $this->db->order_by("Env_No", "asc");
                $query = $this->db->get('Contributions2');
                $this->db->join('category', 'category.category_id = books.category_id');
                return $query->result_array();
        }

        $query = $this->db->get_where('Contributions2', array('EnvSysID' => $slug));
        return $query->row_array();
    }

    public function get_contribution_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('Contributions2');
        $this->db->where('EnvSysID', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_contributions_by_date($date)
    {
        $this->db->select('*');
        $this->db->from('Contributions2');
        $this->db->order_by("Env_No", "asc");
        $this->db->where('giftdate', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_remarks()
    {
        $result = $this->db->select('RemarksSysID, RemarksTxt')->get('Remarks')->result_array();
        $remarks_list = array();
        foreach($result as $r) { 
            $remarks_list[$r['RemarksTxt']] = $r['RemarksTxt']; 
        } 
        
        return $remarks_list;
    }

    public function get_env_names()
    {
        $this->db->select('env_no, name');
        $this->db->from('assignments');
        $this->db->order_by('env_no');
	$this->db->where('active', true);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_contribution()
    {
        $this->load->helper('url');
        $deductable = number_format($this->input->post('general'),2) + number_format($this->input->post('missions'),2);
        $specialTaxable = 0;
        $otherTaxable = 0;

        if (isset($_POST['tax_special']))
        $specialTaxable = 1;
        
        if (isset($_POST['tax_other']))
        $otherTaxable = 1;

        if($specialTaxable == 0)
        {
            $deductable = number_format($deductable,2) + number_format($this->input->post('special'),2);
        }

        if($otherTaxable == 0)
        {
            $deductable = number_format($deductable,2) + number_format($this->input->post('other'),2);
        }
        $data = array(
                'giftdate' => $this->input->post('date'),
                'env_no' => $this->input->post('env_no'),
                'check_no' => $this->input->post('check_no'),
                'regular' => $this->input->post('general'),
                'missions' => $this->input->post('missions'),
                'special' => $this->input->post('special'),
                'special_taxed' => $specialTaxable,
                'other' => $this->input->post('other'),
                'other_taxed' => $otherTaxable,
                'total' => $this->input->post('total'),
                'deductable' => $deductable,
                'remarks' => $this->input->post('special_remarks') . ';' . $this->input->post('other_remarks'),
                'regular_fee' => $this->input->post('general_fee'),
                'missions_fee' => $this->input->post('missions_fee'),
                'special_fee' => $this->input->post('special_fee'),
                'other_fee' => $this->input->post('other_fee')
            );

        return $this->db->insert('Contributions2', $data);
    }

    public function update_contribution()
    {
        if(!empty($_POST))
        {
            $this->load->helper('url');
        $deductable = number_format($this->input->post('general')) + number_format($this->input->post('missions'));
        $specialTaxable = 0;
        $otherTaxable = 0;

        if (isset($_POST['tax_special']))
        $specialTaxable = 1;
        
        if (isset($_POST['tax_other']))
        $otherTaxable = 1;

        if($specialTaxable == 0)
        {
            $deductable = number_format($deductable) + number_format($this->input->post('special'));
        }

        if($otherTaxable == 0)
        {
            $deductable = number_format($deductable) + number_format($this->input->post('other'));
        }
        $data = array(
                'giftdate' => $this->input->post('date'),
                'Env_No' => $this->input->post('env_no'),
                'check_no' => $this->input->post('check_no'),
                'regular' => $this->input->post('general'),
                'missions' => $this->input->post('missions'),
                'special' => $this->input->post('special'),
                'special_taxed' => $specialTaxable,
                'other' => $this->input->post('other'),
                'other_taxed' => $otherTaxable,
                'total' => $this->input->post('total'),
                'deductable' => $deductable,
                'remarks' => $this->input->post('special_remarks') . ';' . $this->input->post('other_remarks'),
                'EnvSysID'=>$this->input->post('EnvSysID'),
                'regular_fee' => $this->input->post('general_fee'),
                'missions_fee' => $this->input->post('missions_fee'),
                'special_fee' => $this->input->post('special_fee'),
                'other_fee' => $this->input->post('other_fee')
            );
            echo $specialTaxable;
            echo $otherTaxable;
            $this->db->set($data);
            $this->db->where('EnvSysID', $data['EnvSysID']);
            return $this->db->update('Contributions2');
            echo "Updated";
        }
    }
}
