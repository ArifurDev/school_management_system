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
                <div class="row">
                    <div class="col-lg-12">
                       <div class="card car-transparent">
                          <div class="card-body p-0">
                             <div class="profile-image position-relative">
                                <img src="{{ asset('backend/assets') }}/images/page-img/profile.png" class="img-fluid rounded w-100" alt="profile-image">
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                <div class="row m-sm-0 px-3">            
                   <div class="col-lg-4 card-profile">
                      <div class="card card-block card-stretch card-height">
                         <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                               <div class="profile-img position-relative">

                                @if ($user->image)
                                    <img src="{{ asset('storage/upload/users_image/'.$user->image) }}" class="img-fluid rounded avatar-110" alt="profile-image">
                                @else
                                    <img src="{{ asset('backend/assets/images/user/10.jpg') }}" class="img-fluid rounded avatar-110" alt="profile-image">
                                @endif
                                
                               </div>
                            </div>
                            <h6 class="mb-1">{{ $user->name }}</h6>
                            <p class="mb-2">
                                @foreach ($user->roles as $role)
                                    <span class="mt-2 badge badge-pill border border-success text-dark">{{ $role->name }}</span>
                                @endforeach
                            </p>
                            <p class="mb-2">
                                @if ($user->roles)
                                    @foreach ($user->roles as $role)
                                        @foreach ($role->permissions as $permission)
                                            <span class="mt-2 badge badge-pill border border-dark text-dark">{{ $permission->name }}</span>
                                        @endforeach
                                    @endforeach
                                    @endif
                            </p>
                            <ul class="list-inline p-0 m-0">
                               <li class="mb-2">
                                <?php
                                if (!empty($user->address)) {?>
                                                                     
                                    <div class="d-flex align-items-center">
                                        <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="mb-0">{{ $user->address }}</p>   

                                    </div>
                                <?php
                                }    
                                ?>
                               </li>
                               <li class="mb-2">
                                <?php if (!empty($user->phone)) {?>

                                  <div class="d-flex align-items-center">
                                     <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                     </svg>
                                     <p class="mb-0">{{ $user->phone }}</p>   
                                  </div>

                                <?php
                                }    
                                ?>
                               </li>
                               <li>
                                <?php if (!empty($user->email)) {?>
                                  <div class="d-flex align-items-center">
                                     <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                     </svg>
                                     <p class="mb-0">{{ $user->email }}</p>   
                                  </div>
                                  <?php
                                }    
                                ?>
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-8 card-profile">
                      <div class="card card-block card-stretch card-height">
                         <div class="card-body">
                            <div class="profile-content tab-content">                
                                <div class="row">
                                    <div class="col-lg-6">
                                       <ul class="list-inline p-0 m-0">
                                          <li class="mb-4">
                                             <div class="d-flex align-items-center pt-2">
                                                <img src="{{ asset('backend/assets') }}/images/profile/service/02.png" class="img-fluid mr-3" alt="image">
                                                <div class="ml-3 w-100">
                                                   <div class="media align-items-center justify-content-between">
                                                      <p class="mb-0">Figma</p>
                                                      <h6>85%</h6>
                                                   </div>
                                                   <div class="iq-progress-bar mt-3">
                                                      <span class="iq-progress iq-progress-danger progress-1" data-percent="85" style="transition: width 2s ease 0s; width: 85%;"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="d-flex align-items-center pt-2">
                                                <img src="{{ asset('backend/assets') }}/images/profile/service/03.png" class="img-fluid" alt="image">
                                                <div class="ml-3 w-100">
                                                   <div class="media align-items-center justify-content-between">
                                                      <p class="mb-0">Adobe Photoshop</p>
                                                      <h6>85%</h6>
                                                   </div>
                                                   <div class="iq-progress-bar mt-3">
                                                      <span class="iq-progress iq-progress-warning progress-1" data-percent="85" style="transition: width 2s ease 0s; width: 85%;"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="col-lg-6">
                                       <ul class="list-inline p-0 m-0">
                                          <li class="mb-4">
                                             <div class="d-flex align-items-center pt-2">
                                                <img src="{{ asset('backend/assets') }}/images/profile/service/04.png" class="img-fluid" alt="image">
                                                <div class="ml-3 w-100">
                                                   <div class="media align-items-center justify-content-between">
                                                      <p class="mb-0">Adobe Photoshop</p>
                                                      <h6>85%</h6>
                                                   </div>
                                                   <div class="iq-progress-bar mt-3">
                                                      <span class="iq-progress iq-progress-success progress-1" data-percent="85" style="transition: width 2s ease 0s; width: 85%;"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="mb-4">
                                             <div class="d-flex align-items-center pt-2">
                                                <img src="{{ asset('backend/assets') }}/images/profile/service/05.png" class="img-fluid" alt="image">
                                                <div class="ml-3 w-100">
                                                   <div class="media align-items-center justify-content-between">
                                                      <p class="mb-0">Figma</p>
                                                      <h6>85%</h6>
                                                   </div>
                                                   <div class="iq-progress-bar mt-3">
                                                      <span class="iq-progress iq-progress-info progress-1" data-percent="85" style="transition: width 2s ease 0s; width: 85%;"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="d-flex align-items-center pt-2">
                                                <img src="{{ asset('backend/assets') }}/images/profile/service/06.png" class="img-fluid" alt="image">
                                                <div class="ml-3 w-100">
                                                   <div class="media align-items-center justify-content-between">
                                                      <p class="mb-0">Adobe Photoshop</p>
                                                      <h6>85%</h6>
                                                   </div>
                                                   <div class="iq-progress-bar mt-3">
                                                      <span class="bg-secondary iq-progress progress-1" data-percent="85" style="transition: width 2s ease 0s; width: 85%;"></span>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
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

  {{-- js --}}
  @include('dashbord.layouts.js')
  </body>
</html>