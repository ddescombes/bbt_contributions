<?php
class Assignment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('assignment_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url'); 
        session_start(); 
    }

    public function index($id = NULL)
    {
        // $data['env_names'] = $this->contribution_model->get_env_names();
        // $data['remarks'] = $this->contribution_model->get_remarks();
        // $this->load->view('contributions/add_contribution', $data);
    }

    public function list()
    {
        $data['assignments'] = $this->assignment_model->get_assignments();
        $this->load_view('assignments/list_assignment', $data);
    }
    
    public function edit($id = NULL)
    {
        $data['assignments'] = $this->assignment_model->get_assignment_by_id($id);
        $this->load_view('assignments/edit_assignment', $data);
    }

    public function add()
    {
        $this->load_view('assignments/add_assignment');
    }

    public function insert()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('env_no', 'Env No', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('env', 'Total', 'required');
        $this->form_validation->set_rules('assigned', 'Assigned', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load_view('assignments/add_assignment');
        }
        else 
        {
            $this->assignment_model->add_assignment();
            $this->load_view('assignments/success');
        }
    }

    public function update()
    {
        $this->load->helper('form');
        $this->assignment_model->update_assignment();
        $this->list();
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
