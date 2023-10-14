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

                            <nav aria-label="breadcrumb" >
                                <ol class="breadcrumb ">
                                   <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-danger"><i class="ri-home-4-line mr-1 float-left"></i>Dashbord</a></li>
                                   <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}" class="text-danger">Permission List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Edit Permission</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                      @csrf
                      @method("PUT")
                        <div class="form-group">
                            <label for="exampleInputText">Permission name</label>
                           <input type="text" class="form-control" id="exampleInputText" value="{{ $permission->name }}" name="name">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                     </form>
                   
                </div>
            </div>
             {{-- show assine permission --}}
             @if ($permission->roles)
             @foreach ($permission->roles as $permission_role)
             <span class="mt-2 badge badge-pill border border-secondary text-secondary">{{ $permission_role->name }}              
                   <form action="{{ route('role.revok',[$permission->id,$permission_role->id]) }}" method="POST">
                     @csrf
                     @method("DELETE")                      
                       <button class="badge bg-warning mr-2 border-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                   </form>
             </span>
             @endforeach  
             @endif


             {{-- assine role --}}
            <div class="row mt-2">
              <div class="col-lg-12">
                  <form action="{{ route('role.attach',$permission->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role">Roles</label>
                        <select class="form-control mb-3" id="role" name="role">
                           @foreach ($roles as $role)
                              <option value="{{ $role->name }}">{{ $role->name }}</option>
                           @endforeach
                        </select>
                    </div>
                      <button type="submit" class="btn btn-primary">Assine</button>
                   </form>
                 
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