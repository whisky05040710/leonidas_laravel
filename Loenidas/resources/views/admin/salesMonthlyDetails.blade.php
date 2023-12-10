@extends('layouts.body')
@section('content')

<div class="page-wrapper">
    <div class="content">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
        <div class="page-title">
          <h4>Income Statement</h4>
          <h6>September 2023 Income Statement</h6>
        </div>
        </div>
    </div>
    </div>
    
    <div class="card">
    <div class="card-body">
  <div class="table-responsive">
    <table class="table table-nowrap mb-0">
    
  <thead id="eligible1" bgcolor="#0bb31e">
  <td colspan="">
  <h4></h4> </td>
  <td colspan="">
  <h4></h4> </td>
  <td colspan="">
  <h4>Amount</h4> </td>
  </thead>
  
  <tr id="eligible" bgcolor="#0bb31e">
  <td colspan="1">
  <h5 class="text-color">REVENUE</h5>
  <td colspan="">
  <h5></h5>
  <td colspan="">
  <h5></h5>
  </td>
  </td>
  </td>
  </tr>
        
  
  <tbody>
    <tr>
  <td><p>Total Sales</p></td>
  <td></td>
  <td>P45,000.00</td>
  </tr>
  
  
  
  
  <tr id="eligible" bgcolor="#0bb31e">
  <td colspan="1">
  <h5 class="text-color">OPERATING EXPENSES</h5>
  <td colspan="">
  <h5></h5  >
  <td colspan="">
  <h5></h5>
  </td>
  </td>
  </td>
  </tr>
  
  <tr>
    <td><p>Cost of Restocking</p></td>
    <td></td>
    <td>P8,700.00</td>
    </tr>
  
  <tr>
  <td><p>Electricity</p></td>
  <td></td>
  <td>P6,700.00</td>
  </tr>
  
  <tr>
  <td><p>Water</p></td>
  <td></td>
  <td>P1,700.00</td>
  </tr>
  
  <tr>
  <td><p>Internet</p></td>
  <td></td>
  <td>P4,000.00</td>
  </tr>
  
  
  <tr id="eligible2" bgcolor="#0bb31e">
  <td colspan="">
  <h5 class="text-color">NET INCOME (Profit)</h5>
  <td colspan="">
  <h5></h5  >
  <td colspan=""><h6>P23,900.00</h6></td>
  </td>
  </td>
  </tr>
  </tbody>
  
  </table>
  <br>
  
  </div>
  <br>
  
  </div>
  </div>
  
  
  </div>
  </div>
  
  
  
  <style>
  .button1 {
    align-items: center;
  }
  
  .card {
   text-align: center;
  }
  .card-title {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 16px;
    text-align: center;
    align-items: center;
  }
  h4 {
    font-weight: bold;
    font-size: large;
  }
  h5 {
    font-weight: bold;
  }
  
  h6 {
    font-weight: bold;
    font-size: medium;
  }
  
  p {
    text-align: left;
    
  }
  td {
    font-size: medium;
  }
  
  #eligible {
      background-color: #e1e1e1;
  }
  #eligible1 {
      background-color: #ffffff;
  }
  #eligible2 {
      background-color: #e7ecc4;
  }
  
  .text-color {
      color: rgb(0, 0, 0); /* Color by name */
  }
  
  </style>

@endsection