<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherSectionRequest;
use App\RepositoryInterface\TeacherRepositoryInterface;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
        $this->middleware('permission:List of Teachers|قائمة المعلمين' , ['only' => ['index' , 'show']]);
        $this->middleware('permission:Add Teachers|اضافة المعلمين', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل المعلمين|Edit Teachers', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف المعلمين|Delete Teachers', ['only' => ['destroy']]);
    }

    
    public function index()
    {
        //
        $Teachers =  $this->Teacher->getAllTeachers();

        return view('pages.Teachers.Teachers' , compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specializations= $this->Teacher->getSpecializations();
        $Gender= $this->Teacher->getGenders();
        return view('pages.Teachers.crerate' , compact('specializations' , 'Gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherSectionRequest $request)
    {
        //
        $Store =  $this->Teacher->StoreTeachers($request);
        return $Store;
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
        $Teachers = $this->Teacher->EditTeachers($id);
        $specializations= $this->Teacher->getSpecializations();
        $genders= $this->Teacher->getGenders();
        return view('pages.Teachers.Edit' , compact('Teachers' , 'specializations' , 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherSectionRequest $request)
    {
        //
        $Teachers = $this->Teacher->UpdateTeachers($request);
        return $Teachers;
 
        
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
        $Teacher = $this->Teacher->destoryTeachers($request);
        return $Teacher;
    }
}
