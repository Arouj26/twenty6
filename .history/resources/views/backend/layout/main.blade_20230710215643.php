<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />


        <title>Twenty6 Admin Portal</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{url('backend/assets/img/favicon/favicon.ico')}}" />
        <link href="{{url('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{url('backend/assets/vendor/fonts/boxicons.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{url('backend/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{url('backend/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{url('backend/assets/css/demo.css')}}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{url('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

        <link rel="stylesheet" href="{{url('backend/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="{{url('backend/assets/vendor/js/helpers.js')}}"></script>


        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{url('backend/assets/js/config.js')}}"></script>
        <script src="https://kit.fontawesome.com/899e356998.js" crossorigin="anonymous"></script>
      </head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder">Twenty6 Admin</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="{{URL('admin')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
              <!-- Orders -->
              <li class="menu-item">
                <a href="{{url('admin/orders')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-receipt"></i>
                  <div data-i18n="Basic">Orders</div>
                </a>
                </li>
              <!-- /Orders -->
              <!-- Products -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div>Products</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{URL('admin/products')}}" class="menu-link">
                      <div>Products List</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{URL('admin/add-products-variants')}}" class="menu-link">
                      <div>Add products</div>
                    </a>
                  </li>
                </ul>
                <!-- /Products -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-notepad"></i>
                  <div>Blogs</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{URL('admin/blog')}}" class="menu-link">
                      <div>Blog</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{URL('admin/add-blog')}}" class="menu-link">
                      <div>Add blog</div>
                    </a>
                  </li>
                </ul>

            </li>
                         <!-- Contact -->
                          <li class="menu-item">
                            <a href="{{url('admin/contact-info')}}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-at"></i>
                              <div data-i18n="Basic">Contact Info</div>
                            </a>
                            </li>
                          <!-- /Contact -->
                          <!-- Message -->
                          <li class="menu-item">
                            <a href="{{url('admin/messages')}}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-comment-detail"></i>
                              <div data-i18n="Basic">Messages</div>
                            </a>
                            </li>
                          <!-- /Message -->
                          <!-- Settings -->
                          <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-cog"></i>
                              <div>Settings</div>
                            </a>

                            <ul class="menu-sub">
                              <li class="menu-item">
                                <a href="{{URL('admin/systemsettings')}}" class="menu-link">
                                  <div>System Settings</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a href="{{URL('admin/homesettings')}}" class="menu-link">
                                  <div>Home settings</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a href="{{URL('admin/cartsettings')}}" class="menu-link">
                                  <div>Cart settings</div>
                                </a>
                              </li>
                            </ul>
                            <li class="menu-item">
                                <a href="{{url('admin/profile')}}" class="menu-link">
                                  <i class="menu-icon tf-icons fa fa-user-circle-o"></i>
                                  <div data-i18n="Basic">Profile</div>
                                </a>
                                </li>
                        </li>
                          <!-- /Settings -->

              </li>
        </ul>
    </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" class="form-control border-0 shadow-none" name="search" placeholder="Search...">
                  </div>
                </div>
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                    <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="#">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block">John Doe</span>
                              <small class="text-muted">Admin</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="bx bx-user me-2"></i>
                          <span class="align-middle">My Profile</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="bx bx-cog me-2"></i>
                          <span class="align-middle">Settings</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <span class="d-flex align-items-center align-middle">
                            <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                            <span class="flex-grow-1 align-middle">Billing</span>
                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="auth-login-basic.html">
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>
              <!-- /Search -->
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

                    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('backend/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{url('backend/asstes/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('backend/asstes/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('backend/asstes/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{url('backend/asstes/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{url('backend/asstes/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('backend/asstes/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{url('backend/asstes/js/dashboards-analytics.js')}}"></script>
    <script>
        $(document).ready(function() {
          $('.menu-toggle').click(function(e) {
            e.preventDefault();
            $(this).next('.menu-sub').slideToggle();
          });
        });
      </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
    <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
       <!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->


  </body>
</html>

