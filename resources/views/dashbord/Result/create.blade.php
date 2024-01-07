<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Result</title>

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
                                       <li class="breadcrumb-item"><a href="{{ route('results.index') }}" class="text-danger">Results</a></li>
                                       <li class="breadcrumb-item active" aria-current="page">Create Result</li>
                                    </ol>
                                 </nav>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Exam Schedule Create</h4>
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
                                <div class="row">   
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="examSelector">Exam</label>
                                            <select class="custom-select" id="examSelector" name="exam">
                                                <option value=" " >Please Select</option>    
         
                                            </select>
                                         </div>
                                    </div> 
  
                                    <div class="col-md-5">
                                      <div class="form-group">
                                          <label for="classSelector">Class</label>
                                          <select class="custom-select"  name="class" id="classSelector">
                                              <option value=" " >Please Select</option>    
                                             
                                          </select>
                                       </div>
                                  </div> 
                                </div>                            
  
                        </div> 
                    </div>
                </div>
  
                  <div class="col-lg-12">
                      <div class="card card-block card-stretch card-height">
                         <div class="card-body">
                            <div class="table-responsive">
                              <form action="" method="post" >
                               @csrf
                                  <table id="example" class="data-table table" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>Subject Name</th>
                                          <th>Exam Date</th>   
                                          <th>Start Time</th>
                                          <th>End Time</th>
                                          <th>Room Number</th>   
                                          <th>Full Marks</th>
                                          <th>Pass Marks</th>
                                      </tr>
                                  </thead>
  
                                  <tbody id="subjectsContainer">
                                      
                                  </tbody>
                                  <input type="hidden" name="exam_id" id="setExamId"> 
                                  <input type="hidden" name="class_id" id="setClassId"> 
                              </table>
                            <button type="submit" class="btn btn-primary ">Create Schedule</button>
                          </form>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>


            </div>
        </div>
    </div>



    {{-- js --}}
    @include('dashbord.layouts.js')
</body>

</html>
