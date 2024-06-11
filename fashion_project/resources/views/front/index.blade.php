@extends('front.layout.master')

@section('title', 'Home')

@section('body')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-01.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span></span>
                            <h1>Summer</h1>
                            <p>Summer sale with many attractive incentives</p>
                            <a href="./shop" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>20%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-02.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span></span>
                            <h1>Summer</h1>
                            <p>Many items are on sale, hurry and buy now</p>
                            <a href="./shop" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>30%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <dic class="container-fuild">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="front/img/banner-01.jpg" alt="">
                        <div class="inner-text">
                            <h4>Men's</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="front/img/banner-02.jpg" alt="">
                        <div class="inner-text">
                            <h4>Women's</h4>
                        </div>
                    </div>
                </div>

            </div>
        </dic>
    </div>
    <!-- Banner Section End -->


    <!-- Women Banner Section Begin -->
    <section class="women-banner spad" class="item">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/women-large1.jpg">
                        <h2>Women's</h2>
                        <a href="./shop/Women">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="item active" data-tags="*" data-category="women">All</li>
                            <li class="item" data-tags=".Clothing" data-category="women">Clothing</li>
                            <li class="item" data-tags=".Handbag" data-category="women">Handbag</li>
                            <li class="item" data-tags=".Shoes" data-category="women">Shoes</li>
                            <li class="item" data-tags=".Accessories" data-category="women">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel women">
                        @foreach($womenProducts as $womenProduct)
                            @include('front.components.product-item', ['product'=>$womenProduct])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->


    <!-- Deal Of The Week Section Begin -->
    <section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Products with electrical plugs are designed for use in the US. Outlets and voltage differ internationally and this product may require an adapter or converter for use in your destination</p>
                    <div class="product-price">
                        $10.00
                        <span>/ HandBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="./shop/product/56" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->


    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="item active" data-tags="*" data-category="men">All</li>
                            <li class="item" data-tags=".Clothing" data-category="men">Clothing</li>
                            <li class="item" data-tags=".Handbag" data-category="men">Handbag</li>
                            <li class="item" data-tags=".Shoes" data-category="men">Shoes</li>
                            <li class="item" data-tags=".Accessories" data-category="men">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel men">
                        @foreach($menProducts as $menProduct)
                            @include('front.components.product-item', ['product'=>$menProduct])
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg" data-setbg="front/img/products/man-large1.jpg">
                        <h2>Men's</h2>
                        <a href="./shop/Men">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->


    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="front/img/blog/{{ $blog->image }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{ date('M d, Y', strtotime($blog->create_at)) }}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{ count($blog->blogComments) }}
                                </div>
                                <a href="">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <p>{{ $blog->subtitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have problems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blog Section End -->

@endsection


