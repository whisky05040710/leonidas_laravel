@extends('layouts.body')
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Inventory Restocking Cart</h4>
          <h6>Restock you Inventory here</h6>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-top">
            <div class="search-set">
              <div class="search-path">
                <a class="btn btn-filter" id="filter_search">
                  <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img">
                  <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                </a>
              </div>
              <div class="search-input">
                <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                    alt="img"></a>
              </div>
            </div>

            <div class="wordset">
              <ul>
                <li>
                  <a data-bs-toggle="modal" data-bs-placement="top" title="Recommendation"
                    data-bs-target="#Recommendation"><img src="{{ asset('assets/img/icons/excel.svg') }}"
                      alt="img"></a>
                </li>
                <li>
                  <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                      src="{{ asset('assets/img/icons/printer.svg') }}" alt="img"></a>
                </li>
              </ul>
            </div>

          </div>

          <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter User Name">
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Phone">
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Email">
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <select class="select">
                      <option>Disable</option>
                      <option>Enable</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                  <div class="form-group">
                    <a class="btn btn-filters ms-auto"><img src="{{ asset('assets/img/icons/search-whites.svg') }}"
                        alt="img"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table  datanew">
              <thead>
                <tr>

                  <th>Stock Name</th>
                  <th>Category</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Unit Cost</th>
                  <th>Reorder Point</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <td>Chicken</td>
                  <td>Meats</td>
                  <td>5</td>
                  <td>kilogram(kg)</td>
                  <td>170.00</td>
                  <td>1</td>
                  <td>

                    <a class="me-3" href="inventoryRestockCartEdit.html">
                      <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                    </a>
                    <a class="me-3 confirm-text" href="javascript:void(0);">
                      <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                    </a>
                  </td>
                </tr>
                <td>Pork</td>
                <td>Meats</td>
                <td>7</td>
                <td>kilogram(kg)</td>
                <td>270.00</td>
                <td>1</td>
                <td>

                  <a class="me-3" href="inventoryRestockCartEdit.html">
                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                  </a>
                  <a class="me-3 confirm-text" href="javascript:void(0);">
                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                  </a>
                </td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>
      </div>
      <div style="text-align: right;">
        <a href="javascript:void(0);" class="btn btn-submit">Restock</a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Recommendation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Restock Recommendation</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="tab-content">
            <div class="table-top">
              <div class="search-set">
                <div class="search-input">
                  <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                      alt="img" /></a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table datanew">
                <thead>
                  <tr>
                    <th>Stock Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Unit Cost</th>
                    <th>Reoder Point</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Chicken</td>
                    <td>Meats</td>
                    <td>12</td>
                    <td>kilogram(kg)</td>
                    <td>170.00</td>
                    <td>1</td>
                    <td>
                      <button type="button" class="btn btn-success btn-sm">Restock Cart</button>
                    </td>
                  </tr>
                  <tr>
                    <td>Chicken</td>
                    <td>Meats</td>
                    <td>12</td>
                    <td>kilogram(kg)</td>
                    <td>170.00</td>
                    <td>1</td>
                    <td>
                      <button type="button" class="btn btn-success btn-sm">Restock Cart</button>
                    </td>
                  </tr>
                  <tr>
                    <td>Chicken</td>
                    <td>Meats</td>
                    <td>12</td>
                    <td>kilogram(kg)</td>
                    <td>170.00</td>
                    <td>1</td>
                    <td>
                      <button type="button" class="btn btn-success btn-sm">Restock Cart</button>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
