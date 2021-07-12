<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
    <div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
            <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
            <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- <li class="dropdown nav-item"><a class="nav-link dropdown-toggle dropdown-notification p-0 mt-2" id="dropdownBasic1" href="javascript:;" data-toggle="dropdown"><i class="ft-bell font-medium-3"></i><span class="notification badge badge-pill badge-danger">4</span></a>
                        <ul class="notification-dropdown dropdown-menu dropdown-menu-media dropdown-menu-right m-0 overflow-hidden">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header d-flex justify-content-between m-0 px-3 py-2 white bg-primary">
                                    <div class="d-flex"><i class="ft-bell font-medium-3 d-flex align-items-center mr-2"></i><span class="noti-title">7 New Notification</span></div><span class="text-bold-400 cursor-pointer">Mark all as read</span>
                                </div>
                            </li>
                            <li class="scrollable-container"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="mr-3"><img class="avatar" src="<?= base_url('assets/') ?>img/portrait/small/avatar-s-20.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Kate Young</span><small class="grey lighten-1 font-italic float-right">5
                                                    mins ago</small></h6><small class="noti-text">Commented on your photo</small>
                                            <h6 class="noti-text font-small-3 m-0">Great Shot John! Really enjoying the composition on this
                                                piece.</h6>
                                        </div>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="mr-3"><img class="avatar" src="<?= base_url('assets/') ?>img/portrait/small/avatar-s-11.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Andrew Watts</span><small class="grey lighten-1 font-italic float-right">49 mins ago</small></h6><small class="noti-text">Liked your album: UI/UX Inspo</small>
                                        </div>
                                    </div>
                                </a><a class="d-flex justify-content-between read-notification" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="avatar bg-primary bg-lighten-3 mr-3 p-1"><span class="avatar-content font-medium-2">LD</span></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Registration done</span><small class="grey lighten-1 font-italic float-right">6 hrs ago</small></h6>
                                        </div>
                                    </div>
                                </a>

                            </li>
                            <li class="dropdown-menu-footer">
                                <div class="noti-footer text-center cursor-pointer primary border-top text-bold-400 py-1">Read All
                                    Notifications</div>
                            </li>
                        </ul>
                    </li> -->
                    <li class="dropdown nav-item mr-1">
                        <a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                            <div class="user d-md-flex d-none mr-2">
                                <span class="text-right"><b><?= $user['username']; ?></b></span>
                                <span class="text-right text-muted font-small-3">Online</span>
                            </div><img class="avatar" src="<?= base_url('assets/dist/img/profile/') . $user['image']; ?>" alt="avatar" height="35" width="35">
                        </a>
                        <?php $role_id = $user['role_id']; ?>
                        <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2">
                            <a class="dropdown-item" href="<?php if ($role_id == "1") : ?><?= base_url('super_admin/edit_profile') ?>">
                            <?php elseif ($role_id == "2") : ?><?= base_url('admin/edit_profile') ?>" >
                            <?php elseif ($role_id == "3") : ?><?= base_url('pusat/edit_profile') ?>" >
                            <?php elseif ($role_id == "4") : ?><?= base_url('cabang/edit_profile') ?>" >
                            <?php endif; ?>
                            <div class="d-flex align-items-center">
                                <i class="ft-edit mr-2"></i><span>My Profile</span>
                            </div>
                            </a>
                            <a class="dropdown-item" href="<?php if ($role_id == "1") : ?><?= base_url('super_admin/change_password') ?>">
                            <?php elseif ($role_id == "2") : ?><?= base_url('admin/change_password') ?>" >
                            <?php elseif ($role_id == "3") : ?><?= base_url('pusat/change_password') ?>" >
                            <?php elseif ($role_id == "4") : ?><?= base_url('cabang/change_password') ?>" >
                            <?php endif; ?>
                            <div class="d-flex align-items-center">
                                <i class="ft-unlock mr-2"></i><span>Change Password</span>
                            </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                                <div class="d-flex align-items-center">
                                    <i class="ft-log-out mr-2"></i><span>Logout</span>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
