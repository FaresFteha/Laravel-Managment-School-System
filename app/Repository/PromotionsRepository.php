<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Promotion;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\RepositoryInterface\PromotionsRepositoryInterface;

class PromotionsRepository implements PromotionsRepositoryInterface
{
 use WithPagination;
    public function view()
    {

        $Grades = Grade::get();
        return view('pages.Students.Promotions.index', compact('Grades'));
    }

    public function Store($request)
    {
        DB::beginTransaction();
        try {
            //code...
            $students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id',   $request->Classroom_id)
                ->where('section_id', $request->section_id)
                ->where('academic_year', $request->academic_year)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }
            // update in table student
            foreach ($students as $student) {

                $ids = explode(',', $student->id);
                student::whereIn('id', $ids)
                    ->update([
                        'Grade_id' => $request->Grade_id_new,
                        'Classroom_id' => $request->Classroom_id_new,
                        'section_id' => $request->section_id_new,
                        'academic_year' => $request->academic_year_New,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id' => $student->id,

                    'from_grade' => $request->Grade_id,
                    'from_classroom' => $request->Classroom_id,
                    'from_section' => $request->section_id,

                    'to_grade' => $request->Grade_id_new,
                    'to_classroom' => $request->Classroom_id_new,
                    'to_section' => $request->section_id_new,

                    'academic_year' => $request->academic_year,
                    'academic_year_New' => $request->academic_year_New,
                ]);
            }
            DB::commit();
            toastr()->success(trans('meesageop.success'));
            return redirect()->back();
        } catch (\Exception  $e) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function Create()
    {
     /*   where('student_id->ar', 'LIKE', "%{$search}%")
        ->orWhere('student_id->en', 'LIKE', "%{$search}%")*/
        $search = \request()->input('keyword');
        $promotions = Promotion::orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);
        return view('pages.Students.Promotions.Management', compact('promotions'));
    }

    public function destroy($request)
    {
        DB::beginTransaction();

        try {
            //code...
            //التراجع عن الكل
            if ($request->page_id == 1) {
                $promotions = Promotion::all();
                foreach ($promotions as $promotion) {
                    # التحديث في جدول الطلاب
                    $ids = explode(',', $promotion->student_id);
                    student::whereIn('id', $ids)
                        ->update([
                            'Grade_id' => $promotion->from_grade,
                            'Classroom_id' => $promotion->from_classroom,
                            'section_id' => $promotion->from_section,
                            'academic_year' => $promotion->academic_year,
                        ]);
                    //حذف جدول الترقيات
                    promotion::destroy($promotion->student_id);
                    DB::commit();
                    toastr()->error(trans('meesageop.Delete'));
                    return redirect()->back();
                }
            } else {
                $promotion = Promotion::findOrfail($request->id);
                student::where('id', $promotion->student_id)
                    ->update([
                        'Grade_id' => $promotion->from_grade,
                        'Classroom_id' => $promotion->from_classroom,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->academic_year,
                    ]);
                $promotion::destroy($request->id);
                DB::commit();
                toastr()->error(trans('meesageop.Delete'));
                return redirect()->back();
            }
        } catch (\Exception $th) {
            DB::rollback();
            //  DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
