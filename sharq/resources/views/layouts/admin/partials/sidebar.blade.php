
<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      {{-- <img src="assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon"> --}}
    </div>
    <div>
      <h4 class="logo-text">IBTASSIM BEX</h4>
    </div>
    <div class="toggle-icon ms-auto">
      <ion-icon name="menu-sharp"></ion-icon>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon">
          <i class="bi bi-house-door"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
      <ul>
        <li> <a href="index.html">
          <i class="bi bi-circle"></i>Default
          </a>
        </li>
        <li> <a href="index2.html">
          <i class="bi bi-circle"></i>Alternate
          </a>
        </li>
      </ul>
    </li>
   

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon">
          <i class="bi bi-list-ul"></i>
        </div>
        <div class="menu-title">Filiers</div>
      </a>
      <ul>
        
          <li class="dropdown">
            <a class="nav-link menu-title" href="{{route('index')}}"><i data-feather="home"></i><span>Dashboard</span></a>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="{{route('users.list')}}"><i data-feather="user"></i><span>Users</span></a>
          </li>
          <li class="dropdown">
          <a class="nav-link menu-title" href="{{route('filiers.list')}}"><i data-feather="activity"></i><span>Filiers</span></a>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="{{route('categories.list')}}"><i data-feather="align-center"></i><span>Categories</span></a>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title" href="{{route('modules.list')}}"><i data-feather="book-open"></i><span>Modules</span></a>
          </li>
          <li class="dropdown">
          <a class="nav-link menu-title" href="{{route('types.list')}}"><i data-feather="command"></i><span>Types</span></a>
          </li>
          <li class="dropdown">
          <a class="nav-link menu-title" href="{{route('subjects.list')}}"><i data-feather="file-text"></i><span>Subjects</span></a>
          </li>
          <li class="dropdown">
          <a class="nav-link menu-title" href="{{route('api.token.view')}}"><i data-feather="terminal"></i><span>API</span></a>
          </li>
   
      </ul>
    </li>


    

    


    <li class="menu-label">Settings</li>

    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon">
          <i class="bi bi-house-door"></i>
        </div>
        <div class="menu-title">Backend</div>
      </a>
      <ul>
        <li> <a href="{{ route('settings.hero') }}">
          <i class="bi bi-circle"></i>Hero
          </a>
        </li>
        <li> <a href="#">
          <i class="bi bi-circle"></i>Alternate
          </a>
        </li>
      </ul>
    </li>




  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->



