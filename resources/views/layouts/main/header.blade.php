<div class="topbar-main">
    <div class="container-fluid">

        <!-- Logo container-->
        <div class="logo">
            <!-- Image Logo -->
            <a href="index.html" class="logo">
                <img src="{{ asset('landing/images/logo/logo-full-light.png') }}" alt="" height="32" class="logo-small">
                <img src="{{ asset('landing/images/logo/logo-full-light.png') }}" alt="" height="20" class="logo-large">
            </a>

        </div>
        <!-- End Logo container-->


        <div class="menu-extras topbar-custom">


            <ul class="list-inline float-right mb-0">
                <!-- Search -->
                <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                    <!-- <form role="search" class="app-search">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form> -->
                </li>
                <!-- Messages-->
                <!-- <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                         <i class="mdi mdi-email-outline noti-icon"></i>
                         <span class="badge badge-danger badge-pill noti-icon-badge">5</span>
                     </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-animated dropdown-menu-lg">
                        <div class="dropdown-item noti-title">
                            <span class="badge badge-danger float-right">367</span>
                            <h5>Messages</h5>
                        </div>

                        <div class="slimscroll" style="max-height: 230px;">
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="{{ asset('cms/images/users/user-2.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>Charles M. Jones</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="{{ asset('cms/images/users/user-3.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>Thomas J. Mimms</b><span class="text-muted">You have 87 unread messages</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="{{ asset('cms/images/users/user-4.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details">Luis M. Konrad<span class="text-muted">It is a long established fact that a reader will</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="{{ asset('cms/images/users/user-5.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>Kendall E. Walker</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon"><img src="{{ asset('cms/images/users/user-6.jpg') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                <p class="notify-details"><b>David M. Ryan</b><span class="text-muted">You have 87 unread messages</span></p>
                            </a>
                        </div>

                        <a href="javascript:void(0);" class="dropdown-item notify-all">
                            View All
                        </a>

                    </div>
                </li> -->
                <!-- notification-->
                <!-- <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="badge badge-success badge-pill noti-icon-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg">

                        <div class="dropdown-item noti-title">
                            <span class="badge badge-danger float-right">84</span>
                            <h5>Notification</h5>
                        </div>

                        <div class="slimscroll" style="max-height: 230px;">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                                <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                            </a>
                        </div>

                        <a href="javascript:void(0);" class="dropdown-item notify-all">
                            View All
                        </a>

                    </div>

                </li> -->
                <!-- User-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('cms/images/users/user-1.jpg') }}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                        <!-- <a class="dropdown-item" href="#"><span class="badge badge-success mt-1 float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a> -->
                        <a class="dropdown-item" href="{{ route('logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                    </div>

                </li>
                <li class="menu-item list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

            </ul>
        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

    </div> <!-- end container -->
</div>
