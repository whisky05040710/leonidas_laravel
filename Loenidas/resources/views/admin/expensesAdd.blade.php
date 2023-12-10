@extends('layouts.body')
@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Add New Expenses</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Expenses Name</label>
                                    <input type="text" name="expensesName">
                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="select form-control" name="month">
                                        <option hidden value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" name="year" min="1900" max="9999">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" name="amount">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <div class="image-upload image-upload-new">
                                        <input id="upload-input" type="file" name="image" accept=".jpg, .png, .jpeg">
                                        <div class="image-uploads">
                                            <img id="uploaded-image" src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a class="btn btn-cancel" href="{{ route('expenses.index') }}">Cancel</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
