<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{route('admin-dashboard')}}"><img src="{{asset('admin')}}/assets/images/logo/logo-white.png" alt="Logo" srcset="" style="width: 100%;height: 35px;" >
                    </a>
                    
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
             

                <li class="sidebar-item active ">
                    <a href="{{route('admin-dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span> Dashboard</span>
                    </a>
                </li>
               {{-- Course sidebar --}}
              
        </li>
           {{-- Certificate sidebar --}}
        
        <li class="sidebar-item {{ Route::is('course*') ? 'active' : '' }} has-sub">
         <a href="#" class='sidebar-link'>
             <i class="bi bi-bookmark-plus-fill"></i>
             <span>Course</span>
         </a>
         <ul class="submenu {{ Route::is('course*') ? 'active' : '' }}">
             <li class="submenu-item {{ Route::is('instructor-list') ? 'active' : '' }}">
                 <a href="{{route('instructor-list')}}">Instructor</a>
             </li>
             <li class="submenu-item {{ Route::is('coursecategory-list') ? 'active' : '' }}">
                 <a href="{{route('coursecategory-list')}}">Course Category</a>
             </li>
             <li class="submenu-item {{ Route::is('coursesubcategory-list') ? 'active' : '' }}">
                 <a href="{{route('coursesubcategory-list')}}">Course Sub Category</a>
             </li>
             <li class="submenu-item {{ Route::is('coursedetail-list') ? 'active' : '' }}">
                 <a href="{{route('coursedetail-list')}}">Course  Details</a>
             </li>

             <li class="submenu-item {{ Route::is('lecture-list') ? 'active' : '' }}">
                 <a href="{{route('lecture-list')}}">Course Lectures</a>
             </li>

             <li class="submenu-item {{ Route::is('material-list') ? 'active' : '' }}">
                 <a href="{{route('material-list')}}">Course Material</a>
             </li>

             {{-- <li class="submenu-item {{ Route::is('coursetestquestion-list') ? 'active' : '' }}">
                 <a href="{{route('coursetestquestion-list')}}">Lecture Quiz</a>
             </li> --}}
            
         </ul>
     </li>

     <li class="sidebar-item {{ Route::is('dailyquiz*') ? 'active' : '' }} has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-bookmark-plus-fill"></i>
            <span>Daily Quiz</span>
        </a>
        <ul class="submenu {{ Route::is('dailyquiz*') ? 'active' : '' }}">
            <li class="submenu-item {{ Route::is('dailyquiz-create') ? 'active' : '' }}">
                <a href="{{ route('dailyquiz-create') }}">create</a>
            </li>
            <li class="submenu-item {{ Route::is('dailyquiz-list') ? 'active' : '' }}">
                <a href="{{ route('dailyquiz-list') }}">list</a>
            </li>
            <li class="submenu-item {{ Route::is('admin-dailyquizleaderboard') ? 'active' : '' }}">
                <a href="{{ route('admin-dailyquizleaderboard') }}">LeaderBoard</a>
            </li>
        </ul>
    </li>


            {{-- end course sidebar --}}

            {{-- Test Your skills sidebar --}}

            <li class="sidebar-item {{ Route::is('test*') ? 'active' : '' }} has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bookmark-plus-fill"></i>
                    <span>Test Your Skills</span>
                </a>
                <ul class="submenu {{ Route::is('test*') ? 'active' : '' }}">
                    <li class="submenu-item {{ Route::is('department-create') ? 'active' : '' }}">
                        <a href="{{route('department-list')}}">Department</a>
                    </li>
                    <li class="submenu-item {{ Route::is('subject-create') ? 'active' : '' }}">
                        <a href="{{route('subject-list')}}">Subjects</a>
                    </li>
                    <li class="submenu-item {{ Route::is('test-list') ? 'active' : '' }}">
                        <a href="{{route('test-list')}}">Tests</a>
                    </li>
                    <li class="submenu-item {{ Route::is('question-list') ? 'active' : '' }}">
                        <a href="{{route('question-list')}}">Questions/Options</a>
                    </li>
                </ul>
            </li>

            {{-- end test your skills sidebar --}}

             

              
                
                <li class="sidebar-item {{ Route::is('mediacenter*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Media Center</span>
                    </a>
                    <ul class="submenu {{ Route::is('mediacenter*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('mediacenter-create') ? 'active' : '' }}">
                            <a href="{{ route('mediacenter-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('mediacenter-list') ? 'active' : '' }}">
                            <a href="{{ route('mediacenter-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                 
                
                             
                <li class="sidebar-item {{ Route::is('jobclassified*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Job Classified</span>
                    </a>
                    <ul class="submenu {{ Route::is('jobclassified*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('jobclassified-create') ? 'active' : '' }}">
                            <a href="{{ route('jobclassified-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('jobclassified-list') ? 'active' : '' }}">
                            <a href="{{ route('jobclassified-list') }}">list</a>
                        </li>
                    </ul>
                </li>

              

              
                <li class="sidebar-item {{ Route::is('contact*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Contact Us</span>
                    </a>
                    <ul class="submenu {{ Route::is('contact*') ? 'active' : '' }}">
                      
                        <li class="submenu-item {{ Route::is('admin-contactuslist') ? 'active' : '' }}">
                            <a href="{{route('admin-contactuslist')}}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('category*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Category</span>
                    </a>
                    <ul class="submenu {{ Route::is('category*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('category-create') ? 'active' : '' }}">
                            <a href="{{ route('category-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('category-list') ? 'active' : '' }}">
                            <a href="{{ route('category-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('article*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Articles</span>
                    </a>
                    <ul class="submenu {{ Route::is('article*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('article-create') ? 'active' : '' }}">
                            <a href="{{ route('article-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('article-list') ? 'active' : '' }}">
                            <a href="{{ route('article-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('announcement*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Announcement</span>
                    </a>
                    <ul class="submenu {{ Route::is('announcement*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('announcement-create') ? 'active' : '' }}">
                            <a href="{{ route('announcement-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('announcement-list') ? 'active' : '' }}">
                            <a href="{{ route('announcement-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('collaboration*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Collaboration</span>
                    </a>
                    <ul class="submenu {{ Route::is('collaboration*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('collaboration-create') ? 'active' : '' }}">
                            <a href="{{ route('collaboration-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('collaboration-list') ? 'active' : '' }}">
                            <a href="{{ route('collaboration-list') }}">list</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ Route::is('event*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Event</span>
                    </a>
                    <ul class="submenu {{ Route::is('event*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('event-create') ? 'active' : '' }}">
                            <a href="{{ route('event-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('event-list') ? 'active' : '' }}">
                            <a href="{{ route('event-list') }}">list</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ Route::is('tipno*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Sindhi Tipno</span>
                    </a>
                    <ul class="submenu {{ Route::is('tipno*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('tipno-create') ? 'active' : '' }}">
                            <a href="{{ route('tipno-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('tipno-list') ? 'active' : '' }}">
                            <a href="{{ route('tipno-list') }}">list</a>
                        </li>
                      
                    </ul>
                </li>

                <li class="sidebar-item {{ Route::is('ebook*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Ebook</span>
                    </a>
                    <ul class="submenu {{ Route::is('ebookcategory*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('ebookcategory-create') ? 'active' : '' }}">
                            <a href="{{ route('ebookcategory-create') }}">Ebook Category List</a>
                        </li>
                        <li class="submenu-item {{ Route::is('ebook-list') ? 'active' : '' }}">
                            <a href="{{ route('ebook-list') }}">EBook list</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{ Route::is('story*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Story</span>
                    </a>
                    <ul class="submenu {{ Route::is('story*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('story-create') ? 'active' : '' }}">
                            <a href="{{ route('story-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('story-list') ? 'active' : '' }}">
                            <a href="{{ route('story-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('businesspromotion*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Business Promotion</span>
                    </a>
                    <ul class="submenu {{ Route::is('businesspromotion*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('businesspromotion-create') ? 'active' : '' }}">
                            <a href="{{ route('businesspromotion-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('businesspromotion-list') ? 'active' : '' }}">
                            <a href="{{ route('businesspromotion-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('hinduism*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>hinduism</span>
                    </a>
                    <ul class="submenu {{ Route::is('hinduism*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('hinduism-create') ? 'active' : '' }}">
                            <a href="{{ route('hinduism-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('hinduism-list') ? 'active' : '' }}">
                            <a href="{{ route('hinduism-list') }}">list</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{ Route::is('temple*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Temple History</span>
                    </a>
                    <ul class="submenu {{ Route::is('temple*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('temple-create') ? 'active' : '' }}">
                            <a href="{{ route('temple-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('temple-list') ? 'active' : '' }}">
                            <a href="{{ route('temple-list') }}">list</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item {{ Route::is('team*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>team</span>
                    </a>
                    <ul class="submenu {{ Route::is('team*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('team-create') ? 'active' : '' }}">
                            <a href="{{ route('team-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('team-list') ? 'active' : '' }}">
                            <a href="{{ route('team-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('katha*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Katha</span>
                    </a>
                    <ul class="submenu {{ Route::is('katha*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('katha-create') ? 'active' : '' }}">
                            <a href="{{ route('katha-create') }}">create</a>
                        </li>
                        <li class="submenu-item {{ Route::is('katha-list') ? 'active' : '' }}">
                            <a href="{{ route('katha-list') }}">list</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('library*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bookmark-plus-fill"></i>
                        <span>Library</span>
                    </a>
                    <ul class="submenu {{ Route::is('library*') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('librarycategory-list') ? 'active' : '' }}">
                            <a href="{{ route('librarycategory-list') }}">Library Category</a>
                        </li>
                        <li class="submenu-item {{ Route::is('library-list') ? 'active' : '' }}">
                            <a href="{{ route('library-list') }}">Library</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>