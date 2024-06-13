<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
Route::get('/', [dashboardController::class, "load"])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix("thong-ke")->group(function(){
    
    Route::get('/chuyen-can-mon-hoc/mon-hoc', [dashboardController::class, "GetShortDiligent"]);
    Route::get('/', [dashboardController::class, "GetStatistic"]);
    Route::get('/chuyen-can-mon-hoc/hoc-ky/{semesterId}', [dashboardController::class, "RefreshSubjects"]);
    Route::get('/mon-hoc/{semesterId}', [dashboardController::Class, "GetMH"]);
});

Route::prefix('diem-danh')->group(function(){
    Route::get('/', [AttendanceController::Class, "index"])->name("diem-danh");

    Route::get('/mon-hoc', [AttendanceController::Class, "load"]);

    Route::get('/lien-he', [AttendanceController::Class, "getContact"])->name("lien-he");
    
    Route::post('/cap-nhat-diem-danh',[AttendanceController::Class, "update"])->name("cap-nhat-diem-danh");
    
    Route::get('/qrcode',[AttendanceController::Class, "GetQRCode"]);

    Route::get('/in-phieu-diem-danh',[AttendanceController::Class, "ExportToExcel"]);

    Route::post('/qrcodeAttendance',[AttendanceController::Class, "AttendanceQrCode"])->name("qrcodeAttendance");
    
    Route::get('/qrcodeAttendance',function(){return view("attendance.fillQrcodeInfo");});
});

Route::prefix('bao-cao-diem-danh')->group(function(){
    Route::get('/', function(){return view("report.attendanceReport");})->name("report");

});

Route::get('/ho-so',function(){
    return view("personal.Profile", ["profile" => DB::table("Teacher")->where("teacherId", Auth::user()->id)->first()]);
})->name("ho-so");


Route::get('/thong-bao',function(){
    return view("personal.News");
})->name("notification");


Route::get('/tin-nhan',function(){
    return view("personal.Messages");
})->name("message");

Route::get('/chuyen-can',function(){
    return view("attendance.diligentPage", ["subjectList"=> DB::select("exec GetSubjectList ?", array(Auth::user()->id))]);
})->name("chuyen-can");


Route::get('/chuyen-can/mon-hoc/li-do/{lessonId}/{studentId}',function($lessonId, $studentId){
    return response()->json(["reason"=>DB::select("select reason from attendance, absenceReason WHERE attendance.absenceReasonId = absenceReason.absenceReasonId and attendance.lessonId = ? and attendance.studentId = ?", array($lessonId, $studentId))]);
});

Route::get('/chuyen-can/mon-hoc/noi-dung/{lessonId}',function($lessonId){
    return response()->json(["content"=>DB::table("lesson")->where("lessonId", '=', $lessonId)->get("lesson_content")->first()]);
});

Route::get('/chuyen-can/mon-hoc/{subjectId}',[AttendanceController::class, "LoadDiligent"]);

Route::prefix('lich-day')->group(function(){
    Route::get('/', function(){
        return view("schedule.ScheduleIndex", ["scheduleLst" => DB::select("exec GetSchedule ?", array(Auth::user()->id))]);
    })->name("schedule");
    
    Route::get('/hom-nay', function(){
        return view("schedule.ScheduleIndex", ["scheduleLst" => DB::select("exec GetScheduleToday ?", array(Auth::user()->id))]);
    })->name("schedule.today");
    
    Route::get('/{limit}', function($limit){
        return view("schedule.ScheduleIndex", ["scheduleLst" => DB::select("exec GetSchedule ?, ?", array(Auth::user()->id, $limit))]);
    });

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
