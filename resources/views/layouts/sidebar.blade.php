<div class="top-brand">
    <h3>Количка</h3>
    <img src="/images/cart.jpg" style="max-height: 200px; width: auto;">
    <div class="discount">
        <p>Общо <span id="total_price">{{ $cart['total_price'] }}</span> лв<br>
            (<span id="total_qtty">{{ $cart['total_qtty'] }}</span> неща)</p>
        <a href="{{ url('/cart') }}">Поръчай</a>
    </div>
</div>
<div class="top-brand-menu">
    <h3>Всички албуми</h3>
    <ul class="brand-list">
        @foreach($categories as $category)
            <li><a href="{{ url('/products/' . $category->name) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
<div class="tags">
    <h4 class="tag_head">Tags Widget</h4>
    <ul class="tags_links">
        <li><a href="#">Kitesurf</a></li>
        <li><a href="#">Super</a></li>
        <li><a href="#">Duper</a></li>
        <li><a href="#">Theme</a></li>
        <li><a href="#">Men</a></li>
        <li><a href="#">Women</a></li>
        <li><a href="#">Equipment</a></li>
        <li><a href="#">Best</a></li>
        <li><a href="#">Accessories</a></li>
        <li><a href="#">Men</a></li>
        <li><a href="#">Apparel</a></li>
        <li><a href="#">Super</a></li>
        <li><a href="#">Duper</a></li>
        <li><a href="#">Theme</a></li>
        <li><a href="#">Responsiv</a></li>
        <li><a href="#">Women</a></li>
        <li><a href="#">Equipment</a></li>
    </ul>
    <a href="#" class="link1">View all tags</a>
</div>
