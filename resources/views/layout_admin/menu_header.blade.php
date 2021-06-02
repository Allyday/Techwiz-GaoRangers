{{-- menu --}}
<div class="page-wrapper chiller-theme toggled">
   <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
   </a>
   <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
         <div class="sidebar-brand">
            <a href="{{ route('home') }}">FoodMate</a>
            <div id="close-sidebar">
               <i class="fas fa-times"></i>
            </div>
         </div>
         <div class="sidebar-header">
            {{-- <div class="user-pic">
               <img class="img-responsive img-rounded" src="../assets/img/user.png" alt="User picture">
            </div> --}}
            <div class="user-info">
               <span class="user-name">
                  <strong>Administrator</strong>
               </span>
               <span class="user-role">Administrator</span>
               <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Online</span>
               </span>
            </div>
         </div>
         <!-- sidebar-header  -->
         {{-- <div class="sidebar-search">
            <div>
               <div class="input-group">
                  <input type="text" class="form-control search-menu" placeholder="Search...">
                  <div class="input-group-append">
                     <span class="input-group-text">
                        <i class="fa fa-search" aria-hidden="true"></i>
                     </span>
                  </div>
               </div>
            </div>
         </div> --}}
         <!-- sidebar-search  -->

         <!-- sidebar-menu  -->
         <div class="sidebar-menu">
            <ul>
               <li class="header-menu">
                  <span>RESTAURANT MANAGER
                  </span>
               </li>
               <li>
                  <a href="{{ route('staff', 'day') }}">
                     <i class="fas fa-chart-line"></i>
                     <span>Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('orderStaff') }}">
                     <i class="fas fa-clipboard-list"></i>
                     <span>All Orders</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('dishes') }}">
                     <i class="fas fa-shopping-basket"></i>
                     <span>Manage Menu</span>
                  </a>
               </li>

               <li>
                  <a href="{{ route('setting', session('User')) }}">
                     <i class="fas fa-users"></i> Account Settings
                  </a>
               </li>
               <li>
                  <a href="{{ route('get.chat') }}">
                     <i class="fas fa-users"></i> Function Chat
                  </a>
               </li>

               <li>
                  <a href="{{ route('auth.logout') }}">
                     <i class="fas fa-sign-out-alt"></i>
                     <span>Log out</span>
                  </a>
               </li>
            </ul>
         </div>
         <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
         <a href="#">
            <i class="fa fa-bell"></i>
         </a>
         <a href="#">
            <i class="fa fa-envelope"></i>
         </a>
         <a href="#">
            <i class="fa fa-cog"></i>
         </a>
         <a href="#">
            <i class="fa fa-power-off"></i>
         </a>
      </div>
   </nav>
   <!-- sidebar-wrapper  -->
   <main class="page-content">
      <div class="container-fluid">
         {{-- end menu --}}