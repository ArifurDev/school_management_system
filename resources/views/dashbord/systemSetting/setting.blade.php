<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Site Configuration</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Site Configuration</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                 </div>


                 <div class="row align-items-center justify-content-center ">
                    <div class="col-lg-12">
                       <div class="card auth-card">
                          <div class="card-body p-0">
                             <div class="d-flex align-items-center auth-content">
                                   <div class="p-3">
                                    <div class="card">
                                        <div class="card-body">
                                           <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                              Lorem Ipsum has been the industry's standard dummy text ever
                                           </p>

                                        </div>
                                     </div>
                                   </div>

                                   <div class="p-3">
                                    <div class="card">
                                        <div class="card-body">
                                           <p class="mb-4">After a month your site will backup automatic.If you click button backup MySQL/project File.
                                           </p>
{{--
                                           <div class="btn-group btn-group-toggle" id="backup">
                                            <a class="button btn button-icon btn-outline-primary" target="_blank" href="{{ route('system.backup',['command'=>'db']) }}">DB</a>
                                            <a class="button btn button-icon bg-primary " target="_blank" href="{{ route('system.backup',['command'=>'file']) }}">File</a>
                                            <a class="button btn button-icon btn-outline-primary" target="_blank" href="{{ route('system.backup',['command'=>'both']) }}">Both</a>
                                           </div> --}}


                                           {{-- <div class="btn-group btn-group-toggle" id="backup">
                                            <a class="button btn button-icon btn-outline-primary" target="_blank" href="" id="db">DB</a>
                                            <a class="button btn button-icon bg-primary " target="_blank" href="" id="files">File</a>
                                            <a class="button btn button-icon btn-outline-primary" target="_blank" href="" id="both">Both</a>
                                           </div> --}}

                                             <form action="{{ route('system.backup') }}" method="post">
                                              @csrf
                                                <div class="form-group">
                                                    <select class="form-control mb-3" id="backup" name="command">
                                                    <option selected="">Open this select Command</option>
                                                    <option value="db">DB</option>
                                                    <option value="files">Files</option>
                                                    <option value="both">Both</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary-dark"><i class="las la-file-download"></i>Backup</button>
                                            </form>


                                        </div>
                                     </div>
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




  @include('dashbord.layouts.js')
  </body>
</html>
