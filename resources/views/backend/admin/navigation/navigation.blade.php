<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-light">

        <div class="slimscroll-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center">
                <span class="logo-lg">
                <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="16">
                </span>
                <span class="logo-sm">
                <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="16">
                </span>
            </a>

            <!--- Sidemenu -->
            <ul class="metismenu side-nav side-nav-light">

                <li class="side-nav-title side-nav-item">Quick Access</li>
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                            <i class="fab fa-500px"></i>
                        <span> Pinned Menu </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="layouts-boxed-horizontal.html">Marks</a>
                        </li>
                        <li>
                            <a href="layouts-boxed-horizontal.html">Exam Manager</a>
                        </li>
                    </ul>
                </li>

                @foreach (\App\Menu::where('parent', 0)->get() as $menu)
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="dripicons-browser"></i>
                        <span> {{ ucfirst(str_replace('_', ' ', $menu->name)) }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        @foreach (\App\Menu::where('parent', $menu->id)->get() as $sub_menu)
                            <li>
                                @if ($sub_menu->name == 'session_manager' || $sub_menu->name == 'class')
                                    <a href="{{ route($sub_menu->name.'.index') }}">{{ ucfirst(str_replace('_', ' ', $sub_menu->name)) }}</a>
                                @else
                                    <a href="#">{{ ucfirst(str_replace('_', ' ', $sub_menu->name)) }}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach

            </ul>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
