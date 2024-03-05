<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Exam Result</title>

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
                                   <li class="breadcrumb-item"><a href="{{ route('exammarksregistrations.create') }}" class="text-danger">Marks Registration Insert</a></li>
                                   <li class="breadcrumb-item"><a href="{{ route('exammarksregistrations.index') }}" class="text-danger">Marks Registration</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Exam Result</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                  <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                      <div>
                          <h4 class="mb-3">Exam Result</h4>
                          <p class="m-3">
                            <div class="d-flex align-items-center">
                              <img src="{{ asset('upload/images/'.$studentInfo->user->image ?? 'user/10.jpg' ) }}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                              <div>
                                  {{ $studentInfo->user->name }}
                                  <p class="mb-0"><small>{{ $studentInfo->classes->class_name }}</small></p>
                                  <div class="d-flex align-items-center list-action">
                                    <a href="{{ route('marksheet.show', [
                                      'student_id' => $studentInfo->student_id,
                                      'student_slug' => $studentInfo->user->name,
                                      'exam_id' => $studentInfo->exam_id,
                                      'exam_slug' => $studentInfo->exams->exam,
                                      'class_id' => $studentInfo->class_id,
                                      'class_slug' => $studentInfo->classes->class_name,
                                      ]) }}" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="marksheet">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-medical-fill" viewBox="0 0 16 16">
                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0m-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1"/>
                                        </svg>
                                    </a>

                                </div>
                              </div>
                          </div>
                          </p>
                      </div>
                  </div>
                </div>

                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height">
                       <div class="card-body">
                          <div class="table-responsive">
                            <table id="example" class="data-table table" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>SL</th>
                                      <th>Subject</th>
                                      <th>Exam</th>
                                      <th>Class Work</th>
                                      <th>Home Work</th>
                                      <th>Mark</th>
                                      <th>Attendance Mark</th>
                                      <th>Total</th>
                                      <th>Full Marks</th>
                                      <th>Pass Marks</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                               @foreach ($MarksRegistrations as $MarksRegistration)
                               <tr>
                                  <td>{{ $loop->iteration  }}</td>
                                  <td>{{ $MarksRegistration->subject->subject_name }}</td>
                                  <td>{{ $MarksRegistration->exams->exam }}</td>
                                  <td>{{ $MarksRegistration->class_work }}</td>
                                  <td>{{ $MarksRegistration->home_work }}</td>
                                  <td>{{ $MarksRegistration->mark }}</td>
                                  <td>{{ $MarksRegistration->attendance_mark }}</td>
                                  <td>{{ $MarksRegistration->total_mark }}</td>
                                  <td>{{ $MarksRegistration->full_marks }}</td>
                                  <td>{{ $MarksRegistration->pass_marks }}</td>
                                  <td>
                                    <div class="d-flex align-items-center list-action">
                                      <a href="{{ route('exammarksregistrations.edit',$MarksRegistration->id) }}" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                          </svg>
                                      </a>
                                  </div>
                                  </td>
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
