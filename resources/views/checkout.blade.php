@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="shopping">
            <div class="shopping-col-left">
                <h3>Количка (<span id="checkout_total_qtty">{{ $cart['total_qtty'] }}</span> неща)</h3>
                @if (count($cart['products']) > 0)
                    @foreach($cart['products'] as $product)
                        <div class="product rem{{ $product->id }}">
                            <span><a href="{{ url('products/single/' . $product->name) }}"><img
                                            src="{{ asset('storage/' . $product->img1) }}"
                                            alt="" style="max-height: 66px; width: auto;"></a></span>
                            <p>{{ $product->name }} <a href="#"
                                                       onclick="removeFromCart('{{ $product->name }}', {{ $product->price }}, {{ $product->cart_quantity }}, {{ $product->id }})">[извади]</a>
                            </p>
                            <div><h4><i>{{ $product->cart_quantity }}</i>{{ $product->price }} лв</h4></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    @endforeach
                    <div class="total">
                        <h4>Общо: <span id="checkout_total_price">{{ $cart['total_price'] }}</span> лв</h4>
                        <a href="{{ url('/order') }}" id="checkout_button">ПОРЪЧАЙ</a>
                        <div class="clearfix"></div>
                        <small>*Безлатна доставка за поръчки над 50лв.</small>
                    </div>
                @else
                    <h4>Количката ти е празна</h4>
                    <a href="{{ url('/categories') }}" id="checkout_button">-> Към магазина</a>
                @endif
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

    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/cart.js') }}"></script>
    <!-- //checkout -->
@endsection