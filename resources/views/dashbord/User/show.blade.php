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
            <div class="container-fluid">

               <div class="row d-flex justify-content-start bg-light rounded">
                  <div class="col-lg-2 p-1 ">
                    @if ($user->image)
                    <img class="avatar-100 rounded " src="{{ asset('upload/images/'.$user->image) }}" alt="profile-pic" id="image">
                    @else
                    <img class="avatar-100 rounded " src="{{ asset('backend/assets') }}/images/user/10.jpg" alt="profile-pic" id="image">
                    @endif
                  </div>
                  <div class="col-lg-8 p-1">
                      <h2>{{ $user->name }}</h2>
                      <p>{{ $user->bio ?? 'not available' }}</p>
                  </div>
                  <div class="col-lg-2  pt-4 mb-1">
                      <div class="d-flex align-items-center m-0 list-action">
                          <a href="{{ route('users.edit',$user->id) }}" class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line mr-0"></i></a>

                          <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                              @csrf
                              @method("DELETE")
                              <button class="badge bg-warning mr-2 border-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                          </form>
                      </div>
                  </div>
              </div>


              <div class="row bg-light rounded mt-3 p-3" title="general info">
               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Name</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->name }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>


               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Gender</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->gender }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>

               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Father's Name</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->father_name }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>

               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Mother's Name</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->mother_name }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>

           <div class="col-lg-4 col-md-6 col-sm-6">
               <div class="card bg-white">
                  <div class="card-body">
                     <h5 class="card-title font-size-14">Religion</h5>
                     <blockquote class="blockquote mb-0">
                        <footer class="blockquote-footer font-size-15">{{ $user->religion }} <cite title="Source Title" class="text-white"></cite></footer>
                     </blockquote>
                  </div>
               </div>
            </div>

               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Date Of Birth</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->date_of_birth }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>

               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">E-mail</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->email }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>


               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Address</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->address }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>

               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Phone</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15">{{ $user->phone }} <cite title="Source Title" class="text-white"></cite></footer>
                         </blockquote>
                      </div>
                   </div>
                </div>

               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="card bg-white">
                      <div class="card-body">
                         <h5 class="card-title font-size-14">Blood</h5>
                         <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer font-size-15" >{{ $user->blood }} <cite title="Source Title" class="text-white"></cite></footer>
                           </blockquote>
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
