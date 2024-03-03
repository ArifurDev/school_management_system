<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Exams</title>

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
                                   <li class="breadcrumb-item active" aria-current="page">Exam</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header d-flex justify-content-between">
                          <div class="header-title">
                              <h4 class="card-title">Create Exam</h4>
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
                          <form action="{{ route('exams.store') }}" method="POST" data-toggle="validator" novalidate="true">
                              @csrf
                              <div class="row">
                                  <div class="col-md-7">
                                      <div class="form-group">
                                          <label>Exam</label>
                                          <input type="text" class="form-control" required="" placeholder="Enter Exam Name" name="exam">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="col-md-5">
                                      <div class="form-group">
                                          <label for="expense">Status</label>
                                          <select class="custom-select" id="expense" name="status">
                                              <option value=" " >Please Select</option>
                                              <option value="Show" >Show</option>
                                              <option value="Hidden">Hidden</option>
                                          </select>
                                       </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary mr-2 disabled">Create Exam</button>
                              <button type="reset" class="btn btn-danger">Reset</button>
                          </form>
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
                                      <th>Exam</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                               @foreach ($exams as $exam)
                               <tr>
                                  <td>{{ $loop->iteration  }}</td>
                                  <td>{{ $exam->exam }}</td>
                                  <td>
                                    <span class="badge @if ($exam->status == 'Show') badge-primary @else badge-danger @endif">{{ $exam->status }}</span>
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-center list-action">
                                      <a href="{{ route('exams.edit',$exam->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>
                                      <form action="{{ route('exams.destroy',$exam->id) }}" method="POST">
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
            } );

            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );
     </script>

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>
