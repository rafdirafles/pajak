<div class="wrapper">
    <!-- main menu-->
    <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
    <div class="app-sidebar menu-fixed " data-background-color="mint" data-scroll-to-active="true" data-image="<?= base_url('assets/') ?>img/sidebar-bg/bg99.jpg">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
            <div class="logo clearfix">
                <?php $role_id = $this->session->userdata('role_id'); ?>
                <a class="logo-text float-left" href="<?php if ($role_id == "1") : ?><?= base_url('super_admin') ?>">
                    <?php elseif ($role_id == "2") : ?><?= base_url('admin') ?>">
                    <?php elseif ($role_id == "3") : ?><?= base_url('pusat') ?>">
                    <?php elseif ($role_id == "4") : ?><?= base_url('cabang') ?>">
                <?php endif; ?>
                <div class="logo-img">
                    <img style="width: 200%;padding-right:25px;" src="<?= base_url('assets/') ?>img/logos/nts.png" />
                    <!-- <img style="width: 200%;padding-right:15px;" src="<?= base_url('assets/') ?>img/logos/tms02.png" /> -->
                </div>
                <span class="text"><b>N</b>usindo</span>
                </a>
                <a class="nav-toggle d-none d-lg-none d-xl-block <?= $_COOKIE['a-class']; ?>" id="sidebarToggle" href="javascript:;">
                    <i class="toggle-icon <?= $_COOKIE['ft-toogle']; ?>"></i>
                </a>
                <a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;">
                    <i class="ft-x"></i>
                </a>
            </div>
        </div>
        <!-- Sidebar Header Ends-->

        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content main-menu-content">
            <div class="nav-container">

                <!-- query parent menu -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $query_menu = " SELECT mst_menu.id, mst_menu.menu, mst_menu.icons
                        FROM mst_menu JOIN mst_access_menu
                        ON mst_menu.id = mst_access_menu.menu_id
                        WHERE mst_access_menu.role_id = '" . $role_id . "'
                        ORDER BY mst_access_menu.menu_id ASC
                      ";
                $menu = $this->db->query($query_menu)->result_array();
                ?>
                <!-- end query parent menu -->

                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                    <!-- Looping Menu -->
                    <?php foreach ($menu as $m) : ?>
                        <li class="has-sub nav-item ">
                            <a href="javascript:;"><i class="<?= ($m['icons']); ?>"></i><span class="menu-title" data-i18n="<?= str_replace('_', ' ', $m['menu']); ?>"><?= str_replace('_', ' ', $m['menu']); ?></span></a>
                            <!--  BATAS AWAL -->
                            <!-- Loopping Submenu -->
                            <?php
                            $menuId = $m['id'];
                            $query_submenu = "  SELECT *
                                  FROM  mst_submenu JOIN mst_menu
                                  ON  mst_submenu.menu_id = mst_menu.id
                                  WHERE mst_submenu.menu_id = '" . $menuId . "'
                                  AND mst_submenu.is_active = 1
                                  ORDER BY mst_submenu.id ASC
                               ";
                            $sub_menu = $this->db->query($query_submenu)->result_array();
                            ?>
                            <?php foreach ($sub_menu as $sm) : ?>
                                <ul class="menu-content">
                                    <li class="<?= ($title == $sm['title']) ? 'active' : 'menu-item' ?> ">
                                        <a href="<?= base_url($sm['link']); ?>">
                                            <i class="<?= base_url($sm['icon']); ?>"></i><span class="menu-item" data-i18n="<?= $sm['title']; ?>"><?= $sm['title']; ?></span></a>
                                        </a>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                            <!-- end Sub menu looping -->
                            <!-- BATAS AKHIR -->

                        </li>
                    <?php endforeach; ?>
                    <!-- /Close Menu Looping -->
                </ul>

            </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
        <!-- / main menu-->
    </div>