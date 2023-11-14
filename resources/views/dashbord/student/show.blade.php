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
                                   <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="text-danger">Students List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Student Profile</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="col-lg-12 col-md-12">
                   <div class="card">
                    <div class="d-flex justify-content-between m-3">
                        <h4 >Student Profile</h4>
                        <div class="d-flex align-items-center list-action">
                            <a href="{{ route('students.edit',$student->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>
                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="badge bg-warning mr-2 border-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                            </form>
                        </div>
                    </div><!--profile top section end -->

                     <div class="media mb-4 ml-3">
                        <img src="{{ asset('storage/upload/users_image/'.$student->image) }}" class="align-self-start mr-3 avatar-120 img-fluid rounded" alt="#">
                        <div class="media-body">
                           <h5 class="mt-0">{{ $student->name }}</h5>
                           <p>{{ $student->bio }}</p>
                        </div>
                     </div>

                    <div class="col-sm-12 mb-2">
                         <ul class="list-group list-group-horizontal-xxl ">
                            <li class="list-group-item">Name: {{ $student->name }}</li>
                            <li class="list-group-item">Gender: {{ $student->gender }}</li>
                            <li class="list-group-item">Father Name: {{ $student->father_name }}</li>
                            <li class="list-group-item">Mother Name: {{ $student->mother_name }}</li>
                            <li class="list-group-item">Religion: {{ $student->religion }}</li>
                            <li class="list-group-item">Date Of Birth: {{ $student->date_of_birth }}</li>
                            <li class="list-group-item">E-Mail: {{ $student->email}}</li>
                            <li class="list-group-item">Admission Date: {{ $student->created_at }}</li>
                            <li class="list-group-item">Class: {{ $student->class_id }}</li>
                            <li class="list-group-item">Section: {{ $student->section }}</li>
                            <li class="list-group-item">Adress: {{ $student->address}}</li>
                            <li class="list-group-item">Phone: {{ $student->phone }}</li>
                            <li class="list-group-item">Blood: {{ $student->blood }}</li>
                          </ul>
                    </div> 

                    <div class="row m-2">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card ">
                               <div class="card-body">
                                 <div class="d-flex align-items-center ml-5 progress-order-right">
                                     <div class="progress progress-round m-0 primary conversation-bar" data-percent="46">
                                         <span class="progress-left">
                                             <span class="progress-bar"></span>
                                         </span>
                                         <span class="progress-right">
                                             <span class="progress-bar"></span>
                                         </span>
                                         <div class="progress-value text-primary">46%</div>
                                     </div>
                                     <div class="progress-value ml-3">
                                         <h5>Attendance</h5>
                                         <p class="mb-0">Class 10</p>
                                     </div>
                                 </div>
                               </div>
                            </div>
                         </div>
                     </div>

                     <div class="row m-2">
                      <div class="col-lg-12 col-md-12">
                        <div class="card card-block card-stretch card-height">
                          <div class="card-body">
                             <div class="table-responsive">
                               <table id="example" class="data-table table" style="width:100%">
                                 <thead>
                                     <tr>
                                         <th>SL</th>
                                         <th>Expense Type</th>
                                         <th>Amount</th>
                                         <th>Due</th>
                                         <th>Description</th>
                                         <th>Date</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                  @foreach ($allPayments as $payment)
                                    <tr>
                                      <td>{{ $loop->iteration  }}</td>
                                      <td>{{ $payment->expense }}</td>
                                      <td>{{ $payment->amount }}</td>
                                      <td>{{ $payment->due }}</td>
                                      <td>{{ $payment->description }}</td>
                                      <td>{{ $payment->date }}</td>
                                   </tr>
                                  @endforeach
                                 </tbody>
                             </table>
                             </div>
                          </div>
                       </div>
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

  {{-- add  remove field js --}}

  @include('dashbord.layouts.js')
  </body>
</html> 