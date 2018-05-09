@extends ('layouts.master')

@section ('content')

    <div class="container">
        <div class="brand">
            <!-- Content --- Bar -->
            <div class="brand-content-bar brandy-content">
                <ul class="path">
                    <li><a href="{{ route('home') }}">Начало</a>&nbsp; ></li>
                    <li class="actev">Албуми&nbsp;</li>
                </ul>
                <h3 class="page-hed">Категории албуми</h3>
                <div class="brand-row">
                    @foreach($categories as $category)
                        <a href="{{ url('/products/' . $category->name) }}">
                            <div class="brand-logo-grid">
                                <span class="badge">{{ $category->name }}</span>
                                <img src="{{ asset('storage/' . $category->img) }}" alt=""/>
                                <div class="prod">
                                    <a href="{{ url('/products/' . $category->name) }}">Виж<br>Албумите</a>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Content --- Bar -->
        <!-- Side Bar-->
        <div class="brand-side-bar">
            @include('layouts.sidebar')
        </div>
        <!-- Side Bar-->
        <div class="clearfix"></div>
    </div>

@endsection