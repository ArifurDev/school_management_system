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
                                   <li class="breadcrumb-item active" aria-current="page">Student Fees Update</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>
                <!--maine section-->

                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height print rounded">
                        <div class="card-header d-flex justify-content-between bg-primary header-invoice">
                              <div class="iq-header-title">
                                 <h4 class="card-title mb-0">Invoice#1234567</h4> <!--set name -->
                              </div>
                              <div class="invoice-btn">
                                 <button onclick="printPage()" class="btn btn-primary-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                  </svg>Print</button>

                                 <a href="{{ route('feeCollection.download',$feecollection->id) }}" class="btn btn-primary-dark"><i class="las la-file-download"></i>PDF</a>
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
                                                      <th scope="col">Due</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                      <td>{{ $feecollection->User->name }}</td>
                                                      <td>{{ $feecollection->User->phone }}</td>
                                                      <td>
                                                        <span class="mt-2 badge badge-pill border border-primary text-primary">{{ $feecollection->expense }}</span>
                                                      </td>
                                                      <td>{{ $feecollection->amount }}</td>
                                                      <td>
                                                        @if ($feecollection->due == null)
                                                          <span class="mt-2 badge badge-pill badge-success"> Paid</span>
                                                        @else
                                                          {{ $feecollection->due }}
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
                                    <p class="mb-0">{{ $feecollection->description }}</p>
                                 </div>

                                 <div class="d-flex w-100 mt-2 p-3 justify-content-between">
                                    <span> Submit Date : {{ $feecollection->created_at }}</span>
                                 </div>

                              </div>                           
                        </div>
                     </div>
                </div>

                <!--maine section end-->
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