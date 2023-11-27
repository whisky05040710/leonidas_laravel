@extends('layouts.body')
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Inventory Status</h4>
          <h6>Current Stocks in the Inventory (<a class="card-title"><span id="current-date"></span></a>)</h6>
        </div>
        <div class="page-btn">
          <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addrecipe"><img
              src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">Add Inventory</a>
        </div>
      </div>

      <div class="modal fade" id="addrecipe" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Inventory </h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('inventory.store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Stock Name<span class="manitory">*</span></label>
                      <input type="text" name="stockName">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="category">Category<span class="manitory">*</span></label>
                      <select name="category" id="category" class="form-control select">
                        <option value="">Select</option>
                        <option value="Meat">Meat</option>
                        <option value="Fish">Fish</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Quantity<span class="manitory">*</span></label>
                      <input type="text" name="quantity" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="unit">Unit<span class="manitory">*</span></label>
                      <select name="unit" id="unit" class="form-control select">
                        <option value="">Select</option>
                        <option value="Kilogram">Kilogram</option>
                        <option value="Gram">Gram</option>
                        <option value="Pieces">Pieces</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Unit Cost<span class="manitory">*</span></label>
                      <input type="text" name="unitCost" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Reorder Point<span class="manitory">*</span></label>
                      <input type="text" name="reorderPoint"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-submit">Confirm</button>
              <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
          </div>
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

            <div class="col-lg-2 col-sm-6 col-12">
              <div class="form-group">
                <h6 id="current-date"> </h6>
              </div>
            </div>

            <script>
              const currentDate = new Date();

              const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
              ];

              const month = monthNames[currentDate.getMonth()];
              const day = currentDate.getDate();
              const year = currentDate.getFullYear();

              const formattedDate = `${month} ${day}, ${year}`;

              document.getElementById('current-date').textContent = formattedDate;
            </script>

          </div>

          <div class="card" id="filter_inputs">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Stock Name">
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <select class="select">
                      <option>Select Category</option>
                      <option>Meats</option>
                      <option>Condements</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Quantity">
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Unit Cost">
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Reorder Point">
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
                @foreach ($inventories as $inventory)
                  <tr>
                    <td>{{ $inventory->stockName }}</td>
                    <td>{{ $inventory->category }}</td>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ $inventory->unit }}</td>
                    <td>{{ $inventory->unitCost }}</td>
                    <td>{{ $inventory->reorderPoint }}</td>
                    <td>
                      <a class="me-3" href="inventoryStockDetails.html">
                        <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                      </a>
                      <a class="me-3" href="inventoryStocksEdit.html">
                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                      </a>
                      <a class="me-3 confirm-text" href="javascript:void(0);">
                        <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                      </a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
