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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-danger"><i class="ri-home-4-line mr-1 float-left"></i>Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="text-danger">User List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
                                    </ol>
                                </nav>

                                <h4 class="mb-3">Create a User</h4>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4">
                      <div class="card">
                         <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">Add New User</h4>
                            </div>
                         </div>
                         <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf

                               <div class="form-group">
                                  <div class="crm-profile-img-edit position-relative">
                                     <img class="crm-profile-pic rounded avatar-100" src="{{ asset('backend/assets') }}/images/user/11.png" alt="profile-pic" id="image">
                                     <div class="crm-p-image bg-primary">
                                        <i class="las la-pen upload-button"></i>
                                        <input class="file-upload" type="file" id="imgInp"  name="image" accept="image/*">
                                     </div>
                                  </div>
                               <div class="img-extension mt-3">
                                  <div class="d-inline-block align-items-center">
                                        <span>Only</span>
                                     <a href="javascript:void();">.jpg</a>
                                     <a href="javascript:void();">.png</a>
                                     <a href="javascript:void();">.jpeg</a>
                                     <span>allowed</span>
                                  </div>
                               </div>
                               </div>
                               <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="custom-select" required="" id="role" name="role">
                                   <option value="">Open this select menu</option>
                                   @foreach($roles as $role)
                                   <option value="{{$role->name}}">{{ $role->name }}</option>
                                  @endforeach
                                </select>
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                             </div>
                         </div>
                      </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                      <div class="card">
                         <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                               <h4 class="card-title">New User Information</h4>
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
                            <div class="new-user-info">
                                  <div class="row">
                                     <div class="form-group col-md-6">
                                        <label for="fname">Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Name" name="name">
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="mobno">Mobile Number:</label>
                                        <input type="text" class="form-control" id="mobno" placeholder="Mobile Number" name="phone">
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="add1">Address</label>
                                        <input type="text" class="form-control" id="add1" placeholder=" Address " name="address">
                                     </div>
                                  </div>
                                  <hr>
                                  <h5 class="mb-3">Security</h5>
                                  <div class="row">
                                     <div class="form-group col-md-6">
                                        <label for="pass">Password</label>
                                        <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="rpass">Repeat Password</label>
                                        <input type="password" class="form-control" id="rpass" placeholder="Repeat Password " name="password_confirm">
                                     </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Add New User</button>
                               </form>
                            </div>
                         </div>
                      </div>
                </div>
             </div>
            <!-- Page end  -->
        </div>
      </div>
    </div>

    <script>
        const imgInp = document.getElementById('photo'); // Assuming 'photo' is the id of your file input element
        const image = document.getElementById('image'); // Assuming 'image' is the id of your target <img> element

        // imgInp.onchange = evt => {
        //     const [file] = imgInp.files;
        //     if (file) {
        //         image.src = URL.createObjectURL(file);
        //     }
        // };
        console.log(image);
    </script>



  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>
