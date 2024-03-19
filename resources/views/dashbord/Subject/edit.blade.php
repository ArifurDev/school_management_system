<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Subject Edit</title>

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
                                   <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}" class="text-danger">Subject List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Subject Edit</li>
                                </ol>
                             </nav>
                            <h4 class="mb-3">Subject Edit</h4>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                            <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                            </ul>
                    </div>
                @endif

                <form action="{{ route('subjects.update',$Subject->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="row">
                  <div class="form-group col-md-4">
                      <label for="class">Class Teacher*</label>
                       <select class="form-control mb-1 " id="class" name="class_teacher_id">
                               @foreach ($teachers as $id => $name)
                               <option @selected($Subject->class_teacher_id == $id ) value="{{ $id }}">{{ $name }}</option>
                               @endforeach
                           </select>
                          @error('class_teacher_id')
                             <span class="text-danger">{{ $message }}</span>
                          @enderror
                  </div>
                  <div class="form-group col-md-4">
                      <label for="class">Class</label>
                      <select class="form-control mb-1 " id="class" name="classes_id">
                       @foreach ($Classes as $classes)
                          <option @selected($Subject->classes_id == $classes->id) value="{{ $classes->id }}">{{ $classes->class_name }}</option>
                       @endforeach
                    </select>
                   </div>
                   <div class="form-group col-md-4">
                      <label for="total_class">Toatal Class</label>
                      <input type="number" min="0" class="form-control" id="total_class" placeholder="Total Class" name="total_class" value="{{ $Subject->total_class }}">
                   </div>
               </div>

                <div class="row">
                   <div class="form-group col-md-4">
                       <label for="Subject">Subject Name</label>
                       <input type="text" class="form-control"  id="Subject" placeholder="Subject Name" name="subject_name" value="{{ $Subject->subject_name }}">
                    </div>
                    <div class="form-group col-md-4">
                       <label for="Code">Code</label>
                       <input type="text" class="form-control" id="Code" placeholder="Code" name="code" value="{{ $Subject->subject_code }}">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="attendances_marks">Attendances Marks</label>
                      <input type="number" min="0" class="form-control" id="attendances_marks" placeholder="Attendances Marks" name="attendances_marks" value="{{ $Subject->attendances_marks }}">
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

  {{-- add  remove field js --}}

  @include('dashbord.layouts.js')
  </body>
</html>
