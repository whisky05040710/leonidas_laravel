@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Expenses List</h4>
                    <h6>Manage your Expenses</h6>
                </div>
                <div class="page-btn">
                  <a href="{{ route('expenses.create') }}" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                          class="me-1">Add New Expenses</a>
              </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Month / Year</th>
                                    <th>Total Expenses</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                <a href="{{ route('expenses.create') }}">
                                @foreach($monthlyExpenses as $monthYear => $totalAmount)
                                <tr>
                                    <td>{{ $monthYear }}</a></td>
                                    <td>{{ number_format($totalAmount, 2) }}</td>
                                    <td><a class="me-3" href="{{ url('/expenses', [explode(' ', $monthYear)[1], explode(' ', $monthYear)[0]]) }}">    <img src="assets/img/icons/eye.svg" alt="img">  </td>
                                </tr>
                                @endforeach
                                </a>
                            </tbody>
                        </table>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>

@endsection
