<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
    }
   public function index()
   {  
      $admin_id = $this->session->userdata('admin_id');
      $data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
      $data['active_nav'] = "dashboard";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/dashboard',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function password_change()
   {
      $data['active_nav'] = "dashboard";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/password_change',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function update_password()
   {
      $admin_id = $this->session->userdata('admin_id');
      $data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
      $main_pass=$data['user_info']->user_password;
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
              $this->db->where("user_id", $admin_id);  
              $this->db->update("users", $data);  
              $this->session->set_flashdata('msg', '<p class="alert alert-success">Password Update Successfully</p>');
              redirect('dashboard_admin/password_change','location');
          }
          else 
          {
              $this->session->set_flashdata('msg', '<p class="alert alert-danger">Password Does not match</p>');
              redirect('dashboard_admin/password_change','location');
          }
      }
      else 
      {
          $this->session->set_flashdata('msg', '<p class="alert alert-danger">Old password is incorrect</p>');
          redirect('dashboard_admin/password_change','location');
      }
   }
   public function see_own_profile()
   {
      $data['active_nav'] = "see_own_profile";
      $admin_id = $this->session->userdata('admin_id');
      $data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/view_profile','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function change_settings()
   {
      $data['active_nav'] = "see_own_profile";
      $admin_id = $this->session->userdata('admin_id');
      $data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
      $data['settings']=$this->db->where('id',$admin_id)->get('settings')->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content']=$this->load->view('backend/admin/dashboard/settings','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function update_settings()
   {
      $data['active_nav'] = "dashboard";
      $admin_id = $this->session->userdata('admin_id');
       $data = array(
            'meeting_join_info' =>  trim($this->input->post('meeting_join_info')),
            'meeting_cancel_info' => trim($this->input->post('meeting_cancel_info')),
          );
      $this->db->where("id", $admin_id);  
      $this->db->update("settings", $data);
      redirect('dashboard_admin/change_settings','location');
   }
   public function add_slider()
   {
      $data['active_nav'] = "add_slider";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/work_slider/add',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_slider()
   {
      $data['active_nav'] = "add_slider";
      if($_FILES['slider_image']['size']>2097152)
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-warning">File size is so much large</p>');
             redirect('dashboard_admin/add_slider','location');
        }
      else 
        {
            $file_path="./assets/images/";
            $logo_path = $this->input->post('logo_path');
            if($_FILES['slider_image']['name'])
            {
                $this->load->library('backend');
                $logo_path = $this->backend->image_upload('slider_image',$file_path);  
            }
          $data = array(
                'slider_image' => $logo_path,
            );
          $this->Common->set_data("work_slider", $data);
          $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
          redirect('dashboard_admin/slider_list','location');
        }
     
   }
   public function slider_list()
      {
          $data['active_nav'] = "slider_list";
          $data['work_slider'] = $this->Common->get_data_sort_order('work_slider','slider_id','asc');
          $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
          $data['main_content'] = $this->load->view('backend/admin/work_slider/list',$data,TRUE);
          $this->load->view('backend/admin/layout',$data);
      }
  public function delete_slider($slider_id)
      {
        $this->Common->delete_data("work_slider",'slider_id',$slider_id);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
        redirect('dashboard_admin/slider_list','location');
      }
  public function update_slider($slider_id)
      {
          $file_path="./assets/images/";
          $logo_path = $this->input->post('slider_image');
            if($_FILES['slider_image']['name'])
              {
                  unlink($file_path.$this->input->post('logo_path'));
                  $this->load->library('backend');
                  $logo_path = $this->backend->image_upload('slider_image',$file_path);  
              }
            $data = array(
                  'slider_image' => $logo_path,
              );
            $this->db->where("slider_id", $slider_id);  
            $this->db->update("work_slider", $data);
            $this->session->set_flashdata('msg', '<p class="alert alert-success">Update Successfully</p>');
            redirect('dashboard_admin/slider_list','location');
      }
  public function edit_slider($slider_id)
      {
          $data['active_nav'] = "edit_work_slider";
          $data['work_slider'] = $this->db->where("slider_id",$slider_id)->get("work_slider")->row();
          $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
          $data['main_content'] = $this->load->view('backend/admin/work_slider/edit',$data,TRUE);
          $this->load->view('backend/admin/layout',$data);
      }
   
   public function add_meeting()
   {
      $data['active_nav']="add_meeting";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/add_meeting','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_meeting()
   {

      $data = array(
            'meeting_type' => trim($this->input->post('meeting_type')),
            'meeting_title' => trim($this->input->post('meeting_title')),
            'meeting_date' => trim($this->input->post('meeting_date')),
            'meeting_time' => trim($this->input->post('meeting_time')),
        );
      //$this->Common->set_data("meeting_list", $data);
      $this->db->insert('meeting_list', $data);
      $insert_id = $this->db->insert_id();
      $meeting_type=trim($this->input->post('meeting_type'));
      $meeting_title=trim($this->input->post('meeting_title'));
      $meeting_time=trim($this->input->post('meeting_time'));
      $meeting_date=trim($this->input->post('meeting_date'));
      if($meeting_type=="AC")
      {
        $teacherList= $this->Common->get_data_sort_order('teachers','teacher_id','asc')->result();
        $date=new DateTime();
        $settings=$this->db->where('id',1)->get('settings')->row();
        $notice_subject="New Meeting (AC) "." (".$meeting_title.")";
        $notice_description=$settings->meeting_join_info." Time:".$meeting_time." (".$meeting_date.")";
        $user_info=$this->db->where('user_id',1)->get('users')->row();
        foreach ($teacherList as $row) 
        {
          $data1 = array(
                'user_email' => $row->teacher_email,
                'notice_subject' => $notice_subject,
                'notice_description' => $notice_description,
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
          $meetingMemberList=array(
            'meeting_id'=> $insert_id,
            'teacher_email'=> $row->teacher_email
          );
          $this->Common->set_data("notices", $data1);
          $this->Common->set_data("meeting_member_list", $meetingMemberList);
        }
      }

      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/add_meeting','location');
   }
   public function meeting_list()
   {
      $data['active_nav'] = "meeting_list";
      $data['meeting_list'] = $this->Common->get_data_sort_order('meeting_list','meeting_date','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/meeting_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_meeting($meeting_id)
   {
      $data['active_nav'] = "edit_meeting";
      $data['meeting_list'] = $this->db->where("meeting_id",$meeting_id)->get("meeting_list")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/edit_meeting',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_meeting($meeting_id)
   {
      $this->Common->delete_data("meeting_list",'meeting_id',$meeting_id);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/meeting_list','location');
   }
   public function update_meeting($meeting_id)
   {
      $data = array(
            'meeting_type' => trim($this->input->post('meeting_type')),
            'meeting_title' => trim($this->input->post('meeting_title')),
            'meeting_date' => trim($this->input->post('meeting_date')),
            'meeting_time' => trim($this->input->post('meeting_time')),
        );
      $this->db->where("meeting_id", $meeting_id);  
      $this->db->update("meeting_list", $data);  
      redirect('dashboard_admin/meeting_list','location');
   }
   public function add_meeting_member($meeting_id)
   {
      $data['active_nav']="meeting_list";
      $data['teacher_list'] = $this->Common->get_data_sort_order('teachers','teacher_id','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['meeting_id']=$meeting_id;
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/add_meeting_member',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_meeting_member($meeting_id)
   {
      $this->Common->delete_data("meeting_member_list",'meeting_id',$meeting_id);
      foreach($_POST['id'] as $key=>$item)
      {
        $data = array(
            'meeting_id' => $meeting_id,
            'teacher_email' => $item,
        );
      $this->db->select("*");
      $this->db->from("meeting_member_list");
      $this->db->where('meeting_id',$meeting_id);
      $this->db->where('teacher_email',$item);
      $this->result = $this->db->get();
      if($this->result->num_rows() > 0)
       {
       } 
      else 
      {
        $this->Common->set_data("meeting_member_list", $data);
        $meeting_list=$this->db->where('meeting_id',$meeting_id)->get('meeting_list')->row();
        $settings=$this->db->where('id',1)->get('settings')->row();
        $notice_subject="New Meeting"." (".$meeting_list->meeting_title.")";
        $notice_description=$settings->meeting_join_info." Time:".$meeting_list->meeting_time." (".$meeting_list->meeting_date.")";
        $user_info=$this->db->where('user_id',1)->get('users')->row();
        $date=new DateTime();
        $noticeData = array(
              'user_email' => $item,
              'notice_subject' => $notice_subject,
              'notice_description' => $notice_description,
              'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
               'notice_sender'=>trim($user_info->user_name),
          );
          $this->Common->set_data("notices", $noticeData);
      }
        
      };
      $data['active_nav'] = "meeting_list";
      $data['meeting_list'] = $this->Common->get_data_sort_order('meeting_list','meeting_date','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/meeting_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function ac_meeting_list()
   {
      $data['active_nav'] = "ac_meeting_list";
      $data['meeting_list'] = $this->db->where("meeting_type",'AC')->get("meeting_list");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/ac_meeting/ac_meeting_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function ac_meeting_agenda()
   {
      $data['active_nav'] = "ac_meeting_agenda";
      $data['meeting_list'] = $this->db->where("meeting_type",'AC')->get("meeting_list");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/ac_meeting/ac_meeting_agenda',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function add_ac_agenda($meeting_id)
   {
      $data['active_nav'] = "ac_meeting_agenda";
      $data['meeting_list'] = $this->db->where("meeting_id",$meeting_id)->get("meeting_list")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/ac_meeting/add_ac_agenda',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_ac_agenda($meeting_id)
   {
      $this->db->select("*");
      $this->db->from("meeting_agenda");
      $this->db->where('meeting_id',$meeting_id);
      $this->result = $this->db->get();
      $data = array(
            'meeting_id' => $meeting_id,
            'meeting_title'=>trim($this->input->post('meeting_title')),
            'agenda_list'=>trim($this->input->post('agenda_list')),
        );
      if($this->result->num_rows() > 0)
      {
        $this->db->where("meeting_id", $meeting_id);  
        $this->db->update("meeting_agenda", $data);
      } 
      else 
      {
       $this->Common->set_data("meeting_agenda", $data);
      }
      $data['active_nav'] = "ac_meeting_agenda";
      $data['meeting_agenda'] = $this->db->get("meeting_agenda");
      redirect('dashboard_admin/meeting_list','location');
   }
   public function ac_meeting_cancel()
   {
      $data['active_nav'] = "ac_meeting_cancel";
      $data['meeting_list'] = $this->db->where("meeting_type",'AC')->get("meeting_list");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/ac_meeting/ac_meeting_cancel',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function pc_meeting_cancel()
   {
      $data['active_nav'] = "pc_meeting_cancel";
      $data['meeting_list'] = $this->db->where("meeting_type",'PC')->get("meeting_list");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/pc_meeting/pc_meeting_cancel',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   // public function ac_meeting_cancel_confirm($meeting_id)
   // {
   //    $data['active_nav']="meeting_list";
   //    $data['meeting_list'] = $this->db->where("meeting_id",$meeting_id)->get("meeting_list")->row();
   //    $data['meeting_id']=$meeting_id;
   //    $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
   //    $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/cancel_meeting',$data,TRUE);
   //    $this->load->view('backend/admin/layout',$data);
   // }
   public function add_pc_agenda($meeting_id)
   {
      $data['active_nav'] = "pc_meeting_agenda";
      $data['meeting_list'] = $this->db->where("meeting_id",$meeting_id)->get("meeting_list")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/pc_meeting/add_pc_agenda',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_pc_agenda($meeting_id)
   {
      
      $this->db->select("*");
      $this->db->from("meeting_agenda");
      $this->db->where('meeting_id',$meeting_id);
      $this->result = $this->db->get();
      $data = array(
            'meeting_id' => $meeting_id,
            'meeting_title'=>trim($this->input->post('meeting_title')),
            'agenda_list'=>trim($this->input->post('agenda_list')),
        );
      if($this->result->num_rows() > 0)
      {
        $this->db->where("meeting_id", $meeting_id);  
        $this->db->update("meeting_agenda", $data);
      } 
      else 
      {
       $this->Common->set_data("meeting_agenda", $data);
      }
      $data['active_nav'] = "pc_meeting_agenda";
      $data['meeting_agenda'] = $this->db->get("meeting_agenda");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/pc_meeting/pc_meeting_agenda',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function cancel_meeting($meeting_id)
   {
      $data['active_nav']="meeting_list";
      $data['meeting_list'] = $this->db->where("meeting_id",$meeting_id)->get("meeting_list")->row();
      $data['meeting_id']=$meeting_id;
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/cancel_meeting',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function pc_meeting_list()
   {
      $data['active_nav'] = "pc_meeting_list";
      $data['meeting_list'] = $this->db->where("meeting_type",'PC')->get("meeting_list");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/pc_meeting/pc_meeting_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
    public function pc_meeting_agenda()
   {
      $data['active_nav'] = "pc_meeting_agenda";
      $data['meeting_list'] = $this->db->where("meeting_type",'PC')->get("meeting_list");
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/meeting/pc_meeting/pc_meeting_agenda',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function update_meeting_shedule($meeting_id)
   {
      $data = array(
            'meeting_title'=>trim($this->input->post('meeting_title')),
            'meeting_date'=>trim($this->input->post('meeting_date')),
            'meeting_time'=>trim($this->input->post('meeting_time')),
        );
      $user_info=$this->db->where('user_id',1)->get('users')->row();
      $settings=$this->db->where('id',1)->get('settings')->row();
      $this->db->where("meeting_id", $meeting_id);  
      $this->db->update("meeting_list", $data);
      $meeting_list= $this->db->where("meeting_id",$meeting_id)->get("meeting_list")->row();
      $notice_subject="Meeting Cancel"." (".$meeting_list->meeting_title.")";
      $notice_description=$settings->meeting_cancel_info." ".trim($this->input->post('meeting_time'))." (".trim($this->input->post('meeting_date')).")";
     
      if($meeting_list->meeting_type==="AC")
      {
        $meeting_member_list=$this->db->get('teachers')->result();
        foreach ($meeting_member_list as $row) 
        {
          $date=new DateTime();
          $data = array(
                'user_email' => $row->teacher_email,
                'notice_subject' => $notice_subject,
                'notice_description' => $notice_description,
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
          $this->Common->set_data("notices", $data);
        }
      }
      else
      {
        $meeting_member_list = $this->db->where("meeting_id",$meeting_id)->get("meeting_member_list")->result();
        foreach ($meeting_member_list as $row) 
        {
          $date=new DateTime();
          $data = array(
                'user_email' => $row->teacher_email,
                'notice_subject' => $notice_subject,
                'notice_description' => $notice_description,
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
          $this->Common->set_data("notices", $data);
        }
      }
      redirect('dashboard_admin/meeting_list','location');
   }
   ///assign teacher start
   public function assign_teacher1()
   {
      $data['active_nav'] = "assign_teacher1";
      $admin_id = $this->session->userdata('admin_id');
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/assign_teacher1','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function assign_teacher()
   {
      $data['active_nav'] = "assign_teacher1";
      $session=$this->input->post('session');
      $data['session']=$session;
      $data['course_list'] = $this->db->where("session",$session)->order_by("course_no",'asc')->get('session_class')->result();
      $data['teacher_list'] = $this->Common->get_data_sort_order('teachers','teacher_id','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/assign_teacher','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_assign_teacher($session)
   {

      $data = array(
            'session' => $session,
            'class_course' => trim($this->input->post('class_course')),
            'teacher_email' => trim($this->input->post('teacher_email')),
            'class_date' => trim($this->input->post('class_date')),
            'class_time' => trim($this->input->post('class_time')),
        );
      $this->Common->set_data("class_routine", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/assign_teacher1','location');
   }
   public function assign_teacher_list1()
   {
      $data['active_nav'] = "assign_teacher_list1";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/submit_session',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function assign_teacher_list2()
   {
      $data['active_nav'] = "assign_teacher_list1";
      $session=$this->input->post('session');
      $data['session']=$session;
      $data['session_class_list'] = $this->db->where('session',$session)->order_by('class_course','asc')->get('class_routine');
      $data['teacher_list'] = $this->db->get('teachers');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/assign_teacher_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_assign_teacher($class_id)
   {
      $data['active_nav'] = "edit_assign_teacher";
      $data['assign_teacher_list'] = $this->db->where("class_id",$class_id)->get("class_routine")->row();
      $session=$data['assign_teacher_list']->session;
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['session_course_list']=$this->db->where('session',$session)->get('session_class')->result();
       $data['teacher_list'] = $this->db->get('teachers')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/edit_assign_teacher',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_assign_teacher($class_id)
   {
      $this->Common->delete_data("class_routine",'class_id',$class_id);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/assign_teacher_list1','location');
   }
   public function update_assign_teacher($class_id)
   {
      $data = array(
            'session' => trim($this->input->post('session')),
            'class_course' => trim($this->input->post('class_course')),
            'teacher_email' => trim($this->input->post('teacher_email')),
            'class_date' => trim($this->input->post('class_date')),
            'class_time' => trim($this->input->post('class_time')),
        );
      $this->db->where("class_id", $class_id);  
      $this->db->update("class_routine", $data);  
      redirect('dashboard_admin/assign_teacher_list1','location');
   }
   ///assign teacher end

   ///course_assign_start;
   public function assign_course()
   {
      $data['active_nav'] = "assign_course";
      $admin_id = $this->session->userdata('admin_id');
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/assign_course','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_assign_course()
   {
      $data = array(
            'session' => trim($this->input->post('session')),
            'course_no' => trim($this->input->post('course_no')),
        );
      $this->Common->set_data("session_class", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/assign_course','location');
   }
   public function assign_course_list()
   {
      $data['active_nav'] = "assign_course_list";
      $data['assign_course_list'] = $this->Common->get_data_sort_order('session_class','course_id','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/assign_course_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_assign_course($course_id)
   {
      $data['active_nav'] = "edit_assign_course";
      $data['assign_course_list'] = $this->db->where("course_id",$course_id)->get("session_class")->row();
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/edit_assign_course',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_assign_course($course_id)
   {
      $this->Common->delete_data("session_class",'course_id',$course_id);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/assign_course_list','location');
   }
   public function update_assign_course($course_id)
   {
      $data = array(
            'session' => trim($this->input->post('session')),
            'course_no' => trim($this->input->post('course_no')),
        );
      $this->db->where("course_id", $course_id);  
      $this->db->update("session_class", $data);  
      redirect('dashboard_admin/assign_course_list','location');
   }
   ///course_assign_end;

   ///routine_assign_start
   public function class_routine_list1()
   {
      $data['active_nav'] = "class_routine_list1";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/submit_session_routine','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function class_routine_list2()
   {

      $data['active_nav'] = "class_routine_list1";
      $session=trim($this->input->post('session'));
      $data['class_routine']=$this->db->where('session',$session)->get('class_routine');
      $data['session']=$session;
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/class/class_routine','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   ///routine_assign_end
   ///exam_routine_start
   public function add_exam_routine()
   {
      $data['active_nav'] = "add_exam_routine";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/exam/submit_session','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
    public function add_exam_routine2()
   {
      $session=trim($this->input->post('session'));
      $data['session']=$session;
      $data['active_nav'] = "add_exam_routine";
      $data['course_list'] = $this->db->where("session",$session)->order_by("course_no",'asc')->get('session_class')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/exam/add_exam','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_exam()
   {
      $session=trim($this->input->post('session'));
      $data = array(
            'session' => trim($this->input->post('session')),
            'exam_course' => trim($this->input->post('exam_course')),
            'exam_date' => trim($this->input->post('exam_date')),
            'exam_start_time' => trim($this->input->post('exam_start_time')),
            'exam_end_time' => trim($this->input->post('exam_end_time')),
        );
      $this->Common->set_data("exam_routine", $data);
      $data['session']=$session;
      $data['active_nav'] = "add_exam_routine";
      $data['course_list'] = $this->db->where("session",$session)->order_by("course_no",'asc')->get('session_class')->result();
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/exam/add_exam','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function see_exam_list1()
   {
      $data['active_nav'] = "see_exam_list1";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/exam/submit_session_exam','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function see_exam_list2()
   {
      $data['active_nav'] = "see_exam_list1";
      $session=trim($this->input->post('session'));
      $data['session']=$session;
      $data['exam_list'] = $this->db->where("session",$session)->order_by("exam_course",'asc')->get('exam_routine');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/exam/exam_list','$data',TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_exam($exam_id)
   {
      $data['active_nav'] = "edit_exam";
      $data['exam_routine'] = $this->db->where("exam_id",$exam_id)->order_by("exam_course",'asc')->get('exam_routine')->row();
      $session=$data['exam_routine']->session;
      $data['course_list'] = $this->db->where("session",$session)->order_by("course_no",'asc')->get('session_class')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/exam/edit_exam',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_exam($exam_id)
   {
      $this->Common->delete_data("exam_routine",'exam_id',$exam_id);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/see_exam_list1','location');
   }
   public function update_exam($exam_id)
   {
      $data = array(
            'session' => trim($this->input->post('session')),
            'exam_course' => trim($this->input->post('exam_course')),
            'exam_date' => trim($this->input->post('exam_date')),
            'exam_start_time' => trim($this->input->post('exam_start_time')),
            'exam_end_time' => trim($this->input->post('exam_end_time')),
        );
      $this->db->where("exam_id", $exam_id);  
      $this->db->update("exam_routine", $data);  
      redirect('dashboard_admin/see_exam_list1','location');
   }
   ///exam_routine_end
   public function add_session()
   {
      $data['active_nav'] = "add_session";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/session/add_session',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_session()
   {
      $data = array(
            'session' => trim($this->input->post('session')),
        );
      $this->Common->set_data("session", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/session_list','location');
   }
   public function session_list()
   {
      $data['active_nav'] = "session_list";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/session/session_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_session($session_id)
   {
      $data['active_nav'] = "edit_session";
      $data['session_list'] = $this->db->where("session_id",$session_id)->get("session")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/session/edit_session',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_session($session_id)
   {
      $session_list= $this->db->where("session_id",$session_id)->get("session")->row();
      $this->Common->delete_data("session",'session_id',$session_id);
      $this->Common->delete_data("students",'student_session',$session_list->session);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/session_list','location');
   }
   public function update_session($session_id)
   {
      $data = array(
            'session' => trim($this->input->post('session')),
        );
        $this->db->where("session_id", $session_id);  
        $this->db->update("session", $data);  
        redirect('dashboard_admin/session_list','location');
   }






   /* Book Crud*/
   public function addBook()
   {
      $data['active_nav'] = "add_book";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/book_store/add_book',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function saveBook()
   {
      $data = array(
            'BookName' => trim($this->input->post('BookName')),
            'BookWriterName' => trim($this->input->post('BookWriterName')),
            'NumberOfTotalCopy' => trim($this->input->post('NumberOfTotalCopy')),
            'NumberOfRemainingCopy' => trim($this->input->post('NumberOfTotalCopy')),
      );
      $this->Common->set_data("book_list", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/getBookList','location');
   }
   public function getBookList()
   {
      $data['active_nav'] = "book_list";
      $data['book_list'] = $this->Common->get_data_sort_order('book_list','BookId','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/book_store/book_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function editBook($BookId)
   {
      $data['active_nav'] = "edit_book";
      $data['book_list'] = $this->db->where("BookId",$BookId)->get("book_list")->row();
      $data['book_list']->PreviousTotalCopy = $data['book_list']->NumberOfTotalCopy;
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/book_store/edit_book',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function deleteBook($BookId)
   {
      $book_list= $this->db->where("BookId",$BookId)->get("book_list")->row();
      $this->Common->delete_data("book_list",'BookId',$BookId);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/getBookList','location');
   }
   public function updateBook($BookId)
   {
      $data = array(
         'BookName' => trim($this->input->post('BookName')),
         'BookWriterName' => trim($this->input->post('BookWriterName')),
         'NumberOfTotalCopy' => trim($this->input->post('NumberOfTotalCopy')),
         'NumberOfRemainingCopy' => trim($this->input->post('NumberOfRemainingCopy')),
         'PreviousTotalCopy' => trim($this->input->post('PreviousTotalCopy')),
      );
      $differenceOfRemainingCopy = $data['NumberOfTotalCopy']- $data['PreviousTotalCopy'];
      $data['NumberOfRemainingCopy']+= $differenceOfRemainingCopy;
      $this->db->where("BookId", $BookId);  
      $this->db->update("book_list", $data);  
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Update Successfully</p>');
      redirect('dashboard_admin/getBookList','location');
   }
   public function assignBook($BookId)
   {
      $data = array(
            'session' => trim($this->input->post('session')),
      );
      $data['active_nav'] = "book_list";
      $data['assignBookInformation'] = $this->db->where("BookId",$BookId)->get("book_list")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/book_store/assign_book',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function saveAssignBook(){
      $data = array(
         'BookId' => trim($this->input->post('BookId')),
         'BookName' => trim($this->input->post('BookName')),
         'BookWriterName' => trim($this->input->post('BookWriterName')),
         'StudentId' => trim($this->input->post('StudentId')),
         'StudentName' => trim($this->input->post('StudentName')),
         'BookIssueDate' => trim($this->input->post('BookIssueDate')),
         'BookReturnDate' => trim($this->input->post('BookReturnDate')),
         'IsReturnBook' => trim($this->input->post('IsReturnBook')),
      );
      $BookId = trim($this->input->post('BookId'));
      $book_list= $this->db->where("BookId",$BookId)->get("book_list")->row();
      $book_list->NumberOfRemainingCopy-=1;
      /*Create new Entry for book assign*/
      $this->Common->set_data("book_assign_info", $data);
      /*Update Book List Info*/
      $this->updateBookListInfo($book_list, $BookId);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Assign Successfully</p>');
      redirect('dashboard_admin/getBookList','location');
      
   }

   public function updateBookListInfo($booklist, $BookId){
      $this->db->where("BookId", $BookId);  
      $this->db->update("book_list", $booklist);
      return;
   }
   public function updateAssignBookListInfo($assignedBooklist, $BookAssignId){
      $this->db->where("BookAssignId", $BookAssignId);  
      $this->db->update("book_assign_info", $assignedBooklist);
      return;
   }
   public function getAllAssignedBookList(){
      $data['active_nav'] = "assign_book_list";
      $data['assigned_book_list'] = $this->Common->get_data_sort_order_with_where('book_assign_info','BookAssignId','asc','IsReturnBook','false');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/book_store/assigned_book_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function unassignBook($BookAssignId){
      $assignedBookInfo= $this->db->where("BookAssignId",$BookAssignId)->get("book_assign_info")->row();
      $assignedBookInfo->IsReturnBook = true;
      $this->updateAssignBookListInfo($assignedBookInfo, $BookAssignId);
      
      $BookId = $assignedBookInfo->BookId;
      $book_list = $this->db->where("BookId",$BookId)->get("book_list")->row();
      $book_list->NumberOfRemainingCopy+=1;
      $this->updateBookListInfo($book_list, $BookId);
      $this->getAllAssignedBookList();
   }
   ///teacher->start
   public function add_teacher()
   {
      $data['active_nav'] = "add_teacher";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/add_teacher',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_teacher()
   {
            $file_path="./assets/images/";
            $logo_path = $this->input->post('logo_path');
            if($_FILES['teacher_image']['name'])
            {
                //unlink($file_path.$this->input->post('logo_path'));
                $this->load->library('backend');
                $logo_path = $this->backend->image_upload('teacher_image',$file_path);  
            }
      $data = array(
            'teacher_name' => trim($this->input->post('teacher_name')),
            'teacher_username' => trim($this->input->post('teacher_username')),
            'teacher_email' => trim($this->input->post('teacher_email')),
            'teacher_pass' => md5($this->input->post('teacher_pass')),
            'teacher_phone' => trim($this->input->post('teacher_phone')),
            'teacher_designation' => trim($this->input->post('teacher_designation')),
            'teacher_image' => $logo_path,
        );
      $this->Common->set_data("teachers", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/teacher_list','location');
      
   }
   public function teacher_list()
   {
      $data['active_nav'] = "teacher_list";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['teacher_list'] = $this->Common->get_data_sort_order('teachers','teacher_id','asc');
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/teacher_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_teacher($teacher_id)
   {
      $data['active_nav'] = "edit_teacher";
      $data['teacher_list'] = $this->db->where("teacher_id",$teacher_id)->get("teachers")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/edit_teacher',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_teacher($teacher_id)
   {
      $teacher_info=$this->db->where("teacher_id",$teacher_id)->get("teachers")->row();
      $this->Common->delete_data("teachers",'teacher_id',$teacher_id);
      $this->Common->delete_data("notices",'user_email',$teacher_info->teacher_email);
      $this->Common->delete_data("notices",'notice_sender',$teacher_info->teacher_name);
      $this->Common->delete_data("meeting_member_list",'teacher_email',$teacher_info->teacher_email);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/teacher_list','location');
   }
   public function update_teacher($teacher_id)
   {
      $file_path="./assets/images/";
     // $old_image = $this->input->post('teacher_old_image');
      $logo_path = $this->input->post('teacher_image');
      if($_FILES['teacher_image']['name'])
        {
            unlink($file_path.$this->input->post('logo_path'));
            $this->load->library('backend');
            $logo_path = $this->backend->image_upload('teacher_image',$file_path);  
        }
      $data = array(
            'teacher_name' => trim($this->input->post('teacher_name')),
            'teacher_username' => trim($this->input->post('teacher_username')),
            'teacher_email' => trim($this->input->post('teacher_email')),
            'teacher_pass' => md5($this->input->post('teacher_pass')),
            'teacher_phone' => trim($this->input->post('teacher_phone')),
            'teacher_designation' => trim($this->input->post('teacher_designation')),
            'teacher_image' => $logo_path,
        );
      $this->db->where("teacher_id", $teacher_id);  
      $this->db->update("teachers", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Update Successfully</p>');
      redirect('dashboard_admin/teacher_list','location');
   }
   ///teacher->end
   
   ///student->start
   public function add_graduate_student()
   {
      $data['active_nav'] = "add_graduate_student";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/add_graduate_student',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_graduate_student_profile()
   {
      $file_path="./assets/images/";
      $logo_path = $this->input->post('student_image');
      if($_FILES['student_image']['name'])
      {
          //unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend');
          $logo_path = $this->backend->image_upload('student_image',$file_path);  
      }
      $data = array(
            'student_name' => trim($this->input->post('student_name')),
            'student_username' => trim($this->input->post('student_username')),
            'student_session' => trim($this->input->post('student_session')),
            'student_email' => trim($this->input->post('student_email')),
            'student_pass' => md5($this->input->post('student_pass')),
            'student_roll' => $this->input->post('student_roll'),
            'student_phone' => trim($this->input->post('student_phone')),
            'student_image' => $logo_path,
        );
      $this->Common->set_data("students", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/student_list','location');
      
   }
   public function student_list()
   {
      $data['active_nav'] = "profile_list";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['student_list'] = $this->Common->get_data_sort_order('students','student_id','asc');
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/student_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_student($student_id)
   {
      $data['active_nav'] = "edit_student";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session','asc')->result();
      $data['student_list'] = $this->db->where("student_id",$student_id)->get("students")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/edit_student',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_student($student_id)
   {
    $student_info=$this->db->where("student_id",$student_id)->get("students")->row();
    $this->Common->delete_data("students",'student_id',$student_id);

    $this->Common->delete_data("notices",'user_email',$student_info->student_email);
    $this->Common->delete_data("notices",'notice_sender',$student_info->student_name);

    $this->Common->delete_data("applications",'application_sender_email',$student_info->student_email);
    $this->Common->delete_data("applications",'user_email',$student_info->student_email);

    $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
    redirect('dashboard_admin/student_list','location');
   }
   public function update_student($student_id)
   {
     $file_path="./assets/images/";
            $logo_path = $this->input->post('student_image');
            if($_FILES['student_image']['name'])
            {
                //unlink($file_path.$this->input->post('logo_path'));
                $this->load->library('backend');
                $logo_path = $this->backend->image_upload('student_image',$file_path);  
            }
      $data = array(
             'student_name' => trim($this->input->post('student_name')),
            'student_username' => trim($this->input->post('student_username')),
            'student_session' => trim($this->input->post('student_session')),
            'student_email' => trim($this->input->post('student_email')),
            'student_pass' => md5($this->input->post('student_pass')),
            'student_roll' => $this->input->post('student_roll'),
            'student_phone' => trim($this->input->post('student_phone')),
            'student_image' => $logo_path,
        );
      $this->db->where("student_id", $student_id);  
      $this->db->update("students", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Update Successfully</p>');
      redirect('dashboard_admin/add_graduate_student','location');
   }

    ///student->>end
    ///stuff->start
   public function add_stuff()
   {
      $data['active_nav'] = "add_stuff";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/add_stuff',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_stuff()
   {
      $file_path="./assets/images/";
      $logo_path = $this->input->post('stuff_image');
      if($_FILES['stuff_image']['name'])
      {
         //unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend');
          $logo_path = $this->backend->image_upload('stuff_image',$file_path);  
      }
      $data = array(
            'stuff_name' => trim($this->input->post('stuff_name')),
            'stuff_username' => trim($this->input->post('stuff_username')),
            'stuff_email' => trim($this->input->post('stuff_email')),
            'stuff_pass' => md5($this->input->post('stuff_pass')),
            'stuff_phone' => trim($this->input->post('stuff_phone')),
            'stuff_image' => $logo_path,
      );
      $this->Common->set_data("stuffs", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Insert Successfully</p>');
      redirect('dashboard_admin/stuff_list','location');
      
   }
   public function stuff_list()
   {
      $data['active_nav'] = "profile_list";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['stuff_list'] = $this->Common->get_data_sort_order('stuffs','stuff_id','asc');
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/stuff_list',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function edit_stuff($stuff_id)
   {
      $data['active_nav'] = "edit_profile";
      $data['stuff_list'] = $this->db->where("stuff_id",$stuff_id)->get("stuffs")->row();
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/profile/edit_stuff',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function delete_stuff($stuff_id)
   {
    $stuff_info=$this->db->where("stuff_id",$stuff_id)->get("stuffs")->row();
    $this->Common->delete_data("stuffs",'stuff_id',$stuff_id);

    $this->Common->delete_data("notices",'user_email',$stuff_info->stuff_email);
    $this->Common->delete_data("notices",'notice_sender',$stuff_info->stuff_name);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Delete Successfully</p>');
      redirect('dashboard_admin/stuff_list','location');
   }
   public function update_stuff($stuff_id)
   {
      $file_path="./assets/images/";
      $logo_path = $this->input->post('stuff_image');
      if($_FILES['stuff_image']['name'])
      {
          //unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend');
          $logo_path = $this->backend->image_upload('stuff_image',$file_path);  
      }
      $data = array(
             'stuff_name' => trim($this->input->post('stuff_name')),
            'stuff_username' => trim($this->input->post('stuff_username')),
            'stuff_email' => trim($this->input->post('stuff_email')),
            'stuff_pass' => md5($this->input->post('stuff_pass')),
            'stuff_phone' => trim($this->input->post('stuff_phone')),
            'stuff_image' => $logo_path,
        );
      $this->db->where("stuff_id", $stuff_id);  
      $this->db->update("stuffs", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Update Successfully</p>');
      redirect('dashboard_admin/add_stuff','location');
   }
   public function send_application()
   {
      $data['active_nav'] = "send_application";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/application/send_application',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function save_application()
   {
      $date=new DateTime();
      $user_info=$this->db->where('user_id',1)->get('users')->row();
      $data = array(
        'user_email' => trim($this->input->post('application_receiver_email')),
        'application_subject' => trim($this->input->post('application_subject')),
        'application_description' => trim($this->input->post('application_description')),
        'application_date'=>trim($date->format('Y-m-d:H:i:s')),
        'application_sender'=>trim($user_info->user_name),
        'application_sender_email'=>trim($user_info->user_email),
        );
      $this->Common->set_data("applications", $data);
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_admin/send_application','location');
   }
   public function view_application()
   {
      $data['active_nav'] = "view_application";
      $admin_id = $this->session->userdata('admin_id');
      $data['user_info']=$this->db->where('user_id',$admin_id)->get('users')->row();
      $data['application_list']=$this->db->where('user_email',$data['user_info']->user_email)->order_by("application_date",'desc')->get('applications');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/application/view_application',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function send_notice_teacher()
   {
      $data['active_nav'] = "send_notice_teacher";
      $data['teacher_list'] = $this->Common->get_data_sort_order('teachers','teacher_id','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/notice/send_notice_teacher',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function send_notice_student()
   {
      $data['active_nav'] = "send_notice_teacher";
      $data['session_list'] = $this->Common->get_data_sort_order('session','session_id','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/notice/send_notice_student',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function send_notice_stuff()
   {
      $data['active_nav'] = "send_notice_teacher";
      $data['stuff_list']=$this->db->order_by("stuff_id",'asc')->get('stuffs');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/notice/send_notice_stuff',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function send_notice_all()
   {
      $data['active_nav'] = "send_notice_all";
      $data['student_list'] = $this->Common->get_data_sort_order('students','student_id','asc');
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/admin/dashboard/notice/send_notice_all',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);

   }
   public function save_notice_teacher()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $user_info=$this->db->where('user_id',1)->get('users')->row();
        $data = array(
              'user_email' => $item,
              'notice_subject' => trim($this->input->post('notice_subject')),
              'notice_description' => trim($this->input->post('notice_description')),
              'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
               'notice_sender'=>trim($user_info->user_name),
          );
        $this->Common->set_data("notices", $data);
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_admin/send_notice_teacher','location');
   }
   public function save_notice_stuff()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $user_info=$this->db->where('user_id',1)->get('users')->row();
        $data = array(
              'user_email' => $item,
              'notice_subject' => trim($this->input->post('notice_subject')),
              'notice_description' => trim($this->input->post('notice_description')),
              'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
               'notice_sender'=>trim($user_info->user_name),
          );
        $this->Common->set_data("notices", $data);
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_admin/send_notice_stuff','location');
   }
   public function save_notice_student()
   {
      foreach($_POST['id'] as $key=>$item)
      {
        $date=new DateTime();
        $user_info=$this->db->where('user_id',1)->get('users')->row();
        $student_list=$this->db->where('student_session',$item)->get('students')->result();
        foreach ($student_list as $row) 
        {
          $data = array(
                'user_email' => $row->student_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
          $this->Common->set_data("notices", $data);
        }
      }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_admin/send_notice_student','location');
   }
   public function save_notice_all()
   {
    $teacher_list= $this->Common->get_data_sort_order('teachers','teacher_id','asc')->result();
      $student_list= $this->Common->get_data_sort_order('students','student_id','asc')->result();
      $stuff_list = $this->Common->get_data_sort_order('stuffs','stuff_id','asc')->result();
      $date=new DateTime();
      $user_info=$this->db->where('user_id',1)->get('users')->row();
      foreach ($student_list as $row) 
        {
          $data = array(
                'user_email' => $row->student_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
          $this->Common->set_data("notices", $data);
        }
        $date=new DateTime();
        $data['user_info']=$this->db->where('user_id',1)->get('users')->row();
        foreach ($teacher_list as $row) 
        {
          $data = array(
                'user_email' => $row->teacher_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
          $this->Common->set_data("notices", $data);
        }
        $date=new DateTime();
      $data['user_info']=$this->db->where('user_id',1)->get('users')->row();
        foreach ($stuff_list as $row) 
        {
          $data = array(
                'user_email' => $row->stuff_email,
                'notice_subject' => trim($this->input->post('notice_subject')),
                'notice_description' => trim($this->input->post('notice_description')),
                'notice_date'=>trim($date->format('Y-m-d:H:i:s')),
                 'notice_sender'=>trim($user_info->user_name),
            );
         $this->Common->set_data("notices", $data);
        }
      $this->session->set_flashdata('msg', '<p class="alert alert-success">Send Successfully</p>');
      redirect('dashboard_admin/','location');
   }
   public function see_sent_notice()
   {
      $data['active_nav'] = "see_sent_notice";
      $user_info=$this->db->where('user_id',1)->get('users')->row();
      $data['notice_list']=$this->db->where('notice_sender',$user_info->user_name)->order_by("notice_date",'desc')->get('notices');
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/notice/see_notice_list',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
   }
   ///staff->end
}