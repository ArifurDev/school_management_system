<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Salary</title>

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
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                                class="text-danger"><i
                                                    class="ri-home-4-line mr-1 float-left"></i>Dashbord</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('salary.index') }}"
                                                class="text-danger">Teachers</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Salary</li>
                                    </ol>
                                </nav>

                                <h4 class="mb-3">Salary</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-start bg-light rounded">
                    <div class="col-lg-2 p-1 ">
                        <img class="avatar-100 rounded "
                            src="{{ asset('storage/upload/users_image/' . $user->image) }}" alt="#"
                            data-original-title="" title="">
                    </div>
                    <div class="col-lg-8 p-1">
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->roles->first()->name }}</p>
                    </div>
                </div>


                <div class="row bg-light rounded mt-3 p-3" title="general info">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                            <div class="card-body">
                                <h5 class="card-title font-size-14">Name</h5>
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer font-size-15">{{ $user->name }} <cite
                                            title="Source Title" class="text-white"></cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                            <div class="card-body">
                                <h5 class="card-title font-size-14">E-mail</h5>
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer font-size-15">{{ $user->email }} <cite
                                            title="Source Title" class="text-white"></cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                            <div class="card-body">
                                <h5 class="card-title font-size-14">Phone</h5>
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer font-size-15">{{ $user->phone }} <cite
                                            title="Source Title" class="text-white"></cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                            <div class="card-body">
                                <h5 class="card-title font-size-14">Address</h5>
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer font-size-15">{{ $user->address }} <cite
                                            title="Source Title" class="text-white"></cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>




                </div>



                <div class="row bg-light rounded mt-3 p-3">
                    <div class="col-lg-12 col-md-10 col-sm-10">
                        <div class="card bg-white">
                            <div class="card-body">
                               <div class="row d-flex justify-content-between p-2">
                                <h5 class="card-title font-size-14">Pay Salary</h5>
                               </div>
                                <form action="{{ route('salary.store') }}" method="POST">
                                    @csrf
                                        <div class="form-row p-2">
                                           <div class="col ">
                                              <input type="Date" class="form-control {{ $errors->has('date') ? 'border border-danger' : '' }}" name="date" value="{{ $salary->date }}">
                                           </div>
                                           <div class="col">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">$</span>
                                                   <span class="input-group-text">00.00</span>
                                                </div>
                                                <input type="text" class="form-control {{ $errors->has('amount') ? 'border border-danger' : '' }}" aria-label="Amount (to the nearest dollar)" name="amount" value="{{ $salary->amount }}">
                                             </div>
                                           </div>
                                           <div class="col ">
                                            <select class="form-control mb-3 {{ $errors->has('status') ? 'border border-danger' : '' }}" name="status" >
                                                <option selected="">select Status</option>
                                                <option @selected($salary->status == '1') value="1">paid</option>
                                                <option @selected($salary->status == '2') value="2">Advanch</option>
                                             </select>
                                            </div>
                                            <input type="hidden" value="{{ $user->id }}" name="id">
                                        </div>
                                    <button type="submit" class="btn btn-primary">Pay Salary</button>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page end  -->
            </div>
        </div>
    </div>

 <!--datatable-->
 <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
    
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
 </script>


    {{-- js --}}
    @include('dashbord.layouts.js')
</body>

</html>
