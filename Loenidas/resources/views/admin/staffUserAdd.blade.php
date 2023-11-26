@extends('layouts.body')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Staff User</h4>
                <h6>Add User</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        @include('vendor.sweetalert.alert')
                        <form method="POST" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control">
                                @error('firstname')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option hidden value="">Select</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Chef">Chef</option>
                                    <option value="Cashier">Cashier</option>
                                    <option value="Waiter">Waiter</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" id="password"
                                        class="form-control pass-input">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control">
                            @error('lastname')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Profile Picture</label>
                            <div class="image-upload image-upload-new">
                                <input type="file" name="profile" accept=".jpg, .jpeg, .png">
                                <div class="image-uploads">
                                    <img src="assets/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                        @error('profile')
                        <div class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    </div>

                    <input type="hidden" name="accountStatus" value="active">

                    <div class="col-lg-3 col-sm-6 col-12">

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection