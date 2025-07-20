<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{setting('site_name')}}</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="{{setting('site_name')}}" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <link rel="icon" type="image/png" href="{{ asset('storage/'.setting('favicon')) }}">
    <!--end::Primary Meta Tags-->
    @stack('styles')
    @include('includes.styles')
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      @include('partials.navbar')
      @include('partials.sidebar')
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            @yield('header-content')
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            @yield('content')
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
     @include('partials.footer')
    </div>
    
    @include('includes.scripts')
    @stack('scripts')
    @include('sweetalert::alert')
  </body>
  <!--end::Body-->
</html>
