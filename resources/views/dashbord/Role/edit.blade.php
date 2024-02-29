<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Role Edit</title>

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
                                   <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" class="text-danger">Role List</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                                </ol>
                             </nav>

                            <h4 class="mb-3">Edit Role</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form action="{{ route('roles.update',$role->id) }}" method="POST">
                      @csrf
                      @method("PUT")
                        <div class="form-group">
                            <label for="exampleInputText">Role name</label>
                           <input type="text" class="form-control" id="exampleInputText" value="{{ $role->name }}" name="name">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                     </form>

                </div>
            </div>
            {{-- show assine roles --}}
            @if ($role->permissions)
               @foreach ($role->permissions as $role_permission)
                <span class="mt-2 badge badge-pill border border-secondary text-secondary">{{ $role_permission->name }}
                      <form action="{{ route('permissions.revok',[$role->id,$role_permission->id]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                          <button class="badge bg-warning mr-2 border-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                      </form>
                </span>
               @endforeach
            @endif

            {{-- assine permissons --}}
            <div class="row mt-2">
              <div class="col-lg-12">
                  <form action="{{ route('permissions.attach',$role->id) }}" method="POST">
                    @csrf
                    <div class="form-group p-3">
                        {{-- <label for="permissions">Permissions</label>
                        <select class="form-control mb-3" id="permissions" name="permission">
                           @foreach ($permissions as $permission)
                              <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                           @endforeach
                        </select> --}}

                        {{-- check  all --}}
                        <input type="checkbox" id="checkAll">
                        <label for="checkAll">Check All</label><br>

                        @foreach ($permissions as $permission)
                            <input type="checkbox" name="permission[]" value="{{ $permission->name }}" id="{{ $permission->name }}" @if($role->permissions->contains('name', $permission->name))
                                checked
                                @endif>
                            <label for="{{ $permission->name }}">{{ $permission->name }}</label><br>
                        @endforeach

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

    {{-- custom js --}}
     <script>
        document.getElementById('checkAll').addEventListener('click',function(){
            let checkBoxes = document.getElementsByName( 'permission[]' );
            checkBoxes.forEach((box)=>{
                box.checked=this.checked;
            });
        })
     </script>


  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>
