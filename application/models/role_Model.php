<?php

    class role_Model extends CI_Model{


        public function selectall(){
            return $this->db->get('user_role')->result_array();
        }
        
        
        public function select_id($id){
            return $this->db->get_where('user_role', ['id' => $id])->row_array();
        }
    }

?>