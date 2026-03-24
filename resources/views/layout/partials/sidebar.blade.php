<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Cabecera / Elemento vacío según requerimiento o perfil futuro -->
                <li></li>

                <!-- Menú Principal -->
                <li>
                    <ul>
                        <li class="{{ Request::is('home', '/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}">
                                <i class="ti ti-layout-dashboard"></i><span>Home</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('students') ? 'active' : '' }}">
                            <a href="{{ url('students') }}">
                                <i class="ti ti-school"></i><span>Students</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('teacher-grid') ? 'active' : '' }}">
                            <a href="{{ url('teacher-grid') }}">
                                <i class="ti ti-users"></i><span>Instructors</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('bookings') ? 'active' : '' }}">
                            <a href="{{ url('bookings') }}">
                                <i class="ti ti-calendar-event"></i><span>Bookings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('groups') ? 'active' : '' }}">
                            <a href="{{ url('groups') }}">
                                <i class="ti ti-users-group"></i><span>Groups</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('courses') ? 'active' : '' }}">
                            <a href="{{ url('courses') }}">
                                <i class="ti ti-book"></i><span>Courses</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('programs') ? 'active' : '' }}">
                            <a href="{{ url('programs') }}">
                                <i class="ti ti-clipboard-data"></i><span>Programs</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('simulators') ? 'active' : '' }}">
                            <a href="{{ url('simulators') }}">
                                <i class="ti ti-plane"></i><span>Simulators</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('statistics') ? 'active' : '' }}">
                            <a href="{{ url('statistics') }}">
                                <i class="ti ti-calendar-stats"></i><span>Statistics</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('automations') ? 'active' : '' }}">
                            <a href="{{ url('automations') }}">
                                <i class="ti ti-robot"></i><span>Automations</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

