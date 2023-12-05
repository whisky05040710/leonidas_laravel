@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Category List</h4>
                    <h6>Category List in Menu</h6>
                </div>
                <div class="page-btn d-flex justify-content-center">
                    <a data-bs-toggle="modal" data-bs-target="#menucategoryAdd" class="btn btn-added">
                        <img src="{{ asset('assets/img/icons/plus.svg') }}" class="me-2" alt="img"> Add New Category
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <section class="comp-section comp-cards">
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#menucategory-{{ $category->id }}">
                                <div class="card flex-fill bg-white">
                                    <div class="card-header d-flex align-items-center justify-content-center"
                                        style="border: 1px solid black; background-color:#4dcc4b; ">
                                        <h4 class="card-title mb-0">{{ $category->name }} - {{ $category->reference_count }}</h4>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-center"
                                        style="border: 1px solid black;" >
                                        <img class="image custom-image" src="{{ asset('storage/' . $category->image) }}" alt="img" />
                                    </div>
                                </div>
                            </div>
                    
                            <div class="modal fade" id="menucategory-{{ $category->id }}" tabindex="-1" aria-labelledby="menuTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #EDEDED; text-align: center;">
                                            <div class="d-flex align-items-center justify-content-center flex-column w-100">
                                                <h4 class="modal-title" id="menuTitle">{{ $category->name }}</h4>
                                                <input type="text" class="form-control align-self-center mt-2" id="editMenuTitle"
                                                    style="line-height: 50px; display: none; width: 150px; height: 50px; font-size: 1.4rem; margin-left:40px;">
                        
                                            </div>
                                            <br>
                                            <div class="mt-2 text-center">
                                                <button type="button" class="btn btn-secondary me-2" id="editButton" onclick="editMenuTitle()"
                                                    style="background-color: #4dcc4b;"><i class="fas fa-edit"></i></button>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteModal"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                        
                                        <div class="modal-body" style="background-color: #EDEDED;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group text-center">
                                                        <div class="modal-box-report">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Menu List</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($category->menus as $menu)
                                                                            <tr>
                                                                                <td>{{ $menu->menuName }}</td>
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
                                        </div>
                        
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </section>
                </div>
            </div>
        </div>

    {{-- <div class="modal fade" id="menucategory-{{ $category->id }}" tabindex="-1" aria-labelledby="menuTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #EDEDED; text-align: center;">
                    <div class="d-flex align-items-center justify-content-center flex-column w-100">
                        <h4 class="modal-title" id="menuTitle">{{ $category->name }}</h4>
                        <input type="text" class="form-control align-self-center mt-2" id="editMenuTitle"
                            style="line-height: 50px; display: none; width: 150px; height: 50px; font-size: 1.4rem; margin-left:40px;">

                    </div>
                    <br>
                    <div class="mt-2 text-center">
                        <button type="button" class="btn btn-secondary me-2" id="editButton" onclick="editMenuTitle()"
                            style="background-color: #4dcc4b;"><i class="fas fa-edit"></i></button>
                    </div>
                    <div class="mt-2 text-center">
                        <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="background-color: #EDEDED;">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-center">
                                <div class="modal-box-report">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Menu List</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($category->menus as $menu)
                                                    <tr>
                                                        <td>{{ $menu->menuName }}</td>
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
                </div>

            </div>
        </div>
    </div> --}}

    <script>
        // Function to toggle between Edit and Save modes
        function toggleEditMode() {
            var title = document.getElementById('menuTitle');
            var editTitle = document.getElementById('editMenuTitle');
            var editButton = document.getElementById('editButton');

            if (title.style.display !== 'none') {
                // Switch to Edit mode
                title.style.display = 'none';
                editTitle.style.display = 'block';
                editTitle.value = title.textContent.trim();
                editButton.innerHTML = '<i class="fas fa-save"></i> ';
            } else {
                // Switch to View mode
                title.style.display = 'block';
                editTitle.style.display = 'none';
                title.textContent = editTitle.value;
                editButton.innerHTML = '<i class="fas fa-edit"></i>';
            }
        }

        // Function to handle the Edit button click
        function editMenuTitle() {
            // Add your logic here for editing the menu title
            toggleEditMode();
        }
    </script>

    <!--Add-->
    <div class="modal fade" id="menucategoryAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #EDEDED;">
                    <h4 class="modal-title text-center">Menu Category Add</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #EDEDED;">
                    <form action="/menu/menuCategory" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-center">
                                <div class="modal-box-report">

                                    <input type="text" class="form-control" id="categoryInput"
                                        placeholder="Enter Category Name" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="categoryImage">Category Image</label>
                                <div class="image-upload image-upload-new">
                                    <input type="file" name="image" id="upload-input" class="form-control"
                                        accept=".jpg, .jpeg, .png">
                                    <div class="image-uploads">
                                        <img id="uploaded-image" src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2" >Add</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

    <Style>
        .modal-box-report {
            width: 100%;
            height: 100%;
            max-width: 450px;
            max-height: 450px;
            margin: 0 auto;
            border: 1px solid #000;
            border-radius: none;
            background-color: #ffffff;
            padding: 10px;
            margin-top: 20px;
        }
        .custom-image{
            width: 300px; 
            height: 200px; 
            object-fit: cover;
        }
    </Style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection