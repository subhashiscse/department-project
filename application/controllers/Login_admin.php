<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $admin_id = $this->session->userdata('admin_id');
        if (isset($admin_id)) 
        {
            redirect('dashboard_admin');
        }
        $data['settings']=$this->db->where('id',1)->get('settings')->row();
        $this->load->view('backend/login/login_admin', $data);
    }
    public function authentication_process() 
    {
        $userinformation = $this->set_login_information($this->secure_data());
        $res = $this->User->user_validation("users", $userinformation);
        $confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");
        if ($confirm == 1) 
        {
            $this->session->set_userdata('admin_id', $res->user_id);
            $this->session->set_userdata('admin_name', $res->user_name);
            $this->session->set_userdata('admin_email', $res->user_email);
            redirect('dashboard_admin','location');
        } 
        else 
        {
            redirect('login_admin', 'location');
        }
    }

    public function user_logout() 
    {
        $this->session->unset_userdata('admin_id');
        $this->session->sess_destroy();
        redirect('admin', 'location');
    }

    private function set_login_information($input_validation) 
    {
        if ($input_validation) 
        {
            
        } 
        else 
        {
            $this->set_confirmation_msg("","","Please Enter The Valid Data");
            redirect('login_admin','location');
        }
        $userinformation = array('user_email' => $this->input->post('email'),
            'user_password' => md5($this->input->post('password'))
        );
        return $userinformation;
    }

    private function secure_data() 
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() === FALSE) 
        {
            return 0;
        } 
        else 
        {

            return TRUE;
        }
    }

    private function set_confirmation_msg($data, $true_msg, $false_msg) 
    {
        $confirm = 0;
        if ($data == FALSE) 
        {
            $this->session->set_flashdata('error', $false_msg);
        } 
        else 
        {
            $this->session->set_flashdata('success', $true_msg);
            $confirm = 1;
        }
        return $confirm;
    }
}
