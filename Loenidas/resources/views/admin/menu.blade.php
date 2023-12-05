@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu</h4>
                    <h6>Manage your Menu</h6>
                </div>
                <div class="page-btn">
                    <a class="btn btn-added" href="{{ route('menu.form') }}">
                        <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">Add Menu
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="assets/img/icons/filter.svg" alt="img">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                        alt="img"></a>
                            </div>
                        </div>

                    </div>
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Menu Name">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Category">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Price">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Available</option>
                                            <option>Unvailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                                alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Menu Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td class="productimgname" style="text-align: center; ">
                                            <div style="margin: 0 auto; display: inline-block;">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt="product">
                                            </a> {{ $menu->menuName }}
                                            </div>
                                        </td>
                                        <td>{{ $menu->menuCategory->name }}</td>
                                        <td>{{ $menu->price }}</td>
                                        <td>
                                            @if ($menu->menuStatus == 'Available')
                                                <span class="bg-lightgreen badges">{{ $menu->menuStatus }}</span>
                                            @elseif ($menu->menuStatus == 'Unavailable')
                                                <span class="bg-lightred badges">{{ $menu->menuStatus }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="me-3" href="{{ route('menu.details', $menu->id) }}">
                                                <img src="assets/img/icons/eye.svg" alt="img">
                                            </a>
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
