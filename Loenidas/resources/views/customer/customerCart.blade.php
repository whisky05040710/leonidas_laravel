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
                                                    <ul class="product-lists">
                                                        <li>
                                                            <div class="productimg">
                                                                <div class="productimgs">
                                                                    <img src="assets/img/product/beverage-avo-smoothie.jpg"
                                                                        alt="img" />
                                                                </div>
                                                                <div class="productcontet">
                                                                    <h4>
                                                                        {{ $customerCart->menu->menuName }}
                                                                        <a href="javascript:void(0);" class="ms-2"
                                                                            data-bs-toggle="modal" data-bs-target="#edit">
                                                                            <img src="assets/img/icons/edit-5.svg"
                                                                                alt="img" /></a>
                                                                    </h4>
                                                                    <div class="productlinkset">
                                                                        <h5>{{ $customerCart->menu->price }}</h5>
                                                                    </div>
                                                                    <div class="increment-decrement">
                                                                        <div class="input-groups">
                                                                            <input type="button" value="-"
                                                                                class="button-minus dec button" />
                                                                            <input type="text" value="1"
                                                                                class="quantity-field"
                                                                                data-order-id="{{ $customerCart->id }}" />
                                                                            <input type="button" value="+"
                                                                                class="button-plus inc button" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li id="menuPrice{{ $index }}">
                                                            {{ $customerCart->menu->price }}</li>
                                                        <li>
                                                            <a class="confirm-text" href="javascript:void(0);"><img
                                                                    src="assets/img/icons/delete-2.svg"
                                                                    alt="img" /></a>
                                                        </li>
                                                    </ul>
                                                    <input type="hidden" name="order_id" value="{{ $customerCart->id }}">
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

                                                            // Calculate discount (10% of subtotal)
                                                            var discount = total * 0.1;
                                                            $('#discount').text("₱" + discount.toFixed(2));

                                                            // Calculate discounted total
                                                            var discountedTotal = total - discount;
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
                                                        }

                                                        // Call the function initially
                                                        updateTotal();
                                                        var csrfToken = $('meta[name="csrf-token"]').attr("content");
                                                        $("#placeOrder").click(function() {
                                                            // Create an array to store order data
                                                            var orderData = [];


                                                            // Iterate through each quantity field
                                                            $(".quantity-field").each(function() {
                                                                var orderId = $(this).data("order-id");
                                                                var quantity = $(this).val();

                                                                // Push the order data to the array
                                                                orderData.push({
                                                                    orderId: orderId,
                                                                    quantity: quantity
                                                                });
                                                            });

                                                            // Send an AJAX request to your server to update the orders
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "/update-quantity",
                                                                headers: {
                                                                    "X-CSRF-TOKEN": csrfToken,
                                                                }, // Replace with the actual URL endpoint on your server
                                                                data: {
                                                                    orders: orderData
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
                                                            <h5>10% Discount</h5>
                                                            <h6 id="discount"></h6>
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
                                    <button class="btn btn-submit" id="placeOrder">Placed Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection