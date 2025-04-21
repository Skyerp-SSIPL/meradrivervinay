
<div class="header">
 
  <div class="header-left">
    <a href="{{url('/')}}" class="logo">
      <img src="{{asset('assets/meradriver/mera.png')}}" width="40%" alt="Logo">
    </a>
    <a href="{{url('/')}}" class="logo2">
      <img src="{{asset('assets/meradriver/mera.png')}}" width="40%" alt="Logo">
    </a>
  </div>
 
  <a id="toggle_btn" href="javascript:void(0);">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>
 
  <div class="page-title-box">
    <h3> Mera Driver</h3>
  
  </div>
 
  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <i class="fa-solid fa-bars"></i>
  </a>
 
  <ul class="nav user-menu">
  
    <li class="nav-item">
      <div class="top-nav-search">
        <a href="javascript:void(0);" class="responsive-search">
          <i class="fa-solid fa-magnifying-glass"></i>
        </a>

      </div>
    </li>
   
    <li class="nav-item dropdown has-arrow flag-nav">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
        <img src="{{asset('assets/img/flags/us.png')}}" alt="Flag" height="20">
        <span>English</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{asset('assets/img/flags/us.png')}}" alt="Flag" height="16"> English </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{asset('assets/img/flags/fr.png')}}" alt="Flag" height="16"> French </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{asset('assets/img/flags/es.png')}}" alt="Flag" height="16"> Spanish </a>
        <a href="javascript:void(0);" class="dropdown-item">
          <img src="{{asset('assets/img/flags/de.png')}}" alt="Flag" height="16"> German </a>
      </div>
    </li>
   
    <li class="nav-item dropdown">
      @inject('carbon', 'Carbon\Carbon')
      @php
      $user = auth()->user();
      @endphp
      @if(($user->hasRole('Administrator')) || ($user->hasRole('Data oprator')) || ($user->hasRole('agent')))
      <a href="{{ route('update-university') }}" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i class="fa-regular fa-bell"></i>
        <span class="badge rounded-pill">
          {{ $count = App\Models\University::whereDate('updated_at', '<', $carbon::now()->subMonths(3))->count() }}
          {{ $count2 = App\Models\Program::whereDate('updated_at', '<', $carbon::now()->subMonths(3))->count() }}
          {{ $count1 = App\Models\PaymentsLink::whereDate('due_date', '<', $carbon::now())->count() }}
        </span>
      </a>
      @else
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <i class="fa-regular fa-bell"></i>
        <span class="badge rounded-pill">
          {{ $count = App\Models\University::whereDate('updated_at', '<', $carbon::now()->subMonths(3))->where('user_id', auth()->user()->id)->count() }}

          {{ $count1 = App\Models\PaymentsLink::whereDate('due_date', '<', $carbon::now())->where('user_id', auth()->user()->id)->count() }}

        </span>
      </a>
      @endif
      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
          <span class="notification-title">Notifications</span>
          <a href="" class="clear-noti"> View all </a>
        </div>
        <div class="topnav-dropdown-footer">
          <a href="{{ route('updation-program') }}">@php use Carbon\Carbon;
            $count2 = App\Models\Program::whereDate('updated_at', '<', Carbon::now()->subMonths(3))
              ->where('user_id', auth()->user()->id)
              ->count();
              echo $count2 @endphp Old Program </a>
        </div>
        <div class="topnav-dropdown-footer">
          <a href="{{ route('update-university') }}"> {{ $count }} Old Universities </a>
        </div>
        <div class="topnav-dropdown-footer">
          <a href="{{ route('due_student_amount') }}"> {{ $count1 }} Due amount </a>
        </div>
      </div>
    </li>
   
    <li class="nav-item dropdown has-arrow main-drop">
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
       
        <span>@foreach (Auth::user()->roles as $role)
          {{ ucfirst(Auth::user()->name)}}-{{ $role->name }}
          @endforeach
        </span>
      </a>
      <div class="dropdown-menu">
       
        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
      </div>
    </li>
  </ul>

  <div class="dropdown mobile-user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa-solid fa-ellipsis-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      {{-- <a class="dropdown-item" href="#">My Profile</a> --}}
      <a class="dropdown-item" href="#">Settings</a>
      <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
      {{-- <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
      @csrf
      {{ __('Log Out') }}
      </form> --}}
    </div>
  </div>

</div>
