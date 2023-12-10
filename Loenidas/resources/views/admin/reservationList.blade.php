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
                                            Pending Reservation:
                                            {{ App\Models\Reservations::whereDate('updated_at', now())->where('status', 'Pending')->count() }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#solid-rounded-justified-tab2" data-bs-toggle="tab">
                                            Confirm Reservation:
                                            {{ App\Models\Reservations::whereDate('updated_at', now())->where('status', 'Confirm')->count() }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#solid-rounded-justified-tab3" data-bs-toggle="tab">
                                            Decline Reservation:
                                            {{ App\Models\Reservations::whereDate('updated_at', now())->where('status', 'Decline')->count() }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                        <div class="row">
                                            @foreach ($reservations as $reservation)
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="ribbon-wrapper card">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-success ribbon-right">Reservation ID:
                                                                {{ $reservation->id }}</div>
                                                            <div class="box-order" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#pendingReservation">
                                                                <img src="assets/img/order.png" class="order-img" />
                                                                <div class="order-details">
                                                                    <p>
                                                                        <strong>Customer Name:</strong><br>
                                                                        {{ $reservation->user->firstname }}
                                                                        {{ $reservation->user->lastname }}<br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab2">
                                        <div class="row">
                                            @foreach ($confirms as $confirm)
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="ribbon-wrapper card">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-success ribbon-right">Reservation ID:
                                                                {{ $confirm->id }}</div>
                                                            <div class="box-order" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#confirmReservation">
                                                                <img src="assets/img/order.png" class="order-img" />
                                                                <div class="order-details">
                                                                    <p>
                                                                        <strong>Customer Name:</strong><br>
                                                                        {{ $confirm->user->firstname }}
                                                                        {{ $confirm->user->lastname }}<br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="solid-rounded-justified-tab3">
                                        <div class="row">
                                            @foreach ($declines as $decline)
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="ribbon-wrapper card">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-success ribbon-right">Reservation ID:
                                                                {{ $decline->id }}</div>
                                                            <div class="box-order" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#declineReservation">
                                                                <img src="assets/img/order.png" class="order-img" />
                                                                <div class="order-details">
                                                                    <p>
                                                                        <strong>Customer Name:</strong><br>
                                                                        {{ $decline->user->firstname }}
                                                                        {{ $decline->user->lastname }}<br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
    @foreach ($reservations as $reservation)
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
                                        Reservation ID: {{ $reservation->id }}
                                    </strong><br>
                                    Customer Name: {{ $reservation->user->firstname }}
                                    {{ $reservation->user->lastname }}<br>
                                    Phone Number: {{ $reservation->phoneNum }}<br>
                                    Date: {{ \Carbon\Carbon::parse($reservation->date)->format('F j, Y') }} <br>
                                    Time: {{ \Carbon\Carbon::parse($reservation->time)->format('h:i A') }} <br>

                                    People: {{ $reservation->people }} <br>
                                    Date: {{ $reservation->phoneNum }} <br>
                                    <div class="form-group row">
                                        <form method="post"
                                            action="{{ route('update.reservation.status', $reservation) }}">
                                            @csrf
                                            @method('put')
                                            <label class="col-form-label col-md-2">Table:</label>
                                            <div class="col-md-9">
                                                <select class="select form-select" name="table">
                                                    <option hidden value=""> No table is available at this time
                                                    </option>
                                                    @foreach ($availableTables[$reservation->id] as $table)
                                                        <option value="{{ $table->id }}">Table {{ $table->tableNum }}
                                                        </option>
                                                        
                                                    @endforeach

                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="status" value="confirm" class="btn btn-submit">Accept</button>
                        <button type="submit" name="status" value="decline" class="btn btn-submit"
                            style="background-color: red">Decline</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($confirms as $confirm)
        <div class="modal fade" id="confirmReservation" tabindex="-1" aria-hidden="true" style="display: none">
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
                                        Reservation ID: {{ $confirm->id }}
                                    </strong><br>
                                    Customer Name: {{ $confirm->user->firstname }}
                                    {{ $confirm->user->lastname }}<br>
                                    Phone Number: {{ $confirm->phoneNum }}<br>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Date:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="November 28, 2023" />
                                        </div>
                                        <label class="col-lg-2 col-form-label">Time:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $confirm->time }}" />
                                        </div>
                                        <label class="col-lg-2 col-form-label">People:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $confirm->people }}" />
                                        </div>
                                        <label class="col-lg-2 col-form-label">Table:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $confirm->table }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($declines as $decline)
        <div class="modal fade" id="declineReservation" tabindex="-1" aria-hidden="true" style="display: none">
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
                                        Reservation ID: {{ $decline->id }}
                                    </strong><br>
                                    Customer Name: {{ $decline->user->firstname }}
                                    {{ $decline->user->lastname }}<br>
                                    Phone Number: {{ $decline->phoneNum }}<br>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Date:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="November 28, 2023" />
                                        </div>
                                        <label class="col-lg-2 col-form-label">Time:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $decline->time }}" />
                                        </div>
                                        <label class="col-lg-2 col-form-label">People:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $decline->people }}" />
                                        </div>
                                        <label class="col-lg-2 col-form-label">Table:</label>
                                        <div class="col-lg-9">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $decline->table }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


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
