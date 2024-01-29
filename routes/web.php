<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Test\SubjectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\EbookController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\KathaController;
use App\Http\Controllers\Backend\StoryController;
use App\Http\Controllers\Test\QuestionController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\LibraryController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HinduismController;
use App\Http\Controllers\Backend\DailyQuizController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Backend\Auth\SigninController;
use App\Http\Controllers\Backend\MediaCenterController;
use App\Http\Controllers\Backend\SindhiTipnoController;
use App\Http\Controllers\Backend\AdminSettingController;
use App\Http\Controllers\Backend\AnnouncementController;
use App\Http\Controllers\Backend\CollaborationController;
use App\Http\Controllers\Backend\EbookCategoryController;
use App\Http\Controllers\Backend\JobClassifiedController;
use App\Http\Controllers\Backend\TempleHistoryController;
use App\Http\Controllers\Backend\LibraryCategoryController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Backend\BusinessPromotionController;
use App\Http\Controllers\Backend\Course\CourseDetailsController;
use App\Http\Controllers\Backend\Course\CourseLectureController;
use App\Http\Controllers\Backend\Course\CourseCategoryController;
use App\Http\Controllers\Backend\Course\CourseQuestionController;
use App\Http\Controllers\Backend\Course\CourseMaterialsController;
use App\Http\Controllers\Backend\Course\CourseInstructorController;
use App\Http\Controllers\Backend\Course\CoursesSubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

// Route::get('/', function () {
//     return view('welcome');
// });

//==>> Admin Login Routes
Route::controller(SignInController::class)->group(function () {
    Route::get('/admin/login', 'view')->name('adminlogin.form');
    Route::post('/admin/login', 'adminAuthenticate')->name('admin.login');
});
Route::controller(SignInController::class)->group(function () {
    Route::get('/admin/logout', 'adminlogout')->name('admin.logout');
});

