@extends('admin_layout/admin_app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">Orders</h1>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->


    <div class="container-fluid mb-4">

        @if (session('success'))
            <div class="alert alert-success show" id="alert-success">
                <a data-toggle="collapse" href="#alert-success" role="button" aria-expanded="true"
                    aria-controls="alert-success" class="btn-link close-button">x</a>


                {{ session('success') }}
            </div>
        @endif


        <table id="datatable" class="table table-striped" style="width:100%">

            <thead>
                <tr>
                    <th style="color: blue"><b>Order ID</b></th>
                    <th style="color: blue"><b>Razorpay order ID</b></th>
                    <th style="color: blue"><b>Total amount</b></th>
                    <th style="color: blue"><b>Customer name</b></th>
                    <th style="color: blue"><b>Customer email</b></th>
                    <th style="color: blue"><b>Payment status</b></th>
                    <th style="color: blue"><b>Order Status</b></th>
                </tr>
            </thead>

            <tbody>

            </tbody>

            <tfoot>
                <tr>
                    <th><b>Order ID</b></th>
                    <th><b>Razorpay order ID</b></th>
                    <th><b>Total amount</b></th>
                    <th><b>Customer name</b></th>
                    <th><b>Customer email</b></th>
                    <th><b>Payment status</b></th>
                    <th><b>Order Status</b></th>
                </tr>
            </tfoot>

        </table>

    </div>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
                    $('#datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: `{{ route('allOrders') }}`,
                            type: "POST",
                            data: function(data) {
                                data.search = $('input[type="search"]').val();
                                data._token = '{{ csrf_token() }}';
                            }
                        },
                        order: ['1', 'DESC'],
                        pageLength: 10,
                        searching: true,
                        aoColumns: [{
                                data: 'id',
                                // width: "5%",

                            },
                            {
                                data: 'razorpay_order_id',
                                render: function(data, type, row) {
                                    return (data) ? data : '-';
                                }
                            },
                            {
                                data: 'total_amount',
                                render: function(data, type, row) {
                                    return '&#8377; ' + data;
                                }
                            },
                            {
                                data: 'name',
                            },
                            {
                                data: 'email',
                            },
                            {
                                data: 'payment_status',
                                render: function(data, type, row) {
                                    if (data == "paid") {
                                        return "Paid";
                                    }
                                    return "Not Paid";
                                }
                            },
                            {
                                data: 'order_status',
                                // width: "20%",
                                render: function(data, type, row) {
                                    return `<select id="${row.id}" class="dropdown">
                                      <option value="Processing" ${data === 'Processing' ? 'selected' : ''}>Processing</option>
                                      <option value="Shipped" ${data === 'Shipped' ? 'selected' : ''}>Shipped</option>
                                      <option value="Out for delivery" ${data === 'Out for delivery' ? 'selected' : ''}>Out for delivery</option>
                                      <option value="Delivered" ${data === 'Delivered' ? 'selected' : ''}>Delivered</option>
                                      <option value="Cancelled" ${data === 'Cancelled' ? 'selected' : ''}>Cancelled</option>
                                  </select>`;
                                }
                            }
                        ]
                    });

                    $(document).on('change', '.dropdown', function() {
                            var order_status = $(this).val();
                            var id = $(this).attr('id');
                            data = {
                                order_status: order_status,
                                id: id,
                                _token: '{{ csrf_token() }}'
                                };

                                $.ajax({
                                    url: '{{route("update_order_status")}}',
                                    type: 'POST', 
                                    data: data,
                                    success: function(response) {
                                        alert('Order status updated successfully !');
                                    },
                                    error: function(error) {
                                        alert('There is some server error ! please try again later !');
                                    }
                                });


                            });
                    });
    </script>
@endpush
