<?php
  $config = App\Models\SystemConfig::first();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashbord</title>

    {{-- css --}}
    @include('dashbord.layouts.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

                {{-- all menu  --}}
                <span class="m-2 ">All Menu<i class="bi bi-caret-right-fill"></i></span>
                <div class="row  d-flex justify-content-left m-2 pb-1">
                        <a href="#" class="btn btn-outline-primary m-1 active">
                            <svg class="svg-icon" id="p-dash1" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            Home</a>
                        <a href="{{ route('classes.index') }}" class="btn btn-outline-primary m-1">
                            <svg class="svg-icon" id="p-dash6" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="4 14 10 14 10 20"></polyline><polyline points="20 10 14 10 14 4"></polyline><line x1="14" y1="10" x2="21" y2="3"></line><line x1="3" y1="21" x2="10" y2="14"></line>
                            </svg>
                            Class</a>
                        <a href="{{ route('subjects.index') }}" class="btn btn-outline-primary m-1">
                          <i class="bi bi-book-half"></i>
                          Subject</a>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-person-bounding-box"></i>
                              Students</a>
                        <a href="{{ route('students.create') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-person-plus-fill"></i>
                              Admission</a>
                        <a href="{{ route('studdentpromotion.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-graph-up-arrow"></i>
                              Promotion</a>
                        <a href="{{ route('attendance.create') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-clipboard-plus-fill"></i>
                              Attendance</a>
                        <a href="{{ route('exams.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-card-text"></i>
                              Exams</a>
                        <a href="{{ route('examsschedules.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-clipboard2-plus-fill"></i>
                              Exams Schedules</a>
                        <a href="{{ route('exammarksregistrations.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-clipboard2-data"></i>
                              Exams Marks</a>
                        <a href="{{ route('salary.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-cash-coin"></i>
                            Salary</a>
                        <a href="{{ route('feecollections.index') }}" class="btn btn-outline-primary m-1">
                              <i class="bi bi-cash-stack"></i>
                            Fee Collections</a>
                        <a href="{{ route('expenses.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-coin"></i>
                            Expenses</a>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-person-plus-fill"></i>
                            User</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-sign-railroad-fill"></i>
                            Role</a>
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-signpost-2"></i>
                            Permission</a>
                        <a href="{{ route('mailsettings.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-envelope-open-fill"></i>
                            Env</a>
                        <a href="{{ route('site-configurations.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-gear"></i>
                            Configurations</a>
                </div>


                {{--  end menu --}}
                <span class="m-2 "> {{ $config->site_name ?? 'POSDash' }} <i class="bi bi-caret-right-fill"></i>Dashbord</span>
                <div class="col-lg-12 ">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <a href="{{ route('students.index') }}">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center card-total-sale">
                                            <div class="icon iq-icon-box-2 bg-info-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
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
                                            <i class="bi bi-clipboard-check-fill"></i>
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
                                            <i class="bi bi-clipboard-x-fill"></i>
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
                </div>


            <div class="col-md-12">
                <div class="row ">
                       <div class="col-md-6">
                            <a href="{{ route('expenses.index') }}" title="expenses">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center card-total-sale">
                                            <div class="icon iq-icon-box-2 bg-danger-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                                                </svg>
                                            </div>
                                            <div class="d-flex justify-content-between ">
                                                <span class="btn mb-1 bg-success-light">
                                                    Amount <span class="badge badge-success ml-2">${{ $today_expens ?? '00.00' }}</span>
                                                </span></br>
                                                <span class="btn mb-1 bg-primary-light ml-1">
                                                    Due <span class="badge badge-danger ml-2">${{ $today_expens ?? '00.00' }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                       </div>
                       <div class="col-md-6">
                        <a href="{{ route('feecollections.index') }}" title="fee collection">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="d-flex align-items-center card-total-sale">
                                        <div class="icon iq-icon-box-2 bg-success-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                                            </svg>
                                        </div>
                                        <div class="d-flex justify-content-between ">
                                            <span class="btn mb-1 bg-success-light">
                                                Amount <span class="badge badge-success ml-2">${{ $today_feeCollection ?? '00.00' }}</span>
                                            </span></br>
                                            <span class="btn mb-1 bg-primary-light ml-1">
                                                Due <span class="badge badge-danger ml-2">${{ $today_feeCollection_due ?? '00.00' }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                       </div>
                </div>
              </div>




                <div class="row">





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







