@foreach ($products as $product)
    <li>
        <figure>
            <a class="aa-product-img" href="{{route('product',['product_id'=>$product->id])}}">
                @if (count($product->images) > 0)
                    <div class="img-container">
                        <img class="product-image"
                            src="{{ asset('storage/product_images') . '/' . $product->images[0]->name }}">
                    </div>
                @else
                    <img src="{{ asset('customer/img/man/polo-shirt-4.png') }}" alt="polo shirt img">
                @endif
            </a>
            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="add_to_cart({{$product->id}})"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
            <figcaption>
                <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                <span class="aa-product-price"> &#8377;
                    {{ $product->price }}</span>
                <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Numquam accusamus facere iusto, autem soluta amet
                    sapiente
                    ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
            </figcaption>
        </figure>
        <!-- product badge -->
        @if ($product->status == 'sold')
            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
        @elseif ($product->status == 'sale')
            <span class="aa-badge aa-sale" href="#">SALE!</span>
        @endif
    </li>
@endforeach
