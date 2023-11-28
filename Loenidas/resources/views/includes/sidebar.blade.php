@php
  $r = request()
      ->route()
      ->getAction()['controller'];
  $r = explode('\\', $r);
  $r = $r[count($r) - 1];
  $r = explode('@', $r);
  $controller = $r[0];
  $method = $r[1];
@endphp
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
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}"
              alt="img" /><span>Menu</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="MenuList.html">Menu List</a></li>
            <li><a href="MenuCategory.html">Menu Category</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a id="InventoryControllerTab" href="javascript:void(0);"><img
              src="{{ asset('assets/img/icons/sales1.svg') }}" alt="img" />
            <span>Inventory</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a id="I-index" href="{{ route('inventory.index') }}">Inventory Status</a>
            </li>
            <li>
              <a id="I-inventoryCategory" href="{{ route('inventory.inventoryCategory') }}">Inventory Category</a>
            </li>
            <li>
              <a id="I-inventoryRestocking" href="{{ route('inventory.inventoryRestocking') }}">Restocking Cart</a>
            </li>
            <li>
              <a id="I-inventoryRestockingHistory" href="{{ route('inventory.inventoryRestockingHistory') }}">Restocking
                History</a>
            </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/transcation.svg') }}"
              alt="img" /><span>Orders</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="OrderList.html">Order List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/purchase1.svg') }}"
              alt="img" /><span>Reservation</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="reservationList.html">Reservation List</a></li>
            <li><a href="reservationTable.html">Reservation Table</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/expense1.svg') }}"
              alt="img" /><span>Expenses</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="expenses.html">Expenses List</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/time.svg') }}"
              alt="img" /><span>Sales</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="salesdaily.html">Daily Sales</a></li>
            <li><a href="salesmonthly.html">Monthly Income</a></li>
            <li><a href="salesReport.html">Sales Report</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/places.svg') }}"
              alt="img" /><span>Branch</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="branch.html">Branch List</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}"
              alt="img" /><span>Users</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ route('staffs.index') }}">Staff List</a></li>
            <li><a href="{{ route('staffs.index') }}">Customer List</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>
  haba_delay(() => {
    document.getElementById("{{ $controller }}Tab").click();
    document.getElementById("{{ $controller[0] }}-{{ $method }}").classList.add("submenuactive");
  });
</script>
