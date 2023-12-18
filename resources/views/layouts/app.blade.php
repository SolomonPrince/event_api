<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="/admin/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="/admin/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="/admin/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
    @if(isset($title_page))
        {{ $title_page }}
    @endif
    @if(isset($style))
        {{ $style }}
    @endif

  </head>

  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- sidebar menu -->
            @include('layouts.sidebar')
            <!-- /sidebar menu -->
  
            <!-- top navigation -->
            @include('layouts.navigation')
            <!-- /top navigation -->
  
          <!-- page content -->
          {{ $slot }}
          <!-- /page content -->
  
          <!-- footer content -->
          @include('layouts.footer')
          <!-- /footer content -->
        </div>
      </div>
  
      <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
      </div>
  
      <!-- jQuery -->
      <script src="/admin/vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
     <script src="/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- FastClick -->
      <script src="/admin/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="/admin/vendors/nprogress/nprogress.js"></script>
      <!-- bootstrap-progressbar -->
      <script src="/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
      <!-- iCheck -->
      <script src="/admin/vendors/iCheck/icheck.min.js"></script>
      <!-- PNotify -->
      <script src="/admin/vendors/pnotify/dist/pnotify.js"></script>
      <script src="/admin/vendors/pnotify/dist/pnotify.buttons.js"></script>
      <script src="/admin/vendors/pnotify/dist/pnotify.nonblock.js"></script>
  
      <!-- Custom Theme Scripts -->
      <script src="/admin/build/js/custom.min.js"></script>
      <script>
        function updatePage() {
          $.ajax({
            url: "{{route('event.ajax')}}",
            method: "GET",
            success: function(data) {
              $("#event_list").html(data);
            },
            error: function(error) {
              console.error("Error fetching data:", error);
            }
          });
        }

        setInterval(updatePage, 30000);
      </script>
      @if(isset($script))
            {{ $script }}
        @endif

    </body>
  </html>
