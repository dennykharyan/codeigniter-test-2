<?php

    function is_login(){
        $ci = get_instance();

        if (!$ci->session->userdata('email')) {
            # code...
            redirect('auth');
        }
        else{
            $role_id = $ci->session->userdata('role_id');
            
            $recent_menu = ucfirst($ci->uri->segment(1, 0));

            $select_menu = $ci->db->get_where('user_menu', ['menu' => $recent_menu])->row_array();

            $menu_id = $select_menu['id'];

            $user_access = $ci->db->get_where('user_access_menu', ['menu_id' => $menu_id, 'role_id' => $role_id]);

            if ($user_access->num_rows() < 1) {
                # code...
                $data['title'] = "404";
                
                redirect('auth/blocked');
            }
        }
    }


    function check_access($role_id, $menu_id){
        $ci = get_instance();

        $status = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($status->num_rows() > 0) {
            # code...
            echo "checked";
        }
        else{
            echo "";
        }
    }

?>