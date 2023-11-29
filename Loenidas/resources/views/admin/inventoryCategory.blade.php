@extends('layouts.body')
@section('content')
<div class="page-wrapper">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
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
          @foreach ($categories as $category)
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex" data-bs-toggle="modal" data-bs-target="#inventorycategory-{{ $category->id }}">
              <div class="card flex-fill bg-white">
                <div class="card-header d-flex align-items-center justify-content-center" style="border: 1px solid black; background-color:#4dcc4b; ">
                  <h4 class="card-title mb-0">{{ $category->name }}</h4>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" style="border: 1px solid black;">
                  <h1 class="card-text mb-0">{{ $category->reference_count }}</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="inventorycategory-{{ $category->id }}" tabindex="-1" aria-labelledby="menuTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #EDEDED; text-align: center;">
                  <div class="d-flex align-items-center justify-content-center flex-column w-100">
                    <h4 class="modal-title" id="menuTitle">{{ $category->name }}</h4>
                    <input type="text" class="form-control align-self-center mt-2" id="editMenuTitle" style="line-height: 50px; display: none; width: 150px; height: 50px; font-size: 1.4rem; margin-left:40px;">
                  </div>
                  <br>
                  <div class="mt-2 text-center">
                    <button type="button" class="btn btn-secondary me-2" id="editButton" onclick="editMenuTitle()" style="background-color: #4dcc4b;"><i class="fas fa-edit"></i></button>
                  </div>
                  <div class="mt-2 text-center">
                    <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#DeleteModal"><i class="fas fa-trash-alt"></i></button>
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
                          <ol style="list-style-type: decimal; text-align: left; font-size: 16px;">
                            @foreach ($category->inventories as $inventory)
                            <li>{{ $inventory->stockName }}</li>
                            @endforeach
                          </ol>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
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
          <form action="/inventory/inventoryCategory" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group text-center">
                  <div class="modal-box-report">
                    <input type="text" class="form-control" id="categoryInput" name="name" placeholder="Enter Category Name" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-primary me-2">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="inventorycategory" tabindex="-1" aria-labelledby="menuTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #EDEDED; text-align: center;">
          <div class="d-flex align-items-center justify-content-center flex-column w-100">
            <h4 class="modal-title" id="menuTitle">Meat</h4>
            <input type="text" class="form-control align-self-center mt-2" id="editMenuTitle" style="line-height: 50px; display: none; width: 150px; height: 50px; font-size: 1.4rem; margin-left:40px;">

          </div>
          <br>
          <div class="mt-2 text-center">
            <button type="button" class="btn btn-secondary me-2" id="editButton" onclick="editMenuTitle()" style="background-color: #4dcc4b;"><i class="fas fa-edit"></i></button>
          </div>
          <div class="mt-2 text-center">
            <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#DeleteModal"><i class="fas fa-trash-alt"></i></button>
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
                  <ol style="list-style-type: decimal; text-align: left; font-size: 16px;">
                    <li>Chicken</li>
                    <li>Beef</li>
                    <li>Pork</li>
                    <li>Lamb</li>
                    <li>Turkey</li>

                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection