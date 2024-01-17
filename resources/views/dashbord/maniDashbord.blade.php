<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashbord</title>

    {{-- css --}}
    @include('dashbord.layouts.css')
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        {{-- left navbar --}}
        @include('dashbord.layouts.left_nav');

        {{-- top navbar --}}
        @include('dashbord.layouts.top_nav')

        <div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">New Order</h4>
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Name or Email">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <a href="{{ route('students.index') }}">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center card-total-sale">
                                            <div class="icon iq-icon-box-2 bg-info-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                                  </svg>                                            </div>
                                            <div>
                                                <p class="mb-2">Students</p>
                                                <h4>{{ $students }}</h4>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="{{ route('salary.index') }}">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center card-total-sale">
                                            <div class="icon iq-icon-box-2 bg-info-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                  </svg>                                            </div>
                                            <div>
                                                <p class="mb-2">Teachers</p>
                                                <h4>{{ $teachers }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="{{ route('attendance.index') }}">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-success-light">
                                            <img src="{{ asset('backend/assets') }}/images/product/3.png" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <p class="mb-2">Today Present</p>
                                            <h4>{{ $today_present }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <a href="{{ route('attendance.index') }}">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-danger-light">
                                            <img src="{{ asset('backend/assets') }}/images/product/3.png" class="img-fluid" alt="image">
                                        </div>
                                        <div>
                                            <p class="mb-2">Today Absent</p>
                                            <h4>{{ $today_absent }}</h4> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <a href="{{ route('expenses.index') }}">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                      <h4 class="card-title">Expenses</h4>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <span class="btn mb-1 bg-success-light">
                                        Amount <span class="badge badge-success ml-2">${{ $today_expens ?? '00.00' }}</span>
                                    </span>      
                                    <span class="btn mb-1 bg-primary-light">
                                        Due <span class="badge badge-primary ml-2">${{ $today_expens_due ?? '00.00' }}</span>
                                    </span>
                                </div>
                              </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <a href="{{ route('feecollections.index') }}">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                      <h4 class="card-title">Fee Collection</h4>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <span class="btn mb-1 bg-success-light">
                                        Amount <span class="badge badge-success ml-2">${{ $today_feeCollection ?? '00.00' }}</span>
                                    </span>      
                                    <span class="btn mb-1 bg-primary-light">
                                        Due <span class="badge badge-primary ml-2">${{ $today_feeCollection_due ?? '00.00' }}</span>
                                    </span>
                                </div>
                              </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                    <div class="col-lg-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Overview</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001"
                                            data-toggle="dropdown">
                                            This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                                            aria-labelledby="dropdownMenuButton001">
                                            <a class="dropdown-item" href="#">Year</a>
                                            <a class="dropdown-item" href="#">Month</a>
                                            <a class="dropdown-item" href="#">Week</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="layout1-chart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Revenue Vs Cost</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton002"
                                            data-toggle="dropdown">
                                            This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                                            aria-labelledby="dropdownMenuButton002">
                                            <a class="dropdown-item" href="#">Yearly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="layout1-chart-2" style="min-height: 360px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Top Products</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton006"
                                            data-toggle="dropdown">
                                            This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                                            aria-labelledby="dropdownMenuButton006">
                                            <a class="dropdown-item" href="#">Year</a>
                                            <a class="dropdown-item" href="#">Month</a>
                                            <a class="dropdown-item" href="#">Week</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled row top-product mb-0">
                                    <li class="col-lg-3">
                                        <div class="card card-block card-stretch card-height mb-0">
                                            <div class="card-body">
                                                <div class="bg-warning-light rounded">
                                                    <img src="{{ asset('backend/assets') }}/images/product/01.png"
                                                        class="style-img img-fluid m-auto p-3" alt="image">
                                                </div>
                                                <div class="style-text text-left mt-3">
                                                    <h5 class="mb-1">Organic Cream</h5>
                                                    <p class="mb-0">789 Item</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3">
                                        <div class="card card-block card-stretch card-height mb-0">
                                            <div class="card-body">
                                                <div class="bg-danger-light rounded">
                                                    <img src="{{ asset('backend/assets') }}/images/product/02.png"
                                                        class="style-img img-fluid m-auto p-3" alt="image">
                                                </div>
                                                <div class="style-text text-left mt-3">
                                                    <h5 class="mb-1">Rain Umbrella</h5>
                                                    <p class="mb-0">657 Item</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3">
                                        <div class="card card-block card-stretch card-height mb-0">
                                            <div class="card-body">
                                                <div class="bg-info-light rounded">
                                                    <img src="{{ asset('backend/assets') }}/images/product/03.png"
                                                        class="style-img img-fluid m-auto p-3" alt="image">
                                                </div>
                                                <div class="style-text text-left mt-3">
                                                    <h5 class="mb-1">Serum Bottle</h5>
                                                    <p class="mb-0">489 Item</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3">
                                        <div class="card card-block card-stretch card-height mb-0">
                                            <div class="card-body">
                                                <div class="bg-success-light rounded">
                                                    <img src="{{ asset('backend/assets') }}/images/product/02.png"
                                                        class="style-img img-fluid m-auto p-3" alt="image">
                                                </div>
                                                <div class="style-text text-left mt-3">
                                                    <h5 class="mb-1">Organic Cream</h5>
                                                    <p class="mb-0">468 Item</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-transparent card-block card-stretch mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between p-0">
                                <div class="header-title">
                                    <h4 class="card-title mb-0">Best Item All Time</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div><a href="#" class="btn btn-primary view-btn font-size-14">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-block card-stretch card-height-helf">
                            <div class="card-body card-item-right">
                                <div class="d-flex align-items-top">
                                    <div class="bg-warning-light rounded">
                                        <img src="{{ asset('backend/assets') }}/images/product/04.png"
                                            class="style-img img-fluid m-auto" alt="image">
                                    </div>
                                    <div class="style-text text-left">
                                        <h5 class="mb-2">Coffee Beans Packet</h5>
                                        <p class="mb-2">Total Sell : 45897</p>
                                        <p class="mb-0">Total Earned : $45,89 M</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-block card-stretch card-height-helf">
                            <div class="card-body card-item-right">
                                <div class="d-flex align-items-top">
                                    <div class="bg-danger-light rounded">
                                        <img src="{{ asset('backend/assets') }}/images/product/05.png"
                                            class="style-img img-fluid m-auto" alt="image">
                                    </div>
                                    <div class="style-text text-left">
                                        <h5 class="mb-2">Bottle Cup Set</h5>
                                        <p class="mb-2">Total Sell : 44359</p>
                                        <p class="mb-0">Total Earned : $45,50 M</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
     
                    <div class="col-lg-8">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Order Summary</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton005"
                                            data-toggle="dropdown">
                                            This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none"
                                            aria-labelledby="dropdownMenuButton005">
                                            <a class="dropdown-item" href="#">Year</a>
                                            <a class="dropdown-item" href="#">Month</a>
                                            <a class="dropdown-item" href="#">Week</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mt-2">
                                    <div class="d-flex align-items-center progress-order-left">
                                        <div class="progress progress-round m-0 orange conversation-bar"
                                            data-percent="46">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value text-secondary">46%</div>
                                        </div>
                                        <div class="progress-value ml-3 pr-5 border-right">
                                            <h5>$12,6598</h5>
                                            <p class="mb-0">Average Orders</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ml-5 progress-order-right">
                                        <div class="progress progress-round m-0 primary conversation-bar"
                                            data-percent="46">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value text-primary">46%</div>
                                        </div>
                                        <div class="progress-value ml-3">
                                            <h5>$59,8478</h5>
                                            <p class="mb-0">Top Orders</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div id="layout1-chart-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page end  -->
            </div>
        </div>
    </div>

    {{-- dashbord custom js --}}
    <script src="{{ asset('backend/assets/dashbordData.js') }}"></script>
    {{-- js --}}
    @include('dashbord.layouts.js')
</body>

</html>
