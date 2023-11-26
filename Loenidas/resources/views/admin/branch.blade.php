@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Branch List</h4>
                    <h6>Manage your Branch</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('branch.create') }}" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                            class="me-1">Add New Branch</a>
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
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>Branch Name </th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->branchName }}</td>
                                    <td>{{ $branch->location }}</td>
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
    </div>
@endsection
