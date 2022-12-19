@extends('front-end.layouts.master')
@section('contents')
    @include('front-end.layouts.header')
    <div class="home-slider owl-carousel owl-theme">
        <div class="item"><img src="{{ asset('store_frontend/img/banner/banner_01.jpg') }}"></div>
    </div>

    <div class="hotProduct clearfix" style="padding:30px 0;">
        <h3>Bestseller</h3>
        <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div id="owl-demo-related" class="owl-carousel owl-theme">
                        <!-- product Bestseller number 1 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh01.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>

                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 2 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh02.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>
                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 3 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh03.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>
                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 4 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh06.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>

                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 5 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/04.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>

                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->

            </div>
        </div>
    </div>

    <div class="design-product clearfix" style="padding: 30px 0;">

        <div class="banner-design col-lg-6 col-md-12 col-xs-12 col-sm-12">
            <div class="banner-block">
                <a href="#" class="link-design">
                    <img src="{{ asset('store_frontend/img/banner/design.jpg') }}" alt="" class="" sizes="695px">
                </a>
            </div>
        </div>
        <div class="design-product-list col-lg-6 col-md-12 col-xs-12 col-sm-12">
            <h3>Design product</h3>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div id="owl-demo-related" class="owl-carousel owl-theme">
                        <!-- product Bestseller number 1 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh01.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>

                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 2 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh02.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>
                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span sclass="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 3 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh03.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>
                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="./detail.html">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 4 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/anh07.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>

                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product Bestseller number 5 -->
                        <div class="myani product-wrapper">
                            <div class="col-odl">
                                <a href="">
                                    <picture>
                                        <img class="image-default lazyload" src="{{ asset('store_frontend/img/product/04.jpg') }}" data-src="" data-hover="" data-sizes="auto" alt="" />
                                    </picture>
                                    <div class="sold-out-block">
                                    </div>

                                </a>
                                <div class="ani ">
                                    <h1 class="product-title"><a href="#">ÁO GHILE DENIM CỔ ĐỨC CÀI KHUY</a></h1>
                                    <div>
                                        <span class="sqs-money-native tp_product_price">105,000đ</span>
                                        <s class="tp_product_price_old" style="display:inline-block;color: #979797;">120,000₫</s>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->

            </div>
        </div>
    </div>
    @include('front-end.layouts.footer')
@endsection
