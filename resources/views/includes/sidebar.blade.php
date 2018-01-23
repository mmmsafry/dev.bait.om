<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

        <li class="active treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">

            </span>
            </a>

        </li>
		 @can('edit_users')
        <li>
            <a href="{{ route('users.index') }}">
                <i class="fa fa-user-plus"></i> <span>Manage User</span>
                <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
            </a>
        </li>
		 @endcan
         @can('edit_roles')
        <li>
            <a href="{{ route('roles.index') }}">
                <i class="fa fa-user"></i> <span>Manage Roles</span>
                <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
            </a>
        </li>
		 @endcan

        <li class="treeview">
            <a href="#">
                <i class="fa  fa-reorder"></i>
                <span>Manage Property</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('category_types.index') }}"><i class="fa fa-circle-o"></i>Category Types</a></li>
                <li><a href="{{ route('property_types.index') }}"><i class="fa fa-circle-o"></i>Property Types</a></li>
		<li><a href="{{ route('furniture_types.index') }}"><i class="fa fa-circle-o"></i>Furniture Types</a></li>
                <li><a href="{{ route('bed_types.index') }}"><i class="fa fa-circle-o"></i>Bed Types</a></li>
                <li><a href="{{ route('room_types.index') }}"><i class="fa fa-circle-o"></i>Room Types</a></li>
                <li><a href="{{ route('room_amenities.index') }}"><i class="fa fa-circle-o"></i>Room Amenities</a></li>
                <li><a href="{{ route('bathroom_types.index') }}"><i class="fa fa-circle-o"></i>Bathroom Types</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-search"></i>
                <span>Search</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> test</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> test & Rate test</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> test</a></li>
            </ul>
        </li>

        <li>
            <a href="pages/widgets.html">
                <i class="fa  fa-book"></i> <span>test</span>
                <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
            </a>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>test</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> test test</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> test test</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> test</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>test</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple test</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data test</a></li>
            </ul>
        </li>
        <li>
            <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
            </a>
        </li>
        <li>
            <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Level One
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
