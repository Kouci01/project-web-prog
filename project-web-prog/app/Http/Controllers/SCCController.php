<?php

namespace App\Http\Controllers;

use App\Models\ClusterScc;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SCCController extends Controller
{
    //
    public function viewAllForm(Request $request){
        
        $ssc_id = explode('_', $request->cookie('user_auth'))[0];
        $cluster_id = ClusterScc::where('lecturer_id','=',$ssc_id)->first()->cluster_id;

        $forms = DB::table('forms')
        ->join('subject_lecturers', 'forms.subject_id', '=', 'subject_lecturers.subject_id')
        ->join('subjects', 'forms.subject_id', '=', 'subjects.id')
        ->select('forms.*', 'subjects.subject', 'subject_lecturers.lecturer_id', 'subject_lecturers.period as lecture_period', 'subject_lecturers.has_Filled_form as has_filled_form')
        ->where('subjects.cluster_id', '=', $cluster_id)
        ->whereRaw('forms.period = subject_lecturers.period')
        ->get();
        
        return view('view.formresult', ['forms'=>$forms]);
    }

    public function viewAllFeedback(Request $request){

        $ssc_id = explode('_', $request->cookie('user_auth'))[0];
        $cluster_id = ClusterScc::where('lecturer_id','=',$ssc_id)->first()->cluster_id;
        $complaints = Complaint::join('subjects', 'subjects.id', '=', 'complaints.subject_id')->where('subjects.cluster_id','=',$cluster_id)->get();
        return view('view.feedbackticket', ['complaints'=>$complaints]);
    }


}
