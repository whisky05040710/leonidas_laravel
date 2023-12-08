@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Restocking History</h4>
                    <h6>Overview of Recent Restocking Activity</h6>
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
                      <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}" alt="img"></a>
                    </div>
                  </div>
                </div>
        
                <div class="card" id="filter_inputs">
                  <div class="card-body pb-0">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                        </div>
                    </div>
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                          <input type="text" placeholder="Enter Total Restock Items">
                        </div>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                          <input type="text" placeholder="Enter Total Restock Cost">
                        </div>
                      </div>
                      <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                        <div class="form-group">
                          <a class="btn btn-filters ms-auto"><img src="{{ asset('assets/img/icons/search-whites.svg') }}" alt="img"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="table-responsive">
                  <table class="table  datanew">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Total Restock Items</th>
                        <th>Total Restock Cost</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($histories as $history)
                      <tr>
                        <td>{{ \Carbon\Carbon::parse($history->restock_date)->format('F d, Y') }}</td>
                        <td>{{ $history->total_restocks }}</td>
                        <td>{{ number_format($history->total_restock_cost, 2) }}</td>
                        <td>
                          <form method="GET" action="{{ route('inventory.inventoryRestockingHistoryList') }}">
                            @csrf
                            <input type="hidden" name="date" value="{{ $history->restock_date }}">
                            <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                            </button>
                        </form>
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

@endsection
