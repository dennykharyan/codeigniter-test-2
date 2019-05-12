<?php


    defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth extends CI_Controller{

        public function __construct()
        {
            parent::__construct();

            $this->load->model('auth_Model');
        }


        public function index(){
            $data['title'] = "Login";

            
            // checking if user is already login
            if ($this->session->userdata('email')) {
                # code...
                redirect('user');
            }

            $this->form_validation->set_rules('txtemail', 'Email', 'required|trim|valid_email|max_length[128]');
            $this->form_validation->set_rules('txtpassword', 'Password', 'required|trim');

            if ($this->form_validation->run() == false) {
                # code...
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            }
            else{
                $this->login(); #trow to login process
            }
        }


        // login process
        private function login(){
            $email = htmlspecialchars($this->input->post('txtemail', true));
            $password = $this->input->post('txtpassword');

            // selecting user by email session
            $user = $this->auth_Model->select_email($email);

            if ($user) {
                # code...
                if ($user['is_active'] == 1) {
                    # code...
                    if (password_verify($password, $user['password'])) {
                        # code...
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];

                        $this->session->set_userdata($data);
                            
                        if ($user['role_id'] == 1) {
                            # code...
                            redirect('administrator');
                        }
                        elseif ($user['role_id'] == 2) {
                            # code...
                            redirect('user');
                        }
                    }
                    else{
                        $this->session->set_flashdata('message', 'Wrong password');
                        $this->session->set_flashdata('type', 'error');
                        redirect('auth');
                    }
                }
                else{
                    $this->session->set_flashdata('message', 'Your account is not been activated, please check your email');
                    $this->session->set_flashdata('type', 'error');
                    redirect('auth');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Cant find account, please check email your typing in or register instead');
                $this->session->set_flashdata('type', 'warning');
                redirect('auth');
            }
        }
        
        
        public function register(){
            $data['title'] = "User Registration";

            $this->form_validation->set_rules(
                'txtname',
                'Name',
                'required|trim|max_length[128]'
            );
            $this->form_validation->set_rules(
                'txtemail',
                'Email',
                'required|trim|valid_email|max_length[128]|is_unique[user.email]',
                [
                    'is_unique' => 'This email has been used'
                ]
            );
            $this->form_validation->set_rules(
                'txtpassword',
                'Password',
                'required|trim|min_length[3]'
            );
            $this->form_validation->set_rules(
                'txtrepassword',
                'Re-Password',
                'required|trim|matches[txtpassword]',
                [
                    'matches' => 'Password you entered doesnt match'
                ]
            );

            if($this->form_validation->run() == false){
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/register');
                $this->load->view('templates/auth_footer');
            }
            else{
                $email = $this->input->post('txtemail', true);
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->send_email($token, 'verify');

                $this->auth_Model->register();
                $this->db->insert('user_token', $user_token);

                $this->session->set_flashdata('message', 'Your account is successfully created, please check your email to activating and do login');
                $this->session->set_flashdata('type', 'success');
                redirect('auth');
            }
        }


        private function send_email($token, $type) {

            $this->load->library('email');

            $config = [
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_crypto' => 'ssl',
                    'smtp_user' => 'kharyanto43@gmail.com',
                    'smtp_pass' => 'silviaS15',
                    'smtp_port' => '465',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ];
            
            $this->email->initialize($config);

            if ($type == 'verify') {
                # code...
                $this->email->from('admin@email.com', 'Login Access');
                $this->email->to($this->input->post('txtemail'));
                $this->email->subject('Email Verification');
                $this->email->message('
                    <p>Activate your email by hit this link bellow</p><br>
                    <a href="' . base_url('auth/verify') . '?email=' . $this->input->post('txtemail') . '&token=' . $token . '">link</a>
                ');
            }

            if ($this->email->send()) {
                # code...
                return true;
            }
            else{
                show_error($this->email->print_debugger());
                die;
            }
            
        }


        public function verify() {
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            $cek_email = $this->auth_Model->select_email($email);

            if ($cek_email) {
                # code...
                $cek_token = $this->auth_Model->select_token($email, $token);

                if ($cek_token) {
                    # code...
                    if ((time() - $cek_token['date_created']) < (60*60*24)) {
                        # code...
                        $this->auth_Model->update_status($email);
    
                        $this->session->set_flashdata('message', 'Your email is successfully activated');
                        $this->session->set_flashdata('type', 'success');
    
                        redirect('auth');
                    }
                    else{
                        $this->db->where('email', $email);
                        $this->db->where('token', $token);
                        $this->db->delete('user_token');

                        $this->session->set_flashdata('message', 'Your email is expired, please register again');
                        $this->session->set_flashdata('type', 'error');
    
                        redirect('auth');
                    }
                }
                else{
                    $this->session->set_flashdata('message', 'Your email is not registered');
                    $this->session->set_flashdata('type', 'error');

                    redirect('auth');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Your email is not registered');
                $this->session->set_flashdata('type', 'error');

                redirect('auth');
            }
        }


        public function logout(){
            $this->session->unset_userdata('email');

            redirect('auth');
        }


        public function blocked(){
            $this->load->view('404');   #redirect to 404 page
        }
    }