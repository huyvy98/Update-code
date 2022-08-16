<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>
    @include('user::layouts.linkConnect')
</head>
<body>
@php $quantity = 0 @endphp
@foreach((array) session('cart') as $id => $details)
    @php $quantity += $details['quantity']@endphp
@endforeach

<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12">
                    <div class="header-logo mt-2">
                        <a href="{{route('users.index')}}">
                            <img src="{{ URL::asset('users/images/logo.png') }}" alt="" class="logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="header-service">
                        <div class="header-service-item">
                            <a href=""><i class="header-service-icon bx bxs-truck"></i></a>
                            <div class="content-ship">
                                <h3>Free Shipping</h3>
                                <span>Free shipping on all order</span>
                            </div>
                        </div>
                        <div class="header-service-item">
                            <a href="tel:65 6876 0079"><i class="header-service-icon bx bxs-phone-call"></i></a>
                            <div class="content-ship">
                                <h3>Hotline</h3>
                                <span>+65 6876 0079</span>
                            </div>
                        </div>
                        <div class="header-service-item">
{{--                            <a href="{{ route('user.enquiry') }}"><i class="header-service-icon bx bxs-cart-add"></i></a>--}}
                            <div class="content-ship">
                                <h3>Enquiry Cart</h3>
                                <p>(<span class="totalQuantity">{{ $quantity }}</span>)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-body clearfix">
        <div class="container">
            <div class="nav__mobile">
                <ul class="nav__mobile-list">
                    <li class="nav__mobile-item">
                        <a href="{{route('users.index')}}" class="nav__mobile-item-link">HOME</a>
                    </li>
                    <li class="nav__mobile-item">
{{--                        <a href="{{route('user.aboutUs')}}" class="nav__mobile-item-link">ABOUT US</a>--}}
                    </li>
                    <li class="nav__mobile-item">
{{--                        <a href="{{route('user.project')}}" class="nav__mobile-item-link">PROJECTS</a>--}}
                    </li>
                    <li class="nav__mobile-item">
{{--                        <a href="{{route('user.ourProduct')}}">OUR PRODUCTS</a>--}}
                    </li>
                    <li class="nav__mobile-item">
{{--                        <a href="{{route('user.contact')}}" class="nav__mobile-item-link">CONTACT US</a>--}}
                    </li>
                </ul>
            </div>
            <div class="icon-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="search">
                <input type="text" name="" id="" placeholder="search">
                <i class='bx bx-search-alt-2'></i>
            </div>
        </div>
    </div>
</header>
<div id="content">
    <div class="container">
        @yield('content')
    </div>
    <div class="nav__mobile__responsive">
        <h2>List Menu</h2>
        <ul id="s" class="nav__mobile-list__responsive">
            <li class="nav__mobile-item">
                <a href="{{ route('users.index') }}"
                   class="nav__mobile-item-link">HOME</a>
            </li>
            <li class="nav__mobile-item">
{{--                <a href="{{ route('user.aboutUs') }}" class="nav__mobile-item-link">ABOUT US</a>--}}
            </li>
            <li class="nav__mobile-item">
{{--                <a href="{{ route('user.project') }}" class="nav__mobile-item-link">PROJECTS</a>--}}
            </li>
            <li class="nav__mobile-item">
{{--                <a href="{{ route('user.ourProduct') }}"--}}
{{--                   class="nav__mobile-item-link">OUR PRODUCTS</a>--}}
            </li>
            <li class="nav__mobile-item">
{{--                <a href="{{ route('user.contact') }}" class="nav__mobile-item-link">CONTACT US</a>--}}
            </li>
        </ul>
    </div>
</div>
