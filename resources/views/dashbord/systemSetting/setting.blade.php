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
                            <form class="form-horizontal m-2 col-md-8" action="{{ route('site-configurations.update',$config->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                   <label class="control-label col-sm-3 align-self-center" for="Name">Site Name:</label>
                                   <div class="col-sm-6">
                                      <input type="text" class="form-control" id="Name" placeholder="Enter Site Name" value="{{ $config->site_name ?? '' }}" name="site_name">
                                   </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="logo">Site Logo:</label>
                                    <div class="custom-file col-sm-6 ml-3">
                                       <input type="file" class="custom-file-input" id="image" name="site_logo">
                                       <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                 </div>

                                 <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center" for="Description">Site Description:</label>
                                    <div class="col-sm-6">
                                       <textarea class="form-control" id="Description" placeholder="Enter Site Description" style="height: 110px;" name="site_description">{{ $config->site_description ?? '' }}</textarea>
                                    </div>
                                 </div>

                                <div class="form-group">
                                   <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                             </form>
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
