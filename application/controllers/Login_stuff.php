<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_stuff extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $stuff_id = $this->session->userdata('stuff_id');
        if (isset($stuff_id)) 
        {
            redirect('dashboard_stuff');
        }
        $data['stuff_info']=$this->db->where('stuff_id',$stuff_id)->get('stuffs')->row();
        $this->load->view('backend/login/login_stuff', $data);
    }
    public function authentication_process() 
    {
        $userinformation = $this->set_login_information($this->secure_data());
        $res = $this->User->user_validation("stuffs", $userinformation);
        $confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");
        if ($confirm == 1) 
        {
            $this->session->set_userdata('stuff_id', $res->stuff_id);
            $this->session->set_userdata('stuff_username', $res->stuff_username);
            $this->session->set_userdata('stuff_email', $res->stuff_email);
            redirect('dashboard_stuff','location');
        } 
        else 
        {
            redirect('login_stuff', 'location');
        }
    }

    public function stuff_logout() 
    {
        $this->session->unset_userdata('stuff_id');
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
            redirect('login_stuff','location');
        }
        $userinformation = array('stuff_email' => $this->input->post('email'),
            'stuff_pass' => md5($this->input->post('password'))
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
