<?php

use App\Http\Controllers\Dashbord\AttendanceController as AttendanceController;
use App\Http\Controllers\Dashbord\BaseController;
use App\Http\Controllers\Dashbord\ClassesController as ClassesController;
use App\Http\Controllers\Dashbord\dashbordController;
use App\Http\Controllers\Dashbord\ExamController as ExamController;
use App\Http\Controllers\Dashbord\ExamMarksRegistrationController;
use App\Http\Controllers\Dashbord\ExamScheduleController as ExamScheduleController;
use App\Http\Controllers\Dashbord\ExpenseController as ExpenseController;
use App\Http\Controllers\Dashbord\FeeCollectionController as FeeCollectionController;
use App\Http\Controllers\Dashbord\MailSettingController;
use App\Http\Controllers\Dashbord\PermissionController as PermissionController;
use App\Http\Controllers\Dashbord\ProfileController as DashbordProfileController;
use App\Http\Controllers\Dashbord\ResultController as ResultController;
use App\Http\Controllers\Dashbord\RoleController as RoleController;
use App\Http\Controllers\Dashbord\SalaryController as SalaryController;
use App\Http\Controllers\Dashbord\SalarysheetController;
use App\Http\Controllers\Dashbord\StudentController as StudentController;
use App\Http\Controllers\Dashbord\StudentPromotionController as StudentPromotionController;
use App\Http\Controllers\Dashbord\SubjectController as SubjectController;
use App\Http\Controllers\Dashbord\SystemConfigController;
use App\Http\Controllers\Dashbord\UserController as UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * -------------------------------------------------
 * ---------------------Dashbord Controller-------------->
 * -------------------------------------------------
 */
Route::middleware(['auth', 'verified'])->group(function () {
    /**
     * Auth Profile Dashbord
     */
    //  Route::resource('auth-profile', DashbordProfileController::class);

    /**
     * Dashbord Controller
     */
    Route::get('/dashboard', [dashbordController::class, 'index'])->name('dashboard');

    /**
     * MailSettings Controller
     */
    Route::resource('mailsettings', MailSettingController::class);
    /**
     * Role Controller
     */
    Route::resource('/roles', RoleController::class);
    Route::post('/attach/{role}', [RoleController::class, 'attachPermissions'])->name('permissions.attach');
    Route::DELETE('/role/{role}/permission/{permission}', [RoleController::class, 'revokPermissions'])->name('permissions.revok');

    /**
     * Permission Controller
     */
    Route::resource('/permissions', PermissionController::class);
    Route::post('/attach/role/{permission}', [PermissionController::class, 'attachRole'])->name('role.attach');
    Route::DELETE('/permission/{permission}/role/{role}/', [PermissionController::class, 'revokRole'])->name('role.revok');

    /**
     * User Controller
     */
    Route::resource('/users', UserController::class);
    Route::post('/user/role/update/{user}', [UserController::class, 'userUpdateRole'])->name('userUpdate.role');

    /**
     * Student Controller
     */
    Route::resource('/students', StudentController::class);

    /**
     * Classes Controller
     */
    Route::resource('/classes', ClassesController::class);

    /**
     * Subject Controller
     */
    Route::resource('/subjects', SubjectController::class);

    /**
     * Expense Controller
     */
    Route::resource('/expenses', ExpenseController::class);
    Route::get('/expense/download/{expense}', [ExpenseController::class, 'downloadPdf'])->name('expens.download');

    /**
     * Fee Collection Controller
     */
    Route::get('/student/fee-collection/{student}', [FeeCollectionController::class, 'create'])->name('student.feeCollection');
    Route::get('/student/fees-download/{feecollection}', [FeeCollectionController::class, 'downloadPdf'])->name('feeCollection.download');
    Route::post('/student/fee-collection/{student}', [FeeCollectionController::class, 'store'])->name('student.feeStore');
    Route::resource('/feecollections', FeeCollectionController::class);

    /**
     * Attendance Controller
     */
    Route::resource('/attendance', AttendanceController::class);
    Route::post('/find/students', [AttendanceController::class, 'find_students'])->name('find.students');
    Route::get('/attendance/{class}/{subject}/{date}', [AttendanceController::class, 'show'])->name('attendances.show');
    Route::get('/attendance/edit/{class}/{subject}/{date}', [AttendanceController::class, 'edit'])->name('attendances.edit');
    Route::post('/attendance/edit', [AttendanceController::class, 'update'])->name('attendances.update');

    /**
     * StudentPromotion controller
     */
    Route::resource('/studdentpromotion', StudentPromotionController::class);
    Route::post('/find/promotion/students', [StudentPromotionController::class, 'find_promotion_students'])->name('findPromotion.students');

    /**
     * salarysheet controller
     */
    Route::resource('/salarysheet', SalarysheetController::class);

    /**
     * Salary controller
     */
    Route::resource('/salary', SalaryController::class);
    Route::get('/teacherSalary/{user_id}', [SalaryController::class, 'create'])->name('teacherSalary.create');

    /**
     * Exam controller
     */
    Route::resource('exams', ExamController::class);

    /**
     * ExamSchedule Controller
     */
    Route::resource('examsschedules', ExamScheduleController::class);
    Route::get('/get-subjects/{class}', [ExamScheduleController::class, 'getSubjects'])->name('getSubjects');
    Route::get('/examsschedule/shows/{exam_id}/{class_id}', [ExamScheduleController::class, 'shows'])->name('examsschedules.shows');
    Route::get('/examsschedule/edites/{ExamSchedule}', [ExamScheduleController::class, 'edites'])->name('examsschedules.edites');

    /**
     * Exam Marks Registration
     */
    Route::get('/get-data/{class}', [BaseController::class, 'getData']);
    Route::resource('exammarksregistrations', ExamMarksRegistrationController::class);
    Route::get('/exammarksregistrations/shows/{exam_id}/{class_id}', [ExamMarksRegistrationController::class, 'shows'])->name('marksregistrations.shows');
    Route::get('/exammarksregistrations/result/shows/{student_id}/{exam_id}', [ExamMarksRegistrationController::class, 'result_show'])->name('marksregistrations.result');

    Route::get('/marksheet/generate/{student_id}-{student_slug}/{exam_id}-{exam_slug}/{class_id}-{class_slug}', [ExamMarksRegistrationController::class, 'markSheetGenerate'])->name('marksheet.show');

    Route::resource('/results', ResultController::class);

    //site configurations setting  route are here
    Route::resource('site-configurations', SystemConfigController::class);
    Route::post('/db-backup', [SystemConfigController::class, 'backup'])->name('system.backup');
});

require __DIR__.'/auth.php';
