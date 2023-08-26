<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">

      <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="./"><img src="{{ asset('backend') }}/images/logo.png" alt="Logo"></a>
          <a class="navbar-brand hidden" href="./"><img src="{{ asset('backend') }}/images/logo2.png" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="{{ classActivePath('admin') }}">
                  <a href="{{ url('admin') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
              </li>

              <h3 class="menu-title">Function</h3><!-- /.function-title -->
              <li class="menu-item-has-children dropdown {{ classActivePath('admin/managerole') }}{{ classActivePath('admin/editrole') }}{{ classActivePath('admin/addrole') }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-eye"></i>Role</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li class="{{ classActivePath('admin/addrole') }}"><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/addrole') }}">Add Role</a></li>
                      <li class="{{ classActivePath('admin/managerole') }}{{ classActivePath('admin/editrole') }}"><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/managerole') }}">Manage Role</a></li>
                      
                  </ul>
              </li>
              <li class="menu-item-has-children dropdown {{ classActivePath('admin/manageuser') }}{{ classActivePath('admin/edituser') }}{{ classActivePath('admin/adduser') }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-user"></i>User</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/adduser') }}">Add User</a></li>
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/manageuser') }}">Manage User</a></li>
                      
                  </ul>
              </li>
              <li class="menu-item-has-children dropdown {{ classActivePath('admin/managepost') }}{{ classActivePath('admin/editpost') }}{{ classActivePath('admin/addpost') }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-menu-alt"></i>Post</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/addpost') }}">Add Post</a></li>
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/managepost') }}">Manage Post</a></li>
                      
                  </ul>
              </li>
              <li class="menu-item-has-children dropdown {{ classActivePath('admin/managecategory') }}{{ classActivePath('admin/editcategory') }}{{ classActivePath('admin/addcategory') }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-layers-alt"></i>Category</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/addcategory') }}">Add Category</a></li>
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/managecategory') }}">Manage Category</a></li>
                      
                  </ul>
              </li>
              
              <li class="menu-item-has-children dropdown {{ classActivePath('admin/home-gallaries') }}{{ classActivePath('admin/edit-gallaries') }}{{ classActivePath('admin/add-gallaries') }}">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-gallery"></i>Gallary</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/add-gallaries') }}">Add Gallary</a></li>
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/home-gallaries') }}">Manage Gallary</a></li>
                      
                  </ul>
              </li>
              
              <li class="{{ classActivePath('admin/comments') }}{{ classActivePath('admin/edit-comments') }}">
                  <a href="{{ url('admin/comments') }}" class=""> <i class="menu-icon ti-comments-smiley"></i>Comments</a>
              </li>
              <li class=" {{ classActivePath('admin/home-section') }}">
                  <a href="{{ url('admin/home-section') }}" class=""> <i class="menu-icon ti-layout-media-right-alt"></i>Home Section</a>
              </li>
              
              <li class=" {{ classActivePath('admin/site-settings') }}">
                  <a href="{{ url('admin/site-settings') }}" class=""> <i class="menu-icon ti-settings"></i>Site Settings</a>
              </li>
              <li class=" {{ classActivePath('admin/smtp') }}">
                  <a href="{{ url('admin/smtp') }}" class=""> <i class="menu-icon ti-slice"></i>SMTP Setup</a>
              </li>
              <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                      <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                      <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                  </ul>
              </li>
          </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</aside>

@php
    // Custom helper function to add an active class to navigation links
function classActivePath($path)
{
    return Request::is($path) ? 'active' : '';
}

@endphp