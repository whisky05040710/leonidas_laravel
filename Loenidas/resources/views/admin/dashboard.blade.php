@extends('layouts.body')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash1.svg" alt="img" /></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5><span class="counters" data-count="345">345</span></h5>
                            <h6>Total Orders</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash1">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash2.svg" alt="img" /></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5><span class="counters" data-count="54">54</span></h5>
                            <h6>Total Reservation</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash4.svg" alt="img" /></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>
                                P
                                <span class="counters" data-count="52143.00">52,143.00</span>
                            </h5>
                            <h6>Total Expenses</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash3">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash3.svg" alt="img" /></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>
                                P
                                <span class="counters" data-count="148143.00">148,143.00</span>
                            </h5>
                            <h6>Total Sales</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">Sales</div>
                            <div class="dropdown">
                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Monthly <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <div class="card-body">
                            <div>
                                <canvas id="chartBar1" class="h-300" style="height: 350px;"></canvas>
                            </div>

                            <script>
                                $(function() {
                                    "use strict";
                                    var ctx1 = document.getElementById("chartBar1").getContext("2d");
                                    new Chart(ctx1, {
                                        type: "bar",
                                        data: {
                                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                                            datasets: [{
                                                label: "Sales",
                                                data: [24, 10, 32, 24, 26, 20],
                                                backgroundColor: "#664dc9",
                                            }],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            responsive: true,
                                            legend: {
                                                display: false,
                                                labels: {
                                                    display: false
                                                }
                                            },
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                        fontSize: 10,
                                                        max: 80
                                                    }
                                                }],
                                                xAxes: [{
                                                    barPercentage: 0.6,
                                                    ticks: {
                                                        beginAtZero: true,
                                                        fontSize: 11
                                                    }
                                                }],
                                            },
                                        },
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>



                <div class="col-lg-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Top 5 Popular Menu</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dataview">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Ordered</th>
                                            <th>Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="productimgname">
                                                <a href="productlist.html" class="product-img">
                                                    <img src="assets/img/product/meals-chicken-adobo.jpg" alt="product">
                                                </a>
                                                <a href="productlist.html">Chicken Adobo</a>
                                            </td>
                                            <td>7</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="productimgname">
                                                <a href="productlist.html" class="product-img">
                                                    <img src="assets/img/product/halo-halo.jpg" alt="product">
                                                </a>
                                                <a href="productlist.html">Halo-Halo</a>
                                            </td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td class="productimgname">
                                                <a href="productlist.html" class="product-img">
                                                    <img src="assets/img/product/meals-beef-sinigang.jpg" alt="product">
                                                </a>
                                                <a href="productlist.html">Bulalo</a>
                                            </td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td class="productimgname">
                                                <a href="productlist.html" class="product-img">
                                                    <img src="assets/img/product/chaolong-beef-1.jpg" alt="product">
                                                </a>
                                                <a href="productlist.html">Chaolong</a>
                                            </td>
                                            <td>2</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">Expenses</div>
                            <div class="dropdown">
                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Monthly <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="chartBar2" class="h-300" style="height: 350px;"></canvas>
                            </div>

                            <script>
                                $(function() {
                                    "use strict";
                                    var ctx2 = document.getElementById("chartBar2").getContext("2d");
                                    new Chart(ctx2, {
                                        type: "bar",
                                        data: {
                                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                                            datasets: [{
                                                label: "Sales",
                                                data: [14, 12, 34, 25, 24, 20],
                                                backgroundColor: "#44c4fa",
                                            }, ],
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            responsive: true,
                                            legend: {
                                                display: false,
                                                labels: {
                                                    display: false
                                                }
                                            },
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                        fontSize: 10,
                                                        max: 80
                                                    }
                                                }],
                                                xAxes: [{
                                                    barPercentage: 0.6,
                                                    ticks: {
                                                        beginAtZero: true,
                                                        fontSize: 11
                                                    }
                                                }, ],
                                            },
                                        },
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>



                <div class="col-lg-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">User Account Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dataview">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Account Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Johnmark Ben</td>
                                            <td>Cashier</td>
                                            <td>Active</td>
                                        </tr>
                                        <tr>
                                            <td>Joe Pilar</td>
                                            <td>Manager</td>
                                            <td>Locked</td>
                                        </tr>
                                        <tr>
                                            <td>Randel Vitero</td>
                                            <td>Marketing</td>
                                            <td>Active</td>
                                        </tr>
                                        <tr>
                                            <td>Liza May Aton</td>
                                            <td>Chef</td>
                                            <td>Locked</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>

@endsection
