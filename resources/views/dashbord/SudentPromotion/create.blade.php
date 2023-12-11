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
                                   <li class="breadcrumb-item"><a href="{{ route('studdentpromotion.index') }}" class="text-danger">Student Find</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Student Promotion</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Student Promotion</h4>
                        </div>
                    </div>
                </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                  <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                      <div class="form-group col-lg-4 ">
                        <label for="class">Section</label>
                        <input type="text" class="form-control mb-3 {{ $errors->has('section') ? 'border border-danger' : '' }}" id="section" placeholder="Enter currect Secction">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="subject">Class</label>
                        <select class="form-control mb-3 {{ $errors->has('subject_id') ? 'border border-danger' : '' }}" id="class" >
                          <option value="">--Select Class--</option>
                          @foreach ($classes as $class)
                          <option value="{{ $class->id }}">{{ $class->class_name }}</option>                                  
                          @endforeach
                        </select>
                      </div>
                  </div>
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
                                  <th>Parmition</th>
                              </tr>
                          </thead>
                          <tbody>
                            <form action="{{ route('studdentpromotion.store') }}" method="POST">
                              @csrf
                                @foreach ($students as $student)
                                <tr>
                                   <td>{{ $loop->iteration  }}</td>
                                   <td>{{ $student->name }}</td>
                                   <td>{{ $student->classes->class_name}}</td>
                                   <td>{{ $student->section }}</td>
                                   <td>{{ $student->group }}</td>
                                   <td>
                                    <input type="hidden" name="studentId[]" value="{{$student->id}}">
                                    <input type="checkbox" name="check[{{ $student->id }}]" >
                                </td>
                                </tr>
                                @endforeach
                                <input type="hidden" name="section" id="setSection">
                                <input type="hidden" name="class" id="setClassId">
                                <button type="submit" class="btn btn-primary ">Promotion</button>
                              </form> 
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

    <!--custom js -->
   <script src="{{ asset('backend/assets/promotionInput.js') }}"></script>

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html> 