<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Salary</title>
      
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
                                    <li class="breadcrumb-item active" aria-current="page">Salary</li>
                                    </ol>
                                </nav>

                                <h4 class="mb-3">Teachers Salary Sheetes</h4>
                            </div>
                            <a href="{{ route('salarysheet.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Create Salary Sheet</a>
                        </div>
                    </div>
                 </div>
                 <div class="row">

                 </div>
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
                                    <th>Number</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($salarySheets as $salarySheet)

                             <tr>
                                <?php 
                                    $salary_check = App\Models\Salary::where('user_id',$salarySheet->user_id)->where('date',$prev_full_date)->first();
                                ?>

                                <td>{{ $loop->iteration  }}</td>
                                <td>{{ $salarySheet->user->name }}</td>
                                <td>{{ $salarySheet->user->email }}</td>
                                <td>{{ $salarySheet->user->phone }}</td>
                                <td>{{ $salarySheet->amount }}</td>
                                <td>
                                  @if ($salary_check)
                                      @if ($salary_check->status == '1')
                                          <span class="badge bg-success">Paid</span>
                                      @elseif ($salary_check->status == '2')
                                          <span class="badge bg-success">Advance</span>
                                      @endif 
                                  @else
                                      <span class="badge bg-danger">Unpaid</span>
                                  @endif

                                </td>
                                <td>
                                  <div class="d-flex align-items-center list-action">
                                    <a href="{{ route('teacherSalary.create',$salarySheet->user_id) }}" class="badge badge-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pay Salary" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                                          </svg></a>

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