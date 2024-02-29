

<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="../backend/index.html" class="header-logo">
                    <img src="{{ asset('backend/assets') }}/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                    <h5 class="logo-title ml-3">POSDash</h5>

                </a>
            </div>
            <div class="iq-search-bar device-search">
                <form action="#" class="searchbox">
                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                    <input type="text" class="text search-input" placeholder="Search here...">
                </form>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle btn border add-btn"
                                id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{ asset('backend/assets') }}/images/small/flag-01.png" alt="img-flag"
                                    class="img-fluid image-flag mr-2">En
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-3">
                                        <a class="iq-sub-card" href="#"><img
                                                src="{{ asset('backend/assets') }}/images/small/flag-02.png" alt="img-flag"
                                                class="img-fluid mr-2">French</a>
                                        <a class="iq-sub-card" href="#"><img
                                                src="{{ asset('backend/assets') }}/images/small/flag-03.png" alt="img-flag"
                                                class="img-fluid mr-2">Spanish</a>
                                        <a class="iq-sub-card" href="#"><img
                                                src="{{ asset('backend/assets') }}/images/small/flag-04.png" alt="img-flag"
                                                class="img-fluid mr-2">Italian</a>
                                        <a class="iq-sub-card" href="#"><img
                                                src="{{ asset('backend/assets') }}/images/small/flag-05.png" alt="img-flag"
                                                class="img-fluid mr-2">German</a>
                                        <a class="iq-sub-card" href="#"><img
                                                src="{{ asset('backend/assets') }}/images/small/flag-06.png" alt="img-flag"
                                                class="img-fluid mr-2">Japanese</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="btn border add-btn shadow-none mx-2 d-none d-md-block"
                                data-toggle="modal" data-target="#new-order"><i class="las la-plus mr-2"></i>New
                                Order</a>
                        </li>
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12"
                                            placeholder="type here to search...">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <span class="bg-primary"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="cust-title p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">All Messages</h5>
                                                <a class="badge badge-primary badge-card" href="#">3</a>
                                            </div>
                                        </div>
                                        <div class="px-3 pt-0 pb-0 sub-card">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('backend/assets') }}/images/user/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Emma Watson</h6>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('backend/assets') }}/images/user/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Ashlynn Franci</h6>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('backend/assets') }}/images/user/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Kianna Carder</h6>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                            role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bell">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>
                                <span class="bg-primary "></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="cust-title p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">Notifications</h5>
                                                <a class="badge badge-primary badge-card" href="#">3</a>
                                            </div>
                                        </div>
                                        <div class="px-3 pt-0 pb-0 sub-card">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('backend/assets') }}/images/user/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Emma Watson</h6>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('backend/assets') }}/images/user/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Ashlynn Franci</h6>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('backend/assets') }}/images/user/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Kianna Carder</h6>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                            role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown caption-content">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('backend/assets') }}/images/user/1.png" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 text-center">
                                        <div class="media-body profile-detail text-center">
                                            <img src="{{ asset('backend/assets') }}/images/page-img/profile-bg.jpg" alt="profile-bg"
                                                class="rounded-top img-fluid mb-4">
                                            <img src="{{ asset('backend/assets') }}/images/user/1.png" alt="profile-img"
                                                class="rounded profile-img img-fluid avatar-70">
                                        </div>
                                        <div class="p-3">
                                            <h5 class="mb-1">{{ auth()->user()->email ?? 'N/D' }}</h5>
                                            <p class="mb-0">{{ auth()->user()->created_at ?? 'N/D' }}</p>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="btn border">Sign Out</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

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
