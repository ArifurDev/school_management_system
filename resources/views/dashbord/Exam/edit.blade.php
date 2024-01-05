<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Exam Edit</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('exams.index') }}" class="text-danger">Exam All</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Exam Edit</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header d-flex justify-content-between">
                          <div class="header-title">
                              <h4 class="card-title">Edit Exam</h4>
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
                          <form action="{{ route('exams.update',$exam->id) }}" method="POST" data-toggle="validator" novalidate="true">
                              @csrf
                              @method('put')
                              <div class="row"> 
                                  <div class="col-md-7">                      
                                      <div class="form-group">
                                          <label>Exam</label>
                                          <input type="text" class="form-control" required="" placeholder="Enter Exam Name" name="exam" value="{{ $exam->exam }}">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>    
                                  <div class="col-md-5">
                                      <div class="form-group">
                                          <label for="expense">Status</label>
                                          <select class="custom-select" id="expense" name="status">
                                              <option value=" " >Please Select</option>    
                                              <option @selected($exam->status == "Show") value="Show" >Show</option>
                                              <option @selected($exam->status == "Hidden") value="Hidden">Hidden</option>
                                          </select>
                                       </div>
                                  </div> 
                              </div>                            
                              <button type="submit" class="btn btn-primary mr-2 disabled">Update Exam</button>
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