@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Add</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="menuName">Menu Name</label>
                                <input type="text" name="menuName" id="menuName" class="form-control">
                                @error('menuName')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label for="menuCategory">Category</label>
                                <select name="menu_category_id" id="menuCategory" class="select form-control">
                                    <option hidden value="">Select Category</option>
                                    @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('menu_categories_id')
                                    <div class="invalid-feedback d-block">
                                        <strong>The menu category field is required.</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-2 col-12">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" step="0.01">
                                @error('price')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="form-group">
                                <label for="menuStatus">Status</label>
                                <select name="menuStatus" id="menuStatus" class="select form-control">
                                    <option hidden value="">Select Status</option>
                                    <option value="Available">Available</option>
                                    <option value="Unavailable">Unavailable</option>
                                </select>
                                @error('menuStatus')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="page-header">
                                        <div class="page-title">
                                            <h5 class="card-title">RECIPE :</h5>

                                        </div>
                                        <div class="page-btn">
                                            <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addrecipe"><img
                                                    src="{{ asset('assets/img/icons/plus.svg') }}" alt="img"></a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Menu Items</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Noodles</td>
                                                        <td>100</td>
                                                        <td>Gram(g)</td>
                                                        <td>


                                                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                                                <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                                    alt="img">
                                                            </a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="menuImage">Menu Image</label>
                                <div class="image-upload image-upload-new">
                                    <input type="file" name="image" id="upload-input" class="form-control"
                                        accept=".jpg, .jpeg, .png">
                                    <div class="image-uploads">
                                        <img id="uploaded-image" src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                                @error('image')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a class="btn btn-cancel" action="{{ route('menu.index') }}">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addrecipe" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Recipe </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Menu Item<span class="manitory">*</span></label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unit<span class="manitory">*</span></label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-0">



                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Confirm</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
