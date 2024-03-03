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
            <div class="col-lg-12 d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div class="col-md-6 style-text text-left ml-3">
                    <p class="mb-2">Name: {{ $student->name }}</p>
                    <p class="mb-2">Father's Name: {{ $student->father_name }}</p>
                    <p class="mb-2">Mother's Name: {{ $student->mother_name }}</p>
                    <p class="mb-2">Religion: {{ $student->religion }}</p>
                    <p class="mb-2">Class: {{ $class->class_name }}</p>
                    <p class="mb-2">Date Of Birth: {{ $student->date_of_birth }}</p>
                </div>
                <div>
                    <div style="font-size: 1rem">
                        <span>80% to 100% = A+</span><br>
                        <span>70% to 79% = A</span><br>
                        <span>60% to 69% = A-</span><br>
                        <span>50% to 59% = B</span><br>
                        <span>40% to 49% = C</span><br>
                        <span>33% to 39% = D</span><br>
                        <span>0% to 32% = F</span>
                    </div>
                    <img src="{{ asset('upload/images/'.$student->image ?? 'user/10.jpg' ) }}" class="style-img img-fluid m-auto p-3" width="150" alt="image">
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
                    </tbody>
                </table>



                </div>
            </div>
        </div>
        <div class="row m-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Remarks</th>
                        <th scope="col">GPA</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Result</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">{{ $Remarks ?? 'not found' }}</th>
                        <td>{{ $Avarage_Grade_point_calculator[1] ?? 'not found' }}</td>
                        <td>{{  round($totalPercentage,2) }}%</td>
                        <td>{{ $Avarage_Grade_point_calculator[0] ?? 'not found' }}</td>
                        <td></td>
                      </tr>
                      <tr>
                    </tbody>
                  </table>
         </div>
         <div class="row d-flex flex-wrap align-items-center justify-content-between p-5 text-center">
            <div class="col-md-6">Class Teacher</div>
            <div class="col-md-6">Principal</div>
         </div>
         <div class="row d-flex flex-wrap align-items-center justify-content-between p-5 text-center">
            <button type="button" class="btn btn-danger mt-2" onclick="printPage()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                  </svg>
                Print</button>
         </div>
            <!-- Page end  -->
        </div>
      </div>
    </div>


    {{-- js code --}}
    <script>
        const printPage = () =>{
            window.print();
        }
     </script>
  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>
