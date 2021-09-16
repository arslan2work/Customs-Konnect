
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Custom Konnect</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper" id="app">

 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <div class="input-group input-group-md">
        <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/CK2.png"  class="brand-image" >
      <span class="brand-text font-weight-light">Custom Konnect</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          {{ Auth::user()->name }}
          <p>
          {{ Auth::user()->type }}
          </p>
          </a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->









               <li class="nav-item">
                <router-link to="/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </router-link>
             </li>
             @can('isAdmin')
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/users" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                CBSA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/cbsACI" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>ACI</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/cbsPARS" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>PARS</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                CBP
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/cbpACE" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>ACE</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/cbpPAPS" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>PAPS</p>
                </router-link>
              </li>
              
            </ul>
          </li>
             
          <li class="nav-item">
                <router-link to="/developer" class="nav-link">
                  <i class="nav-icon fas  fa-cogs"></i>
                  <p>Developer</p>
                </router-link>
          </li>
             @endcan








             @can('isUser')
            @can('isPayment')
          <li class="nav-item">
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Employee Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/employees" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Employees</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                ACI eManifest
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/newACI" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>New ACI</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/aciNotices" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>ACI Notices</p>
                </router-link>
              </li>
              
              </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                ACE eManifest
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/newAce" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>New ACE</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/aceNotices" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>ACE Notices</p>
                </router-link>
              </li>
              </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                In Bond Shipment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/inBond" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>New In Bond Shipment</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>In Bond Notices</p>
                </a>
              </li>
              </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Customs Consultation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/customs" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Requests</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/customsResponse" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Responses</p>
                </router-link>
              </li>
              
              </ul>
          </li>
              
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Manage Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/truck" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Trucks</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/trailer" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Trailers</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/driver" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Drivers</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/shipper" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Shippers/Consignees</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          
  

          


          <li class="nav-item">
                <router-link to="/company" class="nav-link">
                  <i class="nav-icon fas  fa-user"></i>
                  <p>Company</p>
                </router-link>
             </li>
          <li>
          <li class="nav-item">
                <router-link to="/track" class="nav-link">
                  <i class="nav-icon fas  fa-user"></i>
                  <p>Tracking</p>
                </router-link>
          </li>
          @endcan
          <li class="nav-item">
                <router-link to="/payment" class="nav-link">
                  <i class="nav-icon fas  fa-user"></i>
                  <p>Payment</p>
                </router-link>
             </li>
          <li>
          @endcan






          @can('isEmployee')
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                ACI eManifest
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/newACI" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>New ACI</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ACI Notices</p>
                </a>
              </li>
              </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                ACE eManifest
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/newAce" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>New ACE</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ACE Notices</p>
                </a>
              </li>
              </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                In Bond Shipment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/inBond" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>New In Bond Shipment</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>In Bond Notices</p>
                </a>
              </li>
              </ul>
          </li>
              
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Manage Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/truck" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Trucks</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/trailer" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Trailers</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/driver" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Drivers</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/shipper" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Shippers/Consignees</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          
  

          
          <li class="nav-item">
                <router-link to="/track" class="nav-link">
                  <i class="nav-icon fas  fa-user"></i>
                  <p>Tracking</p>
                </router-link>
          </li>
          @endcan
















          
          <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                  <i class="nav-icon fas  fa-user"></i>
                  <p>Profile</p>
                </router-link>
             </li>






             @can('isDispatch')
             <li class="nav-item menu-close">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Dispatch Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/dispatch" class="nav-link ">
                      <i class="fas fa-users nav-icon"></i>
                      <p>Dispatches</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dispatch Notices</p>
                    </a>
                  </li>
                  </ul>
                </li>
                @endcan
             @can('isCustom')
             <li class="nav-item menu-close">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Customs Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/CustomsAdminRequests" class="nav-link ">
                      <i class="fas fa-users nav-icon"></i>
                      <p>Requests</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/CustomsAdminResponse" class="nav-link ">
                      <i class="fas fa-users nav-icon"></i>
                      <p>Response</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/dispatch" class="nav-link ">
                      <i class="fas fa-users nav-icon"></i>
                      <p>Terminals</p>
                    </router-link>
                  </li>
                  
                  </ul>
                </li>
                @endcan
       
                <li class="nav-item menu-close logout">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                        {{ __('Logout') }}

                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
             </li>
         

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <vue-progress-bar></vue-progress-bar>
      <router-view></router-view>
   
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">Custom Konnect</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@auth
<script>
  window.user = @json(auth() -> user())
</script>
@endauth


<script src="/js/app.js"></script>
</body>
</html>
