<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet" />
  <link rel="stylesheet" id="css-main" href="{{asset('assets/css/filepond.css')}}">
  
  <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}" />
  <title>Blackdash - Bootstrap5 Admin Template</title>

    @stack('styles')
  </head>
  <body>


     <!--start wrapper-->
  <div class="wrapper">


    @include('layouts.admin.partials.sidebar')

  <!--start top header-->
  <header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="mobile-menu-button">
        <i class="bi bi-list"></i>
      </div>
      <form class="searchbar">
        <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
          <i class="bi bi-search"></i>
        </div>
        <input class="form-control" type="text" placeholder="Search for anything">
        <div class="position-absolute top-50 translate-middle-y search-close-icon">
          <i class="bi bi-x-lg"></i>
        </div>
      </form>
      <div class="top-navbar-right ms-auto">

        <ul class="navbar-nav align-items-center">
          <li class="nav-item mobile-search-button">
            <a class="nav-link" href="javascript:;">
              <div class="">
                <i class="bi bi-search"></i>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:;" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
              <div class="">
                <i class="bi bi-gear"></i>
              </div>
            </a>
          </li>
          <li class="nav-item dropdown dropdown-large dropdown-apps">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="">
                <i class="bi bi-grid"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <div class="row row-cols-3 g-3 p-3">
                <div class="col text-center">
                  <div class="app-box mx-auto bg-dark text-white">
                    <i class="bi bi-basket3"></i>
                  </div>
                  <div class="app-title">Orders</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-dark text-white">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="app-title">Teams</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-dark text-white">
                    <i class="bi bi-check2-circle"></i>
                  </div>
                  <div class="app-title">Tasks</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-dark text-white">
                    <i class="bi bi-cast"></i>
                  </div>
                  <div class="app-title">Media</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-dark text-white">
                    <i class="bi bi-folder2-open"></i>
                  </div>
                  <div class="app-title">Files</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-dark text-white">
                    <i class="bi bi-exclamation-triangle"></i>
                  </div>
                  <div class="app-title">Alerts</div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="position-relative">
                <span class="notify-badge">8</span>
                <i class="bi bi-bell"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="javascript:;">
                <div class="msg-header">
                  <p class="msg-header-title">Notifications</p>
                  <p class="msg-header-clear ms-auto">Marks all as read</p>
                </div>
              </a>
              <div class="header-notifications-list">
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-basket2"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                          ago</span></h6>
                      <p class="msg-info">You have recived new orders</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                          ago</span></h6>
                      <p class="msg-info">5 new user registered</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-file-earmark"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                          ago</span></h6>
                      <p class="msg-info">The pdf files generated</p>
                    </div>
                  </div>
                </a>

                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-check2-all"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                      <p class="msg-info">Your new product has approved</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-send"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                          ago</span></h6>
                      <p class="msg-info">5.1 min avarage time response</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-chat-dots"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                          ago</span></h6>
                      <p class="msg-info">New customer comments recived</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-archive"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                          ago</span></h6>
                      <p class="msg-info">24 new authors joined last week</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-camera-video"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                          ago</span></h6>
                      <p class="msg-info">Successfully shipped your item</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify">
                      <i class="bi bi-bucket"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                          ago</span></h6>
                      <p class="msg-info">45% less alerts last 4 weeks</p>
                    </div>
                  </div>
                </a>
              </div>
              <a href="javascript:;">
                <div class="text-center msg-footer">View All Notifications</div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-user-setting">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="user-setting">
                <img src="https://via.placeholder.com/110X110/212529/fff" class="user-img" alt="">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex flex-row align-items-center gap-2">
                    <img src="https://via.placeholder.com/110X110/212529/fff" alt="" class="rounded-circle" width="54" height="54">
                    <div class="">
                      <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                      <small class="mb-0 dropdown-user-designation text-secondary">UI Developer</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Profile</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="settings-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Setting</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="speedometer-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Dashboard</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Earnings</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="cloud-download-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Downloads</span></div>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="log-out-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Logout</span></div>
                  </div>
                </a>
              </li>
            </ul>
          </li>

        </ul>

      </div>
    </nav>
  </header>
  <!--end top header-->

  
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Dashboard</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;">
                    <ion-icon name="home-outline"></ion-icon>
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
              </ol>
            </nav>
          </div>
          <div class="ms-auto">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-dark">Settings</button>
              <button type="button"
                class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                  href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
              </div>
            </div>
          </div>
        </div>
        <!--end breadcrumb-->

 
   
          @yield('content')
          <!-- Container-fluid Ends-->
        </div>

      </div>
    </div>
       
    
  <!-- JS Files-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!--plugins-->
  <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/index.js') }}"></script>
   <!--notification js -->
  <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>

  <!-- Main JS-->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{asset('assets/js/filepond.js')}}"></script>

       



  <script>

@if(count($errors) > 0)
        @foreach($errors->all() as $error)
        Lobibox.notify('info', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-error',
		msg: '{{ $error }}'
	});
        @endforeach
    @endif




    
</script>





@stack('scripts')
  </body>
</html>