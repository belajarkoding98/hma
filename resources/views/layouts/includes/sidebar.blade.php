<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="/dashboard"><img src="{{asset('assets/images/logo.png')}}" alt="Logo" style="width: 90px;"
                    class="p-2" title="PT. Hanatekindo Mulia Abadi"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->user_fullname }}
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{url('user')}}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span> Master Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="waves-effect">
                        <i class="fas fa-door-open"></i>
                        <span> Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>