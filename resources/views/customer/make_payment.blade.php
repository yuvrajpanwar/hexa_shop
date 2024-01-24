@extends('customer_layout.customer_app')


@section('content')
    <section id="cart-view" class="payment_issue" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    <div style="margin-top:100px;">
                                        <a class="continue_shopping" href="{{ route('my_orders') }}" style="font-size:25px">
                                            There is a payment issue.<br>Complete your payment from here. &rarr;</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cart-view" class="gateway">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">

                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                <script>
                                    var options = {
                                        "order_id": `{{ session('razorpay_order_id') }}`,
                                        "name": "Hexa Shop", //business name
                                        "description": "Test Transaction from razorpay",
                                        "image": "https://yuvrajpanwar.github.io/images/dp.jpeg",
                                        "prefill": {
                                            "name": `{{ session('customer')->name ?? '' }}`,
                                            "email": `{{ session('customer')->email ?? '' }}`,
                                            "contact": `{{ session('customer')->phone ?? '' }}`
                                        },
                                        "handler": function(response) {
                                            var data = {
                                                razorpay_payment_id: response.razorpay_payment_id,
                                                razorpay_order_id: response.razorpay_order_id,
                                                razorpay_signature: response.razorpay_signature,
                                                _token: '{{ csrf_token() }}',
                                                order_id: `{{ session('order_id') }}`
                                            };

                                            $.ajax({
                                                type: 'POST',
                                                url: `{{ route('update_payment_status') }}`,
                                                data: data,
                                                success: function(result) {
                                                    window.location.href = `{{ route('payment_successful') }}`;
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                        },
                                        "modal": {
                                            "ondismiss": function() {
                                                window.location.replace("{{route('my_orders')}}");
                                            }
                                        }
                                    };
                                    var rzp1 = new Razorpay(options);
                                    rzp1.on('payment.failed', function(response) {
                                        console.log(response.error);
                                        $('.payment_issue').show();
                                        $('.gateway').hide();
                                    });
                                    document.addEventListener('DOMContentLoaded', function() {
                                        rzp1.open();
                                    });
                                </script>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('js')
    @if (!session('razorpay_order_id'))
        <script>
            $(document).ready(function() {
                $('.payment_issue').show();
                $('.gateway').hide();
            });
        </script>
    @endif
@endpush
