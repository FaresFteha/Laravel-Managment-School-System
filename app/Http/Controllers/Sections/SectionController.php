<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\RepositoryInterface\SectionsRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{


  protected $Section;
  function __construct(SectionsRepositoryInterface $Section)
  {
    $this->Section=$Section;
  $this->middleware('permission:List of academic sections|قائمة الاقسام الدراسية' , ['only' => ['index' , 'show']]);
  $this->middleware('permission:اضافة الصفوف|Add Sections', ['only' => ['create','store']]);
  $this->middleware('permission:تعديل الصفوف|Edit Sections', ['only' => ['edit','update']]);
  $this->middleware('permission:حذف الصفوف|Delete Sections', ['only' => ['destroy']]);
  }
  
  public function index()
  {

    return $this->Section->index();

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
  public function store(StoreSectionRequest $request)
  {
    return $this->Section->store($request);

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
  public function update(StoreSectionRequest $request)
  {
    return $this->Section->update($request);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    return $this->Section->destroy($request);

  }
}

?>
