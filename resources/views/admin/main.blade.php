@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="admin-main">
                <ul class="path">
                    <li><a href="{{ route('home') }}">Home</a>&nbsp; ></li>
                    <li class="actev">Admin&nbsp;</li>
                </ul>
                <h3 class="page-hed">Admin Panel</h3>
                <h1>
                    <div class="brand-row">
                        <a href="{{ url('/admin/orders') }}"><span
                                    class="label label-warning">Поръчки</span></a><br><br>
                        <a href="{{ url('/admin/products') }}"><span class="label label-default">Продукти</span></a>
                        <a href="{{ url('/admin/createProduct') }}"><span class="label label-default">Нов продукт</span></a><br><br>
                        <a href="{{ url('/admin/categories') }}"><span class="label label-default">Категории</span></a>
                        <a href="{{ url('/admin/createCategory') }}"><span
                                    class="label label-default">Нова категория</span></a>
                    </div>
                </h1>
            </div>
        </div>
    </div>

@endsection