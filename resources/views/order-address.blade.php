@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="register">
            <fieldset>
                <legend class="text-center">Вашата поръчка</legend>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 80%;">Албум</th>
                        <th>Цена</th>
                    </tr>
                    @foreach ($cart['products'] as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} лв X {{ $product->cart_quantity }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Доставка*</td>
                        <td>{{ $cart['total_price'] >= 50 ? 'Безплатна' : '4 лв' }}</td>
                    </tr>
                    <tr>
                        <td><h3>Общо</h3></td>
                        <td><h3>{{ $cart['total_price'] >= 30 ? $cart['total_price'] : $cart['total_price'] + 4 }}
                                лв</h3>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <small>*Безплатна доставка за поръчки над 50 лв.</small>
            <div class="clearfix"></div>
            <fieldset>
                <form action="{{ url('order') }}" method="post" style="margin: 0 25%">
                    {{ csrf_field() }}
                    <legend class="text-center">Лице за контакти</legend>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="fname">Име</label>
                            <input class="form-control" name="fname" id="fname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Фамилия</label>
                            <input class="form-control" name="lname" id="lname" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="phone">Телефон</label>
                            <input class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email Адрес</label>
                            <input class="form-control" name="email" id="email" value="" required>
                        </div>
                    </div>
                    <legend class="text-center">Данни за доставката</legend>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="city">Град</label>
                            <input class="form-control" name="city" id="city" required>
                        </div>
                        <div class="col-md-6">
                            <label for="delivery">Доставка</label>
                            <div class="radio">
                                <label><input type="radio" name="delivery" id="delivery" value="office">До офис на Еконт</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="delivery" id="delivery" value="home">До адрес</label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="address">Адрес или офис на Еконт</label>
                            <input class="form-control" name="address" id="address" required>
                        </div>
                    </div>
                    <div class="row form-group" style="margin: 0 25%">
                        <button class="btn btn-primary" style="margin: 0 25%" type="submit">Поръчай</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

@endsection