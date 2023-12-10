@extends('layouts.pos')
@section('content')
    <div class="page-wrapper ms-0">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-sm-12 tabs_wrapper">
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Point of Sales</h4>
                            <h6>Manage your Orders Here</h6>
                        </div>
                    </div>

                    
                    <ul class="tabs owl-carousel owl-theme owl-product border-0">
                        @foreach ($categories as $category)
                            <li class="{{ $loop->first ? 'active' : '' }}" id="{{ $category->id }}">
                                <div class="product-details">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="img" />
                                    <h6>{{ $category->name }}</h6>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tabs_container">
                        @foreach ($categories as $category)
                            <div class="tab_content {{ $loop->first ? 'active' : '' }}" data-tab="{{ $category->id }}">
                                <div class="row">
                                    @foreach ($menus as $menu)
                                        @if ($menu->menu_category_id === $category->id)
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <div class="productset flex-fi">
                                                    <div class="productsetimg">
                                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="img" />
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h5>{{ $category->name }}</h5>
                                                        <h4>{{ $menu->menuName }}</h4>
                                                        <h6>{{ $menu->price }}</h6>
                                                        <button class="add-to-cart-button"
                                                            data-menu-id="{{ $menu->id }}"
                                                            data-image="{{ $menu->image }}"
                                                            data-name="{{ $menu->menuName }}"
                                                            data-price="{{ $menu->price }}">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <script>
                                        const imageToAdjust =
                                            document.getElementById("imageToAdjust");

                                        const adjustImageOrientation = () => {
                                            const img = new Image();
                                            img.src = imageToAdjust.src;

                                            img.onload = function() {
                                                const width = img.width;
                                                const height = img.height;

                                                // Check if the image is in landscape orientation
                                                if (width > height) {
                                                    // Rotate the image 90 degrees (clockwise)
                                                    const canvas = document.createElement("canvas");
                                                    canvas.width = height;
                                                    canvas.height = width;
                                                    const ctx = canvas.getContext("2d");
                                                    ctx.rotate(Math.PI / 2);
                                                    ctx.drawImage(img, 0, -width, height, width);

                                                    // Update the image source with the adjusted image
                                                    imageToAdjust.src = canvas.toDataURL("image/jpeg");
                                                }
                                            };
                                        };

                                        // Call the function to adjust image orientation
                                        adjustImageOrientation();
                                    </script>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="order-list">
                        <div class="orderid">
                            <h4>Orders Cart</h4>
                        </div>
                    </div>

                    <form id="orderPaidForm" action="{{ route('pos.store') }}" method="POST">
                        @csrf
                        <div class="card card-order">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="select-split ">
                                            <div class="select-group w-100">
                                                <select class="select" name="table_id">
                                                    <option>Select Table</option>
                                                    @foreach ($availableTables as $table)
                                                        <option value="{{ $table->id }}">Table {{ $table->tableNum }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="split-card"></div>
                            <div class="card-body pt-0">
                                <div class="totalitem">
                                    <h4>Total orders : <span id="totalOrders">0</span></h4>
                                </div>
                                <div id="cartSection" class="product-table">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            var cartItems = [];

                                            // Function to calculate total quantity
                                            function calculateTotalQuantity() {
                                                var totalQuantity = 0;
                                                $('.quantity-field').each(function() {
                                                    var quantity = parseInt($(this).val());
                                                    totalQuantity += quantity;
                                                });
                                                return totalQuantity;
                                            }

                                            // Function to update total quantity display
                                            function updateTotalQuantity() {
                                                var totalOrders = calculateTotalQuantity();
                                                $('#totalOrders').text(totalOrders);
                                            }

                                            // Function to calculate the subtotal
                                            function calculateSubtotal() {
                                                var subtotal = 0;
                                                $('.product-lists').each(function() {
                                                    var quantity = parseInt($(this).find('.quantity-field').val());
                                                    var pricePerItem = parseFloat($(this).find('.productlinkset h5').text());
                                                    var itemSubtotal = quantity * pricePerItem;
                                                    subtotal += itemSubtotal;
                                                });
                                                return subtotal;
                                            }

                                            // Update the subtotal display
                                            function updateSubtotal() {
                                                var subtotal = calculateSubtotal();
                                                $('#subtotal').text(subtotal.toFixed(2)); // Update the subtotal display
                                            }

                                            // Function to calculate discount and update display
                                            function calculateDiscount(subtotal, discountType) {
                                                var discountAmount = 0;
                                                var totalAfterDiscount = 0;

                                                switch (discountType) {
                                                    case "PWD":
                                                    case "Senior Citizen":
                                                        discountAmount = subtotal * 0.1; // Assuming 5% discount
                                                        break;
                                                    default:
                                                        break;
                                                }

                                                totalAfterDiscount = subtotal - discountAmount;

                                                $('#discountAmount').text(discountAmount.toFixed(2));
                                                $('#totalAfterDiscount').text(totalAfterDiscount.toFixed(2));
                                            }

                                            // Function to calculate service charge (assumed 10%)
                                            function calculateServiceCharge(subtotal) {
                                                return subtotal * 0.10;
                                            }

                                            // Function to calculate VAT (assumed 12%)
                                            function calculateVAT(subtotal) {
                                                return subtotal * 0.12;
                                            }

                                            // Function to update Service Charge, VAT, and Total Bill based on calculations
                                            function updateServiceChargeVATTotalBill(subtotal, discountType) {
                                                var discount = 0;
                                                var grandTotal = 0;

                                                // Calculate discount based on discount type
                                                if (discountType === "PWD" || discountType === "Senior Citizen") {
                                                    discount = subtotal * 0.1; // Assuming 5% discount
                                                }

                                                grandTotal = subtotal - discount;

                                                var serviceCharge = calculateServiceCharge(grandTotal);
                                                var vat = calculateVAT(grandTotal + serviceCharge);
                                                var totalBill = grandTotal + serviceCharge + vat;

                                                $('#discountAmount').text(discount.toFixed(2));
                                                $('#totalAfterDiscount').text(grandTotal.toFixed(2));
                                                $('#serviceCharge').text(serviceCharge.toFixed(2));
                                                $('#vat').text(vat.toFixed(2));
                                                $('#totalBill').text(totalBill.toFixed(2));
                                            }

                                            // Update the calculations when an item is added to the cart or quantity changes
                                            function updateCalculations() {
                                                var subtotal = calculateSubtotal();
                                                var discountType = $('#discountType').val();

                                                updateSubtotal();
                                                updateTotalQuantity();

                                                if (discountType === "None") {
                                                    $('#discountAmount').text('₱ 0.00');
                                                    $('#totalAfterDiscount').text('₱ ' + subtotal.toFixed(2));
                                                    updateServiceChargeVATTotalBill(subtotal, discountType);
                                                } else {
                                                    calculateDiscount(subtotal, discountType);
                                                }
                                            }

                                            $(document).ready(function() {
                                                var initialSubtotal = calculateSubtotal();
                                                updateServiceChargeVATTotalBill(initialSubtotal);
                                            });

                                            // Event listener for discount type change
                                            $('#discountType').on('change', function() {
                                                var subtotal = calculateSubtotal();
                                                var selectedDiscountType = $(this).val();

                                                updateSubtotal();
                                                updateTotalQuantity();

                                                if (selectedDiscountType === "Select Discount Type") {
                                                    $('#discountAmount').text('0.00');
                                                    $('#totalAfterDiscount').text(subtotal.toFixed(2));
                                                } else {
                                                    calculateDiscount(subtotal, selectedDiscountType);
                                                }

                                                updateServiceChargeVATTotalBill(subtotal, selectedDiscountType);
                                            });

                                            // Attach event listeners for + and - buttons
                                            $(document).on('click', '.button-plus, .button-minus', function() {
                                                updateTotalQuantity();
                                                updateSubtotal();
                                                updateCalculations();
                                            });

                                            $('.add-to-cart-button').on('click', function() {
                                                var itemName = $(this).data('name');
                                                var itemPrice = $(this).data('price');
                                                var imagePath = $(this).data('image');
                                                var menuId = $(this).data('menu-id');

                                                console.log("Item Name: ", itemName);
                                                console.log("Item Price: ", itemPrice);
                                                console.log("Image: ", imagePath);
                                                console.log("Menu ID: ", menuId);

                                                // Check if the item is already in the cart
                                                var $existingCartItem = $('#cartSection').find('[data-menu-id="' + menuId + '"]');
                                                if ($existingCartItem.length > 0) {
                                                    var $quantityField = $existingCartItem.find('.quantity-field');
                                                    var currentQuantity = parseInt($quantityField.val());
                                                    $quantityField.val(currentQuantity + 1);
                                                    updateTotalPrice($existingCartItem);
                                                } else {
                                                    var quantity = 1;

                                                    cartItems.push({
                                                        menuId: menuId,
                                                        quantity: quantity,
                                                        menuPrice: itemPrice,
                                                        totalPrice: itemPrice
                                                    });
                                                    var baseUrl = 'http://127.0.0.1:8000/'; // Replace this with your Laravel base URL
                                                    var imageUrl = baseUrl + 'storage/' + imagePath;

                                                    var cartItemHTML = '<ul class="product-lists" data-menu-id="' + menuId + '">' +
                                                        '<li>' +
                                                        '<div class="productimg">' +
                                                        '<div class="productimgs">' +
                                                        '<img src="' + imageUrl + '" alt="img" />' +
                                                        '</div>' +
                                                        '<div class="productcontet">' +
                                                        '<h4>' + itemName + '</h4>' +
                                                        '<div class="productlinkset">' +
                                                        '<h5>' + itemPrice + '</h5>' +
                                                        '</div>' +
                                                        '<div class="increment-decrement">' +
                                                        '<div class="input-groups">' +
                                                        '<input type="button" value="-" class="button-minus dec button" />' +
                                                        '<input type="text" name="child" value="' + quantity +
                                                        '" class="quantity-field" />' +
                                                        '<input type="button" value="+" class="button-plus inc button" />' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '</li>' +
                                                        '<li class="total-price">' + (quantity * itemPrice) + '</li>' +
                                                        '<li>' +
                                                        '<a class="confirm-text" href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg" alt="img" /></a>' +
                                                        '</li>' +
                                                        '</ul>';

                                                    $('#cartSection').append(cartItemHTML);
                                                }
                                                $('.button-plus').on('click', function() {
                                                    var $quantityField = $(this).siblings('.quantity-field');
                                                    var currentQuantity = parseInt($quantityField.val());
                                                    $quantityField.val(currentQuantity + 1);

                                                    updateTotalPrice($(this).closest('.product-lists'));
                                                });

                                                // Event handler for the decrement button
                                                $('.button-minus').on('click', function() {
                                                    var $quantityField = $(this).siblings('.quantity-field');
                                                    var currentQuantity = parseInt($quantityField.val());
                                                    if (currentQuantity > 1) {
                                                        $quantityField.val(currentQuantity - 1);
                                                    }

                                                    updateTotalPrice($(this).closest('.product-lists'));
                                                });

                                                // Function to update total price based on quantity
                                                function updateTotalPrice($cartItem) {
                                                    var quantity = parseInt($cartItem.find('.quantity-field').val());
                                                    var pricePerItem = parseFloat($cartItem.find('.productlinkset h5')
                                                        .text()); // Update this line to fetch the price
                                                    var totalPrice = quantity * pricePerItem;
                                                    var menuId = parseInt($cartItem.attr('data-menu-id'));
                                                    var item = cartItems.find(item => item.menuId === menuId);
                                                    item.quantity = quantity;
                                                    item.menuPrice = pricePerItem;
                                                    item.totalPrice = totalPrice;

                                                    $cartItem.find('.total-price').text(totalPrice);
                                                }
                                                updateTotalQuantity();
                                                updateSubtotal();
                                                updateCalculations();
                                            });
                                            // Function to remove items from the cart
                                            $(document).on('click', '.confirm-text', function() {
                                                $(this).closest('.product-lists').remove();
                                                updateTotalQuantity();
                                                updateSubtotal();
                                            });

                                            $(document).ready(function() {
                                                updateCalculations();
                                            });

                                            // Event listener for the "Order Paid" button
                                            $('.btn-adds').on('click', function(e) {
                                                e.preventDefault(); // Prevent the default form submission


                                                // Get other necessary data (subtotal, discountType, etc.)
                                                var subtotal = parseFloat($('#subtotal').text());
                                                var discountType = $('#discountType').val();
                                                var discountAmount = 0; // Default to zero
                                                if (discountType === "PWD" || discountType ===
                                                    "Senior Citizen") {
                                                    // Calculate discount amount here based on selected discount type
                                                    discountAmount = subtotal * 0.1; // Assuming a 10% discount
                                                }

                                                var totalAfterDiscount = parseFloat($('#totalAfterDiscount').text());
                                                var serviceCharge = parseFloat($('#serviceCharge').text());
                                                var vat = parseFloat($('#vat').text());
                                                var totalBill = parseFloat($('#totalBill').text());

                                                // Create an object to hold the data
                                                var orderData = {
                                                    _token: $('input[name="_token"]').val(), // Include the CSRF token
                                                    subtotal: subtotal,
                                                    discountType: discountType,
                                                    discountAmount: discountAmount,
                                                    totalAfterDiscount: totalAfterDiscount,
                                                    serviceCharge: serviceCharge,
                                                    vat: vat,
                                                    totalBill: totalBill,
                                                    orderItems: cartItems,
                                                    table_id: $('select[name="table_id"]').val()
                                                    // Add other necessary fields here
                                                };

                                                // Send a POST request to your Laravel backend
                                                $.ajax({
                                                    url: '{{ route('pos.store') }}',
                                                    method: 'POST',
                                                    data: orderData,
                                                    success: function(response) {
                                                        // Handle successful response, if needed
                                                        console.log('Order successfully stored in the database');
                                                        // Redirect or show a success message

                                                        // Redirect to the desired URL after a successful order
                                                        window.location.href = '{{ route('pos.index') }}';
                                                    },
                                                    error: function(xhr, status, error) {
                                                        // Handle errors, if any
                                                        console.error(error);
                                                        // Show an error message to the user or retry the request
                                                    }
                                                });
                                            });

                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="split-card"></div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Subtotal</h5>
                                            <h6>₱ <span id="subtotal">0</span></h6>
                                            <input type="hidden" name="subtotal">
                                        </li>
                                        <li>
                                            <div class="col-lg-7">
                                                <div class="select-split ">
                                                    <div class="select-group w-100">
                                                        <select name="discountType" id="discountType" class="select">
                                                            <option value="None">Select Discount Type</option>
                                                            <option value="PWD">PWD (10% Discount)</option>
                                                            <option value="Senior Citizen">Senior Citizen (10% Discount)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>₱ <span id="discountAmount">0</span></h6>
                                            <input type="hidden" name="discountAmount">
                                        </li>
                                        <hr />
                                        <li>
                                            <h5></h5>
                                            <h6>₱ <span id="totalAfterDiscount">0</span></h6>
                                            <input type="hidden" name="totalAfterDiscount">
                                        </li>
                                        <li>
                                            <h5>10% Service Charge</h5>
                                            <h6>₱ <span id="serviceCharge">0.00</span></h6>
                                            <input type="hidden" name="serviceCharge">
                                        </li>
                                        <li>
                                            <h5>12% VAT</h5>
                                            <h6>₱ <span id="vat">0.00</span></h6>
                                            <input type="hidden" name="vat">
                                        </li>
                                        <li class="total-value">
                                            <h5>Total Bill</h5>
                                            <h6>₱ <span id="totalBill">0.00</span></h6>
                                            <input type="hidden" name="totalBill">
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-adds">Order Paid</button>
                                </div>

                                <div class="btn-pos">
                                    <ul>
                                        <li>
                                            <a class="btn" id="openFirstModal"><img
                                                    src="assets/img/icons/transcation.svg" alt="img"
                                                    class="me-1" />Reservation List
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="reservationlist" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reservation List</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                            aria-labelledby="purchase-tab">
                            <div class="table-top">
                                <div class="search-set">
                                    <div class="search-input">
                                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                                alt="img" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table datanew">
                                    <thead>
                                        <tr>
                                            <th>Reservation ID</th>
                                            <th>Customer Name</th>
                                            <th>Table Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirms as $confirm)
                                            <tr>
                                                <td>{{ $confirm->id }}</td>

                                                <td>{{ $confirm->user->firstname }} {{ $confirm->user->lastname }}</td>
                                                <td>{{ $confirm->table }}</td>
                                                <td>
                                                    <a class="me-3 view-details"
                                                        href="{{ route('pos.reservationPOS', $confirm->id) }}">
                                                        <img src="assets/img/icons/eye.svg" alt="img" />
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $orders = App\Models\Orders::where('reservation_id', $confirm->id)->get();
                                            @endphp

                                            <div class="modal fade" id="secondModal-{{ $confirm->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Customer Orders and Reservation Details
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="tab-content">
                                                                <div class="card flex-fill">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title">Orders Details</h5>
                                                                    </div>
                                                                    <div class="card-body pt-0 pb-2">
                                                                        <div class="setvalue">
                                                                            <ul>
                                                                                @foreach ($orders as $order)
                                                                                    <li>
                                                                                        {{-- <h5>{{ $order->menu->menuName }} (x{{ $order->quantity }})</h5> --}}
                                                                                        <h6>{{ $order->total_price_per_order }}
                                                                                        </h6>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div> <button class="btn btn-secondary"
                                                                id="backToFirstModal">Back</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="secondModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Orders and Reservation Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h5 class="card-title">Orders Details</h5>
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Adobo (x3)</h5>
                                            <h6>700.00</h6>
                                        </li>
                                        <li>
                                            <h5>Shake (x3)</h5>
                                            <h6>900.00</h6>
                                        </li>
                                    </ul>
                                </div>
                                <hr />
                            </div>
                            <div class="card-header">
                                <h5 class="card-title">Reservation Details</h5>
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Phone Number</h5>
                                            <h6>0938 606 2492</h6>
                                        </li>
                                        <li>
                                            <h5>Date</h5>
                                            <h6>June 12, 2023</h6>
                                        </li>
                                        <li>
                                            <h5>Time</h5>
                                            <h6>1:00 PM</h6>
                                        </li>
                                        <li>
                                            <h5>People</h5>
                                            <h6>5 People</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <button class="btn btn-secondary" id="backToFirstModal">Back</button>
                </div> 
            </div>
        </div>
    </div> --}}
    </div>

    {{-- modal script --}}
    <script>
        $(document).ready(function() {
            $('#openFirstModal').on('click', function() {
                $('#reservationlist').modal('show');
            });

            // Handle click on eye icon to open the second modal
            $('.datanew').on('click', 'tbody tr td a', function() {
                // Your logic to handle the eye icon click, for example:
                // Get data or perform any other operations
                var csrfToken = $('meta[name="csrf-token"]').attr("content");
                var reservationId = $(this).data('reservation-id');

                // Fetch data for the second modal using AJAX
                $.ajax({
                    type: 'GET',
                    url: '/fetch/' + reservationId,
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    success: function(data) {
                        // Access reservation and orders data
                        var reservation = data.reservation;
                        var orders = data.orders;
                        // Now you can use reservation.date and orders in your second modal
                        console.log(orders);

                        $('#secondModal-' + reservationId).modal('show');


                        // Hide the first modal (reservation list)
                        $('#reservationlist').modal('hide');
                    },
                    error: function(error) {
                        console.error('Error fetching orders:', error);
                    }
                });
            });

            // Handle click on back button in the second modal
            $('#backToFirstModal').on('click', function() {
                // Show the first modal (reservation list)
                $('#reservationlist').modal('show');

                // Hide the second modal
                $('#secondModal-' + reservationId).modal('show');
            });

            // Function to update the content of the second modal with the fetched data
            function updateSecondModalContent(reservation, orders) {
                // Update your second modal content using reservation and orders data
                // For example, update order details in the second modal
                console.log('Updating second modal content:', reservation, orders);
            }

        });
    </script>


    <style>
        /* Reset standard margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .productsetcontent {
            margin: 0;
        }

        .add-to-cart-button {
            width: 100%;
            padding: 10px 0;
            /* Set top and bottom padding to 10px, remove left and right padding */
            margin: 0;
            /* Remove margin */
            background-color: #4caf50;
            color: white;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }

        .add-to-cart-button:hover {
            background-color: #45a049;
        }
    </style>
@endsection
