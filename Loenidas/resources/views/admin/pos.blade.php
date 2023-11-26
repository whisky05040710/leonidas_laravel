@extends('layouts.pos')
@section('content')
<div class="header">
  <div class="header-left border-0">
    <a href="index.html" class="logo">
      <img src="assets/img/logo.png" alt="" />
    </a>
    <a href="index.html" class="logo-small">
      <img src="assets/img/logo-small.png" alt="" />
    </a>
  </div>

  <ul class="nav user-menu">
    <li class="nav-item dropdown has-arrow flag-nav">
      <a
        class="nav-link dropdown-toggle"
        data-bs-toggle="dropdown"
        href="javascript:void(0);"
        role="button"
      >
        <img src="assets/img/flags/branch.png" alt="" height="20" />
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);" class="dropdown-item"> Branch 1</a>
        <a href="javascript:void(0);" class="dropdown-item"> Branch 2</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a
        href="javascript:void(0);"
        class="dropdown-toggle nav-link"
        data-bs-toggle="dropdown"
      >
        <img src="assets/img/icons/notification-bing.svg" alt="img" />
        <span class="badge rounded-pill">4</span>
      </a>
      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
          <span class="notification-title">Notifications</span>
          <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
        </div>
        <div class="noti-content">
          <ul class="notification-list">
            <li class="notification-message">
              <a href="activities.html">
                <div class="media d-flex">
                  <span class="avatar flex-shrink-0">
                    <img alt="" src="assets/img/profiles/avatar-02.jpg" />
                  </span>
                  <div class="media-body flex-grow-1">
                    <p class="noti-details">
                      <span class="noti-title">John Doe</span> added new
                      task
                      <span class="noti-title"
                        >Patient appointment booking</span
                      >
                    </p>
                    <p class="noti-time">
                      <span class="notification-time">4 mins ago</span>
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li class="notification-message">
              <a href="activities.html">
                <div class="media d-flex">
                  <span class="avatar flex-shrink-0">
                    <img alt="" src="assets/img/profiles/avatar-03.jpg" />
                  </span>
                  <div class="media-body flex-grow-1">
                    <p class="noti-details">
                      <span class="noti-title">Tarah Shropshire</span>
                      changed the task name
                      <span class="noti-title"
                        >Appointment booking with payment gateway</span
                      >
                    </p>
                    <p class="noti-time">
                      <span class="notification-time">6 mins ago</span>
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li class="notification-message">
              <a href="activities.html">
                <div class="media d-flex">
                  <span class="avatar flex-shrink-0">
                    <img alt="" src="assets/img/profiles/avatar-06.jpg" />
                  </span>
                  <div class="media-body flex-grow-1">
                    <p class="noti-details">
                      <span class="noti-title">Misty Tison</span> added
                      <span class="noti-title">Domenic Houston</span> and
                      <span class="noti-title">Claire Mapes</span> to
                      project
                      <span class="noti-title"
                        >Doctor available module</span
                      >
                    </p>
                    <p class="noti-time">
                      <span class="notification-time">8 mins ago</span>
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li class="notification-message">
              <a href="activities.html">
                <div class="media d-flex">
                  <span class="avatar flex-shrink-0">
                    <img alt="" src="assets/img/profiles/avatar-17.jpg" />
                  </span>
                  <div class="media-body flex-grow-1">
                    <p class="noti-details">
                      <span class="noti-title">Rolland Webber</span>
                      completed task
                      <span class="noti-title"
                        >Patient and Doctor video conferencing</span
                      >
                    </p>
                    <p class="noti-time">
                      <span class="notification-time">12 mins ago</span>
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li class="notification-message">
              <a href="activities.html">
                <div class="media d-flex">
                  <span class="avatar flex-shrink-0">
                    <img alt="" src="assets/img/profiles/avatar-13.jpg" />
                  </span>
                  <div class="media-body flex-grow-1">
                    <p class="noti-details">
                      <span class="noti-title">Bernardo Galaviz</span>
                      added new task
                      <span class="noti-title">Private chat module</span>
                    </p>
                    <p class="noti-time">
                      <span class="notification-time">2 days ago</span>
                    </p>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="topnav-dropdown-footer">
          <a href="activities.html">View all Notifications</a>
        </div>
      </div>
    </li>

    <li class="nav-item dropdown has-arrow main-drop">
      <a
        href="javascript:void(0);"
        class="dropdown-toggle nav-link userset"
        data-bs-toggle="dropdown"
      >
        <span class="user-img"
          ><img src="assets/img/profiles/avator1.jpg" alt="" />
          <span class="status online"></span
        ></span>
      </a>
      <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
          <div class="profileset">
            <span class="user-img"
              ><img src="assets/img/profiles/avator1.jpg" alt="" />
              <span class="status online"></span
            ></span>
            <div class="profilesets">
              <h6>John Doe</h6>
              <h5>Admin</h5>
            </div>
          </div>
          <hr class="m-0" />
          <a class="dropdown-item" href="profile.html">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-user me-2"
            >
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            My Profile</a
          >
          <a class="dropdown-item" href="generalsettings.html"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-settings me-2"
            >
              <circle cx="12" cy="12" r="3"></circle>
              <path
                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
              ></path></svg
            >Settings</a
          >
          <hr class="m-0" />
          <a class="dropdown-item logout pb-0" href="signin.html"
            ><img
              src="assets/img/icons/log-out.svg"
              class="me-2"
              alt="img"
            />Logout</a
          >
        </div>
      </div>
    </li>
  </ul>

  <div class="dropdown mobile-user-menu">
    <a
      href="javascript:void(0);"
      class="nav-link dropdown-toggle"
      data-bs-toggle="dropdown"
      aria-expanded="false"
      ><i class="fa fa-ellipsis-v"></i
    ></a>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="profile.html">My Profile</a>
      <a class="dropdown-item" href="generalsettings.html">Settings</a>
      <a class="dropdown-item" href="signin.html">Logout</a>
    </div>
  </div>
