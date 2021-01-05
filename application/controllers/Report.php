<?php
class Report extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url'); 
        session_start(); 
    }

    public function index()
    {
        if(!empty($_POST))
        {
            //Get submitted username and password
            $year = str_replace("'", "", $this->db->escape($this->input->post('year')));
            $env_no = str_replace("'", "", $this->db->escape($this->input->post('env_no')));
            $data['contribution_total'] = $this->Report_model->get_annual_report_aggregate($year, $env_no);
            //$data['name'] = $this->report_model->get_remarks();
            $data['css'] = $this->config->item('css');
            $data['year'] = $year;
            $data['env_no'] = $env_no;
            $data['contributions'] = $this->Report_model->get_annual_report_detail($year, $env_no);
            $data['num_contributions'] = count($this->Report_model->get_annual_report_detail($year, $env_no));
            $data['name'] = $this->Report_model->get_name($env_no);
            $this->load_view("reports/annual_report", $data); 
        }
        else
        {
            $data['env_names'] = $this->Report_model->get_env_names();
            $this->load_view('reports/request_report', $data); 
        }
    }
    private function load_view($view, $data = null)
    {
        if(isset($_SESSION['isLoggedIn']))
        {
            $this->load->view($view, $data);
        }
        else
        {
            $this->load->view('user/login');
        }
    }
}