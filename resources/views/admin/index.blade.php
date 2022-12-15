 <!-- ======= Header ======= -->
 @include('admin._partials.header')
 <!-- End Header -->

 <!-- ======= Sidebar ======= -->
 @include('admin._partials.sidebar')
 <!-- End Sidebar-->

<!-- SweetAlert -->
@include('sweetalert::alert')
<!-- End SweetAlert -->

 <!-- Content -->
 @yield('content')
 <!-- End Content -->

 <!-- ======= Footer ======= -->
 @include('admin._partials.footer')
 <!-- End Footer -->
