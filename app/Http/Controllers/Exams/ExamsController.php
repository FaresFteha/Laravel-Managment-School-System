<?php

namespace App\Http\Controllers\Exams;

use App\Models\Exams;
use App\Http\Requests\ExamsRequest;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\ExamsRepositoryInterface;
 use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Exams;
    public function __construct(ExamsRepositoryInterface $Exams)
    {
        $this->Exams=$Exams;     
        $this->middleware('permission:List Semester Exam Schedule|قائمة جدول امتحانات الفصل الدراسي', ['only' => ['index' ]]);
        $this->middleware('permission:Add Semester Exam Schedule|اضافة جدول امتحانات الفصل الدراسي', ['only' => ['create','store']]);
        $this->middleware('permission:Edit Semester Exam Schedule|تعديل جدول امتحانات الفصل الدراسي', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Semester Exam Schedule|حذف جدول امتحانات الفصل الدراسي', ['only' => ['destroy']]);   
        $this->middleware('permission:Print Semester Exam Schedule|طباعة جدول امتحانات الفصل الدراسي', ['only' => ['print_Exams']]);   
    }
    public function index()
    {
        //
        return $this->Exams->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->Exams->create();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamsRequest $request)
    {
        //
        return $this->Exams->store($request);

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
        return $this->Exams->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamsRequest $request)
    {
        //
        return $this->Exams->update($request);

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
        return $this->Exams->destroy($request);
    }



     public function print_Exams($id)
    {
        # code...
        $Exams = Exams::where('grade_id' , $id)->get();
        if ($Exams->isEmpty()) {
            toastr()->error(trans('exams_trans.examschedule'));
            return redirect()->route('Exams.index');
        } else {
            return view('pages.Exams.invoice', compact('Exams'));        }
     
    }
}
