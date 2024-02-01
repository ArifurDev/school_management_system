<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>env List</title>
      
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
                                   <li class="breadcrumb-item active" aria-current="page">Env List</li>
                                </ol>
                             </nav>
                        </div>
                        <a href="{{ route('mailsettings.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Env</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height">
                       <div class="card-body">
                          <div class="table-responsive">
                            <table id="example" class="data-table table" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>SL</th>
                                      <th>Mail Transport</th>   
                                      <th>Mail Host</th>
                                      <th>Mail Port</th>
                                      <th>Mail Username</th>
                                      <th>Mail Password</th>
                                      <th>Mail Encryption</th>
                                      <th>Mail From</th>
                                      <th>Mail From Name</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                               @foreach ($mailLists as $mailList)
                               <tr>
                                  <td>{{ $loop->iteration  }}</td>
                                  <td>{{ $mailList->mail_transport }}</td>
                                  <td>{{ $mailList->mail_host }}</td>
                                  <td>{{ $mailList->mail_port }}</td> 
                                  <td>{{ $mailList->mail_username }}</td>
                                  <td>{{ $mailList->mail_password }}</td>
                                  <td>{{ $mailList->mail_encryption }}</td>
                                  <td>{{ $mailList->mail_from }}</td> 
                                  <td>{{ $mailList->mail_from_name }}</td>
                                  <td>
                                    <span class="badge @if ($mailList->status == '1') badge-primary @else badge-danger @endif">{{ $mailList->status == '1' ? 'Active' : 'Hidden' }}</span>
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-center list-action">
                                      <a href="" class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" ><i class="ri-eye-line mr-0"></i></a>
                                      <a href="" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>
                                     
                                      <form action="" method="POST">
                                          @csrf
                                          @method("DELETE")
                                          <button class="badge bg-warning mr-2 border-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                                      </form>
                                  </div>
                                  </td>
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

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html> 