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
                                   <li class="breadcrumb-item active" aria-current="page">All Fees Collection</li>
                                </ol>
                             </nav>
                        </div>
                        <a href="{{ route('students.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Fees Collection</a>
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
                                      <th>Name</th>
                                      <th>Image</th>
                                      <th>Phone</th>
                                      <th>Class</th>
                                      <th>Expens </th>
                                      <th>Amount</th>
                                      <th>Due</th>
                                      <th>Date</th>
                                      <th>Des</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                               @foreach ($fee_collections as $fee)
                               <tr>
                                  <td>{{ $loop->iteration  }}</td>
                                  <td>{{ $fee->User->name }}</td>
                                  <td>
                                    <img src="{{ asset('upload/images/'.$fee->User->image) }}" class="align-self-start mr-3 avatar-50 img-fluid rounded" alt="#">
                                  </td>
                                  <td>{{ $fee->User->phone }}</td>
                                  <td>{{ $fee->User->classes->class_name}}</td>
                                  <td>{{ $fee->expense }}</td>
                                  <td>{{ $fee->amount }}</td>
                                  <td>
                                    <span class="badge @if ($fee->due != null ) badge-primary @else badge-success @endif">
                                      @if ($fee->due != null )
                                          {{ $fee->due }}
                                      @else
                                          paid
                                      @endif
                                    </span>
                                  </td>
                                  <td>{{ $fee->date }}</td>
                                  <td>{{ $fee->description }}</td>
                                  <td>
                                    <div class="d-flex align-items-center list-action">
                                      <a href="{{ route('feecollections.show',$fee->id) }}" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" ><i class="ri-eye-line mr-0"></i></a>
                                      <a href="{{ route('feecollections.edit',$fee->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>
                                      <button class="badge bg-warning mr-2 border-0" data-toggle="modal" data-target=".bd-example-modal-sm" title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>

                                      <div class="modal fade bd-example-modal-sm" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                           <div class="modal-content">
                                              <div class="modal-body">
                                                 <h5 class="text-center">Are you sure!</h5>
                                              </div>
                                              <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                  <form action="{{ route("feecollections.destroy",$fee->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">Delete</button>
                                                  </form>
                                              </div>
                                           </div>
                                        </div>
                                     </div>

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
