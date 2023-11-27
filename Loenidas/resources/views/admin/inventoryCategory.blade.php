@extends('layouts.body')
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Inventory Category List</h4>
          <h6>Inventory Category List in Menu</h6>

        </div>
        <div class="page-btn d-flex justify-content-center">
          <a data-bs-toggle="modal" data-bs-target="#inventorycategoryAdd" class="btn btn-added">
            <img src="{{ asset('assets/img/icons/plus.svg') }}" class="me-2" alt="img"> Add New Category
          </a>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <section class="comp-section comp-cards">
            <div class="row">



              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory">
                <div class="card flex-fill bg-white">
                  <div class="card-header d-flex align-items-center justify-content-center"
                    style="border: 1px solid black; background-color:#4dcc4b; ">
                    <h4 class="card-title mb-0">Meat</h4>
                  </div>
                  <div class="card-body d-flex align-items-center justify-content-center"
                    style="border: 1px solid black;">
                    <h1 class="card-text mb-0">15</h1>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="modal fade" id="inventorycategoryAdd" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #EDEDED;">
            <h4 class="modal-title text-center">Inventory Category Add</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="background-color: #EDEDED;">
            <div class="row">
              <div class="col-12">
                <div class="form-group text-center">
                  <div class="modal-box-report">

                    <input type="text" class="form-control" id="categoryInput" placeholder="Enter Category Name">
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-primary me-2">Add</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
