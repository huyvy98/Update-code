<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="118" height="46"
         alt="CoreUI Logo">
</div>
<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('products.index')}}">
            <i class="cil-house c-sidebar-nav-icon"></i>
            Product
        </a>
    </li>
    @if(Auth::guard('admin')->check())
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.logout')}}">
                <i class="cil-contact c-sidebar-nav-icon"></i>
                Logout
            </a>
        </li>
    @else
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.show')}}">
                <i class="cil-contact c-sidebar-nav-icon"></i>
                Login
            </a>
        </li>
    @endif
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
