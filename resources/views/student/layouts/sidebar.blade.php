 @php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
            <a href="{{ route('student.dashboard') }}" class="nav-link {{ request()->is('student/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->