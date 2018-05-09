@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="banner">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <h2>Mucy Albums 2018</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu tempor justo. In imperdiet ipsum
                pellentesque elit eleifend, at consectetur sem porta. Fusce porta nisl massa, in egestas sapien
                ullamcorper non. Aliquam neque eros, scelerisque eget magna sed, porta ullamcorper enim. Quisque nec
                tortor massa. Phasellus mi quam, pellentesque nec ultricies ac, maximus imperdiet massa. Nunc ultricies
                auctor lacus eget scelerisque. Donec tempor ullamcorper turpis et fringilla. Duis rhoncus ex ac mi
                blandit posuere. Fusce tempor eu nisi vel venenatis. Vestibulum porta ut sem et imperdiet.</p>
            <a href="{{ url('/categories') }}" class="">КЪМ МАГАЗИНА</a>
        </div>
    </div>

    <div class="container">
        <div class="sales-row">
            <div class="sales-left-column">
                @if (isset($newestProduct))
                    <h2 class="text-center" style="color: #ea6f4d; text-shadow: 0 1px black">Най-новият албум</h2>
                    <img src="{{ asset('storage/' . $newestProduct->img1) }}" alt=""
                         class="center-block" style="max-height: 220px; width: auto; border-top: 1px solid black">
                    <div class="img-desc">
                        <h3>{{ $newestProduct->name }} </h3>
                        <small>{{ str_limit($newestProduct->description, 60, "...") }}</small>
                        <p>->
                            <a href="{{ url('products/' . $newestProduct->category->name) }}">{{ $newestProduct->category->name }}</a>
                        </p>
                        <div class="cart">
                            <p>${{ $newestProduct->price }}</p>
                            <a href="{{ url('products/single/' . $newestProduct->name) }}">Виж</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="sales-right-column">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div class="shopping">
            <div class="index-shopping-col-left shopping-col-left">

            </div>
            <div class="shopping-col-right">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3308.188658069775!2d-118.47547193309629!3d33.9876876369627!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bab8fffd1afd%3A0x99bbcc91a3911781!2s1600+Pacific+Ave%2C+Venice%2C+CA+90291%2C+USA!5e0!3m2!1sen!2sin!4v1416911252534"
                            frameborder="0" style="border:0"></iframe>
                </div>
                <div class="map-desc">
                    <h4>1600 Pacific Ave</h4>
                    <p>Venice, CA, United States</p>
                </div>
            </div>
        </div>
    </div>

@endsection