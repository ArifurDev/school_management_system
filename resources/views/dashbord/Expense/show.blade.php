<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Dashbord</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}" class="text-danger">Expense List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Expense Show</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height print rounded">
                        <div class="card-header d-flex justify-content-between bg-primary header-invoice">
                              <div class="iq-header-title">
                                 <h4 class="card-title mb-0">Invoice#1234567</h4> <!--set name -->
                              </div>
                              <div class="invoice-btn">
                                 <a href="{{ route('expens.download',['expense'=>$expense->id]) }}" class="btn btn-primary-dark"><i class="las la-file-download"></i>PDF</a>
                              </div>
                        </div>
                        <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-12">                                  
                                    <img src="{{ asset('backend') }}/assets/images/logo.png" class="logo-invoice img-fluid mb-3"><!--set image -->
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="table-responsive-sm">
                                          <table class="table">
                                             <thead>
                                                <tr>
                                                      <th scope="col">Name</th>
                                                      <th scope="col">Phone</th>
                                                      <th scope="col">Expens Type</th>
                                                      <th scope="col">Amount</th>
                                                      <th scope="col">Status</th>
                                                      <th scope="col">Due</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                      <td>{{ $expense->name }}</td>
                                                      <td>{{ $expense->phone }}</td>
                                                      <td>
                                                        <span class="mt-2 badge badge-pill border border-primary text-primary">{{ $expense->expens_type }}</span>
                                                      </td>
                                                      <td>{{ $expense->amount }}</td>
                                                      <td>
                                                        <span class="badge @if ($expense->status == 'paid') badge-primary @else badge-danger @endif">{{ $expense->status }}</span>
                                                      </td>
                                                      <td>
                                                        @if ($expense->due == null)
                                                          <span class="mt-2 badge badge-pill badge-success"> Paid</span>
                                                        @else
                                                          {{ $expense->due }}
                                                        @endif
                                                    </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                    </div>
                                 </div>
                              </div>

                              <div class="row">
                                 <div class="col-sm-12">
                                    <b class="text-danger">Notes:</b>
                                    <p class="mb-0">{{ $expense->description }}</p>
                                 </div>

                                 <div class="d-flex w-100 mt-2 p-3 justify-content-between">
                                    <span>Date : {{ $expense->date }}</span>
                                    <span> Submit Date : {{ $expense->created_at }}</span>
                                 </div>

                              </div>                           
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