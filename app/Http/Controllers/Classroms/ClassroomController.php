<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Classroms;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Controllers\Controller;

use App\RepositoryInterface\ClassroomsRepositoryInterface;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  protected $Classroom;
  
  function __construct(ClassroomsRepositoryInterface $Classroom)
  {
    $this->Classroom = $Classroom;
    $this->middleware('permission:List of Classrooms|قائمة الصفوف الدراسية', ['only' => ['index', 'show']]);
    $this->middleware('permission:Add Classrooms|اضافة الصفوف', ['only' => ['create', 'store']]);
    $this->middleware('permission:تعديل الصفوف|Edit Classrooms', ['only' => ['edit', 'update']]);
    $this->middleware('permission:Delete Classrooms|حذف الصفوف', ['only' => ['destroy']]);
    $this->middleware('permission:Delete Chooese Classrooms|حذف الصفوف المختارة', ['only' => ['delete_all']]);
  }

  public function index(Request $request)
  {
    return $this->Classroom->index($request);
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreClassroomRequest $request)
  {

    return $this->Classroom->store($request);

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreClassroomRequest $request)
  {
 

      return $this->Classroom->update($request);

  }

 
  public function destroy(Request $request)
  {
    return $this->Classroom->destroy($request);

  }


  public function delete_all(Request $request)
  {
    return $this->Classroom->delete_all($request);

  }

  public function Filter_Classes(Request $request)
  {
    return $this->Classroom->Filter_Classes($request);

  }
}
