@extends('backend.master')
@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
      <div class="page-header float-left">
          <div class="page-title">
              <h1>Dashboard</h1>
          </div>
      </div>
  </div>
  <div class="col-sm-8">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li class="active">Dashboard</li>
              </ol>
          </div>
      </div>
  </div>
</div>

<div class="content mt-3">
@if (session()->has('message'))
  <div class="col-sm-12">
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
        
          <span class="badge badge-pill badge-success">{{ session()->get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  </div>
@endif

  <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-1">
          <div class="card-body pb-0">
              <div class="dropdown float-right">
                  <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                      <i class="fa fa-cog"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <div class="dropdown-menu-content">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <h4 class="mb-0">
                  <span class="count">10468</span>
              </h4>
              <p class="text-light">Members online</p>

              <div class="chart-wrapper px-0" style="height:70px;" height="70">
                  <canvas id="widgetChart1"></canvas>
              </div>

          </div>

      </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-2">
          <div class="card-body pb-0">
              <div class="dropdown float-right">
                  <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                      <i class="fa fa-cog"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                      <div class="dropdown-menu-content">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <h4 class="mb-0">
                  <span class="count">10468</span>
              </h4>
              <p class="text-light">Members online</p>

              <div class="chart-wrapper px-0" style="height:70px;" height="70">
                  <canvas id="widgetChart2"></canvas>
              </div>

          </div>
      </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-3">
          <div class="card-body pb-0">
              <div class="dropdown float-right">
                  <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                      <i class="fa fa-cog"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                      <div class="dropdown-menu-content">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <h4 class="mb-0">
                  <span class="count">10468</span>
              </h4>
              <p class="text-light">Members online</p>

          </div>

          <div class="chart-wrapper px-0" style="height:70px;" height="70">
              <canvas id="widgetChart3"></canvas>
          </div>
      </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-4">
          <div class="card-body pb-0">
              <div class="dropdown float-right">
                  <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                      <i class="fa fa-cog"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                      <div class="dropdown-menu-content">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <h4 class="mb-0">
                  <span class="count">10468</span>
              </h4>
              <p class="text-light">Members online</p>

              <div class="chart-wrapper px-3" style="height:70px;" height="70">
                  <canvas id="widgetChart4"></canvas>
              </div>

          </div>
      </div>
  </div>
  <!--/.col-->

  <div class="col-lg-3 col-md-6">
      <div class="social-box facebook">
          <i class="fa fa-facebook"></i>
          <ul>
              <li>
                  <span class="count">40</span> k
                  <span>friends</span>
              </li>
              <li>
                  <span class="count">450</span>
                  <span>feeds</span>
              </li>
          </ul>
      </div>
      <!--/social-box-->
  </div>
  <!--/.col-->


  <div class="col-lg-3 col-md-6">
      <div class="social-box twitter">
          <i class="fa fa-twitter"></i>
          <ul>
              <li>
                  <span class="count">30</span> k
                  <span>friends</span>
              </li>
              <li>
                  <span class="count">450</span>
                  <span>tweets</span>
              </li>
          </ul>
      </div>
      <!--/social-box-->
  </div>
  <!--/.col-->


  <div class="col-lg-3 col-md-6">
      <div class="social-box linkedin">
          <i class="fa fa-linkedin"></i>
          <ul>
              <li>
                  <span class="count">40</span> +
                  <span>contacts</span>
              </li>
              <li>
                  <span class="count">250</span>
                  <span>feeds</span>
              </li>
          </ul>
      </div>
      <!--/social-box-->
  </div>
  <!--/.col-->


  <div class="col-lg-3 col-md-6">
      <div class="social-box google-plus">
          <i class="fa fa-google-plus"></i>
          <ul>
              <li>
                  <span class="count">94</span> k
                  <span>followers</span>
              </li>
              <li>
                  <span class="count">92</span>
                  <span>circles</span>
              </li>
          </ul>
      </div>
      <!--/social-box-->
  </div>
  <!--/.col-->


</div> <!-- .content -->

@endsection