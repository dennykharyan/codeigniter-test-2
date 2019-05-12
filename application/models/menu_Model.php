<?php

    class menu_Model extends CI_Model{


        public function selectall(){
            return $this->db->get('user_menu')->result_array();
        }


        public function select_id($id){
            return $this->db->get_where('user_menu', ['id' => $id])->row_array();            
        }


        public function add(){
            $data = ['menu' => $this->input->post('txtmenu', true)];

            $this->db->insert('user_menu', $data);
        }


        public function edit(){
            $data = ['menu' => $this->input->post('txtmenu', true)];

            $this->db->where('id', $this->input->post('txtmenuid', true));
            $this->db->update('user_menu', $data);
        }


        public function select_submenu(){
            $this->db->select('user_sub_menu.*, user_menu.menu');
            $this->db->from('user_sub_menu');
            $this->db->join('user_menu', 'user_sub_menu.menu_id = user_menu.id');
            return $this->db->get()->result_array();
        }


        public function select_sub_id($id){
            return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        }


        public function add_submenu(){
            $active_status = $this->input->post('txtactive', true);

            if ($active_status) {
                # code...
                $active_status = 1;
            }
            else{
                $active_status = 0;
            }
            $data = [
                'menu_id' => $this->input->post('txtmenu', true),
                'title' => $this->input->post('txttitle', true),
                'url' => $this->input->post('txturl', true),
                'icon' => $this->input->post('txticon', true),
                'is_active' => $active_status
            ];

            $this->db->insert('user_sub_menu', $data);
        }
        
        
        public function edit_submenu(){
            $active_status = $this->input->post('txtactive', true);

            if ($active_status) {
                # code...
                $active_status = 1;
            }
            else{
                $active_status = 0;
            }
            $data = [
                'menu_id' => $this->input->post('txtmenuid', true),
                'title' => $this->input->post('txttitle', true),
                'url' => $this->input->post('txturl', true),
                'icon' => $this->input->post('txticon', true),
                'is_active' => $active_status
            ];

            $this->db->where('id', $this->input->post('txtsubmenuid'));
            $this->db->update('user_sub_menu', $data);
        }
    }

?>