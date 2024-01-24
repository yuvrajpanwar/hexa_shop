@extends('customer_layout.customer_app')


@section('content')
    <!-- product category -->
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container"><a
                                                        data-lens-image="{{asset('storage/product_images').'/'.$product->images[0]->name}}"
                                                        class="simpleLens-lens-image"><img
                                                            src="{{asset('storage/product_images').'/'.$product->images[0]->name}}"
                                                            class="simpleLens-big-image"></a></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{$product->name}}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price"> &#8377;{{ $product->price }}</span>
                                            <p class="aa-product-avilability">Avilability: <span>{{$product->status}}</span></p>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi,
                                            veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                        <h4>Size</h4>
                                        <div class="aa-prod-view-size">
                                            <a href="#">{{$product->size}}</a>
                                        </div>
                                      
                                        <div class="aa-prod-quantity" >
                                            
                                            <p class="aa-prod-category" style="margin-left:0">
                                                Category: <a href="#">{{$product->category->name}}</a>
                                            </p>
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart({{$product->id}})" id="add_to_cart_button">Add To Cart</a>
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_wishlist({{$product->id}})" id="add_to_wishlist_button">Add To Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">

                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane fade in active" id="description">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                        the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                        with desktop publishing software like Aldus PageMaker including versions of Lorem
                                        Ipsum.</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                                        <li>Lorem ipsum dolor sit amet.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!
                                        </li>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum
                                        voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid
                                        voluptate perferendis, distinctio!</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas!
                                        Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos,
                                        fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde
                                        accusantium facilis repudiandae.</p>
                                </div>
                               
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / product category -->
    <form id="cart_form" method="POST">
        <input type="hidden" value="" id="product_id" name="product_id">
        @csrf
    </form>
@endsection

@push('js')
<script>
    
    function add_to_cart(product_id) {
        $('#product_id').val(product_id);
        var formData = $('#cart_form').serialize();
        $.ajax({
            type: 'POST',
            url: `{{ route('add_to_cart') }}`,
            data: formData,
            success: function(response) {
                console.log(response);
                alert(response.message);
                $('.aa-cart-notify').html(response.total_cart_products);
                $('#add_to_cart_button').hide();
            },
            error: function(error) {
                console.error('Error submitting form:', error);
            }
        });
    }

    function add_to_wishlist(product_id) {
        $('#product_id').val(product_id);
        var formData = $('#cart_form').serialize();
        $.ajax({
            type: 'POST',
            url: `{{ route('add_to_wishlist') }}`,
            data: formData,
            success: function(response) {
                console.log(response);
                alert(response.message);
                $('#add_to_wishlist_button').hide();
                $('#total_wishlist_products').html(response.total_wishlist_products);
            },
            error: function(error) {
                console.error('Error submitting form:', error);
                alert('Some error occurred !');
            }
        });
    }

</script>
@endpush
