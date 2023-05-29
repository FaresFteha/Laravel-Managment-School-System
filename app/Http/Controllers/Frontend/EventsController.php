<?php

namespace App\Http\Controllers\Frontend;

use App\Models\EventSchool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;

class EventsController extends Controller
{
    use AttachFilesTrait;

    public function index()
    {
        //
        $Events = EventSchool::get();
        return view('pages.EventsSchool.index' , compact('Events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.EventsSchool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $Event = new EventSchool();
            $Event->name_event =  ['en' => $request->name_event_en, 'ar' => $request->name_event_ar];
            $Event->event_date = $request->event_date;
            $Event->file_name =  $request->file('file_name')->getClientOriginalName();
            $Event->save();
            $this->uploadFile($request ,'file_name' , 'EventsSchool');
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Events.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        $event = EventSchool::findorfail($id);
        return view('pages.EventsSchool.edit' , compact('event')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try {
            $Event =  EventSchool::findorFail($request->id);
            $Event->name_event = $request->name_event;
            $Event->event_date = $request->event_date;
            if($request->hasfile('file_name')){

                $this->deleteFileEvent($Event->file_name);

                $this->uploadFile($request,'file_name' , 'EventsSchool');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $Event->file_name = $Event->file_name !== $file_name_new ? $file_name_new : $Event->file_name;
            }

            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Events.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $this->deleteFileEvent($request->file_name);
        EventSchool::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('Events.index');
    }
}
