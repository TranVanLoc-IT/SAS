<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\DB;
class AttendanceController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): View
    {
        $teacherId = Auth::user()->id;
        $subjectList = DB::select("exec GetSubjectList ?", array($teacherId));
        return view('attendance.attendIndex', compact('subjectList'));
    }
    

    public function AttendanceQrCode(Request $request){
        // update Attandance table for student submited
        try{
            DB::table("Attendance")->insert(
                array(  
                    "studentId" => $request->studentId,
                    "present" => 1,
                    "lessonId" => $request->lessonId,
                    "attendanceId" => random_int(1000, 9999)
                )
            );
        }catch(SQLException $ex)
        {
            return view('attendance.qrcoderesult', ['result' => 'error']);
        }
        return view('attendance.qrcoderesult', ['result' => 'success']);
    }

    public function update(Request $request){
        $data = $request->getContent();
        $decode = json_decode($data, true);
        $str = "";
        // solved: return response()->json(array("msg"=>count($decode["attendanceLst"])), 200);
        try{
                DB::table("lesson")->updateOrInsert(["lessonId" => $decode["lessonId"]],["lesson_content" => $decode["lessonContent"]]);
                for($i = 0; $i < count($decode["attendanceLst"]); $i++){
                    DB::update('exec AttendanceStudent ?, ?, ?, ?', array($decode["attendanceLst"][$i]["studentId"], $decode["lessonId"], $decode["attendanceLst"][$i]["attendance"],$decode["attendanceLst"][$i]["reason"]));//studentId, lessonid, status, reason
                }
            }catch(Exception $ex){
                return response()->json(array("success"=>false, "msg"=>$ex->getMessage()));
            }
        return response()->json(array("success"=>true, "msg"=>"Thành công"));
    }
    public function load(Request $request)
    {
        $teacherId = Auth::user()->id;
        $studentList = DB::select("exec GetStudentList ?, ?", array($request->query("subjectId"), $teacherId));
        $subjectInfo = DB::select("exec GetSubjectInfo ?, ?", array($request->query("subjectId"), $teacherId));
        $lessonList = DB::select("exec GetLessonList ?, ?", array($request->query("subjectId"), $teacherId));
        return response()->json([
            'studentList' => $studentList,
            'subjectInfo' => $subjectInfo,
            'lessonList' => $lessonList
        ]);
    }

    public function LoadDiligent($subjectId)
    {
        return response()->json([
            "studentList" => DB::select("exec GetStudentList ?, ?", array($subjectId, Auth::user()->id)), 
            "results" => DB::select("select *from SubjectAttendance(?)", array($subjectId)),  
            "subjectInfo" => DB::select("exec GetSubjectInfo ?, ?", array($subjectId, Auth::user()->id)),
            "lessonList" => DB::select("exec GetLessonList ?, ?", array($subjectId, Auth::user()->id))]);
    }

    public function ExportToExcel(Request $request){
        $teacherId = Auth::user()->id;
        $subjectInfo = DB::select("exec GetSubjectInfo ?, ?", array($request->query("subjectId"), $teacherId));
        return Excel::download(new ExportAttendanceList, $subjectInfo->subjectName.$subjectInfo->subjectId.'_export.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function GetQRCode(Request $request){
        if($request->query("lessionId") != null)
        {
            $error = "Chọn một buổi học";
             return view("attendance.qrcode", compact("error"));
        }
        $url = $_SERVER["PHP_SELF"]."/diem-danh/qrcodeAttendance?lessonId=".$request->query("lessionId");

        $qrcode = QrCode::format("png")->size(300)->color(0,0,0)->generate($url);
        $qrcode = base64_encode($qrcode);
        return view("attendance.qrcode", compact("qrcode"));
    }
    public function getContact(Request $request):view
    {
        $student = DB::table("Student")->where("studentId", "=", $request->query("studentId"))->get()->first();
        $attendance = DB::select("exec GetStudentDiligent ?", array($request->query('studentId')));
        $parents = DB::table('Parent')->where('parentId', '=', DB::table('Student')->where('studentId','=',$request->query('studentId'))->pluck('parentId')->first())->get();
        return view("attendance.contactStudent",compact("student", "parents", "attendance"));
    }
}   
