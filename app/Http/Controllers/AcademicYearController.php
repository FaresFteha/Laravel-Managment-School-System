<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\RepositoryInterface\AcademicyearsRepositoryInterface;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Academicyear;
    function __construct(AcademicyearsRepositoryInterface $Academicyear)
    {
    $this->Academicyear = $Academicyear;
    $this->middleware('permission:Academic Year|السنة الاكاديمية', ['only' => ['index']]);
    $this->middleware('permission:Add Academic Year|اضافة سنة اكاديمية', ['only' => ['create','store']]);
    $this->middleware('permission:Edit Academic Year|تعديل سنة اكاديمية', ['only' => ['edit','update']]);
    $this->middleware('permission:Delete Academic Year|حذف سنة اكاديمية', ['only' => ['destroy']]);
    }

    public function index()
    {
        return $this->Academicyear->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return $this->Academicyear->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        return $this->Academicyear->update($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Academicyear->destroy($request);

    }
}
