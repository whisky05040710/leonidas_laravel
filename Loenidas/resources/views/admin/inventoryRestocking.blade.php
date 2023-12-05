@extends('layouts.body')
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Inventory Restocking Cart</h4>
          <h6>Restock you Inventory here</h6>
        </div>
        <div class="page-btn">
          <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addInventory"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">Add Inventory</a>
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
            {{-- <form id="restockForm" action="{{ route('restock.inventory') }}" method="POST">
              @csrf --}}
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
                @foreach ($restocks as $restock)
                <tr>

                    <td>{{ $restock->stockName }}</td>
                    <td>{{ $restock->inventoryCategory->name }}</td>
                    <td>{{ $restock->quantity }}</td>
                    <td>{{ $restock->unit }}</td>
                    <td>{{ $restock->unitCost }}</td>
                    <td>{{ $restock->reorderPoint }}</td>
                    <td>

                        <a class="me-3" href="inventoryRestockCartEdit.html">
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
      <div style="text-align: right;">
        <button type="submit" id="restockButton" class="btn btn-submit" >Restock</button>
      </div>
    {{-- </form> --}}
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        // Handle click event on the "Restock" button
        $('#restockButton').click(function() {
            // Iterate through each table row
            $('table tbody tr').each(function() {
                // Extract relevant data from the current row
                var stockName = $(this).find('td:eq(0)').text();
                var quantity = $(this).find('td:eq(2)').text();

                // Make an AJAX request to update the inventory
                $.ajax({
                    url: '/updateInventory',  // Replace with the actual endpoint to handle the update
                    method: 'POST',
                    headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                    data: {
                        stockName: stockName,
                        quantity: quantity
                    },
                    success: function(response) {
                        // Handle the success response if needed
                        console.log(response);
                    },
                    error: function(error) {
                        // Handle the error if needed
                        console.error(error);
                    }
                });
            });
        });
    });
</script>

  <div class="modal fade" id="addInventory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Inventory </h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('restock_store') }}" method="post">
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
                  <select name="inventory_category_id" id="category" class="form-control select" required>
                    <option value="" selected disabled>Select</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
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
                  <input type="text" name="reorderPoint" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
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
