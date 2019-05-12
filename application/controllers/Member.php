<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Member extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();

            $this->load->modal('role_Model');
        }
        
        
        public function index(){
            $data['title'] = 'User Dashboard';
            
            $email = $this->session->userdata('email');

            $data['user'] = $this->user_Model->select_email($email);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('member/index', $data);
            $this->load->view('templates/footer');
        }
    }
?>