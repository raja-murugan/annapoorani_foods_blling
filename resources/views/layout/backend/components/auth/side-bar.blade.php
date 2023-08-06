<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Menu</h6>
                    <ul>
                        <li class="{{ Route::is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ Route::is('manager.invite.index', 'manager.invite.store') ? 'active' : '' }}">
                            <a href="{{ route('manager.invite.index') }}"><i data-feather="user"></i><span>Delivery Plan</span></a>
                        </li>
                        <li class="{{ Route::is('manager.invite.index', 'manager.invite.store') ? 'active' : '' }}">
                            <a href="{{ route('manager.invite.index') }}"><i data-feather="user"></i><span>Manager</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
