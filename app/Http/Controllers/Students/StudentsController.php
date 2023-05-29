<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\RepositoryInterface\StudentsRepositoryInterface;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public $Students;
    public function __construct(StudentsRepositoryInterface $Students)
    {
        $this->Students = $Students;
        $this->middleware('permission:Student Informaion|قائمة الطلاب' , ['only' => ['create']]);
        $this->middleware('permission:List Student|قائمة الطلاب', ['only' => ['view_Students']]);
        $this->middleware('permission:Add Student|اضافة الطلاب', ['only' => ['store']]);
        $this->middleware('permission:show Student|عرض الطلاب', ['only' => ['show']]);
        $this->middleware('permission:Edit Student|تعديل الطلاب', ['only' => ['edit']]);
        $this->middleware('permission:Delete Student|حذف الطلاب', ['only' => ['destroy']]);

        $this->middleware('permission:Add attachments for students|اضافة مرفقات للطلاب', ['only' => ['Upbloade_Attachment']]);
        $this->middleware('permission:download attachments for students|تحميل مرفقات للطلاب', ['only' => ['Download_attachement']]);
        $this->middleware('permission:Delete attachments for students|حذف مرفقات للطلاب', ['only' => ['Delete_attachment']]);
        
        $this->middleware('permission:Print with Payments|اطبع المدفوعات', ['only' => ['print_Fatora']]);
        $this->middleware('permission:Account statement|كشف حساب', ['only' => ['accounts_Statment']]);

    }



    public function index()
    {
        $Student = $this->Students->view_Page();

        return $Student;
    }

    public function get_Classes(Request $request)
    {
        $Student = $this->Students->get_Classes($request);
        return $Student;
    }

    public function get_Section(Request $request)
    {
        $Student = $this->Students->get_Section($request);
        return $Student;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = $this->Students->view_Sections();

        return $students;
    }

    public function view_Students($id)
    {

        $students = $this->Students->view_Students($id);

        return $students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
        //

        $student = $this->Students->Store_Student($request);

        return $student;
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
        $student = $this->Students->Students_Show($id);

        return $student;
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
        $student = $this->Students->Students_Edit($id);

        return $student;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentsRequest $request)
    {
        //
        $student = $this->Students->Students_Update($request);

        return $student;
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
        $student = $this->Students->Students_Destory($request);

        return $student;
    }

    public function Upbloade_Attachment(Request $request)
    {
        //
        $student = $this->Students->Upbloade_Attachment($request);

        return $student;
    }

    public function Download_attachement($studentsname, $filename)
    {
        $student = $this->Students->Download_attachement($studentsname, $filename);
        return $student;
    }

    public function Delete_attachment(Request $request)
    {
        $student = $this->Students->Delete_attachment($request);
        return $student;
    }

    public function print_Fatora($id)
    {
        $student = $this->Students->print_Fatora($id);
        return $student;
    }

    public function accounts_Statment($id)
    {
        $student = $this->Students->accounts_Statment($id);
        return $student;

    }




    /*
     public function search(Request $request){
        $output ="";
        $Student = Student::where('name->ar', 'LIKE', '%'.$request->search.'%')
        ->orWhere('name->en', 'LIKE', '%'.$request->search.'%')
        ->orWhere('email' ,'LIKE', '%'.$request->search.'%')->get();

        foreach($Student as $StudentS)
        {
            
            $output.=
            '<tr>
            <td>'.$StudentS->id.'</td>
            <td>'.$StudentS->name.'</td>
            <td>'.$StudentS->email.'</td>
            <td>'.$StudentS->gender->gender.'</td>
            <td>'.$StudentS->grade->name.'</td>
            <td>'.$StudentS->classroom->name_class.'</td>
            <td>'.$StudentS->section->name_sections.'</td>
           
            </tr>';
        }
        return response($output);
     }
    */
}
