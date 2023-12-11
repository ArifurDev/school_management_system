<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Student Promotion</title>
      
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
                                   <li class="breadcrumb-item active" aria-current="page">Student Promotion</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Student Promotion</h4>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ route('findPromotion.students') }}" method="POST">
                    @csrf
                    <div class="card-body d-flex flex-wrap align-items-center justify-content-between">
                            <div class="form-group col-lg-4 ">
                                <label for="class">Class</label>
                                <select class="form-control mb-3 {{ $errors->has('class') ? 'border border-danger' : '' }}" id="class" name="class">
                                   <option value="">--Select Class--</option>
                                   @foreach ($classes as $class)
                                   <option value="{{ $class->id }}">{{ $class->class_name }}</option>                                  
                                   @endforeach
                                </select>

                             </div>

    
                             <div class="form-group col-lg-4">
                                <label for="session">Session</label>
                                <select class="form-control mb-3 {{ $errors->has('session') ? 'border border-danger' : '' }}" id="session" name="session">
                                   <option value="">--Select Session--</option>
                                   @foreach ($sections as $section)
                                   <option value="{{ $section }}">{{ $section }}</option>                                  
                                   @endforeach
                                </select>
                             </div>
    
                             <div class="form-group col-lg-3">
                                <label for="group">Group</label>
                                <select class="form-control mb-3 {{ $errors->has('group') ? 'border border-danger' : '' }}" id="group" name="group">
                                   <option value="">--Select Group--</option>
                                   @foreach ($groupes as $group)
                                   <option value="{{ $group }}">{{ $group }}</option>                                  
                                   @endforeach
                                </select>
                             </div>
                             <button type="submit" class="btn btn-primary ">Find</button>
                        
                    </div>
                </form>
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