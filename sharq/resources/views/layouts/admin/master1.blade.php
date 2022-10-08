<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title></title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
    @stack('styles')
  </head>

  <body>
    
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Side Overlay-->
      <aside id="side-overlay">
        <!-- Side Header -->
        <div class="bg-image" style="background-image: url('assets/media/various/bg_side_overlay_header.jpg');">
          <div class="bg-primary-op">
            <div class="content-header">
              <!-- User Avatar -->
              <a class="img-link me-1" href="be_pages_generic_profile.html">
                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
              </a>
              <!-- END User Avatar -->

              <!-- User Info -->
              <div class="ms-2">
                <a class="text-white fw-semibold" href="be_pages_generic_profile.html">George Taylor</a>
                <div class="text-white-75 fs-sm">Full Stack Developer</div>
              </div>
              <!-- END User Info -->

              <!-- Close Side Overlay -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="ms-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times-circle"></i>
              </a>
              <!-- END Close Side Overlay -->
            </div>
          </div>
        </div>
        <!-- END Side Header -->

      </aside>
    </div>
    
  
   <!-- Content -->
   <div class="block-content block-content-sm block-content-full bg-body">
    <span class="text-uppercase fs-sm fw-bold">Content</span>
  </div>
  <div class="block-content block-content-full">
    <div class="row g-sm text-center">
      <div class="col-6 mb-1">
        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
      </div>
      <div class="col-6 mb-1">
        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
      </div>
      <div class="col-12 mb-1">
        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
      </div>
    </div>
  </div>
  <!-- END Content -->.


    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/chart.js/chart.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/be_pages_dashboard.min.js"></script>

    @stack('scripts')

    
  </body>
</html>
