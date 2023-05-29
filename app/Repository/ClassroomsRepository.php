<?php
namespace App\Repository;
use App\Models\Grade;
use App\Models\Classroom;
use App\RepositoryInterface\ClassroomsRepositoryInterface;
use Livewire\WithPagination;

class ClassroomsRepository implements ClassroomsRepositoryInterface
{

use WithPagination;
  public function index($request)
  {
    $Grade = Grade::get();
    $search = $request->input('keyword');
    $Classrooms = Classroom::where('name_class->ar', 'LIKE', "%{$search}%")
      ->orWhere('name_class->en', 'LIKE', "%{$search}%")
      ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
      ->paginate(\request()->limit_by ?? 5);
    return view('pages.Classroms.Classrooms', compact('Grade', 'Classrooms'));
  }

 
  public function store($request)
  {

    $List_Class = $request->List_Classes;
    try {

      /*
  $this->validate($request, [
    'name_class' => 'required',
    'name_class_en' => 'required',
  ],
  [

    'name_class.required' => trans('validation.required'),
    'name_class_en.required' =>  trans('validation.required'),
  ]
  
);
*/
      // Retrieve the validated input data...
      $validated = $request->validated();

      $List_Class = $request->List_Classes;
      foreach ($List_Class as $List_Classitems) {
        # code...
        $ClassroomS = new Classroom();
        $ClassroomS->name_class = ['en' => $List_Classitems['name_class_en'], 'ar' => $List_Classitems['name_class']];

        $ClassroomS->Grade_id = $List_Classitems['Grade_id'];
        $ClassroomS->save();
      }

      toastr()->success(trans('meesageop.success'));
      return redirect()->route('ClassTableview');
    } catch (\Exception $th) {
      //throw $th;
      return redirect()->back()->withErrors(['error' => $th->getMessage()]);
    }
  }


  public function update($request)
  {
    try {

      //code...
      $validated = $request->validated();
      $Classroom = Classroom::findOrFail($request->id);
      $Classroom->update([
        $Classroom->name_class = ['en' => $request->name_class_en, 'ar' => $request->name_class],
        $Classroom->Grade_id = $request->Grade_id,

      ]);

      toastr()->success(trans('meesageop.Update'));
      return redirect()->route('ClassTableview');
    } catch (\Exception $th) {
      return redirect()->back()->withErrors(['error' => $th->getmESSAGE()]);
    }
  }

  public function destroy($request)
  {
    Classroom::findOrFail($request->id)->delete();
    toastr()->error(trans('meesageop.Delete'));
    return redirect()->route('ClassTableview');
  }


  public function delete_all($request)
  {
    $delete_all_id = explode(",", $request->delete_all_id);
    //explode-> القيم الي عندي بتحطها لالي باراي ظ
    Classroom::whereIn('id', $delete_all_id)->delete();
    //whereIn-عملتها لانو الاكسبلود رح تطلبها وبعدين انا عندي اكثر من حاجة اكثر من قيمة
    //يعني بقوا خود بالك الاراي جاي معاها اكتر اي دي 
    toastr()->error(trans('meesageop.Delete'));
    return redirect()->route('ClassTableview');
  }

  public function Filter_Classes($request)
  {
    $Grade = Grade::all();
    $Sreche = Classroom::select('*')->where('Grade_id', $request->Grade_id)->paginate(10);
    return view('pages.Classroms.Classrooms', compact('Grade'))->withDetails($Sreche);
  }
}
