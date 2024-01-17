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
                              <img src="{{ asset('storage/upload/users_image/'.$studentInfo->user->image ?? 'user/10.jpg' ) }}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                              <div>
                                  {{ $studentInfo->user->name }}                 
                                  <p class="mb-0"><small>{{ $studentInfo->classes->class_name }}</small></p>
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
                                      <a href="" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" ><i class="ri-eye-line mr-0"></i></a>
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