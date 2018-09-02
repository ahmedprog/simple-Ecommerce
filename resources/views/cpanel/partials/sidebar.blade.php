@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            {{--<li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">--}}
                {{--<a href="{{ url('/') }}">--}}
                    {{--<i class="fa fa-wrench"></i>--}}
                    {{--<span class="title">@lang('quickadmin.qa_dashboard')</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>
                        @endcan




                </ul>
            </li>@endcan

            <li class="treeview">
                <a href="#" ><i class="fa fa-cog" aria-hidden="true"></i><span class="nav-label">Products</span><span class="fa arrow"></span></a>
                <ul class="treeview-menu" >
                    <li class="active"><a href="/admin" >Categories</a></li>
                    <li><a href="/admin/products" >Products</a></li>
                </ul>
            </li>
            <li >
                <a href="/admin/users" ><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Users</span></a>
            </li>
            <li >
                <a href="/admin/orders" ><i class="fa fa-plus" aria-hidden="true"></i></i> <span class="nav-label">Orders</span></a>
            </li>

            <li >
                <a href="/admin/control" ><i class="fa fa-lock" aria-hidden="true"></i> <span class="nav-label">Admin Control</span></a>
            </li>







            {{--<li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">--}}
                {{--<a href="{{ route('auth.change_password') }}">--}}
                    {{--<i class="fa fa-key"></i>--}}
                    {{--<span class="title">@lang('quickadmin.qa_change_password')</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
        {{--<ul class="nav metismenu" id="side-menu">--}}
            {{--<li class="nav-header">--}}
                {{--<div class="dropdown profile-element">--}}
                        {{--<span>--}}
                        {{--<img alt="image"  src="{{ asset('cpanel/img/logo.png') }}" style="max-width: 215px;" />--}}
                        {{--</span>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-9">--}}
                            {{--<div class=" m-t-xs pull-right"><span class="main-color font-bold">Welcome ,  </span> <strong class="font-bold white"> {{Auth::guard('admins')->user('admin')->username}}   </strong>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-1">--}}
                            {{--<a href="{{ URL('admin/admin-sign-out') }}" class="fa fa-sign-out " style="font-size: 22px; margin-top: 4px"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="logo-element">--}}
                    {{--Penta Levels--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="m-t-sm active">--}}
                {{--<a href="#" class="dropmenu"><i class="fa fa-cog" aria-hidden="true"></i><span class="nav-label">Products</span><span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level collapse in sublink" >--}}
                    {{--<li class="active"><a href="/admin" >Categories</a></li>--}}
                    {{--<li><a href="/admin/products" >Products</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="m-t-sm">--}}
                {{--<a href="/admin/users" class="dropmenu"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Users</span></a>--}}
            {{--</li>--}}
            {{--<li class="m-t-sm">--}}
                {{--<a href="/admin/orders" class="dropmenu"><i class="fa fa-plus" aria-hidden="true"></i></i> <span class="nav-label">Orders</span></a>--}}
            {{--</li>--}}

            {{--<li class="m-t-sm ">--}}
                {{--<a href="/admin/control" class="dropmenu"><i class="fa fa-lock" aria-hidden="true"></i> <span class="nav-label">Admin Control</span></a>--}}
            {{--</li>--}}


        {{--</ul>--}}

    </section>

</aside>

