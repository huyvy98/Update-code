{{--@extends('user::layouts.masterUser')--}}

{{--@section('title', 'Home')--}}

{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-xl-3 col-lg-4 col-md-5">--}}
{{--            <div class="sidebar">--}}
{{--                <div class="list-group">--}}
{{--                    <a href="" class="list-group-item list-group-item-action">New Arrivals</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Promotions</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Apparel</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Accessories</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Carrier</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Drinkware</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Excutive</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Gift Sets</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Life Style</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Office</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Outdoor</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Stationeries</a>--}}
{{--                    <a href="" class="list-group-item list-group-item-action">Travel</a>--}}
{{--                </div>--}}
{{--                <div class="banner">--}}
{{--                    <img src="{{ URL::asset('users/images/banner.jpg') }}" alt="">--}}
{{--                    <a class="btn btn-danger view-now" href="">View now</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-9 col-lg-8 col-md-7">--}}
{{--            <div class="home-page">--}}
{{--                <div class="feature-products">--}}
{{--                    <div class="product-title text-center">--}}
{{--                        <h1>Feature products</h1>--}}
{{--                    </div>--}}
{{--                    <div class="list-product">--}}
{{--                        <div class="row">--}}
{{--                            @foreach($listProduct as $item)--}}
{{--                                <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                    <a class="product-item-images" href="{{ route('user.detail', $item->id) }}">--}}
{{--                                        <img class="img-fluids" src="/storage/{{ $item->image }}" alt="">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-item-title">--}}
{{--                                        <a href="{{ route('user.detail', $item->id) }}">{{ $item->name }}</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-item-price">--}}
{{--                                        <span>{{ number_format($item->price, 0, '', '.') }} đ</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-item-buy">--}}
{{--                                        <a href="{{ route('user.addCart', $item->id) }}" class="btn">Add to Enquiry</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        {{ $listProduct->links() }}--}}
{{--                        <style>--}}
{{--                            nav{--}}
{{--                                display: block;--}}
{{--                            }--}}

{{--                            .pagination{--}}
{{--                                display: flex;--}}
{{--                                justify-content: center;--}}
{{--                            }--}}
{{--                        </style>--}}
{{--                    </div>--}}
{{--                    <div class="view-all text-center">--}}
{{--                        <a href="" class="btn">View all</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="new-products mb-5">--}}
{{--                    <div class="product-title text-center">--}}
{{--                        <h1>New products</h1>--}}
{{--                    </div>--}}
{{--                    <div class="list-product">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="view-all text-center">--}}
{{--                        <a href="" class="btn">View all</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="gift-sets-and-baskets-copy-products mb-5">--}}
{{--                    <div class="product-title text-center">--}}
{{--                        <h1>Gift sets & baskets copy</h1>--}}
{{--                    </div>--}}
{{--                    <div class="list-product">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">--}}
{{--                                <a class="product-item-images" href="">--}}
{{--                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <div class="product-item-title">--}}
{{--                                    <a href="">iMP4102 – Memo Desk Set</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-price">--}}
{{--                                    <span>$10</span>--}}
{{--                                </div>--}}
{{--                                <div class="product-item-buy">--}}
{{--                                    <a href="" class="btn">Add to Enquiry</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="view-all text-center">--}}
{{--                        <a href="" class="btn">View all</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}



    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <strong class="blue-text">MDB</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link waves-effect" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About MDB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                       target="_blank">Free download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free
                        tutorials</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect">
                        <span class="badge red z-depth-1 mr-1"> 1 </span>
                        <i class="fas fa-shopping-cart"></i>
                        <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                       target="_blank">
                        <i class="fab fa-github mr-2"></i>MDB GitHub
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong>Learn Bootstrap 4 with MDB</strong>
                        </h1>

                        <p>
                            <strong>Best & free guide of responsive web design</strong>
                        </p>

                        <p class="mb-4 d-none d-md-block">
                            <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                                written versions
                                available. Create your own, stunning website.</strong>
                        </p>

                        <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start
                            free tutorial
                            <i class="fas fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
            <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong>Learn Bootstrap 4 with MDB</strong>
                        </h1>

                        <p>
                            <strong>Best & free guide of responsive web design</strong>
                        </p>

                        <p class="mb-4 d-none d-md-block">
                            <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                                written versions
                                available. Create your own, stunning website.</strong>
                        </p>

                        <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start
                            free tutorial
                            <i class="fas fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
            <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong>Learn Bootstrap 4 with MDB</strong>
                        </h1>

                        <p>
                            <strong>Best & free guide of responsive web design</strong>
                        </p>

                        <p class="mb-4 d-none d-md-block">
                            <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and
                                written versions
                                available. Create your own, stunning website.</strong>
                        </p>

                        <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start
                            free tutorial
                            <i class="fas fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->

<!--Main layout-->
<main>
    <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

            <!-- Navbar brand -->
            <span class="navbar-brand">Categories:</span>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">All
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shirts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sport wears</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Outwears</a>
                    </li>

                </ul>
                <!-- Links -->

                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="text-center mb-4">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Shirt</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Denim shirt
                                        <span class="badge badge-pill danger-color">NEW</span>
                                    </a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>120$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Sport wear</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Sweatshirt</a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>139$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Sport wear</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Grey blouse
                                        <span class="badge badge-pill primary-color">bestseller</span>
                                    </a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>99$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Fourth column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Outwear</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Black jacket</a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>219$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Fourth column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Shirt</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Denim shirt
                                        <span class="badge badge-pill danger-color">NEW</span>
                                    </a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>120$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Sport wear</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Sweatshirt</a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>139$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Sport wear</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Grey blouse
                                        <span class="badge badge-pill primary-color">bestseller</span>
                                    </a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>99$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Grid column-->

                <!--Fourth column-->
                <div class="col-lg-3 col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card image-->
                        <div class="view overlay">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg" class="card-img-top"
                                 alt="">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body text-center">
                            <!--Category & Title-->
                            <a href="" class="grey-text">
                                <h5>Outwear</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="" class="dark-grey-text">Black jacket</a>
                                </strong>
                            </h5>

                            <h4 class="font-weight-bold blue-text">
                                <strong>219$</strong>
                            </h4>

                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Fourth column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Products v.3-->

        <!--Pagination-->
        <nav class="d-flex justify-content-center wow fadeIn">
            <ul class="pagination pg-blue">

                <!--Arrow left-->
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <li class="page-item active">
                    <a class="page-link" href="#">1
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">5</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--Pagination-->

    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">



</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

</script>
</body>

</html>

