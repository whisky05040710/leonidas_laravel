@extends('layouts.body')
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Restocking History</h4>
          <h6>Restocking History List in Inventory</h6>
        </div>
      </div>

      <div class="card">
        <div class="card-body">



          <div class="fc-toolbar fc-header-toolbar">
            <div class="fc-left">
              <div class="fc-button-group">
                <button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span
                    class="fc-icon fc-icon-left-single-arrow"></span></button>
                <button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span
                    class="fc-icon fc-icon-right-single-arrow"></span></button>
              </div><button type="button"
                class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled"
                disabled="">today</button>
            </div>
            <div class="fc-right">
              <div class="fc-button-group">


                <button type="button" class="fc-calendar-button fc-button fc-state-default"
                  style="background-color: rgb(201, 226, 204 219)">
                  <span class="fa fa-calendar"></span>
                </button>

              </div>
            </div>
            <div class="fc-center" style="margin-right:10%;">
              <h2>September 2023</h2>
            </div>
            <div class="fc-clear"></div>
          </div>
          <br>


          <div class="table-responsive">
            <table class="table ">
              <thead>
                <tr>

                  <th>Date</th>

                </tr>
              </thead>
              <tbody>
                <tr onclick="window.location='inventoryrestockingHistoryList.html';">
                  <td>June 12, 2023</td>
                </tr>
                <tr onclick="window.location='inventoryrestockingHistoryList.html';">
                  <td>June 11, 2023</td>
                </tr>
                <tr onclick="window.location='inventoryrestockingHistoryList.html';">
                  <td>June 10, 2023</td>
                </tr>
                <tr onclick="window.location='inventoryrestockingHistoryList.html';">
                  <td>June 9, 2023</td>
                </tr>
                <tr onclick="window.location='inventoryrestockingHistoryList.html';">
                  <td>June 8, 2023</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Function to show mini calendar on button click
      flatpickr(".fc-calendar-button", {
        onChange: function(selectedDates, dateStr, instance) {
          // Handle date selection if needed
        },
        onClose: function(selectedDates, dateStr, instance) {
          // Handle date selection if needed
        }
      });
    });
  </script>
@endsection
