<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Exam Marks Edit</title>

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
                                   <li class="breadcrumb-item"><a href="{{ route('exammarksregistrations.create') }}" class="text-danger">Marks Registration Insert</a></li>
                                   <li class="breadcrumb-item"><a href="{{ route('exammarksregistrations.index') }}" class="text-danger">Marks Registration</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Exam Marks Edit</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    {{-- show error message --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                       <ul>
                             @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                             @endforeach
                       </ul>
                    </div>
                    @endif

                    <form action="{{ route('exammarksregistrations.update',$exammarksregistration->id) }}" method="POST" data-toggle="validator" novalidate="true">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class Work</label>
                                    <input type="number" min="0" class="form-control" placeholder="Class Work"  required=""  name="class_work" value="{{ $exammarksregistration->class_work }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Home Work</label>
                                    <input  type="number" min="0" class="form-control" placeholder="Home Work" name="home_work" value="{{ $exammarksregistration->home_work }}" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marks</label>
                                    <input type="number" min="0" class="form-control" placeholder="Marks"  required="" name="mark" value="{{ $exammarksregistration->mark }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2 disabled">Update</button>
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
