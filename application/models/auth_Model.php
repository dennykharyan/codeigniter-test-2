<?php

class Auth_Model extends CI_Model{
    
    
    public function select_email($email){
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
    
    
    public function register(){
        $data = [
            'name' => htmlspecialchars($this->input->post('txtname', true)),
            'email' => htmlspecialchars($this->input->post('txtemail', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('txtpassword'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }


    public function select_token($email, $token) {
        return $this->db->get_where('user_token', ['email' => $email, 'token' => $token])->row_array();
    }


    public function update_status($email) {
        $this->db->set('is_active', '1');
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}

?>