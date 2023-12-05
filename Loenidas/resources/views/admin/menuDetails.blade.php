@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Details</h4>
                    <h6>Full details of a menu</h6>
                </div>
            </div>
<style>
    .image{
        height: 300px;
    }
</style>
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="slider-product-details">
                                <div class="owl-carousel owl-theme product-slide">
                                    <div class="slider-product">
                                        <img class="image" src="{{ asset('storage/' . $menu->image) }}" alt="img"/>
                                        <h3>{{ $menu->menuName }}</h3>
                                        <br/>
                                        <p>Menu Name: {{ $menu->menuName }}</p>
                                        <p>Category: {{ $menu->menuCategory->name }}</p>
                                        <p>Price: {{ $menu->price }}</p>
                                        <p>Status: {{ $menu->menuStatus }}</p>
                                        <br />
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <b>
                                <h4>Recipe</h4>
                            </b>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Noodle</td>
                                            <td>100</td>
                                            <td>Grams(g)</td>
                                        </tr>
                                        <tr>
                                            <td>Beef</td>
                                            <td>0.8</td>
                                            <td>Kilogram</td>
                                        </tr>
                                        <tr>
                                            <td>Egg</td>
                                            <td>1</td>
                                            <td>Pieces(pcs)</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="MenuEdit.html" class="btn btn-submit me-2">Edit</a>
                        <a href="javascript:void(0);" class="btn btn-clear me-2">Delete</a>
                        <a class="btn btn-cancel me-2" onclick="goBack()">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
