<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_teacher extends CI_Controller 
{
    public function __construct() 
      {
          parent::__construct();
      }
    public function index()
     {  
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $data['active_nav'] = "dashboard";
        $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/teacher/dashboard/dashboard',$data,TRUE);
        $this->load->view('backend/teacher/layout',$data);
     }
   public function password_change()
   {
      $data['active_nav'] = "dashboard";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/password_change',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
   }
   public function update_password()
   {
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $main_pass=$data['teacher_info']->teacher_pass;
      $old_pass=md5($this->input->post('old_pass'));
      $new_pass=md5($this->input->post('new_pass'));
      $ret_new_pass=md5($this->input->post('ret_new_pass'));
      if($main_pass==$old_pass)
      {
          if($new_pass==$ret_new_pass)
          {
              $data = array(
                  'teacher_pass' => md5($this->input->post('ret_new_pass')),
              );
              $this->db->where("teacher_id", $teacher_id);  
              $this->db->update("teachers", $data);  
              $this->session->set_flashdata('msg', '<p class="alert alert-success">Password Update Successfully</p>');
              redirect('Dashboard_teacher/password_change','location');
          }
          else 
          {
              $this->session->set_flashdata('msg', '<p class="alert alert-danger">Password Does not match</p>');
              redirect('Dashboard_teacher/password_change','location');
          }
      }
      else 
      {
          $this->session->set_flashdata('msg', '<p class="alert alert-danger">Old password is incorrect</p>');
          redirect('Dashboard_teacher/password_change','location');
      }
   }
   public function see_own_profile()
   {
      $data['active_nav'] = "see_own_profile";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/view_profile','$data',TRUE);
      $this->load->view('backend/teacher/layout',$data);
   }
    public function see_notice()
    {
        $data['active_nav'] = "see_notice";
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $data['notice_list']=$this->db->where('user_email',$data['teacher_info']->teacher_email)->order_by("notice_date",'desc')->get('notices');
        $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice_list',$data,TRUE);
        $this->load->view('backend/teacher/layout',$data);
    }
    public function mark_notice($notice_id)
    {
        $data['active_nav'] = "see_notice";
        $this->db->set('notice_status','1')->where('notice_id',$notice_id);
        $this->db->update('notices');
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $data['notice_list']=$this->db->where('user_email',$data['teacher_info']->teacher_email)->order_by("notice_date",'desc')->get('notices');
        $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice_list',$data,TRUE);
        $this->load->view('backend/teacher/layout',$data);
    }
    public function unmark_notice($notice_id)
    {
      $data['active_nav'] = "see_notice";
      $this->db->set('notice_status','0')->where('notice_id',$notice_id);
      $this->db->update('notices');
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['notice_list']=$this->db->where('user_email',$data['teacher_info']->teacher_email)->order_by("notice_date",'desc')->get('notices');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice_list',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
    }
    public function send_notice_admin()
     {
        $data['active_nav'] = "send_notice_admin";
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        
        $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice/send_notice_admin',$data,TRUE);
        $this->load->view('backend/teacher/layout',$data);
     }
     public function save_notice_admin()
      {
          $admin_info=$this->db->get('users')->row();
          $date=new DateTime();
          $teacher_id = $this->session->userdata('teacher_id');
          $teacher_info=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
          $data = array(
                'user_email' => $admin_info->user_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($teacher_info->teacher_name),
            );
          $this->Common->set_data("notices", $data);
          $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
          redirect('dashboard_teacher/send_notice_admin','location');
      }
    public function send_notice_teacher()
   {
      $data['active_nav'] = "send_notice_teacher";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['teacher_list'] = $this->Common->get_data_sort_order('teachers','teacher_id','asc');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice/send_notice_teacher',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
   }
   public function send_notice_student()
   {
      $data['active_nav'] = "send_notice_teacher";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['session_list'] = $this->Common->get_data_sort_order('session','session_id','asc');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice/send_notice_student',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
   }
   public function send_notice_stuff()
   {
      $data['active_nav'] = "send_notice_teacher";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['stuff_list'] = $this->Common->get_data_sort_order('stuffs','stuff_id','asc');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice/send_notice_stuff',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
   }
   public function send_notice_all()
   {
      $data['active_nav'] = "send_notice_all";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['stuff_list'] = $this->Common->get_data_sort_order('stuffs','stuff_id','asc');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/notice/send_notice_all',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);

   }
   public function save_notice_teacher()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $teacher_id = $this->session->userdata('teacher_id');
        $teacher_info=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $data = array(
              'user_email' => $item,
              'notice_subject' => trim($this->input->post('notice_subject')),
              'notice_description' => trim($this->input->post('notice_description')),
              'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
               'notice_sender'=>trim($teacher_info->teacher_name),
          );
        $this->Common->set_data("notices", $data);
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_teacher/send_notice_teacher','location');
   }
   public function save_notice_stuff()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $teacher_id = $this->session->userdata('teacher_id');
        $teacher_info=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $data = array(
              'user_email' => $item,
              'notice_subject' => trim($this->input->post('notice_subject')),
              'notice_description' => trim($this->input->post('notice_description')),
              'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
               'notice_sender'=>trim($teacher_info->teacher_name),
          );
        $this->Common->set_data("notices", $data);
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_teacher/send_notice_stuff','location');
   }
   public function save_notice_student()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $teacher_id = $this->session->userdata('teacher_id');
        $teacher_info=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $student_list=$this->db->where('student_session',$item)->get('students')->result();
        foreach ($student_list as $row) 
        {
          $data = array(
                'user_email' => $row->student_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($teacher_info->teacher_name),
            );
          $this->Common->set_data("notices", $data);
        }
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_teacher/send_notice_student','location');
   }
   public function save_notice_all()
   {
    $teacher_list= $this->Common->get_data_sort_order('teachers','teacher_id','asc')->result();
      $student_list= $this->Common->get_data_sort_order('students','student_id','asc')->result();
      $stuff_list = $this->Common->get_data_sort_order('stuffs','stuff_id','asc')->result();
      $date=new DateTime();
      $teacher_id = $this->session->userdata('teacher_id');
      $teacher_info=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      foreach ($student_list as $row) 
        {
          $data = array(
                'user_email' => $row->student_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($teacher_info->teacher_name),
            );
          $this->Common->set_data("notices", $data);
        }
        $date=new DateTime();
        $teacher_id = $this->session->userdata('teacher_id');
        $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        foreach ($teacher_list as $row) 
        {
          $data = array(
                'user_email' => $row->teacher_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($teacher_info->teacher_name),
            );
          $this->Common->set_data("notices", $data);
        }
        $date=new DateTime();
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        foreach ($stuff_list as $row) 
        {
          $data = array(
                'user_email' => $row->stuff_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($teacher_info->teacher_name),
            );
         $this->Common->set_data("notices", $data);
        }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_teacher/','location');
   }
   public function class_course()
    {
      $data['active_nav'] = "class_course";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['class_routine']=$this->db->where('teacher_email',$data['teacher_info']->teacher_email)->get('class_routine');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content']=$this->load->view('backend/teacher/dashboard/class/course_list','$data',TRUE);
      $this->load->view('backend/teacher/layout',$data);
    }
   public function class_notice()
    {
      $data['active_nav'] = "class_notice";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['session_list'] = $this->Common->get_data_sort_order('session','session_id','asc');
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/class/class_notice',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
    }
    public function save_class_notice()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $teacher_id = $this->session->userdata('teacher_id');
        $teacher_info=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
        $student_list=$this->db->where('student_session',$item)->get('students')->result();
        foreach ($student_list as $row) 
        {
          $data = array(
                'user_email' => $row->student_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($teacher_info->teacher_name),
            );
          $this->Common->set_data("notices", $data);
        }
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_teacher/class_notice','location');
   }
   public function meeting_info()
    {
      $data['active_nav'] = "meeting_info";
      $teacher_id = $this->session->userdata('teacher_id');
      $data['teacher_info']=$this->db->where('teacher_id',$teacher_id)->get('teachers')->row();
      $data['meeting_info']=$this->db->where('teacher_email',$data['teacher_info']->teacher_email)->get('meeting_member_list')->result();
      $data['side_menu']=$this->load->view('backend/teacher/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/teacher/dashboard/meeting_info/meeting_list',$data,TRUE);
      $this->load->view('backend/teacher/layout',$data);
    }
}