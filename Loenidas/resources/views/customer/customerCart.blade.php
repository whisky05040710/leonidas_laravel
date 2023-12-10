@extends('layouts.customerBody')
@section('content')
    <div class="page-wrapper ms-0">
        <div class="content col-md-8 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Order Cart</h4>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="totalitem">
                                                <h4>Total orders : {{ $customerOrder }}</h4>
                                            </div>
                                            <div class="product-table">
                                                @foreach ($customerCarts as $index => $customerCart)
                                                    @foreach ($customerCart->orderItems as $orderItem)
                                                        <ul class="product-lists">

                                                            <li>
                                                                <div class="productimg">
                                                                    <div class="productimgs">
                                                                        <img src="{{ asset('storage/' . $orderItem->menu->image) }}"
                                                                            alt="img" />
                                                                    </div>
                                                                    <div class="productcontet">
                                                                        <h4>
                                                                            {{ $orderItem->menu->menuName }}
                                                                            <a href="javascript:void(0);" class="ms-2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit">
                                                                                <img src="assets/img/icons/edit-5.svg"
                                                                                    alt="img" /></a>
                                                                        </h4>
                                                                        <div class="productlinkset">
                                                                            <h5>{{ $orderItem->menu->price }}</h5>
                                                                        </div>
                                                                        <div class="increment-decrement">
                                                                            <div class="input-groups">
                                                                                <input type="button" value="-"
                                                                                    class="button-minus dec button" />
                                                                                <input type="text" value="1"
                                                                                    class="quantity-field"
                                                                                    data-menu-id="{{ $orderItem->id }}" />
                                                                                <input type="button" value="+"
                                                                                    class="button-plus inc button" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li id="menuPrice{{ $index }}">
                                                                {{ $orderItem->menu->price }}</li>
                                                            <li>
                                                                <button class="delete-item"
                                                                    data-order-id="{{ $customerCart->id }}"
                                                                    style="border: none; background: none; padding: 0; cursor: pointer;">
                                                                    <img src="assets/img/icons/delete-2.svg"
                                                                        alt="img" />
                                                                </button>
                                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('.delete-item').click(function(event) {
                                                                            event.preventDefault();
                                                                            var orderId = $(this).data('order-id');

                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: '{{ route('deleteToCart') }}',
                                                                                data: {
                                                                                    _token: '{{ csrf_token() }}',
                                                                                    order_id: orderId
                                                                                },
                                                                                success: function(response) {
                                                                                    // Refresh the page or update the UI as needed
                                                                                    location.reload(); // Example: Refresh the page
                                                                                },
                                                                                error: function(error) {
                                                                                    console.error(error);
                                                                                    // Handle errors or display a message to the user
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                                                </script>

                                                            </li>

                                                        </ul>
                                                        <input type="hidden" name="order_id" value="{{ $orderID->id }}">
                                                    @endforeach
                                                @endforeach
                                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                                <script>
                                                    $(document).ready(function() {

                                                        // Function to increment the quantity and update the total price
                                                        $(".button-plus").click(function() {
                                                            var quantityField = $(this).closest(".input-groups").find(".quantity-field");
                                                            var priceElement = $(this).closest(".product-lists").find("h5");
                                                            var price = parseFloat(priceElement.text());

                                                            console.log(price);

                                                            // Increment quantity by 1
                                                            var quantity = parseInt(quantityField.val()) + 1;

                                                            // Update total price
                                                            var totalPrice = quantity * price;
                                                            console.log(totalPrice);
                                                            $("#sub").text(totalPrice.toFixed(2));
                                                            $(this).closest(".product-lists").find("li:nth-child(2)").text(totalPrice.toFixed(2));
                                                            updateTotal();
                                                        });

                                                        // Function to decrement the quantity and update the total price
                                                        // Function to decrement the quantity and update the total price
                                                        // Function to decrement the quantity and update the total price
                                                        $(".button-minus").click(function(event) {

                                                            var quantityField = $(this).closest(".input-groups").find(".quantity-field");
                                                            var priceElement = $(this).closest(".product-lists").find("h5");
                                                            var price = parseFloat(priceElement.text());

                                                            // Increment quantity by 1
                                                            var quantity = parseInt(quantityField.val()) - 1;
                                                            // Update the content of the h6 element

                                                            // Update total price
                                                            var totalPrice = quantity * price;
                                                            $("#sub").text(totalPrice.toFixed(2));
                                                            $(this).closest(".product-lists").find("li:nth-child(2)").text(totalPrice.toFixed(2));
                                                            // Call the function initially
                                                            updateTotal();
                                                        });

                                                        // Function to update the #sub element with the sum of all menu prices
                                                        function updateTotal() {
                                                            var total = 0;
                                                            $('[id^="menuPrice"]').each(function() {
                                                                total += parseFloat($(this).text());
                                                            });
                                                            $('#sub').text("₱" + total.toFixed(2));

                                                            var selectedDiscountType = $('#discountType').val();
                                                            var discountAmount = 0;

                                                            if (selectedDiscountType === 'PWD' || selectedDiscountType === 'Senior Citizen') {
                                                                discountAmount = total * 0.1; // Assuming a 10% discount for PWD and Senior Citizen
                                                            }

                                                            // Update the displayed discount amount
                                                            $('#discountAmount').text("₱" + discountAmount.toFixed(2));

                                                            // Calculate discounted total after applying the discount
                                                            var discountedTotal = total - discountAmount;
                                                            $('#discounted').text("₱" + discountedTotal.toFixed(2));

                                                            // Calculate service charge (10% of discounted total)
                                                            var serviceCharge = discountedTotal * 0.1;
                                                            $('#service-charge').text("₱" + serviceCharge.toFixed(2));

                                                            // Calculate VAT (12% of discounted total)
                                                            var vat = discountedTotal * 0.12;
                                                            $('#vat').text("₱" + vat.toFixed(2));

                                                            // Calculate total bill (discounted total + service charge + VAT)
                                                            var totalBill = discountedTotal + serviceCharge + vat;
                                                            $('#total').text("₱" + totalBill.toFixed(2));

                                                            $('#discountTypeHidden').val(selectedDiscountType);
                                                        }

                                                        // Call the function initially
                                                        updateTotal();
                                                        $('#discountType').change(function() {
                                                            updateTotal(); // Update total when a discount type is selected
                                                        });

                                                        var csrfToken = $('meta[name="csrf-token"]').attr("content");
                                                        $("#placeOrder").click(function() {
                                                            // Create an array to store order data
                                                            var orderData = [];
                                                            var menuQuantity = {};

                                                            // Iterate through each quantity field
                                                            $(".quantity-field").each(function() {
                                                                var orderId = $(this).data("order-id");
                                                                var quantity = $(this).val();

                                                                // Push the order data to the array
                                                                orderData.push({
                                                                    orderId: orderId,
                                                                    quantity: quantity
                                                                });
                                                                var menuId = $(this).data(
                                                                "menu-id"); // Assuming you have a data attribute for menuId
                                                                menuQuantity[menuId] = quantity;
                                                            });
                                                            console.log('Order Data:', orderData);
                                                            console.log('Menu Quantity:', menuQuantity);

                                                            var selectedDiscountType = $('#discountType').val();
                                                            var discountType = selectedDiscountType !== 'None' ? selectedDiscountType : null;

                                                            var totalBill = parseFloat($('#total').text().replace('₱', ''));
                                                            // Send an AJAX request to your server to update the orders
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "/update-order",
                                                                headers: {
                                                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                                                                }, // Replace with the actual URL endpoint on your server
                                                                data: {
                                                                    orders: orderData,
                                                                    discountType: discountType,
                                                                    totalBill: totalBill,
                                                                    menuQuantity: menuQuantity
                                                                },
                                                                success: function(response) {
                                                                    // Handle the server response if needed
                                                                    console.log(response);
                                                                },
                                                                error: function(error) {
                                                                    // Handle errors if any
                                                                    console.error(error);
                                                                }
                                                            });
                                                        });
                                                    });
                                                </script>



                                            </div>

                                            <div class="split-card"></div>
                                            <div class="card-body pt-0 pb-2">
                                                <div class="setvalue">
                                                    <ul>
                                                        <li>
                                                            <h5>Subtotal</h5>
                                                            <h6 id="sub"></h6>
                                                        </li>
                                                        <li>
                                                            <div class="col-lg-7">
                                                                <div class="select-split ">
                                                                    <div class="select-group w-100">
                                                                        <select name="discountType" id="discountType"
                                                                            class="select">
                                                                            <option value="None">Select Discount Type
                                                                            </option>
                                                                            <option value="PWD">PWD (10% Discount)
                                                                            </option>
                                                                            <option value="Senior Citizen">Senior Citizen
                                                                                (10% Discount)
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h6 id="discountAmount"> </h6>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <h5></h5>
                                                            <h6 id="discounted"></h6>
                                                        </li>
                                                        <li>
                                                            <h5>10% Service Charge</h5>
                                                            <h6 id="service-charge"></h6>
                                                        </li>
                                                        <li>
                                                            <h5>12% VAT</h5>
                                                            <h6 id="vat"></h6>
                                                        </li>
                                                        <li class="total-value">
                                                            <h5>Total Bill</h5>
                                                            <h6 id="total"></h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: right;">
                                    <a href="{{ route('customer.menu') }}" type="submit" class="btn btn-cancel">Back</a>
                                    <a href="{{ route('customer.reservation') }}" class="btn btn-submit"
                                        id="placeOrder">Placed Order</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
