<?php
namespace App\Repository;
use App\RepositoryInterface\SectionsRepositoryInterface;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;

class SectionsRepository implements SectionsRepositoryInterface
{
    public function index()
    {
   /*
      $teacher = Section::findOrFail(1);
      dd($teacher->Teachers) ;
     */
        $Grades = Grade::with(['Sections'])->get();//انوا يجيبل الحجات الي بتتعلق بكل سيكشن تحتو ما يجيبلي اباهم ملخبطات انوا
        $list_Grades = Grade::all();
        
        $Teachers = Teacher::all();
        // dd($Grades);
        return view('pages.Sections.Sections_view' , compact('Grades' , 'list_Grades' , 'Teachers'));
  
    }
  

    public function store($request)
    {
      try {
        //code...
        $validated = $request->validated();
        $Sections = new Section();
  
        $Sections->name_sections = ['ar'=>$request->name_sections , 'en' =>$request->name_sections_En];
        $Sections->Grade_id = $request->Grade_id;
        $Sections->classroom_id = $request->Classroom_id;
        $Sections->status = 1;
        $Sections->save();
        $Sections->Teachers()->attach($request->teacher_id);//attach-> اخدت الاي تاع التيتشر والاي دي تاع السيكشن وراحت ضيافهم في الحدول التالت تاع السكشن والتيتشر
        toastr()->success(trans('meesageop.success'));
        return redirect()->route('SectionsTableview');
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
        $Sections  = Section::findOrFail($request->id);
  
        $Sections->name_sections = ['ar'=>$request->name_sections , 'en' =>$request->name_sections_En];
        $Sections->Grade_id = $request->Grades_id;
        $Sections->classroom_id = $request->classrooms_id;
  
        if(isset($request->status)) {
          $Sections->status = 1;
        } else {
          $Sections->status = 2;
        }
  
          //update pivot table
  
          if(isset($request->teacher_id)){
            $Sections->Teachers()->sync($request->teacher_id);
          }else{
            $Sections->Teachers()->sync(array());
          }
  
        $Sections->save();
        toastr()->success(trans('meesageop.Update'));
  
        return redirect()->route('SectionsTableview');
      } catch (\Throwable $th) {
        //throw $th;
        return redirect()->back()->withErrors(['error' => $th->getmESSAGE()]);
      }
    }
  

    public function destroy($request)
    {
      $section = Section::findOrFail($request->id)->delete();
      toastr()->error(trans('meesageop.Delete'));
      return redirect()->route('SectionsTableview');
     }
  
  //get class relashionship one to many
    public function getclasses($request)
    {
      $List_Classes = Classroom::where("Grade_id", $request->id)->get();
      $output = '<option value ="">' . ucfirst("--حدد الصف --") . '</option>';
  
          foreach ($List_Classes as $List_Classesitem) {
              $output .= '<option value =" ' . $List_Classesitem->id . '">' . $List_Classesitem->name_class . '</option>';
          }
          echo $output;
      /*
      $List_Classes = Classroom::where("Grade_id" , $id)->pluck("name_class" , "id");
      return $List_Classes;
      */
    }
}

