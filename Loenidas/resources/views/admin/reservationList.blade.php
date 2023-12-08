@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Reservation List</h4>
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
                                            Pending Reservation: 46</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#solid-rounded-justified-tab2" data-bs-toggle="tab">
                                            Confirm Reservation: 5</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#solid-rounded-justified-tab3" data-bs-toggle="tab">
                                            Decline Reservation: 2</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="ribbon-wrapper card">
                                                    <div class="card-body">
                                                        <div class="ribbon ribbon-success ribbon-right">Reservation ID:
                                                            202306211</div>
                                                        <div class="box-order" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#pendingReservation">
                                                            <img src="assets/img/order.png" class="order-img" />
                                                            <div class="order-details">
                                                                <p>
                                                                    <strong>Customer Name:</strong><br> 
                                                                    Francis Joe Pilarmeo<br>
                                                                    <strong>Phone Number:</strong> 09386062492
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
                                                <div class="ribbon-wrapper card">
                                                    <div class="card-body">
                                                        <div class="ribbon ribbon-success ribbon-right">Reservation ID:
                                                            202306211</div>
                                                        <div class="box-order" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#acceptReservation">
                                                            <img src="assets/img/order.png" class="order-img" />
                                                            <div class="order-details">
                                                                <p>
                                                                    <strong>Customer Name:</strong><br> 
                                                                    Francis Joe Pilarmeo<br>
                                                                    <strong>Phone Number:</strong> 09386062492
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab3">
                                        Tab content 3
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>

    <div class="modal fade" id="pendingReservation" tabindex="-1" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reservation Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body-transaction">
                    <div class="row">
                        <div class="col-12">
                            <div class="order-details">
                                <strong>
                                    Reservation ID: 202080099
                                </strong><br>
                                Customer Name: Francis Joe<br>
                                Phone Number: 09233456843<br>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Date:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="November 28, 2023" />
                                        </div>
                                    <label class="col-lg-2 col-form-label">Time:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" value="1:10 pm" />
                                    </div>
                                    <label class="col-lg-2 col-form-label">People:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" value="10" />
                                    </div>
                                    <label class="col-form-label col-md-2">Table:</label>
                                    <div class="col-md-9">
                                        <select class="form-select">
                                            <option>Table 1</option>
                                            <option>Table 2</option>
                                            <option>Table 4</option>
                                            <option>Table 5</option>
                                            <option>No table is available at this time</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Accept</button>
                    <button type="button" class="btn btn-submit" style="background-color: red">Decline</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="acceptReservation" tabindex="-1" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reservation Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body-transaction">
                    <div class="row">
                        <div class="col-12">
                            <div class="order-details">
                                <strong>
                                    Reservation ID: 202080099
                                </strong><br>
                                Customer Name: Francis Joe<br>
                                Phone Number: 09233456843<br>
                                Date: November 28, 2023<br>
                                Time: 1:00 PM<br>
                                People: 4<br>
                                Table: Table 12<br>
                                Status: Accept Reservation
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
    </style>
@endsection
