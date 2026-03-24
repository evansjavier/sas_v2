
    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left active">
            <a href="{{ url('index') }}" class="logo logo-normal">
                <img src="{{URL::asset('build/img/general/logo_sas.png')}}" alt="Logo">
            </a>
            <a href="{{ url('index') }}" class="logo-small">
                <img src="build/img/logo-small.svg" alt="Logo">
            </a>
            <a href="{{ url('index') }}" class="dark-logo">
                <img src="{{URL::asset('build/img/general/logo_sas_blanco.png')}}" alt="Logo">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
                <i class="ti ti-menu-deep"></i>
            </a>
        </div>
        <!-- /Logo -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>

        <div class="header-user">
            <div class="nav user-menu">

                <div class="d-flex align-items-center ms-auto">

                    <div class="pe-1">
                        <div class="dropdown">
                            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-square-rounded-plus"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right border shadow-sm dropdown-md">
                                <div class="p-3 border-bottom">
                                    <h5>Quick Actions</h5>
                                </div>
                                <div class="p-3 pb-0">
                                    <div class="row gx-2">
                                        <div class="col-6">
                                            <a href="{{ url('students') }}"
                                                class="d-block bg-primary-transparent ronded p-2 text-center mb-3 class-hover">
                                                <div class="avatar avatar-lg mb-2">
                                                    <span
                                                        class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-primary rounded-circle"><i
                                                            class="ti ti-school"></i></span>
                                                </div>
                                                <p class="text-dark">View Students</p>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ url('add-teacher') }}"
                                                class="d-block bg-success-transparent ronded p-2 text-center mb-3 class-hover">
                                                <div class="avatar avatar-lg mb-2">
                                                    <span
                                                        class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-success rounded-circle"><i
                                                            class="ti ti-users"></i></span>
                                                </div>
                                                <p class="text-dark">View Instructors</p>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ url('add-staff') }}"
                                                class="d-block bg-warning-transparent ronded p-2 text-center mb-3 class-hover">
                                                <div class="avatar avatar-lg rounded-circle mb-2">
                                                    <span
                                                        class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-warning rounded-circle"><i
                                                            class="ti ti-book"></i></span>
                                                </div>
                                                <p class="text-dark">View Courses</p>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ url('add-invoice') }}"
                                                class="d-block bg-info-transparent ronded p-2 text-center mb-3 class-hover">
                                                <div class="avatar avatar-lg mb-2">
                                                    <span
                                                        class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-info rounded-circle"><i
                                                            class="ti ti-license"></i></span>
                                                </div>
                                                <p class="text-dark">View Financial</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!Route::is(['layout-dark', 'layout-rtl', 'layout-mini', 'layout-box']))
                    <div class="pe-1">
                        <a href="#" id="dark-mode-toggle"
                            class="dark-mode-toggle activate btn btn-outline-light bg-white btn-icon me-1">
                            <i class="ti ti-moon"></i>
                        </a>
                        <a href="#" id="light-mode-toggle"
                            class="dark-mode-toggle btn btn-outline-light bg-white btn-icon me-1">
                            <i class="ti ti-brightness-up"></i>
                        </a>
                    </div>
                    @endif
                    <div class="pe-1">
                        <a href="#" class="btn btn-outline-light bg-white btn-icon me-1">
                            <i class="ti ti-chart-bar"></i>
                        </a>
                    </div>
                    <div class="dropdown ms-1">
                        <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <span class="avatar avatar-md rounded">
                                <img src="build/img/profiles/avatar-27.jpg" alt="Img" class="img-fluid">
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="d-block">
                                <div class="d-flex align-items-center p-2">
                                    <span class="avatar avatar-md me-2 online avatar-rounded">
                                        <img src="build/img/profiles/avatar-27.jpg" alt="img">
                                    </span>
                                    <div>
                                        <h6 class="">{{ Auth::user()->name }}</h6>
                                        <p class="text-primary mb-0">{{ ucfirst(Auth::user()->roles->pluck('name')->join(', ')) }}</p>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <a class="dropdown-item d-inline-flex align-items-center p-2"
                                    href="{{ url('profile') }}"> <i class="ti ti-user-circle me-2"></i>My Profile</a>
                                <a class="dropdown-item d-inline-flex align-items-center p-2"
                                    href="{{ url('profile-settings') }}"><i
                                        class="ti ti-settings me-2"></i>Settings</a>
                                <hr class="m-0">
                                <a class="dropdown-item d-inline-flex align-items-center p-2"
                                    href="{{ url('signout') }}"><i class="ti ti-login me-2"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ url('profile-settings') }}">Settings</a>
                <a class="dropdown-item" href="{{ url('login') }}">Logout</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
    <!-- /Header -->

