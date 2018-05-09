<section id="grid" class="grid clearfix demo1">
    @if(isset($categoryProducts[0]))
        @foreach($categoryProducts as $product)
            <a href="{{ url('products/single/' . $product->name) }}"
               data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                <figure>
                    <img src="{{ asset('storage/' . $product->img1) }}" style="height: 300px; width: auto;"/>
                    <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                        <path d="M 180,160 0,218 0,0 180,0 z"/>
                    </svg>
                    <figcaption>
                        <h2>{{ str_limit($product->name, 9, "...") }}</h2>
                        <p>{{ str_limit($product->description, 35, "...") }}</p>
                        <button>View</button>
                    </figcaption>
                </figure>
            </a>
        @endforeach
    @else
        <p>No products found.</p>
    @endif
</section>
