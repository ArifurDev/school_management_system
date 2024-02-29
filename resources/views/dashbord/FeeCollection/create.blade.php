<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Fee Collection</title>

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
                                   <li class="breadcrumb-item"><a href="{{ route('feecollections.index') }}" class="text-danger">Fees Collection List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Student Fee Collection</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Fee Collection</h4>
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
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="card-body p-0 mt-lg-2 mt-0">
                                        <img class="avatar-100 rounded " src="{{ asset('upload/images/'.$student_info->image) }}" alt="User Image">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-body p-0 mt-lg-2 mt-0">
                                        <h6 class="mb-3">Name</h6>
                                        <p class="mb-0 mr-4">{{ $student_info->name }}</p>
                                    </div>

                                    <div class="card-body p-0 mt-lg-2 mt-0">
                                        <h6 class="mb-3">Section</h6>
                                        <p class="mb-0 mr-4">{{ $student_info->section }}</p>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="card-body p-0 mt-lg-2 mt-0">
                                        <h6 class="mb-3">Email</h6>
                                        <p class="mb-0 mr-4">{{ $student_info->email }}</p>
                                    </div>

                                    <div class="card-body p-0 mt-lg-2 mt-0">
                                        <h6 class="mb-3">Class</h6>
                                        <p class="mb-0 mr-4">{{ $student_info->classes->class_name }}</p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-body p-0 mt-lg-2 mt-0">
                                        <h6 class="mb-3">Phone</h6>
                                        <p class="mb-0 mr-4">{{ $student_info->phone }} </p>
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <form action="{{ route('student.feeStore',$student_info->id) }}" method="POST" data-toggle="validator" novalidate="true">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="expense">Expense Type</label>
                                            <select class="custom-select" id="expense" name="expense_type">
                                                <option value=" " >Please Select</option>
                                                <option value="Exam" >Exam</option>
                                                <option value="Class Test">Class Test</option>
                                                <option value="Monthly Fee">Monthly Fee</option>
                                                <option value="Others">Others</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" min="0" class="form-control" placeholder="Enter Amount"  required=""  name="amount">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Due</label>
                                            <input  type="number" min="0" class="form-control" placeholder="Enter Due Amount" name="due">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" required="" name="date">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control" id="horizontalTextarea" rows="1" placeholder="Textarea" required="" name="description"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2 disabled">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
