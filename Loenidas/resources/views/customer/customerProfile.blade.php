@extends('layouts.customerBody')
@section('content')
    <div class="page-wrapper ms-0">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Account Info</h4>
                    <h6>Update you account info here</h6>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="profile-set">
                        <div class="profile-head">
                        </div>
                        <div class="profile-top">
                            <div class="profile-content">
                                <div class="profile-contentimg">
                                    <img src="assets/img/customer/customer5.jpg" alt="img" id="blah">
                                    <div class="profileupload">
                                        <input type="file" id="imgInp">
                                        <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg"
                                                alt="img"></a>
                                    </div>
                                </div>
                                <div class="profile-contentname">
                                    <h2>Francis Joe Pilarmeo</h2>
                                    <h4>Updates Your Photo and Personal Details.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <form method="POST" action="{{ route('customerProfile') }}">
                        @csrf --}}
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    {{-- <input type="text" name="firstname" value="{{ $user->firstname }}" /> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    {{-- <input type="text" name="lastname" value="{{ $user->lastname }}" /> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    {{-- <input type="text" name="email" value="{{ $user->email }}" /> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="pass-input" />
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit me-2">Update</button>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
