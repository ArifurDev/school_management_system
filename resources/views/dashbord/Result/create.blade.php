<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Result</title>

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
                                       <li class="breadcrumb-item"><a href="{{ route('results.index') }}" class="text-danger">Results</a></li>
                                       <li class="breadcrumb-item active" aria-current="page">Create Result</li>
                                    </ol>
                                 </nav>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    {{-- js --}}
    @include('dashbord.layouts.js')
</body>

</html>
