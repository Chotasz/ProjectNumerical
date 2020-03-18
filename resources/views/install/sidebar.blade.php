<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center"> 
                    <span>
                        <img alt="image" class="img-circle" src="{{asset('img/profile_small.jpg')}}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">User Test</strong>
                        </span>  </span> </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="" >
                <a href="{{url('')}}">
                
                    <i class="fa fa-home"></i> 
                    <span class="nav-label">หน้าแรก</span>
                    
                </a>
            </li>
            @if(isset($menus))
                @foreach($menus as $menu)
                    @if(sizeof($menu->SubMenu)>0)
                    <li class="{{ (isset($main_menu)&&$menu->link==$main_menu)? 'active':'' }}">
                        <a href="#!">
                            <i class="{{$menu->icon}}"></i> 
                            <span class="nav-label">{{$menu->name}}</span> 
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @foreach($menu->SubMenu as $sub)
                                <li class="{{ (isset($sub_menu)&&$sub->link==$sub_menu)? 'active':'' }}">
                                    <a href="{{url('admin/'.$sub->link)}}">{{$sub->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li class="{{ (isset($main_menu)&&$menu->link==$main_menu)? 'active':'' }}" >
                        <a href="{{url('admin/'.$menu->link)}}">
                        
                            <i class="{{$menu->icon}}"></i> 
                            <span class="nav-label">{{$menu->name}}</span>
                            
                        </a>
                    </li>
                    @endif
                @endforeach
            @endif
        </ul>

    </div>
</nav>
