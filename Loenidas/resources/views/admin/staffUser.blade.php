@extends('layouts.body')
@section('content')
<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Staff Users List</h4>
          <h6>Manage your User</h6>
        </div>
        <div class="page-btn">
          <a href="{{ route('staffs.create') }}" class="btn btn-added" ><img src="assets/img/icons/plus.svg" alt="img" />Add User</a>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-top">
            <div class="search-set">
              <div class="search-path">
                <a class="btn btn-filter" id="filter_search">
                  <img src="assets/img/icons/filter.svg" alt="img" />
                  <span
                    ><img src="assets/img/icons/closes.svg" alt="img"
                  /></span>
                </a>
              </div>
              <div class="search-input">
                <a class="btn btn-searchset"
                  ><img src="assets/img/icons/search-white.svg" alt="img"
                /></a>
              </div>
            </div>
           
          </div>

          <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Name" />
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Email" />
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <select class="select">
                      <option>Role</option>
                      <option>Manager</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                  <div class="form-group">
                    <a class="btn btn-filters ms-auto"
                      ><img
                        src="assets/img/icons/search-whites.svg"
                        alt="img"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table datanew">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Password</th>
                  <th>Account Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($staffUsers as $staffUser)
                <tr>
                    <td>{{ $staffUser->firstname }}{{ $staffUser->lastname }}</td>
                    <td>{{ $staffUser->user->email }}</td>
                    <td>{{ $staffUser->role }}</td>
                    <td>{{ $staffUser->user->password }}</td>
                  <td><span class="bg-lightgreen badges">Active</span></td>
                  <td>
                    <a class="me-3" href="newuseredit.html">
                      <img src="assets/img/icons/edit.svg" alt="img" />
                    </a>
                    <a class="me-3 confirm-text" href="javascript:void(0);">
                      <img src="assets/img/icons/delete.svg" alt="img" />
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