</div>
      <div class="page-wrapper ms-0">
        <div class="content">
          <div class="row">
            <div class="col-lg-8 col-sm-12 tabs_wrapper">
              <div class="page-header"></div>

              <div class="search-set">
                <div class="search-input">
                  <a class="btn btn-searchset"
                    ><img src="assets/img/icons/search-white.svg" alt="img"
                  /></a>
                  <div id="DataTables_Table_0_filter" class="dataTables_filter">
                    <label>
                      <input
                        type="search"
                        class="form-control form-control-sm"
                        placeholder="Search..."
                        aria-controls="DataTables_Table_0"
                    /></label>
                  </div>
                </div>
              </div>

              <ul class="tabs owl-carousel owl-theme owl-product border-0">
                <li class="active" id="fruits">
                  <div class="product-details">
                    <img src="assets/img/product/meals.jpg" alt="img" />
                    <h6>Meals</h6>
                  </div>
                </li>
              </ul>
              <div class="tabs_container">
                <div class="tab_content active" data-tab="fruits">
                  <div class="row">

                    <div class="col-lg-3 col-sm-6 d-flex">
                      <div class="productset flex-fill">
                        <div class="productsetimg">
                          <img
                            src="assets/img/product/meals-pork-menudo.jpg"
                            alt="img"
                            id="imageToAdjust"
                          />
                          <h6>Qty: 5.00</h6>
                          <div class="check-product">
                            <i class="fa fa-check"></i>
                          </div>
                        </div>
                        <div class="productsetcontent">
                          <h5>Meals</h5>
                          <h4>Pork Menudo</h4>
                          <h6>150.00</h6>
                        </div>
                      </div>
                    </div>
                    <script>
                      const imageToAdjust =
                        document.getElementById("imageToAdjust");

                      const adjustImageOrientation = () => {
                        const img = new Image();
                        img.src = imageToAdjust.src;

                        img.onload = function () {
                          const width = img.width;
                          const height = img.height;


                          if (width > height) {

                            const canvas = document.createElement("canvas");
                            canvas.width = height;
                            canvas.height = width;
                            const ctx = canvas.getContext("2d");
                            ctx.rotate(Math.PI / 2);
                            ctx.drawImage(img, 0, -width, height, width);


                            imageToAdjust.src = canvas.toDataURL("image/jpeg");
                          }
                        };
                      };
                      adjustImageOrientation();
                    </script>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-4 col-sm-12">
              <div class="card card-order">
                <div class="card-body">
                  <h4>Orders List</h4>
                </div>
                <div class="split-card"></div>
                <div class="card-body pt-0">
                  <div class="totalitem">
                    <h4>Total orders : 4</h4>
                    <a href="javascript:void(0);">Clear all</a>
                  </div>
                  <div class="product-table">
                    <ul class="product-lists">
                      <li>
                        <div class="productimg">
                          <div class="productimgs">
                            <img
                              src="assets/img/product/product31.jpg"
                              alt="img"
                            />
                          </div>
                          <div class="productcontet">
                            <h4>
                              Strawberry
                              <a
                                href="javascript:void(0);"
                                class="ms-2"
                                data-bs-toggle="modal"
                                data-bs-target="#edit"
                                ><img
                                  src="assets/img/icons/edit-5.svg"
                                  alt="img"
                              /></a>
                            </h4>
                            <div class="productlinkset">
                              <h5>PT001</h5>
                            </div>
                            <div class="increment-decrement">
                              <div class="input-groups">
                                <input
                                  type="button"
                                  value="-"
                                  class="button-minus dec button"
                                />
                                <input
                                  type="text"
                                  name="child"
                                  value="0"
                                  class="quantity-field"
                                />
                                <input
                                  type="button"
                                  value="+"
                                  class="button-plus inc button"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>3000.00</li>
                      <li>
                        <a class="confirm-text" href="javascript:void(0);"
                          ><img src="assets/img/icons/delete-2.svg" alt="img"
                        /></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="split-card"></div>
                <div class="card-body pt-0 pb-2">
                  <div class="setvalue">
                    <ul>
                      <li>
                        <h5>Subtotal</h5>
                        <h6>₱ 555.00</h6>
                      </li>
                      <label for="discount-type">Select Discount Type:</label>
                      <select id="discount-type" name="discount-type">
                        <option value="none">No Discount</option>
                        <option value="senior">Senior Discount</option>
                        <option value="pwd">PWD Discount</option>
                      </select>
                      <li>
                        <h5>10% Discount</h5>
                        <h6>₱ 50.00</h6>
                      </li>
                      <hr />
                      <li>
                        <h5></h5>
                        <h6>₱ 505.00</h6>
                      </li>
                      <li>
                        <h5>10% Service Charge</h5>
                        <h6>₱ 55.00</h6>
                      </li>
                      <li>
                        <h5>12% VAT</h5>
                        <h6>₱ 139.00</h6>
                      </li>
                      <li class="total-value">
                        <h5>Total Bill</h5>
                        <h6>₱ 695.00</h6>
                      </li>
                      <br />
                    </ul>
                  </div>
                  <a>
                    <div class="btn-totallabel">
                      <h5>Order Paid</h5>
                      <h6>₱ 695.00</h6>
                    </div>
                  </a>
                  <div class="btn-pos">
                    <ul>
                      <li>
                        <a
                          class="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#placedorderlist"
                          ><img
                            src="assets/img/icons/transcation.svg"
                            alt="img"
                            class="me-1"
                          />Placed Order List</a
                        >
                      </li>
                      <li>
                        <a
                          class="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#paidorderlist"
                          ><img
                            src="assets/img/icons/transcation.svg"
                            alt="img"
                            class="me-1"
                          />
                          Paid Order List</a
                        >
                      </li>
                      <li>
                        <a
                          class="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#reservationlist"
                          ><img
                            src="assets/img/icons/transcation.svg"
                            alt="img"
                            class="me-1"
                          />
                          Reservation List</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="placedorderlist" tabindex="-1" aria-hidden="true" >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Placed Order List</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="tab-content">
              <div class="table-top">
                <div class="search-set">
                  <div class="search-input">
                    <a class="btn btn-searchset"
                      ><img src="assets/img/icons/search-white.svg" alt="img"
                    /></a>
                  </div>
                </div>
                <a href="transactionPlacedOrderList.html">
                  <div class="wordset yellow-button">View Details</div>
                </a>
                <style>

                  .yellow-button {
                    background-color: #ffde59; 
                    color: #000; 
                    padding: 10px 20px; 
                    border: none; 
                    border-radius: 5px; 
                    text-align: center; 
                    text-decoration: none; 
                    display: inline-block; 
                    cursor: pointer; 
                    transition: background-color 0.3s ease; 
                  }

                  .yellow-button:hover {
                    background-color: #ffce00;
                  }
                </style>
              </div>
              <div class="table-responsive">
                <table class="table datanew">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer Name</th>
                      <th>Table Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>2022-03-07</td>

                      <td>Walk-in Customer</td>
                      <td>12</td>
                      <td>
                        <a class="me-3" href="javascript:void(0);">
                          <img src="assets/img/icons/eye.svg" alt="img" />
                        </a>
                        <a class="me-3" href="javascript:void(0);">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
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

    <div class="modal fade" id="paidorderlist" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Paid Order List</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="tab-content">
              <div class="table-top">
                <div class="search-set">
                  <div class="search-input">
                    <a class="btn btn-searchset"
                      ><img src="assets/img/icons/search-white.svg" alt="img"
                    /></a>
                  </div>
                </div>
                <a href="transactionPaidOrderList.html">
                  <div class="wordset yellow-button">View Details</div>
                </a>
              </div>
              <div class="table-responsive">
                <table class="table datanew">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer Name</th>
                      <th>Table Number</th>
                      <th>Total Bill</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2022-03-07</td>

                      <td>Walk-in Customer</td>
                      <td>12</td>
                      <td>P 200.00</td>
                      <td>
                        <a class="me-3" href="javascript:void(0);">
                          <img src="assets/img/icons/eye.svg" alt="img" />
                        </a>
                        <a class="me-3" href="javascript:void(0);">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
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

    <div class="modal fade" id="reservationlist" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Reservation List</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="tab-content">
              <div
                class="tab-pane fade show active"
                id="purchase"
                role="tabpanel"
                aria-labelledby="purchase-tab"
              >
                <div class="table-top">
                  <div class="search-set">
                    <div class="search-input">
                      <a class="btn btn-searchset"
                        ><img src="assets/img/icons/search-white.svg" alt="img"
                      /></a>
                    </div>
                  </div>
                  <a href="transactionReservationList.html">
                    <div class="wordset yellow-button">View Details</div>
                  </a>
                </div>
                <div class="table-responsive">
                  <table class="table datanew">
                    <thead>
                      <tr>
                        <th>Reservation ID</th>
                        <th>Customer Name</th>
                        <th>Table Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2022-03-07</td>
                        <td>Walk-in Customer</td>
                        <td>12</td>
                        <td>
                          <a class="me-3" href="javascript:void(0);">
                            <img src="assets/img/icons/eye.svg" alt="img" />
                          </a>
                          <a class="me-3" href="javascript:void(0);">
                            <img src="assets/img/icons/edit.svg" alt="img" />
                          </a>
                          <a
                            class="me-3 confirm-text"
                            href="javascript:void(0);"
                          >
                            <img src="assets/img/icons/delete.svg" alt="img" />
                          </a>
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
    </div>

    @endsection