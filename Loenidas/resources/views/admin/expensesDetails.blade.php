@extends('layouts.body')
@section('content')

    <div class="page-wrapper">
      <div class="content">
        <div class="page-header">
          <div class="page-title">
            <h4>Expenses Details List</h4>
            <h6>Expenses for December 2023</h6>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="table-top">
              <div class="search-set">
                <div class="search-path">
                  <a class="btn btn-filter" id="filter_search">
                    <img src="assets/img/icons/filter.svg" alt="img" />
                    <span
                      ><img src="assets/img/icons/closes.svg" alt="img"
                    /></span>
                  </a>
                </div>
                <div class="search-input">
                  <a class="btn btn-searchset"
                    ><img src="assets/img/icons/search-white.svg" alt="img"
                  /></a>
                </div>
              </div>

              <div class="col-lg-2 col-sm-6 col-12">
                <div class="form-group"></div>
              </div>

            </div>

            <div class="card" id="filter_inputs">
              <div class="card-body pb-0">
                <div class="row">
                  <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                      <input type="text" placeholder="Enter Expenses Name" />
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                      <input type="text" placeholder="Enter Amount" />
                    </div>
                  </div>
                  <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                    <div class="form-group">
                      <a class="btn btn-filters ms-auto"
                        ><img
                          src="assets/img/icons/search-whites.svg"
                          alt="img"
                      /></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table datanew">
                <thead>
                  <tr>
                    <th>Expenses Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($expensesDetails as $expenses)
                  <tr>
                    <td>{{ $expenses->expensesName }}</td>
                    <td>{{ $expenses->amount }}</td>
                    <td>
                      <a class="me-3" data-bs-toggle="modal" data-bs-target="#viewImage">
                        <img src="assets/img/icons/eye.svg" alt="img" />
                      </a>
                      <a class="me-3" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editExpenses">
                        <img src="assets/img/icons/edit.svg" alt="img" />
                      </a>
                      <a class="confirm-text" href="javascript:void(0);">
                        <img src="assets/img/icons/delete.svg" alt="img">
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

    <div class="modal fade" id="viewImage" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">View Image</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <img src="assets/img/img-02.jpg" alt="Image">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editExpenses" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Expenses</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Expenses Name</label>
                  <input type="text" />
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Amount</label>
                  <input type="text" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label> Profile Picture</label>
                  <div class="image-upload image-upload-new">
                  <input type="file">
                  <div class="image-uploads">
                  <img src="assets/img/icons/upload.svg" alt="img">
                  <h4>Drag and drop a file to upload</h4>
                  </div>
                  </div>
                  </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-submit">Confirm</button>
            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

@endsection