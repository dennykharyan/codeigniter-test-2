<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Administrator extends CI_Controller{

        public function __construct()
        {
            parent::__construct();

            is_login();

            $this->load->model('user_Model');
            $this->load->model('role_Model');
            $this->load->model('menu_Model');
        }
        
        // Dashboard
        public function index(){
            $data['title'] = 'Dashboard';

            $email = $this->session->userdata('email');

            $data['user'] = $this->user_Model->select_email($email);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }
        // end of dashboard


        // User access per level
        public function role(){
            $data['title'] = 'Role';

            $email = $this->session->userdata('email');

            $data['user'] = $this->user_Model->select_email($email);
            $data['role'] = $this->role_Model->selectall();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        }


        public function role_access($id){
            $data['title'] = "Role";

            $email = $this->session->userdata('email');

            $data['user'] = $this->user_Model->select_email($email);
            $data['role'] = $this->role_Model->select_id($id);
            $data['menu'] = $this->menu_Model->selectall();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role_access', $data);
            $this->load->view('templates/footer');
        }


        public function change_access(){
            $role_id = $this->input->post('txtrole', true);
            $menu_id = $this->input->post('txtmenu', true);
            
            if (!empty($menu_id)) {
                # code...
                foreach ($menu_id as $m) {
                    # code...
                    $cek = $this->db->get_where('user_access_menu', ["role_id" => $role_id, "menu_id" => $m]);

                    $data = [
                                "role_id" => $role_id,
                                "menu_id" => $m
                        ];

                    if ($cek->num_rows() < 1) {
                        # code...
                        $this->db->insert('user_access_menu', $data);
                    }
                }

                $this->session->set_flashdata('message', 'This role has been successfully updated');
                $this->session->set_flashdata('type', 'success');
            }

            redirect('administrator/role');
        }


        public function delete_access($menu_id, $role_id){
            $this->db->delete('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

            redirect('administrator/role_access/' . $role_id);
        }
        // end of user access by level


        // Change user level
        public function user_role() {
            $data['title'] = 'User Role';

            $data['user'] = $this->user_Model->select_email($this->session->userdata('email'));
            $data['user_role'] = $this->user_Model->select_role();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user_role', $data);
            $this->load->view('templates/footer');
        }


        public function change_role($id) {
            $data['title'] = 'User Role';

            $data['user'] = $this->user_Model->select_email($this->session->userdata('email'));

            $data['user_role'] = $this->user_Model->select_role_id($id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/change_role', $data);
            $this->load->view('templates/footer');
        }



    }
    

?>