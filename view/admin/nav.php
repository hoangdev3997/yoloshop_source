    <nav id="toolbar" class="bg-white">
        <div class="row no-gutters align-items-center flex-nowrap">
            <div class="col">
                <div class="row no-gutters align-items-center flex-nowrap">
                </div>
            </div>
            <div class="col-auto">
                <div class="row no-gutters align-items-center justify-content-end">
                    <div class="user-menu-button dropdown">
                        <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button" id="dropdownUserMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-wrapper">
                                <img class="avatar" src="../view/admin/assets/images/avatars/profile.jpg">
                                <i class="status text-red icon-checkbox-marked-circle s-4"></i>
                            </div>
                            <span class="username mx-3 d-none d-md-block"><?php echo $_SESSION['user']['name'] ?></span>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">
                            <a class="dropdown-item" href="#">
                                <div class="row no-gutters align-items-center flex-nowrap">
                                    <i class="icon-account"></i>
                                    <span class="px-3">My Profile</span>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?page=logout">
                                <div class="row no-gutters align-items-center flex-nowrap">
                                    <i class="icon-logout"></i>
                                    <span class="px-3">Logout</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="toolbar-separator"></div>
                    <button type="button" class="search-button btn btn-icon">
                        <i class="icon icon-magnify"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>