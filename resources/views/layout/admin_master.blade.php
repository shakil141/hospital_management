@include('admin.backend_partials.backend_header')
<!-- partial:partials/_sidebar.html -->
@include('admin.backend_partials.backend_sidebar')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_navbar.html -->
  @include('admin.backend_partials.backend_topbar')
  <!-- partial -->
  @yield('main_panel')
  <!-- main-panel ends -->
@include('admin.backend_partials.backend_footer')
