<?php

        $student = App\Models\User::where('id', Auth::id())->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->exists();

        $config = App\Models\SystemConfig::first();

?>

<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="header-logo">
            @if ($config->site_logo)
            <img src="{{ asset('upload/site_image') }}/{{ $config->site_logo }}" class="img-fluid rounded-normal" alt="logo">
            @else
            <img src="{{ asset('backend/assets') }}/images/logo.png" class="img-fluid rounded-normal" alt="logo">
            @endif
            <h5 class="logo-title ml-3"> {{ $config->site_name ?? 'POSDash' }}</h5>
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="svg-icon">
                        <svg  class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="ml-4">Dashboards</span>
                    </a>
                </li>

            @if (!$student)
            <li class="{{ Request::is('classes','classes/*') || Request::is('subjects','subjects/*') ? 'active' : '' }} ">
                <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg class="svg-icon" id="p-dash6" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="4 14 10 14 10 20"></polyline><polyline points="20 10 14 10 14 4"></polyline><line x1="14" y1="10" x2="21" y2="3"></line><line x1="3" y1="21" x2="10" y2="14"></line>
                    </svg>
                    <span class="ml-4">Class</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="return" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('classes','classes/*') ? 'active' : '' }} ">
                                <a href="{{ route('classes.index') }}">
                                    <i class="las la-minus"></i><span>Class</span>
                                </a>
                        </li>
                        <li class="{{ Request::is('subjects','subjects/*') ? 'active' : '' }} ">
                                <a href="{{ route('subjects.index') }}">
                                    <i class="las la-minus"></i><span>Subject</span>
                                </a>
                        </li>
                </ul>
            </li>
            <!-----------------------------------------------
            -------------------students-----------------------
            ------------------------------------------------->
            <li class=" {{ Request::is('students','students/*') || Request::is('studdentpromotion','studdentpromotion/*') ? 'active' : '' }} ">
                <a href="#people" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="ml-4">Students</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="people" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('students','students/index') ? 'active' : '' }} ">
                                <a href="{{ route('students.index') }}">
                                    <i class="las la-minus"></i><span>All Students</span>
                                </a>
                        </li>
                        <li class="{{ Request::is('students','students/create') ? 'active' : '' }} ">
                                <a href="{{ route('students.create') }}">
                                    <i class="las la-minus"></i><span>Admission Form</span>
                                </a>
                        </li>
                        <li class="{{ Request::is('studdentpromotion','studdentpromotion/*') ? 'active' : '' }} ">
                            <a href="{{ route('studdentpromotion.index') }}">
                                <i class="las la-minus"></i><span>Students Promotion</span>
                            </a>
                    </li>
                </ul>
            </li>



            <!-----------------------------------------------
                -------------------Attendance-----------------------
                ------------------------------------------------->
            <li class="{{ Request::is('attendance','attendance/*') ? 'active' : '' }} ">
                <a href="{{ route('attendance.index') }}" class="">
                    <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <span class="ml-4">Attendance</span>
                </a>
                <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                </ul>
            </li>


            <!-----------------------------------------------
            -------------------Examinations-----------------------
            ------------------------------------------------->

            <li class="{{ Request::is('exams','exams/*') || Request::is('examsschedules','examsschedules/*') ? 'active' : '' }} ">
                <a href="#Examinations" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z"/>
                      </svg>
                    <span class="ml-4">Examinations</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="Examinations" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                        <li class="{{ Request::is('exams','exams/*') ? 'active' : '' }} ">
                            <a href="{{ route('exams.index') }}" class="svg-icon">
                                <svg class="svg-icon" id="p-dash07" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Exams</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('examsschedules','examsschedules/*') || Request::is('examsschedules','examsschedule/shows/*') ? 'active' : '' }} ">
                            <a href="#Examsschedules" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" id="p-dash10" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                                <span class="ml-4">Exams schedules</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="Examsschedules" class="iq-submenu collapse" data-parent="#Examsschedules" style="">
                                    <li class="{{ Request::is('examsschedules','examsschedules/index') ? 'active' : '' }} ">
                                        <a href="{{ route('examsschedules.index') }}">
                                            <i class="las la-minus"></i><span>Schedules</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('examsschedules/create') ? 'active' : '' }}">
                                        <a href="{{ route('examsschedules.create') }}">
                                            <i class="las la-minus"></i><span>Schedules Create</span>
                                        </a>
                                    </li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('exammarksregistrations','exammarksregistrations/*')  ? 'active' : '' }}  ">
                            <a href="#MarksRegistration" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2-plus" viewBox="0 0 16 16">
                                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0V8H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5z"/>
                                  </svg>
                                <span class="ml-4">Marks Registration</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="MarksRegistration" class="iq-submenu collapse" data-parent="#MarksRegistration" style="">
                                    <li class="{{ Request::is('exammarksregistrations','exammarksregistrations/index') || Request::is('examsschedules','marksheet/generate/*') ? 'active' : '' }} ">
                                        <a href="{{ route('exammarksregistrations.index') }}">
                                            <i class="las la-minus"></i><span>Exam Marks</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('exammarksregistrations/create') ? 'active' : '' }} ">
                                        <a href="{{ route('exammarksregistrations.create') }}">
                                            <i class="las la-minus"></i><span>Marks Registration</span>
                                        </a>
                                    </li>
                            </ul>
                        </li>

                </ul>
            </li>

            <!-----------------------------------------------
            -------------------Result-----------------------
            ------------------------------------------------->

            {{-- <li class=" ">
                <a href="#Result" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                      </svg>
                    <span class="ml-4">Result</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="Result" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                                <a href="{{ route('results.index') }}">
                                    <i class="las la-minus"></i><span>Result</span>
                                </a>
                        </li>
                        <li class="">
                                <a href="{{ route('results.create') }}">
                                    <i class="las la-minus"></i><span>Create Result</span>
                                </a>
                        </li>
                </ul>
            </li> --}}


            <!-----------------------------------------------
            -------------------Salary-----------------------
            ------------------------------------------------->

            <li class="{{ Request::is('salarysheet','salarysheet/*') || Request::is('salary','salary/*') ? 'active' : '' }} ">
                <a href="#Salary" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                        <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
                      </svg>
                    <span class="ml-4">Salary</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="Salary" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('salarysheet','salarysheet/*') ? 'active' : '' }}">
                                <a href="{{ route('salarysheet.create') }}">
                                    <i class="las la-minus"></i><span>Salary Sheets</span>
                                </a>
                        </li>
                        <li class="{{ Request::is('salary','salary/*') ? 'active' : '' }}">
                                <a href="{{ route('salary.index') }}">
                                    <i class="las la-minus"></i><span>Salary</span>
                                </a>
                        </li>
                </ul>
            </li>

            <!-----------------------------------------------
            -------------------Accounts-----------------------
            ------------------------------------------------->

            <li class="{{ Request::is('feecollections','feecollections/*') || Request::is('expenses','expenses/*') ? 'active' : '' }}">
                <a href="#Accounts" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>
                    <span class="ml-4">Accounts</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="Accounts" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('feecollections','feecollections/*') || Request::is('expenses','expenses/*') ? 'active' : '' }}">
                                <a href="{{ route('feecollections.index') }}">
                                    <i class="las la-minus"></i><span>All Fee Collection</span>
                                </a>
                        </li>
                        <li class="{{  Request::is('expenses','expenses/index') ? 'active' : '' }}">
                                <a href="{{ route('expenses.index') }}">
                                    <i class="las la-minus"></i><span>Expense</span>
                                </a>
                        </li>
                        <li class="{{  Request::is('expenses/create') ? 'active' : '' }}">
                                <a href="{{ route('expenses.create') }}">
                                    <i class="las la-minus"></i><span>Add Expense</span>
                                </a>
                        </li>
                </ul>
            </li>




            <!-----------------------------------------------
            -------------------User Management-----------------------
            ------------------------------------------------->
            <li class="{{ Request::is('users','users/*') || Request::is('roles','roles/*') || Request::is('permissions','permissions/*') ? 'active' : '' }}">
                <a href="#User_Management" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>
                    <span class="ml-4">User Management</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="User_Management" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class="{{ Request::is('users','users/*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class="">
                            <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="ml-4">Users</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('roles','roles/*') ? 'active' : '' }}">
                        <a href="{{ route('roles.index') }}" class="">
                            <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            <span class="ml-4">Role</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('permissions','permissions/*') ? 'active' : '' }}">
                        <a href="{{ route('permissions.index') }}" class="">
                            <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            <span class="ml-4">Permission</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-----------------------------------------------
            -------------------Setting-----------------------
            ------------------------------------------------->

            <li class="{{ Request::is('mailsettings','mailsettings/*') || Request::is('site-configurations','site-configurations/*') ? 'active' : '' }} ">
                <a href="#Setting" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                      </svg>
                    <span class="ml-4">Setting</span>
                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg>
                </a>
                <ul id="Setting" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('mailsettings') ? 'active' : '' }}">
                                <a href="{{ route('mailsettings.index') }}">
                                    <i class="las la-minus"></i><span>Env List</span>
                                </a>
                        </li>
                        <li class="{{ Request::is('site-configurations/*') ? 'active' : '' }}">
                                <a href="{{ route('site-configurations.create') }}">
                                    <i class="las la-minus"></i><span>Configuration</span>
                                </a>
                        </li>

                </ul>
            </li>
            @endif





            </ul>
        </nav>

        <div class="p-3"></div>
    </div>
    </div>
