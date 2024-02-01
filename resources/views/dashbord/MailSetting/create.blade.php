<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>env mail setting</title>
      
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
                                   <li class="breadcrumb-item"><a href="{{ route('mailsettings.index') }}" class="text-danger">Add Env</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">set env Mail</li>
                                </ol>
                             </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">set env Mail</h4>
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
                            <form action="{{ route('mailsettings.store') }}" method="POST" data-toggle="validator" novalidate="true">
                                @csrf
                                <div class="row"> 
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Mail Transport</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail Transport" name="mail_transport" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mail Host</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail Host" name="mail_host" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Mail Port</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail Port" name="mail_port" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mail Username</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail Username" name="mail_username" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Mail Passwor</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail Password" name="mail_password" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mail Encryption</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail Encryption" name="mail_encryption" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Mail From</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail From" name="mail_from" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Mail From Name</label>
                                            <input type="text" class="form-control" required="" placeholder="Mail From Name" name="mail_from_name" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control mb-3" name="status">
                                                <option selected="">Select Status</option>
                                                <option value="0">Hidden</option>
                                                <option value="1">Active</option>
                                             </select>
                                             <div class="help-block with-errors"></div>
                                        </div>
                                    </div>                                   
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2 disabled">Submit</button>
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