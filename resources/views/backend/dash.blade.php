<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel | Help Needy</title>
    <link
      rel="shortcut icon"
      type="image/png"
      href="{{ asset('dashboard/assets/images/logos/favicon.png') }}"
    />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/styles.min.css') }}" />

    {{-- custom style sheet --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/dash-custom.css') }}">

  </head>

  <body>
    <!--  Body Wrapper -->
    <div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div
            class="brand-logo d-flex align-items-center justify-content-between"
          >
            <a href="./index.html" class="text-nowrap logo-img" style="font-size:20px;color:#000;font-weight:bold">
              <img
                src="{{ asset('dashboard/assets/images/logos/main-logo.png') }}"
                width="50" height="50"
                alt=""
              />
              Help Needy
            </a>
            <div
              class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
              id="sidebarCollapse"
            >
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ url('/dash-board') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Donation</span>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ url('/campaign') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Campaign</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ url('/events') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-calendar-event"></i>
                  </span>
                  <span class="hide-menu">Events</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ url('/volunteers') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-box-multiple-0"></i>
                  </span>
                  <span class="hide-menu">Volunteers</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ url('/testimonials') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-box-margin"></i>
                  </span>
                  <span class="hide-menu">Testimonials</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ url('/news') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-brand-airtable"></i>
                  </span>
                  <span class="hide-menu">Latest News</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="{{ URL::to('users') }}"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Users</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="#"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-file-description"></i>
                  </span>
                  <span class="hide-menu">Settings</span>
                </a>
              </li>



            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->

      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a
                  class="nav-link sidebartoggler nav-icon-hover"
                  id="headerCollapse"
                  href="javascript:void(0)"
                >
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
              </li>
            </ul>
            <div
              class="navbar-collapse justify-content-end px-0"
              id="navbarNav"
            >
              <ul
                class="navbar-nav flex-row ms-auto align-items-center justify-content-end"
              >
                <li class="nav-item dropdown">
                  <a
                    class="nav-link nav-icon-hover"
                    href="javascript:void(0)"
                    id="drop2"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img
                      src="{{ asset('dashboard/assets/images/profile/user-1.jpg') }}"
                      alt=""
                      width="35"
                      height="35"
                      class="rounded-circle"
                    />
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop2"
                  >
                    <div class="message-body">
                      <a
                        href="javascript:void(0)"
                        class="d-flex align-items-center gap-2 dropdown-item"
                      >
                        <i class="ti ti-user fs-6"></i>
                        <p class="mb-0 fs-3">My Profile</p>
                      </a>
                      <a
                        href="javascript:void(0)"
                        class="d-flex align-items-center gap-2 dropdown-item"
                      >
                        <i class="ti ti-mail fs-6"></i>
                        <p class="mb-0 fs-3">My Account</p>
                      </a>
                      <a
                        href="javascript:void(0)"
                        class="d-flex align-items-center gap-2 dropdown-item"
                      >
                        <i class="ti ti-list-check fs-6"></i>
                        <p class="mb-0 fs-3">My Task</p>
                      </a>

                      <a href="#"
                        class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >Logout</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        
                      </form>

                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
          
          @yield('dash-content')

        </div>
      </div>
    </div>
    <script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/dashboard.js') }}"></script>
  </body>
</html>
