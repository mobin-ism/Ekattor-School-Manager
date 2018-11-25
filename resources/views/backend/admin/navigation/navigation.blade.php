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

                <li class="side-nav-title side-nav-item">Navigation</li>
                <li class="side-nav-item">
                    <a href="{{ route('dashboard') }}" class="side-nav-link">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @foreach (\App\Menu::where('parent', 0)->where('status', 1)->get() as $menu)
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="{{ $menu->icon }}"></i>
                        <span> {{ ucfirst(str_replace('_', ' ', $menu->name)) }} </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        @foreach (\App\Menu::where('parent', $menu->id)->where('status', 1)->orderBy('sort_order', 'ASC')->get() as $sub_menu)
                            <li>
                                @if ($sub_menu->name == 'session_manager' || $sub_menu->name == 'class' || $sub_menu->name == 'teacher' || $sub_menu->name == 'department' || $sub_menu->name == 'parent' || $sub_menu->name == 'accountant' || $sub_menu->name == 'librarian' || $sub_menu->name == 'student' || $sub_menu->name == 'addon_manager')
                                {{-- @if ($sub_menu->name == 'session_manager' || $sub_menu->name == 'class' || $sub_menu->name == 'teacher' || $sub_menu->name == 'department' || $sub_menu->name == 'parent' || $sub_menu->name == 'accountant' || $sub_menu->name == 'librarian' || $sub_menu->name == 'student' || $sub_menu->name == 'addon_manager' || $sub_menu->name == 'alumni') --}}
                                    <a href="{{ route($sub_menu->name.'.index') }}">{{ ucfirst(str_replace('_', ' ', $sub_menu->name)) }}</a>
                                @elseif ($sub_menu->name == 'admission')
                                    <a href="{{ route('student.create') }}">{{ ucfirst(str_replace('_', ' ', $sub_menu->name)) }}</a>
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
