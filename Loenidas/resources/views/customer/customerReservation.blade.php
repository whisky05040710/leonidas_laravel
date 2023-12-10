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
                            <form method="post" action="{{ route('reservations.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-pancard-input" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" name="phoneNum" oninput="this.value = this.value.slice(0, 11)"/>
                                            @error('phoneNum')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> Date</label>
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="DD-MM-YYYY" id="date" name="date"
                                                    class="datetimepicker">
                                                <div class="addonset">
                                                    <img src="assets/img/icons/calendars.svg" alt="img">
                                                </div>
                                            </div>
                                            @error('date')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-cstno-input" class="form-label">People</label>
                                            <input type="number" class="form-control" name="people" id="people" oninput="this.value = this.value.slice(0, 2)"/>
                                            @error('people')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-servicetax-input" class="form-label">Time (7:00 AM - 9:00 PM )</label>
                                            <input type="time" class="form-control" name="time" id="time" />
                                            @error('time')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                </div>
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div style="text-align: right;">
                                    <button type="submit" class="btn btn-submit">Submit Reservation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>function restrictTimeRange(input) {
        // Get the selected time value
        let selectedTime = input.value;
        
        // Convert the selected time into a Date object
        let selectedDate = new Date('2000-01-01T' + selectedTime + ':00');

        // Set minimum and maximum allowed times (7:00 AM and 9:00 PM)
        let minTime = new Date('2000-01-01T07:00:00');
        let maxTime = new Date('2000-01-01T21:00:00');

        // Check if the selected time is within the allowed range
        if (selectedDate < minTime || selectedDate > maxTime) {
            // Reset the input value to the minimum time (7:00 AM) if it's outside the range
            input.value = '07:00';
        }
    }</script>
@endsection