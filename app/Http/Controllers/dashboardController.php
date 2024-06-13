<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    //
    public function load(Request $request){
        // current class
        
        $teacherId = Auth::user()->id;
        $subjectLst = DB::select("exec GetSubjectList ?", array($teacherId));
        // current total student
        $totalStudents = DB::selectOne("select dbo.GetTotalStudentLearning(?) as total", array($teacherId));
        $totalStudents = $totalStudents->total;
        $currentSemester = DB::table("semester")->where("is_active", 1)->value("semester");
        // semesters
        $semesters = DB::table("semester")->get();
        // attendance chart
        return view("dashboard", compact('totalStudents', 'currentSemester', 'semesters'));
    }
    public function GetMH($semesterId){
        // current class
        $totalSubjects = DB::select("select dbo.GetTotalSubjectSemester(?, ?) as totalSubjects", array($semesterId, Auth::user()->id));
        return response()->json(["totalSubjects" => $totalSubjects]);
    }
    public function RefreshSubjects($semesterId){
        // current class
        $subjectLst = DB::table("subject")->where("semesterId", '=', array($semesterId))->get();
        return response()->json(["subjectList" => $subjectLst]);
    }
    public function GetShortDiligent(Request $re){
        return response()->json(["sdiligent"=>DB::select("exec GetShortSubjectDiligent ?", array($re->query("subjectId")))]);
    }
    
    public function GetStatistic(Request $re){
        
        $teacherId = Auth::user()->id;
        return response()->json(["is_learning"=>DB::select("exec GetStudentLearning ?", array($teacherId)), "is_learnt"=>DB::select("exec GetStudentLearnt ?", array($teacherId))]);
    }
}
