@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Orders List</h4>
                    <h6>June 12, 2023</h6>
                </div>
            </div>
            <div class="comp-sec-wrapper">
                <section class="comp-section">
                    <div class="col-md-12">
                        <div class="card bg-white">

                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#solid-rounded-justified-tab1"
                                            data-bs-toggle="tab">
                                            Order Paid: 5</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#solid-rounded-justified-tab2" data-bs-toggle="tab">
                                            Order Cooked: 2</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1">


                                        <div class="row">

                                            <div class="col-md-4 col-sm-6">
                                                <div class="ribbon-wrapper card">
                                                    <div class="card-body">
                                                        <div class="ribbon ribbon-success ribbon-right">Order ID: 202306211
                                                        </div>
                                                        <div class="box-order" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#order1">
                                                            <img src="assets/img/order.png" class="order-img" />
                                                            <div class="order-details">
                                                                <p>
                                                                    <strong>Customer Name:</strong>
                                                                    <br> Francis Joe Pilarmeo<br>
                                                                    <strong>Table Number:</strong> 12
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab2">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="category-box-order" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#order2">
                                                    <div class="ribbon-wrapper card">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-success ribbon-right">Order ID:
                                                                202306211</div>
                                                            <div class="box-order" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#order2">
                                                                <img src="assets/img/order.png" class="order-img" />
                                                                <div class="order-details">
                                                                    <p>
                                                                        <strong>Customer Name:</strong><br>
                                                                        Francis Joe Pilarmeo<br>
                                                                        <strong>Table Number:</strong> 12
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>

    <div class="modal fade" id="order1" tabindex="-1" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body-transaction">
                    <div class="row">
                        <div class="col-12">
                            <div class="order-details">
                                <strong>
                                    Order ID: 202080099
                                </strong>
                                <strong class="left-auto">Table Number: 12</strong>
                            </div>
                            <div class="customer-info">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <strong>Orders List:</strong>
                                            <tr>
                                                <td>
                                                    <div class="dishname">
                                                        <span>Chicken Inasal</span> (Meal) <br />x3
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <img src="assets/img/yum.png" height="50" width="50" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="dishname">
                                                        <span>Classsic TLC Burgers</span> (Burgers)
                                                        <br />x1
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <img src="assets/img/yum.png" height="50" width="50" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Order Cooked</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="order2" tabindex="-1" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body-transaction">
                    <div class="row">
                        <div class="col-12">
                            <div class="order-details">
                                <strong>
                                    Order ID: 202080099
                                </strong>
                                <strong class="left-auto">Table Number: 12</strong>
                            </div>
                            <div class="customer-info">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <strong>Orders List:</strong>
                                            <tr>
                                                <td>
                                                    <div class="dishname">
                                                        <span>Chicken Inasal</span> (Meal) <br />x3
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <img src="assets/img/yum.png" height="50" width="50" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="dishname">
                                                        <span>Classsic TLC Burgers</span> (Burgers)
                                                        <br />x1
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <img src="assets/img/yum.png" height="50" width="50" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .customer-info {
            background-color: white;
            border: 1px solid #393939;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .modal-body-transaction {
            position: relative;
            flex: 1 1 auto;
            padding: 1rem;
            background-color: #b3dda1;
        }

        .order-img {
            width: 60px;
            float: left;
        }

        .order-details {
            overflow: hidden;
        }

        .dishname {
            text-align: left;
            margin-left: 15px;
        }

        .dishname span {
            font-weight: bold;
        }

        .order-details {
            display: flex;
            justify-content: space-between;
        }

        .left-auto {
            margin-left: auto;
        }
    </style>
@endsection
