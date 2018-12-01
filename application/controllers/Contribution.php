<?php
class Contribution extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('contribution_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url'); 
        session_start(); 
    }

    public function index($id = NULL)
    {
        $data['env_names'] = $this->contribution_model->get_env_names();
        $data['remarks'] = $this->contribution_model->get_remarks();
        $this->load_view('contributions/add_contribution', $data);
    }

    public function reconcile($date = NULL)
    {
        $data['contributions'] = $this->contribution_model->get_contributions();
        $this->load_view('contributions/reconcile', $data);
    }

    public function edit_contribution($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['env_names'] = $this->contribution_model->get_env_names();
        $data['remarks_list'] = $this->contribution_model->get_remarks();
        $data['contributions'] = $this->contribution_model->get_contribution_by_id($id);
        $data['js'] = $this->config->item('js');
        $this->load_view('contributions/edit_contribution', $data);
    }

    public function add_contribution()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['env_names'] = $this->contribution_model->get_env_names();
        $data['remarks'] = $this->contribution_model->get_remarks();
        $data['missions'] = "0";
        $data['js'] = $this->config->item('js');

        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('env_no', 'Envelope Number', 'required');
        $this->form_validation->set_rules('check_no', 'Check Number', 'required');
        $this->form_validation->set_rules('general', 'General', 'required');
        $this->form_validation->set_rules('missions', 'Missions', 'required');
        $this->form_validation->set_rules('special', 'Special', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load_view('contributions/add_contribution', $data);

        }
        else 
        {
            $this->contribution_model->add_contribution();
            $this->load_view('contributions/success');
        }
    }

    public function update_contribution()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('env_no', 'Envelope Number', 'required');
        $this->form_validation->set_rules('check_no', 'Check Number', 'required');
        $this->form_validation->set_rules('general', 'General', 'required');
        $this->form_validation->set_rules('missions', 'Missions', 'required');
        $this->form_validation->set_rules('special', 'Special', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');

        $this->contribution_model->update_contribution();

        if ($this->form_validation->run() === FALSE)
        {
            
        }
        else 
        {
            $this->reconcile();
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