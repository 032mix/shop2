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
                <h3 class="page-hed">Категории</h3>
                <div class="brand-row">
                    <a href="{{ route('admin') }}"><span class="label label-default">Обратно в Admin Panel</span></a><br>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th>Img</th>
                            <th>Име</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><img src="{{ asset('storage/' . $category->img) }}" style="max-width: 100px"></td>
                                <td id="cat-{{ $category->id }}">{{ $category->name }}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#myModal"
                                            onclick="editGetCategory({{ $category->id }})">Edit
                                    </button>
                                    <button><a href="{{ url('admin/products/' . $category->id) }}">Виж</a></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editing <strong><span id="name"></span></strong></h4>
                </div>
                <div class="modal-body">
                    <label for="editName">Име:</label>
                    <input class="form-control" id="editName"><br>
                    <input type="hidden" id="editId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="edit()">Edit</button>
                </div>
            </div>

        </div>
    </div>

    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script>
        function editGetCategory(cid) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("editCategory", {category: cid}, function (data) {
                $('#name').text(data.name);
                $('#editName').val(data.name);
                $('#editId').val(cid);
            });
        }

        function edit() {
            let id = $('#editId').val();
            let name = $('#editName').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("updateCategory", {id: id, name: name}, function () {
                $('#cat-' + id).text(name);
            });
        }
    </script>
@endsection