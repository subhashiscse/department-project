<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_teacher extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $teacher_id = $this->session->userdata('teacher_id');
        if (isset($teacher_id)) 
        {
            redirect('dashboard_teacher');
        }
        $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $this->load->view('backend/login/login_teacher', $data);
    }
    public function authentication_process() 
    {
        $userinformation = $this->set_login_information($this->secure_data());
        $res = $this->User->user_validation("teachers", $userinformation);
        $confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");
        if ($confirm == 1) 
        {
            $this->session->set_userdata('teacher_id', $res->teacher_id);
            $this->session->set_userdata('teacher_username', $res->teacher_username);
            $this->session->set_userdata('teacher_email', $res->teacher_email);
            redirect('dashboard_teacher','location');
        } 
        else 
        {
            redirect('login_teacher', 'location');
        }
    }

    public function teacher_logout() 
    {
        $this->session->unset_userdata('teacher_id');
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
            redirect('login_teacher','location');
        }
        $userinformation = array('teacher_email' => $this->input->post('email'),
            'teacher_pass' => md5($this->input->post('password'))
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
