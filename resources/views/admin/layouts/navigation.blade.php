<nav class = "navbar-default navbar-static-side" role = "navigation">
    <div class = "sidebar-collapse">
        <ul class = "nav metismenu" id = "side-menu">
            <li class = "nav-header">
                <div class = "dropdown profile-element">
                    <a data-toggle = "dropdown" class = "dropdown-toggle" href = "#">
                        <span>
                            <img alt = "image" class = "img-circle"
                                 src = "{{ asset(Auth::guard('admin')->user()->avatar ) }}"
                                 width = "48" height = "48" />
                        </span>
                        <span class = "clear">
                            <span class = "block m-t-xs">
                                <strong class = "font-bold">{{ Auth::guard('admin')->user()->name}}</strong>
                            </span> <span class = "text-muted text-xs block">Menu <b class = "caret"></b></span>
                        </span>
                    </a>
                    <ul class = "dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href = "{{route('admin.logout')}}"
                               onclick = "event.preventDefault();document.getElementById('logout-form').submit();">Log
                                Out</a>
                        </li>
                    </ul>
                </div>
                <div class = "logo-element">
                    IN+
                </div>
            </li>
            <li class = "@if (Route::currentRouteName() == 'admin.dashboard.index') active @endif">
                <a href = "{{ route('admin.dashboard.index') }}"><i class = "fa fa-th-large"></i> <span class = "nav-label">Dashboard</span></a>
            </li>


            <li class = "@if (Route::currentRouteName() == 'admin.settings') active @endif">
                <a href = "{{ route('admin.dashboard.index') }}"><i class = "fa fa-cog"></i> <span class = "nav-label">Settings</span>
                </a>
            </li>


        </ul>

    </div>
</nav>
