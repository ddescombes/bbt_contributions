<?php
class Report extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('contribution_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url'); 
        session_start(); 
    }

    public function annual()
    {
        $this->load_view('reports/annual_report');
    }

    public function create_pdf(){
      define('FPDF_FONTPATH',APPPATH .'plugins/fpdf/font/');
      require(APPPATH .'plugins/fpdf/fpdf.php');
      
      $this->load_view('reports/annual_report', $data);    
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