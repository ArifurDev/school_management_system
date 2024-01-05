<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Subjects</title>
      
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
                                   <li class="breadcrumb-item active" aria-current="page">Subject List</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Subject List</h4>
                        </div>
                        <a href="{{ route('subjects.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Subject</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>ls</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Code</th>
                                <th>Total Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->classes->class_name }}</td>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>{{ $subject->total_class }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a href="#" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" ><i class="ri-eye-line mr-0"></i></a>
                                            <a href="{{ route('subjects.edit',$subject->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>
                                           
                                            <form action="{{ route('subjects.destroy',$subject->id) }}" method="POST">
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

  {{-- add  remove field js --}}

  @include('dashbord.layouts.js')
  </body>
</html> 