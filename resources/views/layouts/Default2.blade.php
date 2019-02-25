<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Vue Paper Dashboard</title>
    <!-- Bootstrap core CSS     -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css')}}" rel="stylesheet" />
</head>

<body>

<div class="wrapper" id="app">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a  class="simple-text logo-normal">
        {{ Auth::user()->first_name}} ,{{ Auth::user()->last_name }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{ url('/home') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          
          @if(Auth::user()->user_role == 1 || Auth::user()->user_role == 2  || Auth::user()->user_role == 3|| Auth::user()->user_role == 5)
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('proposals') }}">
              <i class="material-icons">content_paste</i>
              <p>Proposals</p>
            </a>
          </li>
            @endif
          <li class="nav-item ">
              <a class="nav-link" href="{{ url('chat') }}">
                <i class="material-icons">chat</i>
                <p>Communicate</p>
              </a>
            </li>

            @if(Auth::user()->user_role == 2)
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('UploadFile') }}">
                  <i class="material-icons">content_paste</i>
                  <p>Upload file</p>
                </a>
              </li>
            @endif

            @if(Auth::user()->user_role == 2)
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('register') }}">
                  <i class="material-icons">person</i>
                  <p>Add user</p>
                </a>
              </li>
            @endif
          

          @if(Auth::user()->user_role == 5)
          <li class="nav-item ">
              <a class="nav-link" href="{{ url('CreateGroup') }}">
                <i class="material-icons">group</i>
                <p>Create a Group</p>
              </a>
            </li>
          @endif

           @if(Auth::user()->user_role == 4)
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('Evaluate') }}">
              <i class="material-icons">content_paste</i>
              <p>Evaluate</p>
            </a>
          </li>

          @endif

          @if(Auth::user()->user_role == 5)
          <li class="nav-item ">
            <a class="nav-link" href="{{url ('Submit')}}">
              <i class="material-icons">cloud_upload</i>
              <p>Submit</p>
            </a>
          </li>
          @endif

         
          
          @if(Auth::user()->user_role == 1)

          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Only admin see</p>
            </a>
          </li>
          
          @endif
          


          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
          <!-- <a class="navbar-brand" href="javascript:void(0)">Dashboard</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <!-- <span class="notification"></span> -->
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                @if(count(Session::get('not')))
                @foreach(Session::get('not') as $not)
                @if($not->type == 'App\\Notifications\\PostNotification')
                  <a class="dropdown-item" href="{{url('chat')}}"> You have a new from {{$not->data['fromname']}}: {{$not->data['text']}} </a>
                  @elseif($not->type == 'App\Notifications\event')
                  <a class="dropdown-item" href="{{url('event')}}"> There is a new event adde by GPC:  {{$not->data['name']}}</a>
                  @endif
                 @endforeach
                 @endif
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                @guest
                <a class="dropdown-item"  href="{{ url('login') }}">{{ __('Login') }}</a>
                @else

                <a class="dropdown-item" href="{{ url('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                @endguest
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
          <!-- HERE -->
          @include("elements.error")
          @yield('content')
          
        <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    Creative Tim
                  </a>
                </li>
                <li>
                  <a href="https://creative-tim.com/presentation">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license">
                    Licenses
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right" id="date">
              , made with <i class="material-icons">favorite</i> by
              <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
          </div>
        </footer>
        <script>
          const x = new Date().getFullYear();
          let date = document.getElementById('date');
          date.innerHTML = '&copy; ' + x + date.innerHTML;
        </script>
      </div>
    </div>
  </div>
</div>
    
</body>

<script src="{{ mix('/js/app.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAamVCoyQ4AuvBpxVRMs9P-HFkfPVQj0Kw"
        type="text/javascript"></script>

<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.min.js')}}"></script>
  <script src="{{ asset('js/core/popper.min.js')}}"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.js?v=2.1.0')}}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('demo/demo.js')}}"></script>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
  
<script>

    

$(document).ready(function() {
// page is now ready, initialize the calendar...
$('#calendar').fullCalendar({
   // put your options and callbacks here
   events : [
       @foreach($events as $event)
       {
           title : '{{ $event->name }}',
           start : '{{ $event->event_date }}',
           
       },
       @endforeach
   ]
})
});








    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });


    
$(function() {
var timeout = 3000; // in miliseconds (3*1000)
$('.alert').delay(timeout).fadeOut(300);
});


 
  </script>


</html>