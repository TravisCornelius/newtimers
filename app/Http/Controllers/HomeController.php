<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Timer;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = DB::table('locations')->get();
        $timer_id = Input::get('timer_id');
        $end_time = date('Y-m-d H:i:s', strtotime('10 hour'));
        date_default_timezone_set('GMT');

        return view('locations', ['locations' => $locations]);
    }

    public function timers()
    {
        $value = Input::get('location_id');
        $location = DB::table('locations')->get()->where('id', '=', $value);
        $timers = DB::table('timers')->get()->where('location_id', '=', $value);
        return view('timers', ['location' => $location[0], 'timers' => $timers]);
    }
    public function start_timer(){
        date_default_timezone_set('GMT');
        $location_id = Input::get('location_id');
        $timer_id = Input::get('timer_id');
        $tz = "America/Chicago";


        $date = Carbon::now();
        $date = $date->subHours(4)->toDateTimeString();

        DB::table('timers')
            ->where('id', $timer_id)
            ->update(['start_time' => $date]);




        $location = DB::table('locations')->get()->where('id', '=', $location_id);
        $timers = DB::table('timers')->get()->where('location_id', '=', $location_id);
        return view('timers', ['location' => $location[0], 'timers' => $timers]);
    }
    public function clear_timer(){
        date_default_timezone_set('GMT');
        $location_id = Input::get('location_id');
        $timer_id = Input::get('timer_id');
        $tz = "America/Chicago";

        $date = Carbon::now();
        $date = $date->subHours(6);

        DB::table('timers')
            ->where('id', $timer_id)
            ->update(['start_time' => $date]);

        $location = DB::table('locations')->get()->where('id', '=', $location_id);
        $timers = DB::table('timers')->get()->where('location_id', '=', $location_id);
        return view('timers', ['location' => $location[0], 'timers' => $timers]);
    }
    public function add5_timer(){
        $location_id = Input::get('location_id');
        $timer_id = Input::get('timer_id');
        $tz = "America/Chicago";

        $currentDate = DB::table('timers')->get()->where('id', '=', $timer_id);

        $ts = date("d", var_dump(strtotime($currentDate[$timer_id - 1]->start_time)));

        $date = Carbon::createFromFormat("i", $ts, $tz);
        $date = Carbon::parse($date);
        $date = $date->addHours(18);
        $date = $date->addMinutes(38);
        $date = $date->addSeconds(49);



        DB::table('timers')
            ->where('id', $timer_id)
            ->update(['start_time' => $date]);




        $location = DB::table('locations')->get()->where('id', '=', $location_id);
        $timers = DB::table('timers')->get()->where('location_id', '=', $location_id);
        return view('timers', ['location' => $location[0], 'timers' => $timers]);
    }
}
