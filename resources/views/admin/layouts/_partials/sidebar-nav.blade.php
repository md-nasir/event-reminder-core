<nav class="sidebar sidebar-offcanvas" id="sidebar">
{{--    <ul class="nav">--}}
{{--        @foreach($menus as $menu)--}}
{{--            @if(empty($menu['children']))--}}
{{--                @if(hasPermission($menu['route']))--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ !empty($menu['route_param']) ? route($menu['route'], $menu['route_param']) : route($menu['route']) }}">--}}
{{--                            {!! $menu['icon']!= null?$menu['icon']:'<i class="mdi mdi-home menu-icon"></i>' !!}--}}
{{--                            <span class="menu-title">{{ $menu['title'] }}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--            @elseif(hasAnyPermittedChild($menu['children']))--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="collapse" href="#system_{{$loop->iteration}}" aria-expanded="false"--}}
{{--                       aria-controls="system_{{$loop->iteration}}">--}}
{{--                        {!! $menu['icon']!= null?$menu['icon']:'<i class="mdi mdi-cogs menu-icon"></i>' !!}--}}
{{--                        <span class="menu-title">{{ $menu['title'] }}</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}

{{--                    <div class="collapse" id="system_{{$loop->iteration}}">--}}
{{--                        <ul class="nav flex-column sub-menu">--}}
{{--                            @foreach($menu['children'] as $child)--}}
{{--                                @if(hasPermission($child['route']))--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link"--}}
{{--                                           href="{{ !empty($child['route_param']) ? route($child['route'], $child['route_param']) : route($child['route']) }}">--}}
{{--                                            {!! $child['icon']!= null?$child['icon']:'<i class="mdi mdi-checkbox-blank-circle-outline mr-2"></i>' !!}--}}
{{--                                            {{ $child['title'] }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    </ul>--}}
</nav>
