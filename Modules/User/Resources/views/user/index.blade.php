@extends('user::layouts.masterUser')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">New Arrivals</a>
                    <a href="" class="list-group-item list-group-item-action">Promotions</a>
                    <a href="" class="list-group-item list-group-item-action">Apparel</a>
                    <a href="" class="list-group-item list-group-item-action">Accessories</a>
                    <a href="" class="list-group-item list-group-item-action">Carrier</a>
                    <a href="" class="list-group-item list-group-item-action">Drinkware</a>
                    <a href="" class="list-group-item list-group-item-action">Excutive</a>
                    <a href="" class="list-group-item list-group-item-action">Gift Sets</a>
                    <a href="" class="list-group-item list-group-item-action">Life Style</a>
                    <a href="" class="list-group-item list-group-item-action">Office</a>
                    <a href="" class="list-group-item list-group-item-action">Outdoor</a>
                    <a href="" class="list-group-item list-group-item-action">Stationeries</a>
                    <a href="" class="list-group-item list-group-item-action">Travel</a>
                </div>
                <div class="banner">
                    <img src="{{ URL::asset('users/images/banner.jpg') }}" alt="">
                    <a class="btn btn-danger view-now" href="">View now</a>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <div class="home-page">
                <div class="feature-products">
                    <div class="product-title text-center">
                        <h1>Feature products</h1>
                    </div>
                    <div class="list-product">
                        <div class="row">
                            @foreach($listProduct as $item)
                                <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                    <a class="product-item-images" href="{{ route('user.detail', $item->id) }}">
                                        <img class="img-fluids" src="/storage/{{ $item->image }}" alt="">
                                    </a>
                                    <div class="product-item-title">
                                        <a href="{{ route('user.detail', $item->id) }}">{{ $item->name }}</a>
                                    </div>
                                    <div class="product-item-price">
                                        <span>{{ number_format($item->price, 0, '', '.') }} đ</span>
                                    </div>
                                    <div class="product-item-buy">
                                        <a href="{{ route('user.addCart', $item->id) }}" class="btn">Add to Enquiry</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $listProduct->links() }}
                        <style>
                            nav{
                                display: block;
                            }

                            .pagination{
                                display: flex;
                                justify-content: center;
                            }
                        </style>
                    </div>
                    <div class="view-all text-center">
                        <a href="" class="btn">View all</a>
                    </div>
                </div>
                <div class="new-products mb-5">
                    <div class="product-title text-center">
                        <h1>New products</h1>
                    </div>
                    <div class="list-product">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view-all text-center">
                        <a href="" class="btn">View all</a>
                    </div>
                </div>
                <div class="gift-sets-and-baskets-copy-products mb-5">
                    <div class="product-title text-center">
                        <h1>Gift sets & baskets copy</h1>
                    </div>
                    <div class="list-product">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 product-item text-center">
                                <a class="product-item-images" href="">
                                    <img class="img-fluids" src="{{ URL::asset('users/images/Layer_141-removebg-preview.png') }}" alt="">
                                </a>
                                <div class="product-item-title">
                                    <a href="">iMP4102 – Memo Desk Set</a>
                                </div>
                                <div class="product-item-price">
                                    <span>$10</span>
                                </div>
                                <div class="product-item-buy">
                                    <a href="" class="btn">Add to Enquiry</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view-all text-center">
                        <a href="" class="btn">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
