<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Menu</h6>
                    <ul>
                        <li class="{{ Route::is('home') ? 'active' : '' }} m-2">
                            <a href="{{ route('home') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ Route::is('bank.index', 'bank.store') ? 'active' : '' }} m-2">
                            <a href="{{ route('bank.index') }}"><i data-feather="user"></i><span>Payment Method</span></a>
                        </li>
                        <li class="{{ Route::is('delivery.area.index', 'delivery.area.store') ? 'active' : '' }} m-2">
                            <a href="{{ route('delivery.area.index') }}"><i data-feather="user"></i><span>Delivery Areas</span></a>
                        </li>
                        <li class="{{ Route::is('delivery.boy.index', 'delivery.boy.store') ? 'active' : '' }} m-2">
                            <a href="{{ route('delivery.boy.index') }}"><i data-feather="user"></i><span>Delivery Boys</span></a>
                        </li>
                        <li class="{{ Route::is('delivery.plan.index', 'delivery.plan.store') ? 'active' : '' }} m-2">
                            <a href="{{ route('delivery.plan.index') }}"><i data-feather="user"></i><span>Delivery Plan</span></a>
                        </li>
                        <li class="{{ Route::is('manager.invite.index', 'manager.invite.store') ? 'active' : '' }} m-2">
                            <a href="{{ route('manager.invite.index') }}"><i data-feather="user"></i><span>Manager</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


