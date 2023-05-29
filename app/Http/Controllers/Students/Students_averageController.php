<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentsAvaregeRequest;
use App\Models\AvaregeMark;

use App\RepositoryInterface\StudentsAvaregeRepositoryInterface;
use Illuminate\Http\Request;


class Students_averageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $StudentAc;
    public function __construct(StudentsAvaregeRepositoryInterface $StudentAc)
    {
        $this->StudentAc =$StudentAc;
        $this->middleware('permission:List of Students marks and GPA|قائمة المكتبة', ['only' => ['index' ]]);
        $this->middleware('permission:Add marks|اضافة العلامات', ['only' => ['create','store']]);
        $this->middleware('permission:show marks|عرض العلامات', ['only' => ['mark_show','show']]);
        $this->middleware('permission:Calculation marks|حساب المعدل', ['only' => ['avaregeMarksCreate']]);
        $this->middleware('permission:Delete marks|حذف العلامات', ['only' => ['destroy']]);
    }

    public function index()
    {
        $StudentAcs = $this->StudentAc->index();
        return $StudentAcs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $StudentAcs = $this->StudentAc->create();
        return $StudentAcs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsAvaregeRequest $request)
    {
        $StudentAcs = $this->StudentAc->store($request);
        return $StudentAcs;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $StudentAcs = $this->StudentAc->show($id);
        return $StudentAcs;

    }

    public function mark_show($id)
    {
        $StudentAcs = $this->StudentAc->mark_show($id);
        return $StudentAcs;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $StudentAcs = $this->StudentAc->edit($id);
        return $StudentAcs;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $StudentAcs = $this->StudentAc->update($request,$id);
        return $StudentAcs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $StudentAcs = $this->StudentAc->destroy($request);
        return $StudentAcs;
    }

    public function avaregeMarksCreate($id){
        $StudentAcs = $this->StudentAc->avaregeMarksCreate($id);
        return $StudentAcs;
    }

    
    public function avaregeMarksfirstStore(Request $request){

        $Avg = new AvaregeMark();
        $Avg->Avarege = $request->Avarege;
        $Avg->semester = $request->semester;
        $Avg->Student_id = $request->Student_id;
       
        if($Avg->semester === '1'){

            $Avg->save();
            toastr()->success(trans('تم اضافة معدل الفصل الاول'));
            return redirect()->route('StudentsAvarege.index');
        }else{
            $Avg->save();
            toastr()->success(trans('تم اضافة معدل الفصل الثاني'));
            return redirect()->route('StudentsAvarege.index');
        }

    }
}
