<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
      //get class relashionship one to many
      public function get_Classes(Request $request)
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
    
          //get class relashionship one to many
          public function get_Section(Request $request)
          {
              $List_Classes = Section::where("classroom_id", $request->id)->get();
              $output = '<option value ="">' . ucfirst("--حدد القسم --") . '</option>';
      
              foreach ($List_Classes as $List_Classesitem) {
                  $output .= '<option value =" ' . $List_Classesitem->id . '">' . $List_Classesitem->name_sections . '</option>';
              }
              echo $output;
              /*
              $List_Classes = Classroom::where("Grade_id" , $id)->pluck("name_class" , "id");
              return $List_Classes;
              */
          }
}
