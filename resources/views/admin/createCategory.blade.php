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
                <h3 class="page-hed">Нова категория</h3>
                <div class="brand-row">
                    <a href="{{ route('admin') }}"><span class="label label-default">Обратно в Admin Panel</span></a><br>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            @include ('layouts.errors')
                            <form action="{{ url('/admin/storeCategory') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="name">Име:</label>
                                        <input class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="img">Image:</label>
                                        <input type="file" class="form-control" name="img" id="img" placeholder="Image">
                                    </div>
                                    <br>
                                    <button class="btn" type="submit">Създай</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection