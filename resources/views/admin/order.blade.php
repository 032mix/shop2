@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="admin-main">
                <ul class="path">
                    <li><a href="{{ route('home') }}">Начало</a>&nbsp; ></li>
                    <li class="actev">Admin&nbsp;</li>
                </ul>
                <h3 class="page-hed">Поръчка N{{ $order->order_num }}</h3>
                <div class="brand-row">
                    <a href="{{ url('admin/orders') }}"><span class="label label-default">Обратно в поръчки</span></a><br>

                    Име: {{ $order->first_name }} {{ $order->last_name }} <br>
                    Адрес: {{ $order->address }} <br>
                    Email: {{ $order->email }} <br>
                    Телефон: {{ $order->phone_num }} <br>
                    Статус: <select id="status" onchange="changeStatus({{ $order->id }})">
                        <option value="1" {{ $order->status == 1 ? "selected" : "" }}>Нова поръчка</option>
                        <option value="2" {{ $order->status == 2 ? "selected" : "" }}>Изпратена</option>
                        <option value="3" {{ $order->status == 3 ? "selected" : "" }}>Отказана</option>
                        <option value="4" {{ $order->status == 4 ? "selected" : "" }}>Завършена</option>
                    </select> <br>

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 70%;">Продукти</th>
                            <th>Количество</th>
                        </tr>
                        @foreach ($order->products as $product)
                            <tr>
                                <td><a href="{{ url('products/single/' . $product->name) }}">{{ $product->name }}</a>
                                </td>
                                <td>{{ $product->price }} лв (x{{ $product->pivot->quantity }}) | {{ $product->price * $product->pivot->quantity }} лв общо</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/admin.js') }}"></script>

@endsection
