 <body >
   <div class="fakeloader"></div>
      <div id="wrapper">
         <nav class="navbar-default navbar-static-side" role="navigation"       style="background-image: url({{ asset('cpanel/img/header-profile.png') }});
            background-repeat: no-repeat;
            background-size: cover;">
            <div class="sidebar-collapse">
               <ul class="nav metismenu" id="side-menu">
                  <li class="nav-header">
                     <div class="dropdown profile-element">
                        <span>
                        <img alt="image"  src="{{ asset('cpanel/img/logo.png') }}" style="max-width: 215px;" />
                        </span>
                        <div class="row">
                           <div class="col-md-9">
                              <div class=" m-t-xs pull-right"><span class="main-color font-bold">Welcome ,  </span> <strong class="font-bold white"> {{Auth::guard('admins')->user('admin')->username}}   </strong>
                              </div>
                           </div>
                           <div class="col-sm-1">
                              <a href="{{ URL('admin/admin-sign-out') }}" class="fa fa-sign-out " style="font-size: 22px; margin-top: 4px"></a>
                           </div>
                        </div>
                     </div>
                     <div class="logo-element">
                        Penta Levels
                     </div>
                  </li>
                  <li class="m-t-sm active">
                     <a href="#" class="dropmenu"><i class="fa fa-cog" aria-hidden="true"></i><span class="nav-label">Products</span><span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level collapse in sublink" >
                        <li class="active"><a href="/admin" >Categories</a></li>
                        <li><a href="/admin/products" >Products</a></li>
                     </ul>
                  </li>
                  <li class="m-t-sm">
                     <a href="/admin/users" class="dropmenu"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Users</span></a>
                  </li>
                  <li class="m-t-sm">
                     <a href="/admin/orders" class="dropmenu"><i class="fa fa-plus" aria-hidden="true"></i></i> <span class="nav-label">Orders</span></a>
                  </li>
                 
                  <li class="m-t-sm ">
                     <a href="/admin/control" class="dropmenu"><i class="fa fa-lock" aria-hidden="true"></i> <span class="nav-label">Admin Control</span></a>
                  </li>
                
                  
               </ul>
               <div class="text-center m-t-70 hidden-sm">
                  <p class="main-color font-bold">Copyrights © Penta Levels 2017</p>
                  <p class="color-white font-bold"><a href="http://paladox.com/" target="_blank">Designed & Developed by Paladox</a></p>
               </div>
            </div>
         </nav>
         <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row ">
               <nav class="navbar navbar-static-top " role="navigation" style="margin-bottom: 0">
                  <div class="navbar-header">
                     <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                  </div>
               </nav>
            </div>