<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{url('dashboard')}}"><img src="{{asset('img/logo.png')}}" width="60px" alt=""></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{url('dashboard')}}"><img src="{{asset('img/logo.png')}}" width="40px" alt=""></a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
      <li class="@if ($menu === 'dashboard')
      {{'active'}}
   @endif"><a class="nav-link" href="{{url('dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>




        <li class="@if ($menu === 'member')
        {{'active'}}
        @endif"><a class="nav-link" href="{{route('member.index')}}"><i class="fas fa-user"></i> <span>Member</span></a></li>
        <li class="@if ($menu === 'member-import')
        {{'active'}}
        @endif"><a class="nav-link" href="{{route('member.import')}}"><i class="fas fa-download"></i> <span>Import data member</span></a></li>
        <li class="@if ($menu === 'Iklan')
        {{'active'}}
        @endif"><a class="nav-link" href="{{route('iklan.index')}}"><i class="fa fa-flag"></i> <span>Iklan</span></a></li>
            <li><a class="nav-link" href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a></li>


      </ul>

    </aside>
  </div>
