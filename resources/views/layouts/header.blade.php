<div class="container">
    <div class="header">
        <div class="logo">
            <a href="{{ route('home') }}"><h1><img src="{{ asset('images/logo.png') }}" style="height: 25px; width: auto" alt="">MucyAlbums</h1></a>
        </div>
        <span class="menu"></span>
        <script>
            $("span.menu").click(function () {
                $(".navigation").slideToggle("slow", function () {
                    // Animation complete.
                });
            });

            function search() {
                if ($('#search-term').val().length > 2) {
                    window.location = "{{ url('/search') }}" + "/" + $('#search-term').val();
                } else {
                    swal('Minimum 3 characters!');
                }
            }

        </script>
        <div class="cleary"></div>
        <div class="navigation">
            <ul class="navig">
                <li><a href="{{ route('home') }}">НАЧАЛО</a></li>
                <li><a href="{{ url('/categories') }}"
                       class="{{ Request::segment(1) === 'categories' ? 'active' : null }}">МАГАЗИН</a></li>
                <li><a href="{{ url('/contact') }}" class="{{ Request::segment(1) === 'contact' ? 'active' : null }}">ЗА КОНТАКТИ</a>
                </li>
                <li><a href="{{ url('/admin') }}"
                       class="{{ Request::segment(1) === 'admin' ? 'active' : null }}">ADMIN</a></li>
            </ul>
        </div>
        <div class="search-bar">
            <input type="submit" onclick="search()" value=""/>
            <div class="text">
                <input type="text" id="search-term" placeholder="Search..."
                       onkeydown="if (event.keyCode == 13) search()"/>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
