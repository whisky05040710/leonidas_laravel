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
        <div class="col-xl-6 d-flex">
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
                        <ul class="product-lists">
                          <li>
                            <div class="productimg">
                              <div class="productimgs">
                                <img
                                  src="assets/img/product/beverage-avo-smoothie.jpg"
                                  alt="img"
                                />
                              </div>
                              <div class="productcontet">
                                <h4>
                                  Avocado Smoothie
                                  <a
                                    href="javascript:void(0);"
                                    class="ms-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit"
                                    ><img
                                      src="assets/img/icons/edit-5.svg"
                                      alt="img"
                                  /></a>
                                </h4>
                                <div class="productlinkset">
                                  <h5>125.00</h5>
                                </div>
                                <div class="increment-decrement">
                                  <div class="input-groups">
                                    <span id="quantity">1x</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>3000.00</li>
                          <li>
                            <a
                              class="confirm-text"
                              href="javascript:void(0);"
                            ></a>
                          </li>
                        </ul>
                        <ul class="product-lists">
                          <li>
                            <div class="productimg">
                              <div class="productimgs">
                                <img
                                  src="assets/img/product/burger-beef-patty.jpg"
                                  alt="img"
                                />
                              </div>
                              <div class="productcontet">
                                <h4>
                                  Burger Beef Patty
                                  <a
                                    href="javascript:void(0);"
                                    class="ms-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit"
                                    ><img
                                      src="assets/img/icons/edit-5.svg"
                                      alt="img"
                                  /></a>
                                </h4>
                                <div class="productlinkset">
                                  <h5>120.00</h5>
                                </div>
                                <div class="increment-decrement">
                                  <div class="input-groups">
                                    <span id="quantity">1x</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>3000.00</li>
                          <li></li>
                        </ul>

                        <ul class="product-lists">
                          <li>
                            <div class="productimg">
                              <div class="productimgs">
                                <img
                                  src="assets/img/meals-beef-sinigang.jpg"
                                  alt="img"
                                />
                              </div>
                              <div class="productcontet">
                                <h4>
                                  Beef Sinigang XL
                                  <a
                                    href="javascript:void(0);"
                                    class="ms-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit"
                                    ><img
                                      src="assets/img/icons/edit-5.svg"
                                      alt="img"
                                  /></a>
                                </h4>
                                <div class="productlinkset">
                                  <h5>120.00</h5>
                                </div>
                                <div class="increment-decrement">
                                  <div class="input-groups">
                                    <span id="quantity">1x</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>3000.00</li>
                          <li></li>
                        </ul>
                      </div>
                    </div>
                    <br />

                    <div class="split-card"></div>
                    <div class="card-body pt-0 pb-2">
                      <div class="setvalue">
                        <ul>
                          <li>
                            <h5>Subtotal</h5>
                            <h6>₱ 555.00</h6>
                          </li>
                          <li>
                            <h5>Discount (Senior Citizen)</h5>
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
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection