<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Exam Result</title>
      
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
            <div class="col-sm-12 text-center">
                <h3>{{ $exam->exam }}</h3>
            </div>   
           </div>
           <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div class="style-text text-left ml-3">
                        <p class="mb-2">Name: {{ $student->name }}</p>
                        <p class="mb-2">Father's Name: {{ $student->father_name }}</p>
                        <p class="mb-2">Mother's Name: {{ $student->mother_name }}</p>
                        <p class="mb-2">Religion: {{ $student->religion }}</p>
                        <p class="mb-2">Class: {{ $class->class_name }}</p>
                        <p class="mb-2">Date Of Birth: {{ $student->date_of_birth }}</p>
                    </div>

                    <div>
                        <img src="{{ asset('storage/upload/users_image/'.$student->image ?? 'user/10.jpg' ) }}" class="style-img img-fluid m-auto p-3" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Letter Grade</th>
                            <th>Grade Point</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($MarkSheet as $Mark_sheet)
                        <tr>
                            <td>{{ $Mark_sheet['subject_code'] }}</td>
                            <td>{{ $Mark_sheet['subject_name'] }}</td>
                            <td>{{ $Mark_sheet['Grade'] }}</td>
                            <td>{{ $Mark_sheet['gpa'] }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <td>
                                   <span> Total GPA :
                                    
                                   </span>
                                  <span>Average Grade:
                                    
                                  </span>          
                                </td>
                            </td>
                        </tr>
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