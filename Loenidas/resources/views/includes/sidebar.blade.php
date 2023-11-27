@if (isset($menus))
@php
extract($menus)
@endphp
@endif
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="">
          <a href="index.html"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img" /><span>
              Dashboard</span>
          </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img" /><span>Menu</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="MenuList.html">Menu List</a></li>
            <li><a href="MenuCategory.html">Menu Category</a></li>
            <li><a href="MenuAvailable.html">Menu Available</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a id="inventoryTab" href="javascript:void(0);"><img src="{{ asset('assets/img/icons/sales1.svg') }}" alt="img" />
            <span>Inventory</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a id="i-1" href="{{ route('inventory.index') }}">Inventory Status</a>
            </li>
            <li>
              <a id="i-2" href="{{ route('inventory.inventoryCategory') }}">Stocks Category</a>
            </li>
            <li>
              <a id="i-3" href="{{ route('inventory.inventoryRestocking') }}">Inventory Restocking</a>
            </li>
            <li>
              <a id="i-4" href="{{ route('inventory.inventoryRestockingHistory') }}">Restocking History</a>
            </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/expense1.svg') }}" alt="img" /><span>Expenses</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="expenses.html">Expenses List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/purchase1.svg') }}" alt="img" /><span>Orders</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="OrderList.html">Order List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/purchase1.svg') }}" alt="img" /><span>Reservation</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="reservationStatus.html">Reservation List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/quotation1.svg') }}" alt="img" /><span>Point of Sales</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="pos.html">Point of Sales</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/transcation.svg') }}" alt="img" /><span>Transaction</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li>
              <a href="transactionPlacedOrderList.html">Placed Orders List</a>
            </li>
            <li>
              <a href="transactionPaidOrderList.html">Paid Orders List</a>
            </li>
            <li>
              <a href="transactionReservationList.html">Reservations List</a>
            </li>
          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/time.svg') }}" alt="img" /><span>Sales</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="salesdaily.html">Sales List</a></li>
            <li><a href="salesmonthly.html">Income Statement</a></li>
            <li><a href="salesReport.html">Sales Report</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/places.svg') }}" alt="img" /><span>Branch</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="branch.html">Branch List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img" /><span>Users</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ route('staffs.index') }}">Users List</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>
  haba_delay(() => {
    document.getElementById("{{ $menuactive }}Tab").click();
    document.getElementById("{{ $menuactive[0] }}-{{$submenuactive}}").classList.add("submenuactive");
  });
</script>