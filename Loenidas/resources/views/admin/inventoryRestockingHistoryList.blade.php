@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Restocking History</h4>
                    <h6>Restocking History List on {{ $formattedDate }}</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }} "
                                        alt="img"></a>
                            </div>
                        </div>



                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Stock Name">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Unit">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Unit Cost">
                                    </div>
                                </div>

                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ asset('assets/img/icons/search-whites.svg') }}" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>Stock Name</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Unit Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($histories as $history)
                                <tr>
                                  <td>{{ $history->stockName }}</td>
                                  <td>{{ $history->quantity }}</td>
                                  <td>{{ $history->unit }}</td>
                                  <td>{{ $history->unitCost }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div style="text-align: right;">
                <a href="{{ route('inventory.inventoryRestockingHistory') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </div>




    @endsection