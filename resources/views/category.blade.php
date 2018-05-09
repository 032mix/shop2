@extends ('layouts.master')

@section ('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/component.css') }}"/>
    <script src="{{ asset('/js/snap.svg-min.js') }}"></script>

    <!-- Brand Page Starts Here -->
    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="brand-content-bar">
                <ul class="path">
                    <li><a href="{{ route('home') }}">Начало</a>&nbsp; ></li>
                    <li class="actev">Албуми&nbsp;</li>
                </ul>
                <h3 class="page-hed">{{ isset($category) ? $category->name : "Search results for " . $search }}</h3>
                <!-- Men's Portfolio -->
                <section id="grid" class="grid clearfix demo1">
                    @include('layouts.products')
                </section>
            {{ $categoryProducts->links() }}
            <!-- Men's Portfolio -->
            </div>
            <!-- Content --- Bar -->
            <!-- Side Bar-->
            <div class="brand-side-bar">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>

    <script>
        (function () {

            function init() {
                var speed = 250,
                    easing = mina.easeinout;

                [].slice.call(document.querySelectorAll('#grid > a')).forEach(function (el) {
                    var s = Snap(el.querySelector('svg')), path = s.select('path'),
                        pathConfig = {
                            from: path.attr('d'),
                            to: el.getAttribute('data-path-hover')
                        };

                    el.addEventListener('mouseenter', function () {
                        path.animate({'path': pathConfig.to}, speed, easing);
                    });

                    el.addEventListener('mouseleave', function () {
                        path.animate({'path': pathConfig.from}, speed, easing);
                    });
                });
            }

            init();

        })();
    </script>

@endsection