@extends('layouts.app')

@section('content')
   <div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 style="float: left">Order Products</h4>
                    <a href="#" style="float:right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct">
                    <i class="fa fa-plus"></i> Add New Products</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-left">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Discount %</th>
                                <th>Total</th>
                                <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody class="addMoreProduct">
                           <tr>
                            <td>1</td>
                            <td>
                                <select name="product_id[]" class="form-control product_id">
                                <option value="">Select Item</option>
                                    @foreach ($products as $product)
                                    <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantity[]" class="form-control quantity">
                            </td>
                            <td>
                                <input type="number" name="price[]" class="form-control price" readonly>
                            </td>
                            <td>
                                <input type="number" name="discount[]" class="form-control discount">
                            </td>
                            <td>
                                <input type="number" name="total_amount[]" class="form-control total_amount" readonly>
                            </td>
                            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                           </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Total <b class="total">0.00</b></h4></div>
                    <div class="card-body">
                        <div class="btn-group btn-sm" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-secondary">print <i class="fa fa-print"></i></button>
                            <button type="button" class="btn btn-info">history <i class="fa fa-history"></i></button>
                            <button type="button" class="btn btn-danger">report <i class="fa fa-chart-simple"></i></button>
                        </div>
                        <div class="form-group">
                        <label for="">Customer Name</label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>
            

        <div class="form-group container"><!-- for the payment method -->
        <h5>Choose Payment Method:</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash">
            <label class="form-check-label" for="cash"><i class="fa fa-money-bill-1"></i> Cash</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer" value="bank_transfer">
            <label class="form-check-label" for="bank_transfer"><i class="fa fa-bank"></i> Bank Transfer</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card">
            <label class="form-check-label" for="credit_card"><i class="fa fa-credit-card"></i> Card</label>
        </div>
    </div>

    <!-- Payment Amount Input (conditionally displayed) -->
    <div class="form-group container payment-amount" style="display: none;">
    <label for="payment_amount">Payment Amount:</label>
    <input type="text" name="payment_amount" id="payment_amount" class="form-control">
    </div>

    <div class="form-group container change-amount" style="display: none;">
    <label for="change_amount">Change Amount:</label>
    <input type="text" name="change_amount" id="change_amount" class="form-control" readonly>
    </div>

    <!-- Bank Account Input (conditionally displayed) -->
    <div class="form-group container bank-account" style="display: none;">
        <label for="bank_account">Bank Account:</label>
        <input type="text" name="bank_account" id="bank_account" class="form-control">
    </div>

    <!-- Card Number Input (conditionally displayed) -->
    <div class="form-group container card-number" style="display: none;">
        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" id="card_number" class="form-control">
    </div>

    <!-- Other fields related to the selected payment method can be added here -->

    <button type="submit" class="btn btn-primary">Submit Payment</button>
</form>


                    </div>
                    
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for adding new product -->
<div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">add product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('products.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                        <input type="text" name="brand" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alert Stock</label>
                        <input type="number" name="alert_stock" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
.modal.right .modal-dialog{
    top:0;
    right:0;
    margin-right:25vh;
}
.modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%, 0, 0);
    transform: translate3d(25%, 0, 0);
}
.product_name{
    max-width: 200px; /* Adjust the max-width to your preference */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.container {
        font-size: 1em;
}
input[type=radio] {
        transform: scale(1.5);
}
</style>
</script>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    var rowCount = 1; // Initialize a row count for tracking added rows

    // Function to handle adding more rows
    $('.add_more').on('click', function () {
        rowCount++;
        var productOptions = $('.product_id').html();
        var tr = '<tr><td class="no">' + rowCount + '</td>' +
            '<td><select class="form-control product_id" name="product_id[]">' + productOptions +
            '</select></td>' +
            '<td> <input type="number" name="quantity[]" class="form-control quantity" ></td>' +
            '<td> <input type="number" name="price[]" class="form-control price" readonly></td>' +
            '<td> <input type="number" class="form-control discount" ></td>' +
            '<td> <input type="number" name="total_amount[]" class="form-control total_amount" readonly></td>' +
            '<td> <a class="btn btn-sm btn-warning delete"><i class="fa fa-times-circle"></i></a></td></tr>';
        $('.addMoreProduct').append(tr);
        calculateChangeAmount(); // Call the function after adding an item
    });

    // Function to handle deleting rows
    $('.addMoreProduct').on('click', '.delete', function () {
        $(this).closest('tr').remove();
        updateTotalAmount(); // Update the total amount when a row is deleted
        calculateChangeAmount(); // Calculate change amount when a row is deleted
    });

    // Function to update the total amount
    function updateTotalAmount() {
        var total = 0;
        $('.total_amount').each(function (i, e) {
            var amount = $(this).val() - 0;
            total += amount;
        });

        $('.total').html(total); // Display the updated total amount
        calculateChangeAmount(); // Calculate change amount when the total amount is updated
    }

    // Function to handle changes in product selection
    $('.addMoreProduct').on('change', '.product_id', function () {
        var tr = $(this).closest('tr');
        var selectedOption = tr.find('.product_id option:selected');
        var price = selectedOption.data('price');
        tr.find('.price').val(price); // Update the price when a product is selected
        updateTotalAmount(); // Update the total amount
    });

    // Function to handle changes in quantity and discount
    $('.addMoreProduct').on('change', '.quantity, .discount', function () {
        var tr = $(this).closest('tr');
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var disc = tr.find('.discount').val() - 0;
        
        // Check if the discount is negative and set it to 0 if it is
        if (disc < 0) {
            disc = 0;
            tr.find('.discount').val(disc);
        }
         // Check if the quantity is less than 1 and set it to 1 if it is
        if (qty < 1) {
            qty = 1;
            tr.find('.quantity').val(qty);
        }
        var total_amount = (qty * price) - ((qty * price * disc) / 100);
        tr.find('.total_amount').val(total_amount); // Update the total amount based on quantity, price, and discount
        updateTotalAmount(); // Update the total amount
    });
});
        $(document).ready(function () {
        // Show/hide payment input fields based on the selected payment method
        $('input[name="payment_method"]').change(function () {
            if ($('#cash').is(':checked')) {
                $('.payment-amount').show();
                $('.change-amount').show();
                $('.bank-account').hide();
                $('.card-number').hide();
            } else if ($('#bank_transfer').is(':checked')) {
                $('.payment-amount').hide();
                $('.change-amount').hide();
                $('.bank-account').show();
                $('.card-number').hide();
            } else if ($('#credit_card').is(':checked')) {
                $('.payment-amount').hide();
                $('.change-amount').hide();
                $('.bank-account').hide();
                $('.card-number').show();
            } else {
                $('.payment-amount').hide();
                $('.change-amount').hide();
                $('.bank-account').hide();
                $('.card-number').hide();
            }
            calculateChangeAmount(); // Calculate change amount when the payment method changes
        });

        // Detect changes in the Payment Amount input
        $('#payment_amount').on('input', function () {
            calculateChangeAmount();
        });
        //calculate the change amount
        function calculateChangeAmount() {
            var paymentAmount = parseFloat($('#payment_amount').val()) || 0;
            var totalAmount = parseFloat($('.total').text()) || 0;
            var changeAmount = paymentAmount - totalAmount;

            if (changeAmount < 0) {
                changeAmount = 0;
            }

            $('#change_amount').val(changeAmount.toFixed(2));
        }
    });
</script>
@endsection
