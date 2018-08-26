 <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" style="max-width: 48px" class="img-circle" src="{{\Auth::user()->getAvatarurl()}}"/>
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
                    <small>STIKES IMC</small>
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
                <li class="">
                    <a href="#"><i class="fa fa-smile-o"></i> <span class="nav-label">Aplikan</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                        @if(auth()->user()->isPresenter() || auth()->user()->isSuperadmin())
                        <li>
                            <a href="{{route('aplikan.index')}}"><span class="nav-label">Aplikan Terbaru</span></a>
                        </li>
                        <li>
                            <a href="{{route('aplikan.saya')}}"><span class="nav-label">Aplikan Saya</span></a>
                        </li>                    
                        @endif

                        @if(auth()->user()->isReferrer())
                            <li>
                                <a href="{{route('aplikan.saya')}}"><span class="nav-label">Aplikan Saya</span></a>
                            </li>                    
                        @endif

                        @if(!auth()->user()->isReferrer())
                        <li>
                            <a href="{{route('aplikan.all')}}"><span class="nav-label">Semua Aplikan</span></a>
                        </li>                    
                        @endif
                    </ul>
                </li>  
                @if(auth()->user()->isKeuangan())
                <li>
                    <a href="{{route('tagihan.index')}}"><i class="fa fa-money"></i> <span class="nav-label">Tagihan</span><span class="label label-warning pull-right">{{jmlTagihan('tertagih')}}</span></a>
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
                    <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gallery</span></a>
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
                @endif
                
                <li>
                    <a href="{{route('report.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Reports</span></a>
                </li>

                <li>
                    <a target="_blank" href="{{route('page.index')}}"><i class="fa fa-home"></i> <span class="nav-label">Visit Site</span></a>
                </li>            
            </ul>

        </div>
    </nav>