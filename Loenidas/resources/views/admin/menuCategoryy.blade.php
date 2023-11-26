@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Category</h4>
                    <h6>Manage your Menu Category</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('menuCategory.create') }}" class="btn btn-added">
                        <img src="assets/img/icons/plus.svg" class="me-2" alt="img"> Add New Category
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($menuCategories as $category)
                    <div class="form-group col-lg-4">
                            <a href="{{ route('menuCategory.show', $category->id) }}">
                                <div class="category-box">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->menuCategoryName }}">
                                    <p class="category-text">{{ $category->menuCategoryName }}</p>
                                    <div class="category-circle"></div>
                                </div>
                            </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <style>

        .category-box {
            width: 23.5%;
            height: 150px;
            max-width: 800px;
            min-width: 300px;
            margin-left: 80px;
            margin-top: 40px;
            display: inline-block;
            border: 2px solid #000;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #4dcc4b;
        }

        .category-box img {
            width: 30%;
            height: 50%;
            top: 17%;
            left: 58%;
            display: inline-block;
            position: relative;
        }

        .category-text {
            display: inline-block;
            position: relative;
            top: 51%;
            left: -1%;
            transform: translate(-50%, -50%);
            font-size: 25px;
        }

        .category-circle {
            display: inline-block;
            position: relative;
            width: 70px;
            height: 70px;
            background-color: #ffffff;
            border-radius: 50%;
            top: 15%;
            margin-left: -40%;
            overflow: hidden;
            border: 2px solid #000;
        }
    </style>
@endsection
