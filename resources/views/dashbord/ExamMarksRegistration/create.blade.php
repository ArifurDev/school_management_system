<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Marks Registration</title>

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
                                    <li class="breadcrumb-item"><a href="{{ route('exammarksregistrations.index') }}" class="text-danger">Marks Registrations</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Marks Registration</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header d-flex justify-content-between">
                          <div class="header-title">
                              <h4 class="card-title">Marks Registration</h4>
                          </div>
                          @if ($errors->any())
                          <div class="alert alert-danger">
                             <ul>
                                   @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                   @endforeach
                             </ul>
                          </div>
                       @endif
                      </div>
                        <div class="card-body">
                              <div class="row">
                                  <div class="col-md-5">
                                      <div class="form-group">
                                          <label for="examSelector">Exam</label>
                                          <select class="custom-select" id="examSelector" name="exam_id">
                                              <option value=" " >Please Select</option>
                                              @foreach ($exams as $exam)
                                                 <option value="{{ $exam->id }}" >{{ $exam->exam }}</option>
                                              @endforeach
                                          </select>
                                       </div>
                                  </div>

                                  <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="classSelector">Class</label>
                                        <select class="custom-select"  name="class" id="classSelector">
                                            <option value=" " >Please Select</option>
                                            @foreach ($classes as $class)
                                               <option value="{{ $class->id }}" >{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                              </div>

                      </div>
                  </div>
              </div>

                <div class="col-lg-12 " id="tableData">
                      <div class="card card-block card-stretch card-height">
                          <div class="card-body" >
                                <div class="table-responsive" >
                                    <form action="{{ route('exammarksregistrations.store') }}" method="post" >
                                        @csrf
                                        <table id="example" class="data-table table" style="width:100%">
                                        <thead>
                                            <tr id="table_head_tr"><!--show data dynamically--></tr>
                                        </thead>
                                            <tbody id="studentsContainer"><!--show data dynamically--></tbody>
                                            <input type="hidden" name="exam_id" id="setExamId">
                                            <input type="hidden" name="class_id" id="setClassId">
                                        </table>
                                        <button type="submit" class="btn btn-primary ">Submit Exam Marks</button>
                                    </form>
                                </div>
                          </div>
                    </div>
                 </div>
           </div>
            <!-- Page end  -->
        </div>
      </div>
    </div>

      {{-- set exam id and class id in input --}}
      <script src="{{ asset('backend/assets/setInputValue.js') }}"></script>

      {{-- get subjects and students --}}
      <script src="{{ asset('backend/assets/getData.js') }}"></script>
  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>
