<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_stuff extends CI_Controller 
{
    public function __construct() 
      {
          parent::__construct();
      }
    public function index()
     {  
        $stuff_id = $this->session->userdata('stuff_id');
        $data['stuff_info']=$this->db->where('stuff_id',$stuff_id)->get('stuffs')->row();
        $data['active_nav'] = "dashboard";
        $data['side_menu']=$this->load->view('backend/stuff/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/stuff/dashboard/dashboard',$data,TRUE);

        $this->load->view('backend/stuff/layout',$data);
     }
    public function password_change()
   {
      $data['active_nav'] = "dashboard";
      $data['side_menu']=$this->load->view('backend/stuff/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/stuff/dashboard/password_change',$data,TRUE);
      $this->load->view('backend/stuff/layout',$data);
   }
   public function update_password()
   {
      $stuff_id = $this->session->userdata('stuff_id');
      $data['stuff_indo']=$this->db->where('stuff_id',$stuff_id)->get('stuffs')->row();
      $main_pass=$data['stuff_indo']->user_password;
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
              $this->db->where("stuff_id", $stuff_id);  
              $this->db->update("stuffs", $data);  
              $this->session->set_flashdata('msg', '<p class="alert alert-success">Password Update Successfully</p>');
              redirect('dashboard_stuff/password_change','location');
          }
          else 
          {
              $this->session->set_flashdata('msg', '<p class="alert alert-danger">Password Does not match</p>');
              redirect('dashboard_stuff/password_change','location');
          }
      }
      else 
      {
          $this->session->set_flashdata('msg', '<p class="alert alert-danger">Old password is incorrect</p>');
          redirect('dashboard_stuff/password_change','location');
      }
   }
    public function see_notice()
    {
        $data['active_nav'] = "see_notice";
        $stuff_id = $this->session->userdata('stuff_id');
        $data['stuff_info']=$this->db->where('stuff_id',$stuff_id)->get('stuffs')->row();
        $data['notice_list']=$this->db->where('user_email',$data['stuff_info']->stuff_email)->get('notices');
        $data['side_menu']=$this->load->view('backend/stuff/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/stuff/dashboard/notice_list',$data,TRUE);
        $this->load->view('backend/stuff/layout',$data);
    }
    public function mark_notice($notice_id)
    {
        $data['active_nav'] = "see_notice";
        $this->db->set('notice_status','1')->where('notice_id',$notice_id);
        $this->db->update('notices');
        $student_id = $this->session->userdata('stuff_id');
        $data['stuff_info']=$this->db->where('stuff_id',$student_id)->get('stuffs')->row();
        $data['notice_list']=$this->db->where('user_email',$data['stuff_info']->stuff_email)->order_by("notice_date",'desc')->get('notices');
        $data['side_menu']=$this->load->view('backend/stuff/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/stuff/dashboard/notice_list',$data,TRUE);
        $this->load->view('backend/stuff/layout',$data);
    }
    public function unmark_notice($notice_id)
    {
      $data['active_nav'] = "see_notice";
      $this->db->set('notice_status','0')->where('notice_id',$notice_id);
      $this->db->update('notices');
      $student_id = $this->session->userdata('stuff_id');
      $data['stuff_info']=$this->db->where('stuff_id',$student_id)->get('stuffs')->row();
      $data['notice_list']=$this->db->where('user_email',$data['stuff_info']->stuff_email)->order_by("notice_date",'desc')->get('notices');
      $data['side_menu']=$this->load->view('backend/stuff/side_menu',$data,TRUE);
      $data['main_content'] = $this->load->view('backend/stuff/dashboard/notice_list',$data,TRUE);
      $this->load->view('backend/stuff/layout',$data);
    }
    public function see_own_profile()
     {
        $data['active_nav'] = "see_own_profile";
        $stuff_id = $this->session->userdata('stuff_id');
        $data['stuff_info']=$this->db->where('stuff_id',$stuff_id)->get('stuffs')->row();
        $data['side_menu']=$this->load->view('backend/stuff/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/stuff/dashboard/view_profile','$data',TRUE);
        $this->load->view('backend/stuff/layout',$data);
     }
}