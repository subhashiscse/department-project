<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_student extends CI_Controller 
{
    public function __construct() 
      {
          parent::__construct();
      }
    public function index()
     {  
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        $data['active_nav'] = "dashboard";
        $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/student/dashboard/dashboard',$data,TRUE);

        $this->load->view('backend/student/layout',$data);
     }
    public function password_change()
   {
      $data['active_nav'] = "dashboard";
      $student_id = $this->session->userdata('student_id');
      $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/password_change',$data,TRUE);
      $this->load->view('backend/student/layout',$data);
   }
   public function update_password()
   {
      $student_id = $this->session->userdata('student_id');
      $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
      $main_pass=$data['student_info']->user_password;
      $old_pass=md5($this->input->post('old_pass'));
      $new_pass=md5($this->input->post('new_pass'));
      $ret_new_pass=md5($this->input->post('ret_new_pass'));
      if($main_pass==$old_pass)
      {
          if($new_pass==$ret_new_pass)
          {
              $data = array(
                  'user_password' => md5($this->input->post('ret_new_pass')),
              );
              $this->db->where("student_id", $student_id);  
              $this->db->update("students", $data);  
              $this->session->set_flashdata('msg', '<p class="alert alert-success">Password Update Successfully</p>');
              redirect('dashboard_student/password_change','location');
          }
          else 
          {
              $this->session->set_flashdata('msg', '<p class="alert alert-danger">Password Does not match</p>');
              redirect('dashboard_student/password_change','location');
          }
      }
      else 
      {
          $this->session->set_flashdata('msg', '<p class="alert alert-danger">Old password is incorrect</p>');
          redirect('dashboard_student/password_change','location');
      }
   }
   public function see_own_profile()
   {
      $data['active_nav'] = "see_own_profile";
      $student_id = $this->session->userdata('student_id');
      $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/view_profile','$data',TRUE);
      $this->load->view('backend/student/layout',$data);
   }
    public function see_notice()
    {
        $data['active_nav'] = "see_notice";
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        $data['notice_list']=$this->db->where('user_email',$data['student_info']->student_email)->order_by("notice_date",'desc')->get('notices');
        $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/student/dashboard/notice_list',$data,TRUE);
        $this->load->view('backend/student/layout',$data);
    }
    public function mark_notice($notice_id)
    {
        $data['active_nav'] = "see_notice";
        $this->db->set('notice_status','1')->where('notice_id',$notice_id);
        $this->db->update('notices');
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        $data['notice_list']=$this->db->where('user_email',$data['student_info']->student_email)->order_by("notice_date",'desc')->get('notices');
        $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/student/dashboard/notice_list',$data,TRUE);
        $this->load->view('backend/student/layout',$data);
    }
    public function unmark_notice($notice_id)
    {
      $data['active_nav'] = "see_notice";
      $this->db->set('notice_status','0')->where('notice_id',$notice_id);
      $this->db->update('notices');
      $student_id = $this->session->userdata('student_id');
      $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
      $data['notice_list']=$this->db->where('user_email',$data['student_info']->student_email)->order_by("notice_date",'desc')->get('notices');
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/notice_list',$data,TRUE);
      $this->load->view('backend/student/layout',$data);
    }
    public function class_routine()
    {
        $data['active_nav'] = "class_routine";
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        $data['routine_list']=$this->db->where('session',$data['student_info']->student_session)->order_by("class_course",'asc')->get('class_routine');
        $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/student/dashboard/class/class_routine',$data,TRUE);
        $this->load->view('backend/student/layout',$data);
    }
    public function exam_routine()
    {
        $data['active_nav'] = "class_routine";
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        $data['exam_routine_list']=$this->db->where('session',$data['student_info']->student_session)->order_by("exam_course",'asc')->get('exam_routine');
        $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/student/dashboard/exam/exam_routine_list',$data,TRUE);
        $this->load->view('backend/student/layout',$data); 
    }
    public function send_app_admin()
    {
        $data['active_nav'] = "send_app_admin";
        $student_id = $this->session->userdata('student_id');
        $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
        
        $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/student/dashboard/application/send_app_admin',$data,TRUE);
        $this->load->view('backend/student/layout',$data);
    }
    public function view_application()
   {
      $data['active_nav'] = "view_application";
      $student_id = $this->session->userdata('student_id');
      $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
      $data['application_list']=$this->db->where('user_email',$data['student_info']->student_email)->order_by("application_date",'desc')->get('applications');
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/application/view_application',$data,TRUE);
      $this->load->view('backend/student/layout',$data);
   }
    public function send_app_teacher()
    {
      $data['active_nav'] = "send_app_teacher";
      $student_id = $this->session->userdata('student_id');
      $data['teacher_list'] = $this->Common->get_data_sort_order('teachers','teacher_id','asc');
      $data['student_info']=$this->db->where('student_id',$student_id)->get('students')->row();
      $data['student_list'] = $this->Common->get_data_sort_order('students','student_id','asc');
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/application/send_app_teacher',$data,TRUE);
      $this->load->view('backend/student/layout',$data);
    }
    public function save_app_admin()
    {
        $admin_info=$this->db->get('users')->row();
        $date=new DateTime();
        $student_id = $this->session->userdata('student_id');
        $student_info=$this->db->where('student_id',$student_id)->get('students')->row();
        $data = array(
              'user_email' => $admin_info->user_email,
              'application_subject' => trim($this->input->post('application_subject')),
              'application_description' => trim($this->input->post('application_description')),
              'application_date'=>trim($date->format('Y-m-d:H:i:s')),
              'application_sender'=>trim($student_info->student_name),
              'application_sender_email'=>trim($student_info->student_email),
          );
        $this->Common->set_data("applications", $data);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
        redirect('dashboard_student/send_app_admin','location');
    }
    public function save_app_teacher()
    {
      $date=new DateTime();
      $student_id = $this->session->userdata('student_id');
      $student_info=$this->db->where('student_id',$student_id)->get('students')->row();
      foreach($_POST['id'] as $key=>$item)
      { 
        $data = array(
              'user_email' => $item,
              'application_subject' => trim($this->input->post('application_subject')),
              'application_description' => trim($this->input->post('application_description')),
              'application_date'=>trim($date->format('Y-m-d:H:i:s')),
              'application_sender'=>trim($student_info->student_name),
          );
        $this->Common->set_data("applications", $data);
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_student/send_app_teacher','location');
    }

    public function getBookList()
    {
      $data['active_nav'] = "book_list";
      $data['book_list'] = $this->Common->get_data_sort_order('book_list','BookId','asc');
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/book_store/book_list',$data,TRUE);
      $this->load->view('backend/student/layout',$data);
    }
    public function getAllIssuedBookList()
    {
      $data['active_nav'] = "issued_book_list";
      $StudentId = $this->session->userdata('student_id');
      $data['issued_book_list'] = $this->Common->getAllIssuedBookList('book_assign_info','BookId','asc','StudentId',$StudentId);
      $data['side_menu']=$this->load->view('backend/student/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/student/dashboard/book_store/issued_book_list',$data,TRUE);
      $this->load->view('backend/student/layout',$data);
    }
}#00254E