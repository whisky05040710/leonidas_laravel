@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Orders List</h4>
                    <h6>{{ $today }}</h6>
                </div>
            </div>
            <div class="comp-sec-wrapper">
                <section class="comp-section">
                    <div class="col-md-12">
                        <div class="card bg-white">

                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#solid-rounded-justified-tab1" data-bs-toggle="tab">
                                            Order Cooked: {{ $ordersCount }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#solid-rounded-justified-tab2" data-bs-toggle="tab"> Order Served: {{ $ordersCount2 }}</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                                        <div class="row">
                                            @foreach ($orders as $order)
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="ribbon-wrapper card">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-success ribbon-right">Total Order:
                                                                {{  $order->orderItems->sum('quantity') }}
                                                            </div>
                                                            <div class="box-order" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#orderCooked{{ $order->id }}">
                                                                <img src="assets/img/order.png" class="order-img" />
                                                                <div class="order-details">
                                                                    <p>
                                                                        <strong>Customer Name:</strong>
                                                                        <br> 
                                                                    @if ($order->user)
                                                                        {{ $order->user->firstname }}
                                                                        {{ $order->user->lastname }} <br>
                                                                    @else
                                                                        Walk-in Customer <br>
                                                                    @endif
                                                                        <strong>Table Number:</strong> {{ $order->table_id }}
                                                                </div>
                                                            </div>

                                                            <div class="modal fade" id="orderCooked{{ $order->id }}"
                                                                tabindex="-1" aria-hidden="true" style="display: none">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Order Details</h5>
                                                                            <button type="button" class="close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body-transaction">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="order-details">
                                                                                        <strong>
                                                                                            Total Orders:
                                                                                            {{ $order->orderItems->sum('quantity') }}
                                                                                        </strong>
                                                                                        <strong class="left-auto">Table
                                                                                            Number: {{ $order->table_id }}</strong>
                                                                                    </div>
                                                                                    <div class="customer-info">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table mb-0">
                                                                                                <thead>
                                                                                                    <tr></tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <strong>Orders
                                                                                                        List:</strong>
                                                                                                        @foreach($order->orderItems as $item)
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <div
                                                                                                                    class="dishname">
                                                                                                                    <span>{{ $item->menu->menuName }}</span>
                                                                                                                    ({{ $item->menu->menuCategory->name }})
                                                                                                                    <br />x{{ $item->quantity }}
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td></td>
                                                                                                            <td>
                                                                                                                <img src="{{ asset('storage/' . $item->menu->image) }}"
                                                                                                                    height="50"
                                                                                                                    width="50" />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                id="orderServedBtn{{ $order->id }}"
                                                                                class="btn btn-submit">Order Served</button>
                                                                        </div>
                                                                    </div>
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
                                            @foreach ($orders2 as $order)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="ribbon-wrapper card">
                                                    <div class="card-body">
                                                        <div class="ribbon ribbon-success ribbon-right">Total Order:
                                                            {{  $order->orderItems->sum('quantity') }}
                                                        </div>
                                                        <div class="box-order" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#orderServed{{ $order->id }}">
                                                            <img src="assets/img/order.png" class="order-img" />
                                                            <div class="order-details">
                                                                <p>
                                                                    <strong>Customer Name:</strong>
                                                                    <br>
                                                                    @if ($order->user)
                                                                        {{ $order->user->firstname }}
                                                                        {{ $order->user->lastname }} <br>
                                                                    @else
                                                                        Walk-in Customer <br>
                                                                    @endif
                                                                        <strong>Table Number:</strong> {{ $order->table_id }}
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="orderServed{{ $order->id }}" tabindex="-1" aria-hidden="true" style="display: none">
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
                                                                                        Total Orders:
                                                                                            {{ $order->orderItems->sum('quantity') }}
                                                                                    </strong>
                                                                                    <strong class="left-auto">Table Number: {{ $order->table_id }}</strong>
                                                                                </div>
                                                                                <div class="customer-info">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table mb-0">
                                                                                            <thead>
                                                                                                <tr></tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <strong>Orders List:</strong>
                                                                                                @foreach($order->orderItems as $item)
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="dishname">
                                                                                                            <span>{{ $item->menu->menuName }}</span> ({{ $item->menu->menuCategory->name }}) 
                                                                                                            <br />x{{ $item->quantity }}
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td></td>
                                                                                                    <td>
                                                                                                        <img src="{{ asset('storage/' . $item->menu->image) }}" height="50" width="50" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                        id="orderCompletedBtn{{ $order->id }}" class="btn btn-submit">Order Completed</button>
                                                                    </div>
                                                                </div>
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




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateOrderStatus(userId, endpoint) {
            $.ajax({
                url: endpoint + userId,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    location.reload();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    
        $(document).ready(function() {
            $('[id^="orderServedBtn"]').on('click', function() {
                var userId = $(this).attr('id').replace('orderServedBtn', '');
                updateOrderStatus(userId, '/update-order-status-served/');
            });
    
            $('[id^="orderCompletedBtn"]').on('click', function() {
                var userId = $(this).attr('id').replace('orderCompletedBtn', '');
                updateOrderStatus(userId, '/update-order-status-completed/');
            });
        });
    </script>
    

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
