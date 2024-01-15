<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Attendences Edit</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('attendance.index') }}" class="text-danger">Dashbord</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Attendances Edit</li>
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
                                  <th>Techer</th>
                                  <th>Attendances</th>
                              </tr>
                          </thead>
                          <tbody>
                            <form action="{{ route('attendances.update') }}" method="POST">
                              @csrf
                                @foreach ($attendances as $student)
                                <tr>
                                   <td>{{ $loop->iteration  }}</td>
                                   <td>{{ $student->student_id }}</td>
                                   <td>{{ $student->class_id}}</td>
                                   <td>{{ $student->user_id }}</td>
                                   <td>
                                    <input type="hidden" name="class" value="{{ $student->class_id }}">
                                    <input type="hidden" name="studentId[]" value="{{$student->student_id}}">
                                    <input type="radio" name="attendances[{{ $student->student_id }}]"  value="Present" {{ $student->attendances == "Present"  ? 'checked="checked"' : '' }}>Present
                                    <input type="radio" name="attendances[{{ $student->student_id }}]"  value="Absent" {{ $student->attendances == "Absent"  ? 'checked="checked"' : '' }}>Absent
                                </td>
                                </tr>
                                @endforeach
                                <input type="hidden" name="date" id="setDate" value="{{ $date_subject->date }}">
                                <input type="hidden" name="subject_id" id="setSubjectId" value="{{ $date_subject->subject_id }}">
                                <button type="submit" class="btn btn-primary ">Attendance Update</button>
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