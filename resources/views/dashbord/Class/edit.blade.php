<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>class Edit</title>

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
                                   <li class="breadcrumb-item"><a href="{{ route('classes.index') }}" class="text-danger">Class List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Class Edit</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Class Edit</h4>
                        </div>

                    </div>

                    <form action="{{ route('classes.update',$class->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row d-flex justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="exampleInputText">Class name</label>
                               <input type="text" class="form-control" id="exampleInputText" name="class_name" placeholder="Enter a new class" value="{{ $class->class_name }}">

                                @error('class_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="teachers">Head Teachers *</label>
                                <select class="form-control mb-3" name="head_teacher_id" id="teachers">
                                    @foreach ($head_teachers as $head_teacher)
                                      <option @selected($head_teacher->id == $class->head_teacher_id) value="{{ $head_teacher->id }}">{{ $head_teacher->name }}</option>
                                    @endforeach
                                </select>


                                @error('head_teacher_id')
                                 <span class="text-danger">{{ $message }}</span>
                                @enderror
                             </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                     </form>
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
