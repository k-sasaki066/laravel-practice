<?php

namespace App\Http\Controllers;

// require '../vender/autoload.php';

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;


class AttendanceController extends Controller
{
    // ホーム画面表示
    public function punch()
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $user_id = Auth::user()->id;
        $confirm_date = Attendance::where('user_id', $user_id)
        ->where('date', $now_date)
        ->first();
        // dd($confirm_date);

        if(!$confirm_date) {
            $status = 0;
        }else {
            $status = Auth::user()->status;
        }
        return view('index', compact('status'));
    }

    // 打刻処理
    public function work(Request $request)
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        
        if($request->has('start_rest') || $request->has('end_rest')) {
            $work_id = Attendance::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first()
            ->id;
        }

        // 勤務開始
        if($request->has('start_work')){
            $attendance = new Attendance();
            $attendance->date = $now_date;
            $attendance->start = $now_time;
            $attendance->user_id = $user_id;
            // dd($attendance);
            $status = 1;
        }

        // 休憩開始
        if($request->has('start_rest')){
            $attendance = new Rest();
            $attendance->start = $now_time;
            $attendance->work_id = $work_id;
            $status = 2;
            // dd($rest);
        }

        // 休憩終了
        if($request->has('end_rest')) {
            $attendance = Rest::where('work_id', $work_id)
            ->whereNotNull('start')
            ->whereNull('end')
            ->first();
            // dd($attendance);
            $attendance->end = $now_time;
            $status = 1;
        }

        // 勤務終了
        if($request->has('end_work')) {
            $attendance = Attendance::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();
            $attendance->end = $now_time;
            $status = 3;
        }

        $user = User::find($user_id);
        $user->status = $status;
        $user->save();
        // dd($user);
        $attendance->save();

        return redirect('/')->with(['status' => $status]);
    }
    // 勤怠表表示
    public function indexDate() {
        $user_id = Auth::user()->id;
        $attendances = Attendance::where('user_id', $user_id)->get();
        // dd($attendances);
        return view('/attendance_date', compact('attendances'));
    }
}