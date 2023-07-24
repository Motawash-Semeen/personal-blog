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
              <li class="active">
                  <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
              </li>
              <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                      <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                      <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                      <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                      <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                      <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                      <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                      <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                      <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                      <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                      <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                  </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                      <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                  </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                      <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                  </ul>
              </li>

              <h3 class="menu-title">Function</h3><!-- /.function-title -->
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-eye"></i>Role</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="{{ url('admin/addrole') }}">Add Role</a></li>
                      <li><i class="menu-icon ti-view-list-alt"></i><a href="page-register.html">Manage Role</a></li>
                      
                  </ul>
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