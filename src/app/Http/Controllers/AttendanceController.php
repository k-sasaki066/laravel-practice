<?php

namespace App\Http\Controllers;

// require '../vender/autoload.php';

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    public function punch()
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $user_id = Auth::user()->id;
        $confirm_date = Attendance::where('user_id', $user_id)
        ->where('date', $now_date)
        ->first();
        if(!$confirm_date) {
            $status = 0;
        }
        return view('index');
    }

    public function work(Request $request)
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        
        if($request->has('start_work')){
            Attendance::create([
            'date'=>$now_date,
            'start'=>$now_time,
            'user_id'=>$user_id,
            ]);
            $status = 1;

        return redirect('/')->with('message', '開始時間を登録しました');
        }

        elseif($request->has('end_work')){
            Attendance::where('date', $now_date)
            ->where('user_id', $user_id)
            ->first()
            ->update(['end'=>$now_time,]);

        return redirect('/')->with('message', '終了時間を登録しました');
        }
    }
}