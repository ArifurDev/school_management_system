<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Students</title>

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
                                    <li class="breadcrumb-item active" aria-current="page">All Student</li>
                                    </ol>
                                </nav>

                                <h4 class="mb-3">All Student</h4>
                            </div>
                            <a href="{{ route('students.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Admission Student</a>
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
                                      <th>Email </th>
                                      <th>Gender</th>
                                      <th>Religion</th>
                                      <th>Blood</th>
                                      <th>Class</th>
                                      <th>Section</th>
                                      <th>Monthly Fee</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                               @foreach ($students as $student)

                               <tr>

                                <?php
                                    $prevDate = date('Y-m', strtotime("-1 month"));
                                    $monthlyFee = App\Models\FeeCollection::where('user_id', $student->id)
                                    ->whereYear('date', date('Y', strtotime($prevDate)))
                                    ->whereMonth('date', date('m', strtotime($prevDate)))
                                    ->where('expense', 'Monthly Fee')
                                    ->first();
                                 ?>


                                  <td>{{ $loop->iteration  }}</td>
                                  <td>{{ $student->name }}</td>
                                  <td>{{ $student->email }}</td>
                                  <td>{{ $student->gender }}</td>
                                  <td>{{ $student->religion  }}</td>
                                  <td>{{ $student->blood }}</td>
                                  <td>{{ $student->classes->class_name}}</td>
                                  <td>{{ $student->section }}</td>
                                  <td>
                                      @if ($monthlyFee)
                                          @if ($monthlyFee->due)
                                            <p class="btn mb-1 bg-danger-light">due</p>
                                          @else
                                            <p class="btn mb-1 bg-success-light">paid</p>
                                          @endif
                                      @else
                                            <p class="btn mb-1 bg-danger-light">Unpaid</p>
                                      @endif
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-center list-action">
                                      <a href="{{ route('student.feeCollection',$student->id) }}" class="badge badge-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fee Collection" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                      </svg></a>

                                      <a href="{{ route('students.show',$student->id) }}" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" ><i class="ri-eye-line mr-0"></i></a>
                                      <a href="{{ route('students.edit',$student->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>

                                      <form action="{{ route('students.destroy',$student->id) }}" method="POST">
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
