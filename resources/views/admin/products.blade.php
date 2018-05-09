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
                <h3 class="page-hed">Продукти</h3>
                <div class="brand-row">
                    <a href="{{ route('admin') }}"><span class="label label-default">Обратно в Admin Panel</span></a><br>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th>Img 1</th>
                            <th>Img 2</th>
                            <th>Img 3</th>
                            <th>Име</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Видимо</th>
                            <th>Пъти поръчано</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img src="{{ asset('storage/' . $product->img1) }}"
                                         alt="" style="max-height: 66px; width: auto;"></td>
                                <td><img src="{{ asset('storage/' . $product->img2) }}"
                                         alt="" style="max-height: 66px; width: auto;"></td>
                                <td><img src="{{ asset('storage/' . $product->img3) }}"
                                         alt="" style="max-height: 66px; width: auto;"></td>
                                <td id="prod-name-{{ $product->id }}">{{ $product->name }}</td>
                                <td id="prod-desc-{{ $product->id }}">{{ $product->description }}</td>
                                <td id="prod-price-{{ $product->id }}">{{ $product->price }} лв</td>
                                <td id="prod-visible-{{ $product->id }}">{{ $product->visible == '1' ? "Yes" : "No" }}</td>
                                <td>{{ $product->orders->count() }}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#myModal"
                                            onclick="editGetProduct({{ $product->id }})">Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div class="text-center">{{ $products->links() }}</div>
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
                    <label for="editDesc">Описание:</label>
                    <input class="form-control" id="editDesc"><br>
                    <label for="editPrice">Цена:</label>
                    <input class="form-control" id="editPrice"><br>
                    <label for="editVisible">Видимо:</label>
                    <select id="editVisible" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
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
        function editGetProduct(pid) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("editProduct", {product: pid}, function (data) {
                $('#name').text(data.name);
                $('#editName').val(data.name);
                $('#editDesc').val(data.description);
                $('#editPrice').val(data.price);
                $('#editVisible').val(data.visible);
                $('#editId').val(pid);
            });
        }

        function edit() {
            let id = $('#editId').val();
            let name = $('#editName').val();
            let desc = $('#editDesc').val();
            let price = $('#editPrice').val();
            let visible = $('#editVisible').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("updateProduct", {
                id: id,
                name: name,
                description: desc,
                price: price,
                visible: visible
            }, function () {
                $('#prod-name-' + id).text(name);
                $('#prod-desc-' + id).text(desc);
                $('#prod-price-' + id).text(price + " лв");
                $('#prod-visible-' + id).text((visible == 1 ? "Yes" : "No"));
            });
        }
    </script>
@endsection