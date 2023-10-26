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
                                    <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="text-danger">Student List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admission Student</li>
                                    </ol>
                                </nav>

                                <h4 class="mb-3">Admission Student</h4>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row">
              <div class="col-xl-12 col-lg-8">
                    <div class="card">
                     
                     @if ($errors->any())
                        <div class="alert alert-danger">
                           <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                           </ul>
                        </div>
                     @endif

                       <div class="card-body">
                          <div class="new-user-info">
                             <form action="{{ route('students.store') }}" method="POST"  enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                   <div class="form-group col-md-4">
                                      <label for="fname">First Name</label>
                                      <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name">
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="lname">Last Name</label>
                                      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name">
                                   </div>
                                   <div class="form-group col-md-4">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="Email" placeholder="Email" name="email">
                                 </div>
                                   <div class="form-group col-md-4">
                                      <label for="Gender">Gender</label>
                                      <select class="form-control mb-3" id="Gender" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="add2">Date of Birth</label>
                                      <input type="date" class="form-control" id="add2" placeholder="Street Address 2" name="date_of_birth">
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="Blood">Blood Group</label>
                                      <select class="form-control mb-3" id="Blood" name="blood">
                                        <option value="O−">O−</option>
                                        <option value="O+">O+</option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="AB+">AB+</option>
                                     </select>
                                     </div>
                                   <div class="form-group col-md-4">
                                    <label for="father's">Father's Name</label>
                                    <input type="text" class="form-control" id="father's" placeholder="Father's Name" name="father_name">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="Mother's">Mother's Name</label>
                                    <input type="text" class="form-control" id="Mother's" placeholder="Mother's Name" name="mother_name">
                                 </div>
                                   <div class="form-group col-md-4">
                                      <label for="Religion">Religion</label>
                                      <select class="form-control mb-3" id="Religion" name="religion">
                                        <option value="Islam">Islam</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Others">Others</option>
                                     </select>                                   
                                    </div>
                                   <div class="form-group col-md-4">
                                      <label for="Phone">Phone</label>
                                      <input type="text" class="form-control"  id="Phone" placeholder="Phone" name="phone" maxlength="11">
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="address">Address</label>
                                      <input type="text" class="form-control" id="Addresh" placeholder="Address" name="address">
                                   </div>
                                   <div class="form-group col-md-4">
                                    <label for="class">Class</label>
                                    <select class="form-control mb-3 " id="class" name="class_id">
                                       @foreach ($Classes as $classes)
                                          <option value="{{ $classes->id }}">{{ $classes->class_name }}</option>
                                       @endforeach
                                    </select> 
                                 </div>
                                 <div class="form-group col-md-4">
                                  <label for="Section">Section</label>
                                  <input type="text" class="form-control" id="Section" placeholder="2023-2024" name="section">
                                 </div>
                                 
                                 <div class="form-group col-md-4">
                                    <label for="Group">Group</label>
                                    <input type="text" class="form-control" id="Group" placeholder="Group" name="group">
                                 </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-6 col-6 m-1">
                                    <textarea class="form-control" id="horizontalTextarea" rows="3" placeholder="BIO" style="height: 168px;" name="bio"></textarea>
                                 </div>
                                 <div class="form-group">
                                    <div class="crm-profile-img-edit position-relative">
                                       <img class="crm-profile-pic rounded avatar-100" src="{{ asset('backend/assets') }}/images/user/10.jpg" alt="profile-pic" id="image">
                                       <div class="crm-p-image bg-primary">
                                          <i class="las la-pen upload-button"></i>
                                          <input class="file-upload" type="file" id="photo"  name="image" accept="image/*" onchange="readURL(this)">
                                       </div>
                                    </div>
                                 <div class="img-extension mt-3">
                                    <div class="d-inline-block align-items-center">
                                          <span>Only</span>
                                       <a href="javascript:void();">.jpg</a>
                                       <a href="javascript:void();">.png</a>
                                       <a href="javascript:void();">.jpeg</a>
                                       <span>allowed Image Size Max 2MB</span>
                                    </div>
                                 </div>
                                 </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Add New Student</button>
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

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>