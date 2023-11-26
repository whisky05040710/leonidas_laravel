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
                                    <select name="menu_categories_id" id="menuCategory" class="select form-control">
                                        <option hidden value="">Select Category</option>
                                            @foreach ($menuCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->menuCategoryName }}</option>
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

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menuImage">Menu Image</label>
                                    <div class="image-upload image-upload-new">
                                        <input type="file" name="image" id="menuImage" class="form-control" accept=".jpg, .jpeg, .png">
                                        <div class="image-uploads">
                                            <img src="assets/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    @error('image')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a class="btn btn-cancel" onclick="goBack()">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
