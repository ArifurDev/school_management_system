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
                                   <li class="breadcrumb-item active" aria-current="page">Attendances</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Attendances</h4>
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                   <div class="card-body">
                      <div class="table-responsive">
                        <table id="example" class="data-table table" style="width:100%">
                          <thead>
                              <tr>
                                  <th>SL</th>
                                  <th>Name</th>
                                  <th>Class</th>
                                  <th>Section</th>
                                  <th>Group</th>
                              </tr>
                          </thead>
                          <tbody>
                           @foreach ($students as $student)
                           <tr>
                              <td>{{ $loop->iteration  }}</td>
                              <td>{{ $student->name }}</td>
                              <td>{{ $student->classes->class_name}}</td>
                              <td>{{ $student->section }}</td>
                              <td>{{ $student->section }}</td>
                           </tr>
                           @endforeach
                         
                          </tbody>
                      </table>
                      </div>
                   </div>
                </div>
             </div>
        </div>
            <!-- Page end  -->
        </div>
      </div>
    </div>

    <!-- ajax code -->

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html> 