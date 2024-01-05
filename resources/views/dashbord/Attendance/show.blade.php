<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Attendances</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('attendance.index') }}" class="text-danger">Attendance List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Attendances</h4>
                        </div>
                    </div>
                </div>
        </div>
        <!--show attendance all data-->
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-block card-stretch card-height">
               <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="data-table table" style="width:100%">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Student</th>
                              <th>Class</th>
                              <th>Techer</th>
                              <th>Subject </th>
                              <th>Atten</th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($attendances as $att)
                       <tr>
                          <td>{{ $loop->iteration  }}</td>
                          <td>{{ $att->student->name }}</td>
                          <td>{{ $att->class->class_name }}</td>
                          <td>{{ $att->user->name }}</td>
                          <td>{{ $att->subject->subject_name }}</td> 
                          <td>{{ $att->attendances }}</td>
                          <td>{{ $att->date  }}</td>
                          <td>
                            <div class="d-flex align-items-center list-action">
                              <form action="{{ route('attendance.destroy',$att->id) }}" method="POST">
                                  @csrf
                                  @method("DELETE")
                                  <button class="badge bg-warning mr-2 border-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                              </form>
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