<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Salary Sheet</title>

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

        <div class="content-page">
            {{-- main page --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                            <div>
                                <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb ">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-danger"><i class="ri-home-4-line mr-1 float-left"></i>Dashbord</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('salarysheet.create') }}" class="text-danger">Salary Sheet Create</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Salary Sheets Edit</li>
                                        </ol>
                                </nav>
                                <h4 class="mb-3">Salary Sheet Edit</h4>
                            </div>
                            <a href="{{ route('salarysheet.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Salary Sheets</a>
                        </div>
                        
                    </div>
                </div>
                <div class="row rounded mt-3 p-3">
                    <div class="col-lg-12 col-md-10 col-sm-10">
                        <div class="card bg-white">
                            <div class="card-body">                      
                                <form action="{{ route('salarysheet.update',$salarysheet->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                        <div class="form-row p-2">
                                           <div class="col">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">$</span>
                                                   <span class="input-group-text">00.00</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount" value="{{ $salarysheet->amount }}">
                                             </div>
                                           </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary"> Update Salary Sheet</button>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Page end  -->
            </div>
        </div>
    </div>



    {{-- js --}}
    @include('dashbord.layouts.js')
</body>

</html>
