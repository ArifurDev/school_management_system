<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Attendace</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('attendance.index') }}" class="text-danger">Attendances</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Attendance Create</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Attendance Create</h4>
                        </div>
                    </div>
                </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                  <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                      <div class="form-group col-lg-4 ">
                        <label for="class">Date</label>
                        <input type="date" class="form-control mb-3 {{ $errors->has('date') ? 'border border-danger' : '' }}" id="date">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="subject">Subject</label>
                        <select class="form-control mb-3 {{ $errors->has('subject_id') ? 'border border-danger' : '' }}" id="subject" >
                          <option value="">--Select Subject--</option>
                          @foreach ($subjects as $subject)
                          <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>                                  
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
                                  <th>Attendances</th>
                              </tr>
                          </thead>
                          <tbody>
                            <form action="{{ route('attendance.store') }}" method="POST">
                              @csrf
                                @foreach ($students as $student)
                                <tr>
                                   <td>{{ $loop->iteration  }}</td>
                                   <td>{{ $student->name }}</td>
                                   <td>{{ $student->classes->class_name}}</td>
                                   <td>{{ $student->section }}</td>
                                   <td>{{ $student->group }}</td>
                                   <td>
                                    <input type="hidden" name="class" value="{{ $student->class_id }}">
                                    <input type="hidden" name="studentId[]" value="{{$student->id}}">
                                    <input type="radio" name="attendances[{{ $student->id }}]"  value="Present">Present
                                    <input type="radio" name="attendances[{{ $student->id }}]"  value="Absent">Absent
                                </td>
                                </tr>
                                @endforeach
                                <input type="hidden" name="date" id="setDate">
                                <input type="hidden" name="subject_id" id="setSubjectId">
                                <button type="submit" class="btn btn-primary ">Attendance</button>
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
    <script>
        // document.addEventListener('DOMContentLoaded', function () {
            const date = document.getElementById("date");
            const subject = document.getElementById("subject");

            const setDateInput = document.getElementById("setDate");
            const setSubjectInput = document.getElementById("setSubjectId");

            const setDateValue = (e) => {
                setDateInput.value = e.target.value;
            };

            const setSubjectValue = (e) => {
                setSubjectInput.value = e.target.value;
            };

            date.addEventListener('change', setDateValue);
            subject.addEventListener('change', setSubjectValue);
        // });
    </script>

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html> 