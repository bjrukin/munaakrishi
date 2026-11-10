<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0 d-flex align-items-center">
        <li>
            <a class="nav-link" href="{{ url('/') }}" target="_blank" title="View Frontend Site">
                <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">open_in_new</span>
                <span>View Site</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('admin.account.setting') }}">
                <span class="material-symbols-outlined align-middle me-1" style="font-size: 18px;">account_circle</span>
                {{ auth()->guard('admin')->user()->name ?? 'Administrator' }} 
            </a>
        </li>
        <li>
            <a class="nav-link text-danger" href="{{route('admin.logout')}}">
                <i class="fe-log-out"></i> Logout
            </a>
        </li>
    </ul>
    <div class="logo-box d-none d-sm-block text-center">
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark d-flex align-items-center justify-content-center h-100">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}" alt="{{ env('APP_NAME', 'Munaa Krishi Limited') }}" style="max-height: 48px; width: auto; object-fit: contain;">
            </span>
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect"> <i class="fe-menu"></i> </button>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>