//==>Admin Dashboard Routes start
Route::middleware(['auth', 'redirect.only.admins'])->group(function () {
    Route::prefix('admin')->as('admin-')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
            Route::get('contactuslist', 'contactuslist')->name('contactuslist');
            Route::get('contactusdelete/{id}', 'contactusdelete')->name('contactusdelete');
            Route::get('testimonials', 'testimonials')->name('testimonials');
            Route::get('testimonialdelete/{id}', 'testimonialdelete')->name('testimonialdelete');
            Route::get('allusers', 'allUsers')->name('allusers');
            Route::get('deleteuser/{id}', 'deleteUser')->name('deleteuser');

            Route::get('dailyquizleaderboard', 'dailyquizleaderboardshow')->name('dailyquizleaderboard');
            Route::get('dailyquizleaderboarddelete/{id}', 'dailyquizleaderboarddelete')->name('dailyquizleaderboarddelete');
        });
    });
    Route::get('/user_update/{id}', [DashboardController::class, 'user_update'])->name('user_update');

    //mahjabeen's code of admim password change 
    Route::controller(AdminSettingController::class)->group(function () {
        Route::get('/admin-changepasswordget', 'changepasswordget');
        Route::post('/admin-changepassword', 'changepassword')->name('admin-change.password');
        Route::get('/admin-youraccount', 'youraccount');
        Route::get('/admin-setting/{id}', 'setting')->name('admin-setting');
        Route::post('/admin-settingpost/{id}', 'settingpost')->name('admin-settingpost');
    });

    //Media Center Routes
    Route::prefix('mediacenter')->as('mediacenter-')->group(function () {
        Route::controller(MediaCenterController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //Media Center Routes
    Route::prefix('team')->as('team-')->group(function () {
        Route::controller(TeamController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //article Routes
    Route::prefix('article')->as('article-')->group(function () {
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });

    //event Routes
    Route::prefix('event')->as('event-')->group(function () {
        Route::controller(EventController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });

    //event Routes
    Route::prefix('library')->as('library-')->group(function () {
        Route::controller(LibraryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('download/{id}', 'download')->name('download');
        });
    });
    //librarycategory Routes
    Route::prefix('librarycategory')->as('librarycategory-')->group(function () {
        Route::controller(LibraryCategoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });


    //category Routes
    Route::prefix('category')->as('category-')->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //announcement Routes
    Route::prefix('announcement')->as('announcement-')->group(function () {
        Route::controller(AnnouncementController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //hinduism Routes
    Route::prefix('hinduism')->as('hinduism-')->group(function () {
        Route::controller(HinduismController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //katha Routes
    Route::prefix('katha')->as('katha-')->group(function () {
        Route::controller(KathaController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //Collaboration Routes
    Route::prefix('collaboration')->as('collaboration-')->group(function () {
        Route::controller(CollaborationController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    Route::prefix('businesspromotion')->as('businesspromotion-')->group(function () {
        Route::controller(BusinessPromotionController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });
    //Career Routes
    Route::prefix('career')->as('career-')->group(function () {
        Route::controller(CareerController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });

    //jobclassified routes
    Route::prefix('jobclassified')->as('jobclassified-')->group(function () {
        Route::controller(JobClassifiedController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('delete_image/{id}', 'destroyimage')->name('delete_image');
        });
    });

    //Course Category  Routes


    Route::prefix('coursecategory')->as('coursecategory-')->group(function () {
        Route::controller(CourseCategoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    Route::prefix('coursesubcategory')->as('coursesubcategory-')->group(function () {
        Route::controller(CoursesSubCategoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            // Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    Route::get('/coursesubcategory/edit/{id}', [CoursesSubCategoryController::class, 'edit'])->name('coursesubcategory-edit');

    Route::prefix('coursedetail')->as('coursedetail-')->group(function () {
        Route::controller(CourseDetailsController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    //course instructor routes
    Route::prefix('instructor')->as('instructor-')->group(function () {
        Route::controller(CourseInstructorController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });



    //end course Lectures routes

    //course instructor routes
    Route::prefix('lecture')->as('lecture-')->group(function () {
        Route::controller(CourseLectureController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    //end course Lectures routes

    //course Materials routes
    Route::prefix('material')->as('material-')->group(function () {
        Route::controller(CourseMaterialsController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::get('download/{id}', 'download')->name('download');
        });
    });

    //end course Materails routes

    //course Test Question Routes

    Route::prefix('coursetestquestion')->as('coursetestquestion-')->group(function () {
        Route::controller(CourseQuestionController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });
    //End course Category 


    //mahjabeen code routes end

    // Department Routes

    Route::prefix('department')->as('department-')->group(function () {
        Route::controller(DepartmentController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'index')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });
    //Subject Routes
    Route::prefix('subject')->as('subject-')->group(function () {
        Route::controller(SubjectController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    //Test Routes

    Route::prefix('test')->as('test-')->group(function () {
        Route::controller(TestController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    Route::get('/get-subjects/{departmentId}', [TestController::class, 'getSubjects']);
    //Questions Routes
    Route::prefix('question')->as('question-')->group(function () {
        Route::controller(QuestionController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });


    Route::prefix('dailyquiz')->as('dailyquiz-')->group(function () {
        Route::controller(DailyQuizController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });



    //Tipno Rooutes
    Route::prefix('tipno')->as('tipno-')->group(function () {
        Route::controller(SindhiTipnoController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'list')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });


    Route::prefix('ebookcategory')->as('ebookcategory-')->group(function () {
        Route::controller(EbookCategoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    Route::prefix('ebook')->as('ebook-')->group(function () {
        Route::controller(EbookController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    //End Tipno Routes

    //story routes
    Route::prefix('story')->as('story-')->group(function () {
        Route::controller(StoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    //end story routes

    //story routes
    Route::prefix('temple')->as('temple-')->group(function () {
        Route::controller(TempleHistoryController::class)->group(function () {
            Route::get('/create', 'view')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/list', 'show')->name('list');
            Route::get('delete/{id}', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
        });
    });

    //end story routes
});


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'view')->name('register.form');
    Route::post('/register', 'store')->name('register.process');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'view')->name('login.form');
    Route::post('/login', 'userAuthenticate')->name('login.process');
});
Route::controller(LogoutController::class)->group(function () {
    Route::get('/user/logout', 'userLogout')->name('user.logout');
});



Route::middleware(['auth', 'redirect.only.user'])->group(function () {
    Route::prefix('student')->as('student-')->group(function () {
        Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        Route::get('list', [StudentDashboardController::class, 'show'])->name('list');
        Route::get('delete/{id}', [StudentDashboardController::class, 'delete'])->name('delete');
        Route::get('dailyquizresult', [StudentDashboardController::class, 'dailyquizresultshow'])->name('dailyquizresult');
        Route::get('dailyquizresultdelete/{id}', [StudentDashboardController::class, 'dailyquizresultdelete'])->name('dailyquizresultdelete');

    });


    //USAMA => Setting Routes Put her for middleware 
    Route::controller(SettingController::class)->group(function () {
        Route::get('/changepasswordget', 'changepasswordget');
        Route::post('/changepassword', 'changepassword')->name('change.password');
        Route::get('/youraccount', 'youraccount');
        Route::get('/setting/{id}', 'setting')->name('setting');
        Route::post('/settingpost/{id}', 'settingpost')->name('settingpost');
    });


    //Daily Quiz View Routes
    // Route::get('dailyquiz', [HomeController::class, 'dailyquizshow'])->name('dailyquiz');
    // Route::post('/submit/daily', [HomeController::class, 'submitdailyTest'])->name('submit.daily');
   

});
// Route::get('/certificate', [HomeController::class,  "certificate"]);
// Route::post('/search',[HomeController::class, "search"]);

Route::controller(HomeController::class)->group(function () {
    // group discussion
Route::get('/', 'mainpage');
Route::get('home', 'mainpage');
Route::get('allhinduism','allhinduism')->name('allhinduism');
Route::get('hinduism/{slug}', 'hinduism')->name('hinduism');
Route::get('hinduismdetail/{slug}', 'hinduismdetail')->name('hinduismdetail');

Route::get('allarticle','allarticle')->name('allarticle');
Route::get('article/{slug}', 'article')->name('article');
Route::get('articledetail/{slug}', 'articledetail')->name('articledetail');

Route::get('allcollaboration','allcollaboration')->name('allcollaboration');
Route::get('collaboration/{slug}', 'collaboration')->name('collaboration');
Route::get('collaborationdetail/{slug}', 'collaborationdetail')->name('collaborationdetail');

Route::get('allkatha','allkatha')->name('allkatha');
Route::get('katha/{slug}', 'katha')->name('katha');
Route::get('kathadetail/{slug}', 'kathadetail')->name('kathadetail');

Route::get('all_courses','ourcouse')->name('all_courses');
Route::get('coursecategory/{slug}', 'categoryCourses')->name('coursecategory');
Route::get('course_detail/{slug}', 'courseDetails')->name('course_detail');

Route::get('/jobclassified',  'jobclassified');
Route::get('/jobclassifieddetail/{slug}', 'jobclassifieddetail');
Route::get('/mediacenter',  'mediacenter');
Route::get('/mediacenterdetail/{slug}', 'mediacenterdetail');

Route::get('testyourskills', 'testyourskill')->name('testyourskills');
Route::get('department', 'departments')->name('department');
Route::get('department_subjects/{slug}', 'Departsubjects')->name('department_subjects');
Route::get('subject_test/{slug}', 'showTest')->name('subject_test');
Route::post('/subject/{subjectId}/test/submit', 'submitTest')->name('test.submit');
Route::get('testresult', 'testresult')->name('testresult');
});
//navbar jquery
Route::get('/Navbar',[HomeController::class,"Navbar"]);
Route::post('/categorylist',[HomeController::class,"categorylist"]);
Route::get('/eventcat',[HomeController::class,"eventcat"]);
Route::get('/mediacat',[HomeController::class,"mediacat"]);
Route::get('/artcat',[HomeController::class,"artcat"]);
Route::get('/storycat',[HomeController::class,"storycat"]);
Route::get('/hindicat',[HomeController::class,"hindicat"]);
Route::get('/temcat',[HomeController::class,"temcat"]);
Route::get('/collabcat',[HomeController::class,"collabcat"]);
