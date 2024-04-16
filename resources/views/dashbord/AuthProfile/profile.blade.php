<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>

    {{-- css --}}
    @include('dashbord.layouts.css')
    <!--custom style-->
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
        @include('dashbord.layouts.top_nav');


        <div class="content-page">
            {{-- main page --}}
            <div class="container-fluid">
                <div class="row d-flex justify-content-start bg-light rounded">
                    <div class="col-lg-2 p-1 ">

                            <img class="avatar-100 rounded " src="{{ asset('upload/images/'.$student->image) }}" alt="User Image">
                    </div>
                    <div class="col-lg-8 p-1">
                        <h2>{{ $student->name }}</h2>
                        <p>{{ $student->bio }}</p>
                    </div>

                </div>


                <div class="row bg-light rounded mt-3 p-3" title="general info">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Name</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->name }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>


                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Gender</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->gender }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Father's Name</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->father_name }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Mother's Name</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->mother_name }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card bg-white">
                       <div class="card-body">
                          <h5 class="card-title font-size-14">Religion</h5>
                          <blockquote class="blockquote mb-0">
                             <footer class="blockquote-footer font-size-15">{{ $student->religion }} <cite title="Source Title" class="text-white"></cite></footer>
                          </blockquote>
                       </div>
                    </div>
                 </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Date Of Birth</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->date_of_birth }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">E-mail</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->email }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Admission Date</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->created_at }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Class</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->classes->class_name }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Section</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->section }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Address</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->address }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Phone</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15">{{ $student->phone }} <cite title="Source Title" class="text-white"></cite></footer>
                              </blockquote>
                           </div>
                        </div>
                     </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card bg-white">
                           <div class="card-body">
                              <h5 class="card-title font-size-14">Blood</h5>
                              <blockquote class="blockquote mb-0">
                                 <footer class="blockquote-footer font-size-15" >{{ $student->blood }} <cite title="Source Title" class="text-white"></cite></footer>
                                </blockquote>
                           </div>
                        </div>
                     </div>

                </div>


                <div class="row bg-light rounded mt-3 p-3">
                    <div class="col-lg-4 col-sm-6 col-md-6 text-center">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title">Attendance</h6>
                              <span class="btn mb-1 btn-success">
                                Present <span class="badge badge-light ml-2">{{ $presentCount }}</span>
                               </span>
                               <span class="btn mb-1 btn-primary">
                                Late <span class="badge badge-light ml-2">{{ $lateCount }}</span>
                               </span>
                               <span class="btn mb-1 btn-danger">
                                Absent <span class="badge badge-light ml-2">{{ $apsentCount }}</span>
                               </span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-md-6 text-center">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title">Monthly Payment Status</h6>

                              @if ($monthlyFee)
                                  @if ($monthlyFee->due)
                                    <p class="card-text btn mb-1 bg-danger-light">due</p>
                                  @else
                                    <p class="card-text btn mb-1 bg-success-light">paid</p>
                                  @endif
                              @else
                                    <p class="card-text btn mb-1 bg-danger-light  badge badge-pill border border-warning text-warning">Unpaid</p>
                              @endif

                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-md-6 text-center">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Result</h4>
                              <div class="justify-content-between">
                                <p class="mt-2 badge badge-primary">GPA {{ $Grade_Calculator[1] ?? 'N/A' }}</p>
                                <p class="mt-2 badge badge-success">Grade {{ $Grade_Calculator[0] ?? 'N/A' }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                </div>

                <div class="row bg-light rounded mt-3 p-3">
                  <div class="col-lg-12">
                     <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                           <div class="table-responsive">
                             <table id="example" class="data-table table" style="width:100%">
                               <thead>
                                   <tr>
                                       <th>SL</th>
                                       <th>Expense</th>
                                       <th>Amount </th>
                                       <th>Due</th>
                                       <th>Description</th>
                                       <th>Date</th>
                                       <th>Submition Date</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($allPayments as $Payment)
                                <tr>
                                   <td>{{ $loop->iteration  }}</td>
                                   <td>{{ $Payment->expense ?? "Not available" }}</td>
                                   <td>{{ $Payment->amount ?? "Not available"}}</td>
                                   <td>{{ $Payment->due ?? "Paid"}}</td>
                                   <td>{{ $Payment->description ?? "Not available" }}</td>
                                   <td>{{ $Payment->date ?? "Not available" }}</td>
                                   <td>{{ $Payment->created_at ?? "Not available"  }}</td>
                                </tr>
                                @endforeach

                               </tbody>
                           </table>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>


                <div class="row bg-light rounded mt-3 p-3">
                  <div class="col-lg-12">
                     <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                           <div class="table-responsive">
                             <table id="example" class="data-table table" style="width:100%">
                               <thead>
                                   <tr>
                                       <th>SL</th>
                                       <th>Exam</th>
                                       <th>Subject </th>
                                       <th>Start Time</th>
                                       <th>End Time</th>
                                       <th>Room Number</th>
                                       <th>Full Marks</th>
                                       <th>Pass Marks</th>
                                       <th>Exam Date</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($ExamSchedules as $ExamSchedule)
                                <tr>
                                   <td>{{ $loop->iteration  }}</td>
                                   <td>{{ $ExamSchedule->exams->exam ?? " " }}</td>
                                   <td>{{ $ExamSchedule->subject->subject_name ?? " "}}</td>
                                   <td>{{ $ExamSchedule->start_time ?? " " }}</td>
                                   <td>{{ $ExamSchedule->end_time ?? " " }}</td>
                                   <td>{{ $ExamSchedule->room_number ?? " "  }}</td>
                                   <td>{{ $ExamSchedule->full_marks ?? " " }}</td>
                                   <td>{{ $ExamSchedule->pass_marks ?? " "  }}</td>
                                   <td>{{ $ExamSchedule->exam_date ?? " "}}</td>
                                </tr>
                                @endforeach

                               </tbody>
                           </table>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
                <!-- Page end  -->
            </div>
        </div>
    </div>

    <!--datatable-->
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });

    </script>

    {{-- add  remove field js --}}

    @include('dashbord.layouts.js')
</body>

</html>
