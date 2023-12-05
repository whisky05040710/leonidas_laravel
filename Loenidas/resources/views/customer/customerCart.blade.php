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
                                            <h4>Total orders : 2</h4>
                                        </div>
                                        <div class="product-table">
                                            <ul class="product-lists">
                                                <li>
                                                    <div class="productimg">
                                                        <div class="productimgs">
                                                            <img src="assets/img/product/beverage-avo-smoothie.jpg"
                                                                alt="img" />
                                                        </div>
                                                        <div class="productcontet">
                                                            <h4>
                                                                Avocado Smoothie
                                                                <a href="javascript:void(0);" class="ms-2"
                                                                    data-bs-toggle="modal" data-bs-target="#edit">
                                                                    <img src="assets/img/icons/edit-5.svg"
                                                                        alt="img" /></a>
                                                            </h4>
                                                            <div class="productlinkset">
                                                                <h5>125.00</h5>
                                                            </div>
                                                            <div class="increment-decrement">
                                                                <div class="input-groups">
                                                                    <input type="button" value="-"
                                                                        class="button-minus dec button" />
                                                                    <input type="text" name="child" value="0"
                                                                        class="quantity-field" />
                                                                    <input type="button" value="+"
                                                                        class="button-plus inc button" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>3000.00</li>
                                                <li>
                                                    <a class="confirm-text" href="javascript:void(0);"><img
                                                            src="assets/img/icons/delete-2.svg" alt="img" /></a>
                                                </li>
                                            </ul>
                                            <ul class="product-lists">
                                                <li>
                                                    <div class="productimg">
                                                        <div class="productimgs">
                                                            <img src="assets/img/product/burger-beef-patty.jpg"
                                                                alt="img" />
                                                        </div>
                                                        <div class="productcontet">
                                                            <h4>
                                                                Burger Beef Patty
                                                                <a href="javascript:void(0);" class="ms-2"
                                                                    data-bs-toggle="modal" data-bs-target="#edit"><img
                                                                        src="assets/img/icons/edit-5.svg"
                                                                        alt="img" /></a>
                                                            </h4>
                                                            <div class="productlinkset">
                                                                <h5>120.00</h5>
                                                            </div>
                                                            <div class="increment-decrement">
                                                                <div class="input-groups">
                                                                    <input type="button" value="-"
                                                                        class="button-minus dec button" />
                                                                    <input type="text" name="child" value="0"
                                                                        class="quantity-field" />
                                                                    <input type="button" value="+"
                                                                        class="button-plus inc button" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>3000.00</li>
                                                <li>
                                                    <a class="confirm-text" href="javascript:void(0);"><img
                                                            src="assets/img/icons/delete-2.svg" alt="img" /></a>
                                                </li>
                                            </ul>


                                        </div>

                                        <div class="split-card"></div>
                                        <div class="card-body pt-0 pb-2">
                                            <div class="setvalue">
                                                <ul>
                                                    <li>
                                                        <h5>Subtotal</h5>
                                                        <h6>₱ 555.00</h6>
                                                    </li>
                                                    <li>
                                                        <div class="mb-3">
                                                            <label class="form-label">Select Discount</label>
                                                            <select class="form-select">
                                                                <option selected>None</option>
                                                                <option value="Senior Citizen">Senior Citizen</option>
                                                                <option value="PWD">PWD</option>
                                                            </select>
                                                        </div>
                                                        <h5>10% Discount</h5>
                                                        <h6>₱ 50.00</h6>
                                                    </li>
                                                    <hr />
                                                    <li>
                                                        <h5></h5>
                                                        <h6>₱ 505.00</h6>
                                                    </li>
                                                    <li>
                                                        <h5>10% Service Charge</h5>
                                                        <h6>₱ 55.00</h6>
                                                    </li>
                                                    <li>
                                                        <h5>12% VAT</h5>
                                                        <h6>₱ 139.00</h6>
                                                    </li>
                                                    <li class="total-value">
                                                        <h5>Total Bill</h5>
                                                        <h6>₱ 695.00</h6>
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
                                <button href="javascript:void(0);" class="btn btn-submit">Placed Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection