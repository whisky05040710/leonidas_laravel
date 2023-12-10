@extends('layouts.body')
@section('content')

<div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Daily Sales</h4>
          <h6>September 22, 2023</h6>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="table-top"></div>
          <div class="table-responsive">
            <table class="table table-nowrap mb-0">
              <thead id="eligible" bgcolor="#0bb31e">
                {{-- FOREACH NG MENU CAT --}}
                <td colspan="4">
                  <center>
                    <h5>Burgers</h5>
                  </center>
                </td>
                {{-- ENd FOREACH NG MENU CAT --}}
              </thead>
              <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Sales</th>
              </tr>
              <tbody>
                <tr >
                  {{-- for each ng menu --}}
                  <td>Double Patty</td>
                  <td>5</td>
                  <td>P250.00</td>
                  <td>P1,250.00</td>
                </tr>
                {{-- end foreach ng menu --}}
                <tr >
                  <td>Aloha Burger</td>
                  <td>3</td>
                  <td>P300.00</td>
                  <td>P900.00</td>
                </tr>
              </tbody>
            </table>
          </div>
          <br />
          <div class="table-responsive">
            <table class="table table-nowrap mb-0">
              <thead id="eligible" bgcolor="#0bb31e">
                <td colspan="4">
                  <center>
                    <h5>Coffee</h5>
                  </center>
                </td>
              </thead>
              <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Sales</th>
              </tr>
              <tbody>
                <tr>
                  <td>French Press</td>
                  <td>8</td>
                  <td>P150.00</td>
                  <td>P1,200.00</td>
                </tr>

                <tr>
                  <td>Cafe Latte</td>
                  <td>5</td>
                  <td>P200.00</td>
                  <td>P1,000.00</td>
                </tr>
              </tbody>
            </table>
            <br />
          </div>
          <br />
          <div class="table-responsive">
            <table class="table table-nowrap mb-0">
              <thead id="eligible" bgcolor="#0bb31e">
                <td colspan="1">
                  <center>
                    <h5>Total Sales</h5>
                  </center>
                </td>
              </thead>
              <tr>
                <th>Total Sales</th>
                <tbody>
                  <tr>
                    <td>P4,450.00</td>
                  </tr>
                </tbody>
              </tr>
            </table>

            <br />
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    .button1 {
      align-items: center;
    }
    h5 {
      font-weight: bold;
    }
    th {
      font-size: medium;
    }
    td {
      font-size: medium;
    }

    .card {
      text-align: center;
    }

    #eligible {
      background-color: #b8b8b8;
    }
  </style>

  @endsection