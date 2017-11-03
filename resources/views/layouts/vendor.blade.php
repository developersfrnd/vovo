<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.partials.vendor.head')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        @include('layouts.partials.vendor.header')
        @include('layouts.partials.vendor.datatablecss')
      </header>
      <!-- =============================================== -->
      @if(Auth::user())
      <aside class="main-sidebar">
        <section class="sidebar">
          @include('layouts.partials.vendor.sidebar')
        </section>
      </aside>
      <div class="control-sidebar-bg"></div>
      @endif
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        <section class="content">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer>
        @include('layouts.partials.vendor.footer')
      </footer>
    </div>
    <!-- jQuery 3 -->
    <script src="{{ asset('assets/vendor') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/vendor') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/vendor') }}/dist/js/adminlte.min.js"></script>


  @include('layouts.partials.vendor.datatablejs')

  </body>
</html>
