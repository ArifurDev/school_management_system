<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Class</title>

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
                                   <li class="breadcrumb-item active" aria-current="page">Class</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Class List</h4>
                        </div>

                          <!-- Small modal -->
                     <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="las la-plus mr-3"></i>Add Class</button>
                     <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                           <div class="modal-content">

                              <div class="modal-body">
                                <form action="{{ route('classes.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputText">Class name</label>
                                       <input type="text" class="form-control" id="exampleInputText" name="class_name" placeholder="Enter a new class">

                                        @error('class_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="teachers">Head Teachers *</label>
                                        <select class="form-control mb-3" name="head_teacher_id" id="teachers">
                                            @foreach ($head_teachers as $head_teacher)
                                              <option value="{{ $head_teacher->id }}">{{ $head_teacher->name }}</option>
                                            @endforeach
                                        </select>
                                     </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                    </div>
                </div>

                {{-- show classes information --}}
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>ls</th>
                                <th>Class</th>
                                <th>Teacher Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($classes as $classes)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classes->class_name }}</td>
                                    <td>{{ App\Models\User::find($classes->head_teacher_id)->name ??  'Not assigned'  }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a href="{{ route('classes.show',$classes->id) }}" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" ><i class="ri-eye-line mr-0"></i></a>
                                            <a href="{{ route('classes.edit',$classes->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>

                                            <form action="{{ route('classes.destroy',$classes->id) }}" method="POST">
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
            <!-- Page end  -->
        </div>
      </div>
    </div>

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>
