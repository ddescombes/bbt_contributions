<?php  
    class User_model extends CI_Model 
    {
        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }

        public function add_user()
        {
                if(!empty($_POST))
                {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'user_name' => $this->db->escape($this->input->post('user_name')),
                        'password' => md5($this->db->escape($this->input->post('password'))));
                        return $this->db->insert('User', $data);
                }
        }

        public function login()
        {
            if(!empty($_POST))
            {
                //Get submitted username and password
                $myusername = $this->db->escape($this->input->post('user_name'));
                $mypassword = $this->db->escape($this->input->post('password')); 

                //encrypt submitted password
                //$mypassword = md5($mypassword);

                //Search DB for submitted username and password
                $this->db->select('*');
                $this->db->from('User');
                $this->db->where('user_name', $myusername);
                $this->db->where('password', md5($mypassword));
                $query = $this->db->get();
                $count =  count($query->result_array());

                //If match is found, create session variables
                if($count == 1)
                {
                    //session_start();
                    //session_register("myusername");
                    $_SESSION['login_user'] = $myusername;
                    $_SESSION['isLoggedIn'] = "Yes";
                    return true;
                }
                else
                {
                    //session_start();
                    $_SESSION['login_user'] = "Guest";
                    return false;
                }
            }
        }

    }
