<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller{


        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_Model');

            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 500;
            $config['max_width'] = 1024;
            $this->load->library('upload', $config);
        }

        
        public function index(){
            $data['title'] = 'Profile';

            $email = $this->session->userdata('email');
            
            $data['user'] = $this->user_Model->select_email($email);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        }


        public function edit(){
            $data['title'] = 'Edit Profile';

            $email = $this->session->userdata('email');

            $data['user'] = $this->user_Model->select_email($email);

            $this->form_validation->set_rules('txtname', 'Name', 'required|trim|max_length[128]');
            
            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/edit', $data);
                $this->load->view('templates/footer');
            }
            else{
                
                $name = $this->input->post('txtname');
                $email = $this->input->post('txtemail');

                $upload_image = $_FILES['txtimage']['name']; #get image name

                if ($upload_image) {
                    # code...
                    // uploading email to directory
                    if ($this->upload->do_upload('txtimage')) {
                        # code...
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    }
                    else{
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('message', 'Successfully saved');
                $this->session->set_flashdata('type', 'success');

                redirect('user');
            }
        }   //end of edit method


        public function change_password(){
            $data['title'] = 'Change Password';

            $email = $this->session->userdata('email');
            
            $data['user'] = $this->user_Model->select_email($email);

            $this->form_validation->set_rules('txtoldpassword', 'Current Password', 'required|min_length[3]');
            $this->form_validation->set_rules('txtnewpassword', 'New Password', 'required|min_length[3]');
            $this->form_validation->set_rules('txtnewpassword2', 'Re-Password', 'required|min_length[3]|matches[txtnewpassword]');

            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/change_password', $data);
                $this->load->view('templates/footer');
            }
            else{

                $old_password = $this->input->post('txtoldpassword');
                $new_password = $this->input->post('txtnewpassword');
                $new_password2 = $this->input->post('txtnewpassword2');
                
                if (! password_verify($old_password, $data['user']['password'])) {
                    # code...
                    $this->session->set_flashdata('message', 'The current password is wrong, please check again');
                    $this->session->set_flashdata('type', 'error');

                    redirect('user/change_password');    
                }
                else{
                    if (password_verify($new_password, $data['user']['password'])) {
                        # code...
                        $this->session->set_flashdata('message', 'New password must be different from current password');
                        $this->session->set_flashdata('type', 'warning');

                        redirect('user/change_password');
                    }
                    else{
                        $this->user_Model->change_password();
                        
                        $this->session->set_flashdata('message', 'Password has been successfully changed');
                        $this->session->set_flashdata('type', 'success');
        
                        redirect('user');                        
                    }
                }
                
            }
        }
    }
    

?>