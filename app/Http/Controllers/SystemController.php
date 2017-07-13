<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SystemController extends Controller{
    //This function will return the list of events from DB
    public function getEvents(Request $request) {
    	$events = "";
    	if(empty($request->input('school_year'))) {
    		$events = DB::table('events')
    				->orderBy('school_year', 'desc')
    				->paginate(5);
    	}elseif ($request->input('school_year') == 'ALL') {
    		$events = DB::table('events')
    				->orderBy('school_year', 'desc')
    				->paginate(5);
    	}else {
    			$school_year = $request->input('school_year');
    			$events = DB::table('events')
    				->select(DB::raw("*"))
    				->where('school_year','=',$school_year)
    				->orderBy('school_year', 'desc')
    				->paginate(5);

    	}
    	$allevents = DB::table('events')
    						->orderBy('school_year','desc')
    						->get();
    	return view('events',['events' => $events, 'allevents'=>$allevents]);
    }
    // Attendance List
    public function getClassCodes() {
    	$classcodes = DB::table('classcodes')
    				->leftJoin('events', 'classcodes.event_id','=','events.event_id')
    				->paginate(6);
    	
    	return view('classcodes',['classcodes'=>$classcodes]);
    }

    public function getStudentAttendance(Request $request) {
    	$students = DB::table('studentattendance')
    				->leftJoin('classcodes','studentattendance.class_code','=','classcodes.id')
    				->where('studentattendance.class_code','=',$request->input('classcode_id'))
    				->where('studentattendance.event_id','=',$request->input('event'))
    				->paginate(20);
    	$eventname = DB::table('events')
    				->where('event_id','=',$request->input('event'))
    				->first();
    	
    	return view('studentattendance',['students'=>$students,'eventname'=>$eventname]);
    }
}
