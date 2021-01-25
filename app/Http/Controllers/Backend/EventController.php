<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.event.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
 
        $event = new Event;
        $event->title       = $input['title'];
        $event->start_date  = $input['start_date'];
        $event->end_date    = $input['end_date'];

        if($input['recurrence_type'] == 'repeat'){

            if($input['repeat_type'] == 'days')
                $dates = CarbonPeriod::between($input['start_date'],$input['end_date'])->days($input['repeat_days']);
            if($input['repeat_type'] == 'weeks')
                $dates = CarbonPeriod::between($input['start_date'],$input['end_date'])->weeks($input['repeat_days']);
            if($input['repeat_type'] == 'months')
                $dates = CarbonPeriod::between($input['start_date'],$input['end_date'])->months($input['repeat_days']);
            if($input['repeat_type'] == 'years')
                $dates = CarbonPeriod::between($input['start_date'],$input['end_date'])->years($input['repeat_days']);
            
            foreach ($dates as $key => $value) {
                 print_r($value->toDateString()); echo "<br/>";
                
            }

             die;
        }
        if($input['recurrence_type'] == 'repeat_on_the'){
            $dates = CarbonPeriod::between($input['start_date'],$input['end_date']);
                echo "<pre>";
           
            foreach ($dates as $key => $value) {
               
                if($value->week == $input['repeat_week'] && $value->weekNumberInMonth == $input['repeat_days'] && $value->month == $input['repeat_month']){
                    print_r($value->toDateString()); echo "<br/>";
                }
            }
             die;
        }
         die('__end');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
