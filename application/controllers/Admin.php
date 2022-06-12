<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if(!isset($admin_id))
        {
            redirect('Home');
        }
    }
   public function index()
   {  
      $data['active_nav'] = "dashboard";
      $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
      $admin_id = $this->session->userdata('admin_id');
      $data['profile_info']=$this->db->where('profile_id',$admin_id)->get('profile');
      $data['main_content'] = $this->load->view('backend/admin/dashboard/dashboard',$data,TRUE);
      $this->load->view('backend/admin/layout',$data);
   }
   public function website_settings()
   {
       $data['settings'] = $this->Common->get_single_row_information('settings','id',1);
       // echo $data['settings']->email;
        $data['active_nav'] = "website_settings";
    
       $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
       $data['main_content'] = $this->load->view('backend/admin/dashboard/settings',$data,TRUE);
       $this->load->view('backend/admin/layout',$data);
   }
   public function checkout_settings()
   {
        $data['active_nav'] = "checkout_settings";
        $data['item_option']=$this->db->get('item_option');
        $this->db->select('final_orders.*,customer.f_name,customer.l_name,customer.phone');
         $this->db->from('final_orders');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $data['checkout_settings'] = $this->db->order_by('order_status','DESC')->get()->result();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/checkout',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
   }
    public function edit_checkout($id)
    {
        $data['active_nav'] = "edit_checkout";
        $data['item_option']=$this->db->get('item_option');
        $this->db->select('final_orders.*,customer.*');
        $this->db->from('final_orders');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $this->db->where('final_orders.id',$id);
        $data['final_orders'] = $this->db->get()->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/edit_checkout',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function view_checkout($id)
    {   
        $data['active_nav'] = "view_checkout";
        $data['item_option']=$this->db->get('item_option');
        $this->db->select('final_orders.*,customer.f_name,customer.l_name');
        $this->db->from('final_orders');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $this->db->where('final_orders.id',$id);
        $data['final_orders'] = $this->db->get()->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu','$data',TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/checkout',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function update_checkout($id)
    {
        $data['active_nav'] = "update_checkout";
        $data = array(
            'order_status' => trim($this->input->post('order_status')),
        );
        $this->db->where("id", $id);  
        $this->db->update("final_orders", $data);  
        redirect('dashboard/checkout','location');
    }
   public function save_settings()
   {
      $data['active_nav'] = "dashboard";
      $file_path="./assets/images/";
      $logo_path = $this->input->post('logo_path');
      $image_path = $this->input->post('image_path');
      if($_FILES['logo']['name'])
        {
          // unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend'); 
          $logo_path = $this->backend->image_upload('logo',$file_path);
        }
      if($_FILES['image']['name'])
        {
          // unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend'); 
          $image_path = $this->backend->image_upload('image',$file_path);
        }
       $data = array(
                   'email' => $this->input->post('email'),
                   'phone' => $this->input->post('phone'),
                   'facebook' => $this->input->post('facebook'),
                   'twitter' => $this->input->post('twitter'),
                   'gplus' => $this->input->post('gplus'),
                   'location'=>trim($this->input->post('location')),
                   'linkedin' => $this->input->post('linkedin'),
                   'youtube' => $this->input->post('youtube'),
                   'first_title' => $this->input->post('first_title'),
                   'first_content' => $this->input->post('first_content'),
                   'image' => $image_path,
                   'second_title' => $this->input->post('second_title'),
                   'second_content' => $this->input->post('second_content'),
                   'logo_url' => $logo_path,
                   'success_message' => $this->input->post('success_message'),
                   'about_us' => $this->input->post('about_us'),
                   'copyright_text' => $this->input->post('copyright'),
                   'footer_bg_color' => $this->input->post('f_bg_color'),
                   'theme_color' => $this->input->post('theme_color'),
               );
       $this->Common->update_data("settings",'id',1,$data);
       $this->session->set_flashdata('msg', '<p class="alert alert-success">Settings Saved Successfully</p>');
       redirect('dashboard/settings','location');
   }
}