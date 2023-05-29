<?php

namespace App\Repository;
use App\Models\Classroom;
use App\Models\Grade;
use App\RepositoryInterface\GradesRepositoryInterface;
use Livewire\WithPagination;
class GradesRepository implements GradesRepositoryInterface
{
    use WithPagination;
    public function index()
    {
        $search = \request()->input('keyword');
        $Grade =  Grade::where('name->ar', 'LIKE', "%{$search}%")
            ->orWhere('name->en', 'LIKE', "%{$search}%")
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 5);

        return view('pages.Grades.Grades_view', compact('Grade'));
    }


    public function store($request)
    {
        /*
    if(Grade::where('name->ar' , $request->name)->orWhere('name->en' , $request->name_en)->exists()){
      return redirect()->back()->withErrors([trans('grades_trans.exists')]);
    }//exists->يعني انوا في داخلو الحجات الي انا قايلوا اياها
*/
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            $Grade = new Grade();

            $Grade->name = ['en' => $request->name_en, 'ar' => $request->name]; //اجيت من المستخدم الاسم العربي والانجليزي بعدين ارسلو على الداتا بيز يكولوم واحد
            $Grade->notes = ['en' => $request->notes_en, 'ar' => $request->notes];
            $Grade->save();

            toastr()->success(trans('meesageop.success'));
            return redirect()->route('GradesTableview');
        } catch (\Exception $th) {
            //throw $th;
            return redirect()->back()->withErrors(['error' => $th->getmESSAGE()]);
        }
    }


    public function update($request)
    {
        try {

            //code...
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->name = ['en' => $request->name_en, 'ar' => $request->name],
                $Grades->notes = ['en' => $request->notes_en, 'ar' => $request->notes],

            ]);

            toastr()->success(trans('meesageop.Update'));
            return redirect()->route('GradesTableview');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors(['error' => $th->getmESSAGE()]);
        }
    }


    public function destroy($request)
    {

        $clsssid = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');
        //pluck->لاستخراج قيم معينة من المجموعة. قد ترغب غالبًا في استخراج بيانات معينة من المجموعة
        if ($clsssid->count() == 0) {
            # code...
            $Graeds = Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('meesageop.Delete'));
            return redirect()->route('GradesTableview');
        } else {
            toastr()->error(trans('grades_trans.delete_Grade_Error'));
            return redirect()->route('GradesTableview');
        }
    }
}
