        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-fw fa-codepen"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $title; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mb-3">



            <?php
            
                $role_id = $this->session->userdata('role_id');
                $selectMenu = "SELECT user_menu.id, menu
                                 FROM user_menu JOIN user_access_menu
                                   ON user_menu.id = user_access_menu.menu_id
                                WHERE user_access_menu.role_id = '$role_id'
                             ORDER BY user_access_menu.menu_id ASC
                ";

                $menu = $this->db->query($selectMenu)->result_array();

                foreach ($menu as $m) {
                    # code...
            ?>
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        <?= $m['menu']; ?>
                    </div>
            <?php
                    $menu_id = $m['id'];
                    $selectSubMenu = "SELECT *
                                        FROM user_sub_menu JOIN user_menu
                                          ON user_menu.id = user_sub_menu.menu_id
                                       WHERE user_menu.id = $menu_id
                                         AND user_sub_menu.is_active = 1";
                    
                    $submenu = $this->db->query($selectSubMenu)->result_array();

                    foreach ($submenu as $sm) {
                        # code...
                        if ($title == $sm['title']) {
                            # code...
            ?>
                        <!-- Nav Item -->
                        <li class="nav-item active">
            <?php
                        }
                        else{
            ?>
                        <!-- Nav Item -->
                        <li class="nav-item">
                            
            <?php
                        }
            ?>
                            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                                <i class="<?= $sm['icon']; ?>"></i>
                                <span><?= $sm['title'] ?></span>
                            </a>
                        </li>
            <?php
                    }

            ?> 
                    <!-- Divider -->
                    <hr class="sidebar-divider mt-3">
            <?php
                }
            
            ?>
            


            <!-- Heading -->
            <div class="sidebar-heading">
                Logged
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link btn-logout" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->