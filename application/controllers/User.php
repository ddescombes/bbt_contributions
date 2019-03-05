<?php
class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('contribution_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url');
        session_start(); 
    }

    public function add_user()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $this->load_view('user/add_user');
        }
        else 
        {
            $this->user_model->add_user();
            $this->load->view('user/success');
       }
    }

    public function login()
    {
        $login = $this->user_model->login();
        if($login)
        {
            $data['env_names'] = $this->contribution_model->get_env_names();
            $data['remarks'] = $this->contribution_model->get_remarks();
            $data['missions'] = "0";
            $data['js'] = $this->config->item('js');
            $this->load->view('contributions/add_contribution', $data);
        }
        else
        {
            $this->load->view('user/login');
        }
    }

    public function logout()
    {
        if(session_destroy()) 
        {
            $this->load_view('user/login');
            //$this->load->view('user/login');
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