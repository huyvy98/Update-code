<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="118" height="46"
         alt="CoreUI Logo">
</div>
<ul class="c-sidebar-nav">

    @if(Auth::guard('admin')->user()->hasPermissionTo('superadmin.admin.index'))
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.index')}}">
                <i class="cil-house c-sidebar-nav-icon"></i>
                Admin
            </a>
        </li>
    @endif
    @if(Auth::guard('admin')->user()->hasPermissionTo('products.index'))
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('products.index')}}">
                <i class="cil-house c-sidebar-nav-icon"></i>
                Product
            </a>
        </li>
    @endif
    @if(Auth::guard('admin')->user()->hasPermissionTo('orders.index'))
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('orders.index')}}">
                <i class="cil-house c-sidebar-nav-icon"></i>
                Order
            </a>
        </li>
    @endif
    @if(Auth::guard('admin')->check())
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('admin.logout')}}">
                <i class="cil-contact c-sidebar-nav-icon"></i>
                Logout
            </a>
        </li>
    @endif
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
