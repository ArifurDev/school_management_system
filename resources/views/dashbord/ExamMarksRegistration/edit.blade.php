<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Exam Schedule Edit</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('exammarksregistrations.index') }}" class="text-danger">Marks Registrations</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Marks Registration Edit</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header d-flex justify-content-between">
                          <div class="header-title">
                              <h4 class="card-title">Exams Schedules Edit</h4>
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
                          <form action="{{ route('exammarksregistrations.update',$exammarksregistration->id) }}" method="POST" data-toggle="validator" novalidate="true">
                              @csrf
                              @method('put')
                              <div class="row">  
                                  <div class="col-md-4">                      
                                    <div class="form-group">
                                        <label for="exams">Exam</label>
                                        <select class="custom-select" id="exams" name="exam_id">
                                            <option value=" " >Please Select</option>    
                                            @foreach ($exams as $exam)
                                            <option @selected($exammarksregistration->exam_id == $exam->id) value="{{ $exam->id }}" >{{ $exam->exam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-md-4">                      
                                    <div class="form-group">
                                        <label>Home Work</label>
                                        <input type="number" min="0" class="form-control" required=""  name="home_work" value="{{ $exammarksregistration->home_work }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>   
                                <div class="col-md-4">                      
                                    <div class="form-group">
                                        <label>Class Work</label>
                                        <input type="number" min="0" class="form-control" required=""  name="class_work" value="{{ $exammarksregistration->class_work }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>   
                                <div class="col-md-4">                      
                                    <div class="form-group">
                                        <label>Exam</label>
                                        <input type="number" min="0" class="form-control" required=""  name="exam" value="{{ $exammarksregistration->exam }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>   
                                
   
                              </div>                            
                              <button type="submit" class="btn btn-primary mr-2 disabled">Update Marks</button>
                          </form>
                      </div>
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