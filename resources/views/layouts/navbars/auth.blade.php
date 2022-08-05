<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="X" class="simple-text logo-normal">
            {{ __('Clínica') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'home' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'medical-appointment' ? 'active' : '' }}">
                <a href="{{ route('apontamentos.index') }}">
                    <i class="nc-icon nc-zoom-split"></i>
                    <p>{{ __('Consultas') }}</p>
                </a>
            </li>

            {{-- <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li> --}}

            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
