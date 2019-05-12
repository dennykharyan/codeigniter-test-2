<?php

    class user_Model extends CI_Model{


        public function selectall(){
            return $this->db->get('user')->result_array();
        }


        public function select_email($email){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('user_role', 'user.role_id = user_role.id');
            $this->db->where('email', $email);
            return $this->db->get()->row_array();
        }


        public function select_id($id){
            return $this->db->get_where('user', ['id' => $id])->row_array();
        }


        public function change_password(){
            $email = $this->session->userdata('email');
            $new_password = password_hash($this->input->post('txtnewpassword'), PASSWORD_DEFAULT);

            $this->db->set('password', $new_password);
            $this->db->where('email', $email);
            $this->db->update('user');
        }


        public function select_role() {
            $this->db->select('user.*, user_role.role');
            $this->db->from('user');
            $this->db->join('user_role', 'user.role_id = user_role.id');
            return $this->db->get()->result_array();
        }
        
        
        public function select_role_id($id) {
            $this->db->select('user.*, user_role.role');
            $this->db->from('user');
            $this->db->join('user_role', 'user.role_id = user_role.id');
            $this->db->where('user.id', $id);
            return $this->db->get()->row_array();
        }
    }

?>