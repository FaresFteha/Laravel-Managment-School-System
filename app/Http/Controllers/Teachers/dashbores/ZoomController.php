<?php

namespace App\Http\Controllers\Teachers\dashbores;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoomRequest;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;
use App\Http\Traits\MeetingZoomTrait;
use MacsiDigital\Zoom\Facades\Zoom;

class ZoomController extends Controller
{
    use MeetingZoomTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $online_classes = OnlineClasse::where('Created_by', auth()->user()->email)->get();
        return view('pages.Teachers.dashboaed.Zoom.index', compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Grades = Grade::all();
        return view('pages.Teachers.dashboaed.Zoom.create', compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $meeting = $this->createMeeting($request);
            OnlineClasse::create([
                'integration' => 1,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'Created_by' => auth()->user()->email,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function indirectCreate()
    {
        //
        $Grades = Grade::all();
        return view('pages.Teachers.dashboaed.Zoom.indirect', compact('Grades'));
    }

    //OffLine Zoom
    public function indirectStore(ZoomRequest $request)
    {
        try {

            OnlineClasse::create([
                'integration' => 0,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'Created_by' => auth()->user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('zoom.index');
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
    public function destroy(Request $request)
    {
        try {
            //code...
            $info = OnlineClasse::findorfail($request->id);

            if ($info->integration == 1) {
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                //OnlineClasse::where('meeting_id', $request->id)->delete();
                OnlineClasse::destroy($request->id);
            } else {
                //  OnlineClasse::where('meeting_id', $request->id)->delete();
                OnlineClasse::destroy($request->id);
            }

            toastr()->success(trans('meesageop.Delete'));
            return redirect()->route('zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
