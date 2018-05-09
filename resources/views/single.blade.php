@extends ('layouts.master')

@section ('content')

    <!-- Singel Page Starts Here -->
    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="brand-content-bar product-cointent-bar">
                <ul class="path">
                    <li><a href="{{ route('home') }}">Начало</a>&nbsp; ></li>
                    <li><a href="{{ url('/categories') }}">Албуми</a>&nbsp; ></li>
                    <li><a href="{{ url('/products/' . $product->category->name) }}">{{ $product->category->name }}</a>
                        >
                    </li>
                    <li class="actev">{{ $product->name }}&nbsp;</li>
                </ul>
                <!----details-product-slider--->
                <!-- Include the Etalage files -->
                <link rel="stylesheet" href="/css/etalage.css">
                <script src="/js/jquery.etalage.min.js"></script>
                <!-- Include the Etalage files -->
                <script>
                    jQuery(document).ready(function ($) {

                        $('#etalage').etalage({
                            thumb_image_width: 300,
                            thumb_image_height: 400,
                            source_image_width: 900,
                            source_image_height: 1000,
                            show_hint: true,
                            click_callback: function (image_anchor, instance_id) {
                                alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                            }
                        });
                        // This is for the dropdown list example:
                        $('.dropdownlist').change(function () {
                            etalage_show($(this).find('option:selected').attr('class'));
                        });

                    });
                </script>
                <!----//details-product-slider--->
                <div class="details-left">
                    <div class="details-left-slider">
                        <ul id="etalage">
                            <li>
                                <img class="etalage_thumb_image" src="{{ asset('storage/' . $product->img1) }}"/>
                                <img class="etalage_source_image" src="{{ asset('storage/' . $product->img1) }}"/>
                            </li>
                            <li>
                                <img class="etalage_thumb_image" src="{{ asset('storage/' . $product->img2) }}"/>
                                <img class="etalage_source_image" src="{{ asset('storage/' . $product->img2) }}"/>
                            </li>
                            <li>
                                <img class="etalage_thumb_image" src="{{ asset('storage/' . $product->img3) }}"/>
                                <img class="etalage_source_image" src="{{ asset('storage/' . $product->img3) }}"/>
                            </li>
                        </ul>
                    </div>
                    <div class="details-left-info">
                        <div class="details-right-head">
                            <h1>{{ $product->name }}</h1>
                            <p class="product-detail-info">{{ $product->description }}</p>
                            <div class="product-more-details">
                                <ul class="price-avl">
                                    <li class="price">{{--<span>$153.39</span>--}}<label>{{ $product->price }} лв</label>
                                    </li>
                                    <li class="stock"><i>По заявка</i></li>
                                    <div class="clearfix"></div>
                                </ul>
                                <ul class="prosuct-qty">
                                    <span>Количество:</span>
                                    <select id="add_qtty">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </ul>
                                <a class="addToCart" href="#"
                                   onclick="addToCart('{{ $product->name }}', {{ $product->price }}, 1)">добави в количката </a>
                                <ul class="product-share">
                                    <h3>Сподели с приятели:</h3>
                                    <ul>
                                        <li><a class="share-face" href="#"><span> </span> </a></li>
                                        <li><a class="share-twitter" href="#"><span> </span> </a></li>
                                        <li><a class="share-google" href="#"><span> </span> </a></li>
                                        <li><a class="share-rss" href="#"><span> </span> </a></li>
                                        <div class="clear"></div>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!--vertical Tabs-script-->
                    <h3 class="page-hed">Още албуми от категория {{ $product->category->name }}</h3>
                    <!-- Responsive tabs -->
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Най-нови</span>
                                </li>
                                {{--<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>New Models</span>--}}
                                {{--</li>--}}
                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="facts">
                                        <ul id="flexiselDemo1">
                                            @foreach($relatedProducts as $relative)
                                                <li>
                                                    <div class="fact-col">
                                                        <img src="{{ asset('storage/' . $relative->img1) }}"
                                                             style="max-height: 200px; width: auto; max-width: 200px" alt="">
                                                        <h4><span>{{ $relative->name }}</span></h4>
                                                        <h4>
                                                            <span>-> <a href="{{ url('/products/' . $relative->category->name) }}">{{ $relative->category->name }}</a></span>
                                                        </h4>
                                                        <h4><span></span></h4>
                                                        <h4><span>${{ $relative->price }}</span></h4>
                                                        <div class="view">
                                                            <a href="{{ url('/products/single/' . $relative->name) }}">View</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <!-- sLIDER- SCRIPT -->
                                        <script type="text/javascript">
                                            $(window).load(function () {
                                                $("#flexiselDemo1").flexisel({
                                                    visibleItems: 3,
                                                    animationSpeed: 1000,
                                                    autoPlay: true,
                                                    autoPlaySpeed: 3000,
                                                    pauseOnHover: true,
                                                    enableResponsiveBreakpoints: true,
                                                    responsiveBreakpoints: {
                                                        portrait: {
                                                            changePoint: 480,
                                                            visibleItems: 1
                                                        },
                                                        landscape: {
                                                            changePoint: 640,
                                                            visibleItems: 2
                                                        },
                                                        tablet: {
                                                            changePoint: 768,
                                                            visibleItems: 3
                                                        }
                                                    }
                                                });

                                            });
                                        </script>
                                        <script type="text/javascript" src="/js/jquery.flexisel.js"></script>
                                        <!-- sLIDER- SCRIPT -->
                                    </div>
                                </div>
                                {{--<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">--}}
                                {{--<div class="facts">--}}
                                {{--<div class="fact-row">--}}
                                {{--<div class="fact-col">--}}
                                {{--<img src="/images/g6.jpg" alt="">--}}
                                {{--<h4><span>SKU :</span> P208YL1</h4>--}}
                                {{--<h4><span>COLLECTION :</span> EYESPORT</h4>--}}
                                {{--<h4><span>GENDER :</span> GUYS</h4>--}}
                                {{--<h4><span>Price :</span> $20</h4>--}}
                                {{--<div class="view">--}}
                                {{--<a href="single.html">Look</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="fact-row">--}}
                                {{--<div class="fact-col">--}}
                                {{--<img src="/images/g7.jpg" alt="">--}}
                                {{--<h4><span>SKU :</span> P208YL1</h4>--}}
                                {{--<h4><span>COLLECTION :</span> EYESPORT</h4>--}}
                                {{--<h4><span>GENDER :</span> GUYS</h4>--}}
                                {{--<h4><span>Price :</span> $20</h4>--}}
                                {{--<div class="view">--}}
                                {{--<a href="single.html">Look</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="fact-row">--}}
                                {{--<div class="fact-col">--}}
                                {{--<img src="/images/g8.jpg" alt="">--}}
                                {{--<h4><span>SKU :</span> P208YL1</h4>--}}
                                {{--<h4><span>COLLECTION :</span> EYESPORT</h4>--}}
                                {{--<h4><span>GENDER :</span> GUYS</h4>--}}
                                {{--<h4><span>Price :</span> $20</h4>--}}
                                {{--<div class="view">--}}
                                {{--<a href="single.html">Look</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <script src="/js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true   // 100% fit in a container
                            });
                        });
                    </script>
                </div>
            </div>
            <!-- Bags Portal -->
            <!-- Content --- Bar -->
            <!-- Side Bar-->
            <div class="brand-side-bar">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/cart.js') }}"></script>

@endsection