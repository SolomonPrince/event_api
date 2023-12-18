<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
<div class="navbar nav_title" style="border: 0;">
  <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
</div>
<div class="clearfix"></div>
<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h2>
  </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Все события</h3>
    <ul class="nav side-menu" id="event_list">
        @foreach($events as $event)
        <li>
          <a href="{{route('event.show', $event)}}">
            {{$event->title}}
          </a>
        </li>
        @endforeach
    </ul>
  </div>
  <div class="menu_section">
    <h3>Мои события</h3>
    <ul class="nav side-menu">
      @foreach(Auth::user()->participants as $event)
      <li>
        <a href="{{route('event.show', $event)}}">
          {{$event->title}}
        </a>
      </li>
      @endforeach
    </ul>
  </div>

</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="route('logout')"
  onclick="event.preventDefault();
              this.closest('form').submit();">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
  </form>
</div>
<!-- /menu footer buttons -->
</div>
</div>