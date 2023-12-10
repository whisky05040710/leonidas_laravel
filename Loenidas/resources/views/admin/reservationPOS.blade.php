@extends('layouts.customerBody')
@section('content')
    <div class="page-wrapper ms-0">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Orders and Reservation History</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title">Orders Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <div class="totalitem">
                                                <h4>Total orders : 3</h4>
                                                <div class="Status">
                                                    <h4>Status : Accepted</h4>
                                                </div>
                                            </div>
                                            <div class="product-table">
                                                @foreach ($orders as $order)
                                                    @foreach ($order->orderItems as $orderItem)
                                                        <ul class="product-lists">
                                                            <li>
                                                                <div class="productimg">
                                                                    <div class="productimgs">
                                                                        <img src="assets/img/product/beverage-avo-smoothie.jpg"
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
                                                                                <span
                                                                                    id="quantity">{{ $orderItem->quantity }}x</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>{{ $orderItem->total_price }}.00</li>
                                                            <li>
                                                                <a class="confirm-text" href="javascript:void(0);"></a>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                @endforeach

                                            </div>
                                        </div>
                                        <br />

                                        <div class="split-card"></div>
                                        <div class="card-body pt-0 pb-2">
                                            <div class="setvalue">
                                                <ul>
                                                    <li>
                                                        <h5>Subtotal</h5>
                                                        <h6>₱ {{ number_format($subtotal, 2) }}</h6>
                                                    </li>
                                                    <li>
                                                        {{-- <h5>{{ $discountType }}</h5> --}}
                                                        @if ($discountType === 'PWD' || $discountType === 'Senior Citizen')
                                                            <h6>10% Discount ({{ $discountType }})</h6>
                                                        @elseif ($discountType === null || $discountType === 'None')
                                                            <h6>No Discount</h6>
                                                        @else
                                                        @endif
                                                        <h6>₱ {{ number_format($discount, 2) }}</h6>
                                                    </li>
                                                    <hr />
                                                    <li>
                                                        <h5></h5>
                                                        <h6>₱ {{ number_format($subtotalAfterDiscount, 2) }}</h6>
                                                    </li>
                                                    <li>
                                                        <h5>10% Service Charge</h5>
                                                        <h6>₱ {{ number_format($serviceCharge, 2) }}</h6>
                                                    </li>
                                                    <li>
                                                        <h5>12% VAT</h5>
                                                        <h6>₱ {{ number_format($vat, 2) }}</h6>
                                                    </li>
                                                    <li class="total-value">
                                                        <h5>Total Bill</h5>
                                                        <h6>₱ {{ number_format($totalBill, 2) }}</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr />
                            <div class="card-header">
                                <h5 class="card-title">Reservation Details</h5>
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Phone Number</h5>
                                            <h6>{{ $reservationID->phoneNum }}</h6>
                                        </li>
                                        <li>
                                            <h5>Date</h5>
                                            <h6>{{ \Carbon\Carbon::parse($reservationID->date)->format('F d, Y') }}</h6>
                                        </li>
                                        <li>
                                            <h5>Time</h5>
                                            <h6>{{ $reservationID->time }}</h6>
                                        </li>
                                        <li>
                                            <h5>People</h5>
                                            <h6>{{ $reservationID->people }} People</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div style="text-align: right; display: flex; justify-content: flex-end;">
                                <a href="{{ route('pos.index') }}" type="submit" class="btn btn-cancel">Back</a>
                                <form action="{{ route('pos.updateOrderStatus', ['id' => $reservationID->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-submit" style="margin-left: 10px">Order Paid</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
