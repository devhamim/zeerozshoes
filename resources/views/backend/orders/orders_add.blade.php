@extends('layouts.dashboard')
@section('content')

    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Create Order</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create Order</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                <div class="row mb-2">
                    <div class="col-12">
                        <a href="{{ route('orders.list') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-angle-double-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf                  
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <h4 class="card-header">Customer Info</h4>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="order_date">Order Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control datetimepicker" id="order_date" name="order_date" required>
                                        </div>

                                        {{-- <div class="form-group col-md-6 col-12">
                                            <label for="invoice_id">Invoice ID <span class="text-danger">*</span></label> --}}
                                            <input type="hidden" class="form-control" id="invoice_id" name="invoice_id" value="{{ (int)$order_id->first()->invoice_id + 1 }}" readonly required>
                                        {{-- </div> --}}
                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_name">Customer Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        

                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_phone">Customer Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_address">Customer Address <span class="text-danger">*</span></label>
                                            <textarea name="customer_address" id="customer_address" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="courier_id">Courier Name</label>
                                            <select name="courier_id" id="courier_id" class="form-control select2">
                                                <option value="">Select A Courier</option>
                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="city_id">City Name</label>
                                            <select name="city_id" id="city_id" class="form-control select2">
                                                <option value="">Select A City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="zone_id">Zone Name</label>
                                            <select name="courier_zone_id" id="zone_id" class="form-control select2">
                                                <option value="">Select A Zone</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <h4 class="card-header">Product Info</h4>
                                <div class="card-body">
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="prod_row">
                                            </tbody>
                                            <tbody>
                                            <tr>
                                                <td colspan="5">
                                                    <div class="form-row">
                                                        <div class="form-group col-12 text-left">
                                                            <select id="product" class="form-control select2" required>
                                                                    <option value="">Select A Product</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- <div class="form-group row" style="padding: 6px 0;">

                                        <div class="form-group col-6 mb-0">
                                            <input type="text" class="form-control" id="memo_number" name="memo_number" placeholder="Memo Number">
                                        </div>

                                        <label for="sub_total" class="col-md-2 col-form-label text-right">Sub Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="sub_total" name="sub_total" min="0" value="0" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="shipping_cost" class="offset-md-6 col-md-2 col-form-label text-right">Delivery</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="shipping_cost" min="0" name="shipping_cost" value="0">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="discount" class="offset-md-6 col-md-2 col-form-label text-right">Discount</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="discount" min="0" name="discount" value="0">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="total" class="offset-md-6 col-md-2 col-form-label text-right">Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="total" min="0" name="total" value="0" readonly>
                                        </div>
                                    </div> --}}

                                    {{-- ===================== --}}
                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="sub_total" class="col-md-2 col-form-label text-right">Sub Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="sub_total" name="sub_total" min="0" value="0.00" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="shipping_cost" class="offset-md-6 col-md-2 col-form-label text-right">Delivery</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="shipping_cost" min="0" name="shipping_cost" value="0.00">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="discount" class="offset-md-6 col-md-2 col-form-label text-right">Discount</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" id="discount" min="0" name="discount" value="0.00">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="total" class="offset-md-6 col-md-2 col-form-label text-right">Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="total" min="0" name="total" value="0.00" readonly>
                                        </div>
                                    </div>
                                    {{-- ===================== --}}

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <textarea name="order_note" id="order_note" class="form-control" placeholder="Order Note"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <input type="submit" value="Save" class="btn btn-success w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

<script>
    $(document).ready(function () {
        $("#courier_id").on('change', function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            // Fetch cities
            $.ajax({
                url: '{{ route('getCities') }}',
                type: 'POST',
                data: { _token: CSRF_TOKEN, id: $(this).val() },
                success: function (data) {
                    $("#city_id").empty();
                    $("#city_id").append('<option value="">Select A City</option>');
                    $.each(data.cities, function (index, value) {
                        $("#city_id").append(new Option(value, index));
                    });
                    $('#shipping_cost').val(data.charge);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function () {
        $("#city_id").on('change', function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });
            $.ajax({
                url: '/getzone',
                type: 'POST',
                data: {_token: CSRF_TOKEN, id: $(this).val()},
                success: function (data) {
                    $("#zone_id").empty();
                    $("#zone_id").append('<option value="">Select A Zone</option>');

                    $.each(data, function (index, value) {
                            $("#zone_id").append(new Option(value, index));
                        });
                },
                error: function (xhr, status, error) {
                    // Handle AJAX errors
                    console.error('Error during AJAX request:', status, error);
                }
            });
        });
    });
</script>


<script>
     $(document).ready(function () {
    $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY',
            defaultDate: new Date(),
        });
    });
</script>

<script>
    $('.select2').select2();
</script>

<script>
    $(document).ready(function () {
        $('#product').on('change', function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                }
            });

            $.ajax({
                url: '/getProduct',
                type: 'POST',
                data: {_token: CSRF_TOKEN, id: $(this).val()},
                success: function (data) {
                    var newRowHtml = '<tr>' +
                        '<td>' + (data.sku ? data.sku : 'null') + '</td>' +
                        '<td>' +
                        '<input type="hidden" name="product_id[]" value="' + (data.product_id ? data.product_id : '') + '">' +
                        '<input type="text" class="form-control" value="' + (data.productName ? data.productName : '') + '" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<input style="width: 60px; border: 1px solid #ddd;" min="1" type="number" class="form-control qty" name="quantity[]" value="1">' +
                        '<input type="hidden" name="price" class="price" value="' + (data.product_price ? data.product_price : '') + '">' +
                        '</td>' +
                        '<td class="total_price">' + ((data.product_price ? data.product_price : 0) * 1).toFixed(2) + '</td>' +
                        '<td><button class="btn btn-danger" onclick="removeProduct(this)">Remove</button></td>' +
                        '</tr>';

                    // Append the new row to the table body
                    $('#prod_row').append(newRowHtml);

                    // Update totals
                    updateTotals();

                    // Add event listener for quantity input change
                    $('.qty').on('input', function () {
                        updateRowTotal($(this), data.product_price);
                    });
                }
            });
        });

        // Function to update the row total when quantity changes
        function updateRowTotal(input, productPrice) {
            var quantity = parseFloat(input.val());
            var row = input.closest('tr');
            var totalCell = row.find('.total_price');
            var newTotal = productPrice * quantity;
            totalCell.text(newTotal.toFixed(2));

            // Update totals
            updateTotals();
        }

        // Function to update the overall totals
        function updateTotals() {
            var subTotal = 0;

            // Update sub-total
            $('.total_price').each(function () {
                subTotal += parseFloat($(this).text());
            });

            $('#sub_total').val(subTotal.toFixed(2));

            // Update total
            var total = subTotal + parseFloat($('#shipping_cost').val()) - parseFloat($('#discount').val());
            $('#total').val(total.toFixed(2));

            finalCalc();
        }

        // Function to remove a product row
        window.removeProduct = function (button) {
            // Get the parent <tr> element and remove it
            var row = $(button).closest('tr');
            row.remove();

            // Update totals after removing the row
            updateTotals();
        };
    });
</script>

@endsection
