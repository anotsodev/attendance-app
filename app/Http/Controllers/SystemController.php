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
    				->orderBy('event_id', 'desc')
    				->paginate(5);
    	}elseif ($request->input('school_year') == 'ALL') {
    		$events = DB::table('events')
    				->orderBy('event_id', 'desc')
    				->paginate(5);
    	}else {
    			$school_year = $request->input('school_year');
    			$events = DB::table('events')
    				->select(DB::raw("*"))
    				->where('school_year','=',$school_year)
    				->orderBy('event_id', 'desc')
    				->paginate(5);

    	}
    	$allevents = DB::table('events')
                            ->select('school_year')
                            ->distinct('school_year')
    						->orderBy('school_year','desc')
    						->get();
    	return view('events',['events' => $events, 'allevents'=>$allevents]);
    }
    // Attendance List
    public function getClassCodes(Request $request) {
        
        if(empty($request->input('school_year'))) {
            $classcodes = DB::table('classcodes')
                    ->orderBy('id','desc')
                    ->paginate(6);
        }elseif ($request->input('school_year') == 'ALL') {
                $classcodes = DB::table('classcodes')
                    ->orderBy('id','desc')
                    ->paginate(6);
        }else {
            $school_year = $request->input('school_year');
            $classcodes = DB::table('classcodes')
                    ->where('school_year','=',$school_year)
                    ->orderBy('id','desc')
                    ->paginate(6);
        }
        $allclasscodes = DB::table('classcodes')
                    ->select('school_year')
                    ->distinct('school_year')
                    ->orderBy('school_year','desc')
                    ->get();
    	return view('classcodes',['classcodes'=>$classcodes,'allclasscodes'=>$allclasscodes]);
    }

    public function getStudentAttendance(Request $request) {
        if(empty($request->input('class_code'))){
            $students = DB::table('studentattendance')
                    ->leftJoin('classcodes','studentattendance.class_code','=','classcodes.id')
                    ->where('studentattendance.event_id','=',$request->input('event_id'))
                    ->paginate(20);
        }elseif ($request->input('class_code')=="ALL") {
                    $students = DB::table('studentattendance')
                    ->leftJoin('classcodes','studentattendance.class_code','=','classcodes.id')
                    ->where('studentattendance.event_id','=',$request->input('event_id'))
                    ->paginate(20);
        }else {
            $students = DB::table('studentattendance')
                    ->leftJoin('classcodes','studentattendance.class_code','=','classcodes.id')
                    ->where([
                        ['studentattendance.event_id','=',$request->input('event_id')],['studentattendance.class_code','=',$request->input('class_code')]
                        ])
                    ->paginate(20);
        }
    	
    	$eventname = DB::table('events')
    				->where('event_id','=',$request->input('event_id'))
    				->first();
    	$allclasscodes = DB::table('classcodes')
                    ->get();
    	return view('studentattendance',['students'=>$students,'eventname'=>$eventname,'allclasscodes'=>$allclasscodes]);
    }
    public function getVisitorAttendance(Request $request) {
        $visitors = DB::table('visitorattendance')
                    ->where('event_id','=',$request->input('event_id'))
                    ->paginate(20);
         $eventname = DB::table('events')
                    ->where('event_id','=',$request->input('event_id'))
                    ->first();           
        return view('visitorattendance',['visitors'=>$visitors,'eventname'=>$eventname]);
    }

    public function studentAttendanceSheet() {
        $classcodes = DB::table('classcodes')
                    ->get();

        return view('studentattendancesheet',['classcodes'=>$classcodes]);
    }

    public function insertStudentAttendance(Request $request) {
        $event_id = $request->input('event_id');
        $date_attended = $request->input('date');
        $class_code = $request->input('class_code');
        $student_id = $request->input('student_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $course = $request->input('course');
        $year = $request->input('year');
        DB::table('studentattendance')->insert(
            ['event_id'=>$event_id,'class_code'=>$class_code,'student_id'=>$student_id,'first_name'=>$first_name,'last_name'=>$last_name,'course'=>$course,'year'=>$year,'date_attended'=>$date_attended]
        );
        $request->session()->flash('status', "Attendance for $first_name $last_name has been saved.");
        return redirect()->route('events');
    }

    public function insertVisitorAttendance(Request $request) {
        $event_id = $request->input('event_id');
        $full_name = $request->input('full_name');
        $date_attended = $request->input('date');
        DB::table('visitorattendance')->insert(
                ['event_id'=>$event_id,'full_name'=>$full_name,'date_attended'=>$date_attended]
            );
        $request->session()->flash('status', "Attendance for $full_name has been saved.");
        return redirect()->route('events');

    }

    public function insertEvent(Request $request) {
        $name = $request->input('event_name');
        $event_description = $request->input('event_description');
        $school_year = $request->input('school_year');

        DB::table('events')->insert(
            ['name'=>$name,'event_description'=>$event_description,'school_year'=>$school_year]
            );
        $request->session()->flash('status', "Added new event $name.");
        return redirect()->route('events');

    }

    public function insertClassCode(Request $request) {
        $class_code_no = $request->input('class_code');
        $instructor_full_name = $request->input('instructor_full_name');
        $school_year = $request->input('school_year');

        DB::table('classcodes')->insert(
            ['class_code_no'=>$class_code_no,'instructor_full_name'=>$instructor_full_name,'school_year'=>$school_year]
            );
        $request->session()->flash('status', "Added new class code $class_code_no.");
        return redirect()->route('classcodes');
    }
}
