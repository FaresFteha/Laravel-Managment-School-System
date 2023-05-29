<?php
namespace App\Repository;
use App\RepositoryInterface\AcademicyearsRepositoryInterface;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Livewire\WithPagination;
class AcademicyearsRepository implements AcademicyearsRepositoryInterface
{
    use WithPagination;
    public function index()
    {
        //
        
        $academicyears = AcademicYear::paginate(5);
        return view('pages.AcademicYear.AcademicYears' , compact('academicyears'));
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
    public function store($request)
    {
        //
        $academicyear =  new AcademicYear();
        $academicyear->academicyear = $request->academicyear;
        $academicyear->save();
        toastr()->success(trans('meesageop.success'));
        return redirect()->route('Academicyear.index');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update($request)
    {
        //
        $academicyear = AcademicYear::findOrFail($request->id);
        $academicyear->academicyear = $request->academicyear;
        $academicyear->save();
        toastr()->success(trans('meesageop.Update'));
        return redirect()->route('Academicyear.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        //
        AcademicYear::destroy($request->id);
        toastr()->error(trans('meesageop.success'));
        return redirect()->route('Academicyear.index');
    }
}