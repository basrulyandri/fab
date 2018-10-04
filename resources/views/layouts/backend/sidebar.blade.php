 <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" style="width: 48px;height: 48px;" class="img-circle" src="{{\Auth::user()->getAvatarurl()}}"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{\Auth::user()->getNameOrEmail(true)}}</strong>
                             </span> <span class="text-muted text-xs block">{{\Auth::user()->role->name}} <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{route('my.profile')}}">Profile</a></li>                            
                            <li class="divider"></li>
                            <li><a href="{{route('auth.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    <small>BAF</small>
                    <div class="logo-element">
                        Rollo
                    </div>
                </li>                
                <li>
                    <a href="{{route('dashboard.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                @if(auth()->user()->isAdmin())
                <li class="">
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">RBAC</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                        <li><a href="{{route('users.index')}}">Users</a></li>
                        @if(auth()->user()->isSuperAdmin())
                            <li><a href="{{route('roles.index')}}">Roles</a></li>
                            <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                        @endif
                    </ul>
                </li>  
                @endif
              
                @if(auth()->user()->isAdmin())
                <li>
                    <a href="{{route('posts.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Posts</span></a>
                </li>

                <li>
                    <a href="{{route('static.pages.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Pages</span></a>
                </li>                
                
                <li>
                    <a href="{{route('theme.options.general')}}"><i class="fa fa-wrench"></i><span class="nav-label"> Theme Options</span></a>
                </li>

                <li>
                    <a href="{{route('setting.general')}}"><i class="fa fa-gear"></i><span class="nav-label"> Settings</span></a>
                </li>

                <li>
                    <a href="{{route('menus.index')}}"><i class="fa fa-wrench"></i><span class="nav-label"> Menus</span></a>
                </li>
                <li>
                    <a href="{{route('levels.index')}}"><i class="fa fa-book"></i> <span class="nav-label">CIMA Levels</span></a>
                </li>
                <li>
                    <a href="{{route('testimonials.index')}}"><i class="fa fa-book"></i> <span class="nav-label">Testimonial</span></a>
                </li>

                <li>
                    <a href="{{route('report.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Reports</span></a>
                </li>
                <li class="">
                    <a href="#"><i class="fa fa-health"></i> <span class="nav-label">Extras</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                        <li><a href="{{route('dashboard.pagebuilder')}}">Page Builder</a></li>                       
                    </ul>
                </li>
                @endif

                @if(auth()->user()->isStudent())
                    <li>
                        <a href="{{route('my.courses')}}"><i class="fa fa-book"></i> <span class="nav-label">My Courses</span></a>
                    </li>
                @endif

                <li>
                    <a target="_blank" href="{{route('page.index')}}"><i class="fa fa-home"></i> <span class="nav-label">BAF Site</span></a>
                </li>  

                <li style="margin-top: 30px; text-align: center;">
                    <img style="width: 80%;" src="{{url('/').getOption('theme_option_logo')}}" alt="">
                </li>          
            </ul>

        </div>
    </nav>