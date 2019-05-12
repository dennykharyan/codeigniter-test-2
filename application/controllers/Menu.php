<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu extends CI_Controller{

        public function __construct()
        {
            parent::__construct();

            is_login();

            $this->load->model('menu_Model');
            $this->load->model('user_Model');
        }

        
        public function index(){
            $data['title'] = 'Menu Management';

            $data['user'] = $this->user_Model->selectall();
            $data['menu'] = $this->menu_Model->selectall();
            
            $this->form_validation->set_rules('txtmenu', 'Menu', 'required|trim|max_length[128]');
            
            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/index', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->menu_Model->add();
                
                $this->session->set_flashdata('message', 'Data has been successfully saved');
                $this->session->set_flashdata('type', 'success');
                
                redirect('menu');
            }
        }


        public function edit($id){
            $data['title'] = "Menu Management";

            $data['user'] = $this->user_Model->select_email($this->session->userdata('email'));
            $data['menu'] = $this->menu_Model->select_id($id);

            $this->form_validation->set_rules('txtmenu', 'Menu', 'required|trim|max_length[128]');

            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/menu_edit', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->menu_Model->edit();

                $this->session->set_flashdata('message', 'Data has been successfully updated');
                $this->session->set_flashdata('type', 'success');
            
                redirect('menu');
            }
        }


        public function delete($id){
            $this->db->where('id', $id);
            $this->db->delete('user_menu');

            $this->session->set_flashdata('message', 'Data has been successfully deleted');
            $this->session->set_flashdata('type', 'deleted');
            
            redirect('menu');
        }


        public function submenu(){
            $data['title'] = "Submenu Management";

            $data['user'] = $this->user_Model->selectall();
            $data['menu'] = $this->menu_Model->selectall();
            $data['submenu'] = $this->menu_Model->select_submenu();

            $this->form_validation->set_rules('txttitle', 'Title', 'required|trim|max_length[128]');
            $this->form_validation->set_rules('txtmenu', 'Menu', 'required');
            $this->form_validation->set_rules('txturl', 'Url', 'required|trim|max_length[128]');
            $this->form_validation->set_rules('txticon', 'Icon', 'required|trim|max_length[128]');

            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/submenu', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->menu_Model->add_submenu();
                
                $this->session->set_flashdata('message', 'Data has been successfully saved');
                $this->session->set_flashdata('type', 'success');
                
                redirect('menu/submenu');
            }
        }
        
        
        public function submenu_edit($id){
            $data['title'] = "Submenu Management";

            $data['user'] = $this->user_Model->selectall();
            $data['menu'] = $this->menu_Model->selectall();
            $data['submenu'] = $this->menu_Model->select_sub_id($id);

            $this->form_validation->set_rules('txttitle', 'Title', 'required|trim');
            $this->form_validation->set_rules('txtmenuid', 'Menu', 'required');
            $this->form_validation->set_rules('txturl', 'Url', 'required|trim');
            $this->form_validation->set_rules('txticon', 'Icon', 'required|trim');

            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/submenu_edit', $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->menu_Model->edit_submenu();
                $this->session->set_flashdata('message', 'Data has been successfully saved');
                $this->session->set_flashdata('type', 'success');
                redirect('menu/submenu');
            }
        }


        public function submenu_delete($id){
            $this->db->where('id', $id);
            $this->db->delete('user_sub_menu');

            $this->session->set_flashdata('message', 'Data successfully deleted');
            $this->session->set_flashdata('type', 'success');
            redirect('menu/submenu');
        }
    }  

?>