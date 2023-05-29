<?php
namespace App\Repository;
use App\RepositoryInterface\ZoomRepositoryInterface;
use App\Models\Grade;
use App\Models\OnlineClasse;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;
use Livewire\WithPagination;

class ZoomRepository implements ZoomRepositoryInterface
{
    use MeetingZoomTrait;
    use WithPagination;
    public function index()
    {
        $online_classes = OnlineClasse::where('Created_by' , auth()->user()->email)->
        when(\request()->keyword != null, function ($query) {
            $query->search(\request()->keyword);
        })
        ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);;;
        return view('pages.Zoom.index', compact('online_classes'));
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
        return view('pages.Zoom.create', compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Zoom Integration
    public function store( $request)
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
            return redirect()->route('Zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function indirectCreate()
    {
        //
        $Grades = Grade::all();
        return view('pages.Zoom.indirect', compact('Grades'));
    }

    //OffLine Zoom
    public function indirectStore( $request)
    {
        $request->validated();
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
            return redirect()->route('Zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function destroy( $request)
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
            return redirect()->route('Zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}