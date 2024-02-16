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
                             <form action="{{ route('students.update',$student->id) }}" method="POST"  enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                                <div class="row">
                                   <div class="form-group col-md-4">
                                      <label for="fname">Full Name</label>
                                      <input type="text" class="form-control" id="fname" placeholder="Full Name" name="full_name" value="{{ $student->name }}">
                                   </div>
                                   <div class="form-group col-md-4">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="Email" placeholder="Email" name="email" value="{{ $student->email }}">
                                 </div>
                                   <div class="form-group col-md-4">
                                      <label for="Gender">Gender</label>
                                      <select class="form-control mb-3" id="Gender" name="gender">
                                        <option @selected($student->gender == "Male") value="Male" >Male</option>
                                        <option @selected($student->gender == "Female") value="Female">Female</option>
                                        <option @selected($student->gender == "Others") value="Others">Others</option>
                                     </select>
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="add2">Date of Birth</label>
                                      <input type="date" class="form-control" id="add2" placeholder="Street Address 2" name="date_of_birth" value="{{ $student->date_of_birth }}">
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="Blood">Blood Group</label>
                                      <select class="form-control mb-3" id="Blood" name="blood">
                                        <option @selected($student->blood == "O−") value="O−">O−</option>
                                        <option @selected($student->blood == "O+") value="O+">O+</option>
                                        <option @selected($student->blood == "A-") value="A-">A-</option>
                                        <option @selected($student->blood == "A+") value="A+">A+</option>
                                        <option @selected($student->blood == "B-") value="B-">B-</option>
                                        <option @selected($student->blood == "B+") value="B+">B+</option>
                                        <option @selected($student->blood == "AB-") value="AB-">AB-</option>
                                        <option @selected($student->blood == "AB+") value="AB+">AB+</option>
                                     </select>
                                     </div>
                                   <div class="form-group col-md-4">
                                    <label for="father's">Father's Name</label>
                                    <input type="text" class="form-control" id="father's" placeholder="Father's Name" name="father_name" value="{{ $student->father_name }}">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="Mother's">Mother's Name</label>
                                    <input type="text" class="form-control" id="Mother's" placeholder="Mother's Name" name="mother_name" value="{{ $student->mother_name }}">
                                 </div>
                                   <div class="form-group col-md-4">
                                      <label for="Religion">Religion</label>
                                      <select class="form-control mb-3" id="Religion" name="religion">
                                        <option @selected($student->religion == "Islam") value="Islam">Islam</option>
                                        <option @selected($student->religion == "Christianity") value="Christianity">Christianity</option>
                                        <option @selected($student->religion == "Hinduism") value="Hinduism">Hinduism</option>
                                        <option @selected($student->religion == "Others") value="Others">Others</option>
                                     </select>
                                    </div>
                                   <div class="form-group col-md-4">
                                      <label for="Phone">Phone</label>
                                      <input type="text" class="form-control"  id="Phone" placeholder="Phone" name="phone" maxlength="11" value="{{ $student->phone }}">
                                   </div>
                                   <div class="form-group col-md-4">
                                      <label for="address">Address</label>
                                      <input type="text" class="form-control" id="Addresh" placeholder="Address" name="address" value="{{ $student->address }}">
                                   </div>
                                   <div class="form-group col-md-4">
                                    <label for="class">Class</label>
                                    <select class="form-control mb-3 " id="class" name="class_id">
                                       @foreach ($Classes as $classes)
                                          <option @selected($student->class_id == $classes->id) value="{{ $classes->id }}">{{ $classes->class_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group col-md-4">
                                  <label for="Section">Section</label>
                                  <input type="text" class="form-control" id="Section" placeholder="2023-2024" name="section" value="{{ $student->section }}">
                                 </div>

                                 <div class="form-group col-md-4">
                                    <label for="Group">Group</label>
                                    <input type="text" class="form-control" id="Group" placeholder="Group" name="group" value="{{ $student->group }}">
                                 </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-sm-6 col-6 m-1">
                                    <textarea class="form-control" id="horizontalTextarea" rows="3" placeholder="BIO" style="height: 168px;" name="bio">{{ $student->bio }}</textarea>
                                 </div>
                                 <div class="form-group">
                                    <div class="crm-profile-img-edit position-relative">
                                        @if ($student->image)
                                        <img class="crm-profile-pic rounded avatar-100" src="{{ asset('upload/images/'.$student->image) }}" alt="profile-pic" id="image">
                                        @else
                                        <img class="crm-profile-pic rounded avatar-100" src="{{ asset('backend/assets') }}/images/user/10.jpg" alt="profile-pic" id="image">
                                        @endif
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
