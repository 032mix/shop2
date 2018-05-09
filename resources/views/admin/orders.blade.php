@extends ('layouts.master')

@section ('content')

    <style>
        .alert {
            margin-bottom: 1px;
            height: 30px;
            line-height: 30px;
            padding: 10px 15px;
        }
    </style>
    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="admin-main">
                <ul class="path">
                    <li><a href="{{ route('home') }}">Начало</a>&nbsp; ></li>
                    <li class="actev">Admin&nbsp;</li>
                </ul>
                <h3 class="page-hed">Поръчки</h3>
                <div class="brand-row">
                    <a href="{{ route('admin') }}"><span
                                class="label label-default">Обратно в Admin Panel</span></a><br>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Номер на поръчка</th>
                            <th>Статус</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Продукти</th>
                            <th>Създадена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="{{ url('admin/order/' . $order->id) }}">
                                        <button>{{ $order->id }}</button>
                                    </a></td>
                                <td>{{ $order->order_num }}</td>
                                <td style="height: 5em;">
                                    @switch($order->status)
                                        @case(1)
                                        <span class="alert alert-warning">Нова поръчка</span>
                                        @break
                                        @case(2)
                                        <span class="alert alert-info">Изпратена</span>
                                        @break
                                        @case(3)
                                        <span class="alert alert-danger">Отказана</span>
                                        @break
                                        @case(4)
                                        <span class="alert alert-success">Завършена</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone_num }}</td>
                                <td>
                                    @foreach($order->products as $product)
                                        {{ $product->name }} (x{{ $product->pivot->quantity }}) <br>
                                    @endforeach
                                </td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div class="text-center">{{ $orders->links() }}</div>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection