@extends('layouts.customerBody')
@section('content')

<div class="page-wrapper ms-0">
    <div class="content col-md-8 mx-auto">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Reservation</h4>
            </div>

            <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="basicpill-pancard-input" class="form-label" >Phone Number</label>
                              <input type="number" class="form-control" />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label> Date</label>
                              <div class="input-groupicon">
                              <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
                              <div class="addonset">
                              <img src="assets/img/icons/calendars.svg" alt="img">
                              </div>
                              </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="basicpill-cstno-input" class="form-label" >People</label>
                              <input type="number" class="form-control" />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="basicpill-servicetax-input" class="form-label">Time</label>
                              <input type="time" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div style="text-align: right;">
                          <button href="javascript:void(0);" class="btn btn-submit" >Submit Reservation</button>
                          </div>
                      </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection