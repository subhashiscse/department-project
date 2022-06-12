<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_student extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $student_id = $this->session->userdata('student_id');
        if (isset($student_id)) 
        {
            redirect('dashboard_student');
        }
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        $this->load->view('backend/login/login_student', $data);
    }
    public function authentication_process() 
    {
        $userinformation = $this->set_login_information($this->secure_data());
        $res = $this->User->user_validation("students", $userinformation);
        $confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");
        if ($confirm == 1) 
        {
            $this->session->set_userdata('student_id', $res->student_id);
            $this->session->set_userdata('student_username', $res->student_username);
            $this->session->set_userdata('student_email', $res->student_email);
            redirect('dashboard_student','location');
        } 
        else 
        {
            redirect('login_student', 'location');
        }
    }

    public function student_logout() 
    {
        $this->session->unset_userdata('student_id');
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
            redirect('login_student','location');
        }
        $userinformation = array('student_email' => $this->input->post('email'),
            'student_pass' => md5($this->input->post('password'))
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
