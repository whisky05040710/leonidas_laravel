@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Tables</h4>
                    <h6>Manage your Tables</h6>
                </div>
                <div class="page-btn">
                    <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addtable"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">Add Table</a>
                </div>

                <div class="modal fade" id="addtable" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Table </h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('tables.store') }}" method="post">
                            @csrf
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label>Table Number</label>
                                  <input type="text" name="tableNum" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label>Capacity</label>
                                  <input type="text" name="capacity" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                </div>
                              </div>
                            </div>     
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-submit">Confirm</button>
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                      </div>
                    </div>
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
                                        <input type="text" placeholder="Enter Table Number">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Capacity">
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
                                    <th>Table Number</th>
                                    <th>Capacity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                    <tr>
                                    <td>{{ $table->tableNum }}</td>
                                        <td>{{ $table->capacity }}</td>
                                        <td>
                                            <a class="me-3" href="inventoryStocksEdit.html">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                              </a>
                                              <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
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
