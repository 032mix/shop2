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
                <h3 class="page-hed">Нов продукт</h3>
                <div class="brand-row">
                    <a href="{{ route('admin') }}"><span class="label label-default">Обратно в Admin Panel</span></a><br>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            @include ('layouts.errors')
                            <form action="{{ url('/admin/storeProduct') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="category">Категория:</label>
                                        <select class="form-control" name="category" id="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Име:</label>
                                        <input class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="price">Цена:</label>
                                        <input class="form-control" name="price" id="price" placeholder="Price">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description">Описание:</label>
                                        <input class="form-control" name="description" id="description"
                                               placeholder="Description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="img1">Image 1:</label>
                                        <input type="file" class="form-control" name="img1" id="img1" placeholder="Image">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="img2">Image 2:</label>
                                        <input type="file" class="form-control" name="img2" id="img2" placeholder="Image">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="img3">Image 3:</label>
                                        <input type="file" class="form-control" name="img3" id="img3" placeholder="Image">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <div class="form-group">
                                        <button class="btn" type="submit">Създай</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection