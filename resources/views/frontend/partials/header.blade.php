    <!-- page First Navigation -->
    <nav class="navbar navbar-light bg-light">
      <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
              <img src="assets/imgs/Untitled_design-removebg-preview.png" alt="" style="width: 30%;">
          </a>
          <div class="socials">
              <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
              <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
              <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
              <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
              <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
          </div>
      </div>
  </nav>
  <!-- End Of First Navigation -->

  <!-- Page Second Navigation -->
  <nav class="navbar custom-navbar navbar-expand-md navbar-light bg-primary sticky-top">
      <div class="container">
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/posts') }}">All Posts</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/post') }}">Single Post</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Category
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          
                      </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/author') }}">Author</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                </li>
              </ul>
              <div class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <form class="form-inline my-2 my-lg-0" id="myForm">
                          <input class="form-control mr-sm-2" type="text" placeholder="Search" name="data">
                          <span class="search-icon" id="submitBtn"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
                      </form>
                  </li>
              </div>
          </div>
      </div>
  </nav>
  <!-- End Of Page Second Navigation -->