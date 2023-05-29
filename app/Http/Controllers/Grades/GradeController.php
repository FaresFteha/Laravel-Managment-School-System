<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Grades;

use App\RepositoryInterface\GradesRepositoryInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradesRequest;
use Illuminate\Http\Request;


class GradeController extends Controller
{


  protected $Grade;

  public function __construct(GradesRepositoryInterface $Grade)
    {
    $this->Grade = $Grade;
    $this->middleware('permission:List of grades|قائمة المراحل الدراسية' , ['only' => ['index' , 'show']]);
    $this->middleware('permission:Add Grade|اضافة مرحلة', ['only' => ['create','store']]);
    $this->middleware('permission:تعديل مرحلة|Edit Grade', ['only' => ['edit','update']]);
    $this->middleware('permission:Delete Grade|حذف مرحلة', ['only' => ['destroy']]);
    
    }

  public function index()
  {
    return $this->Grade->index();
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
  public function store(StoreGradesRequest $request)
  {
    return $this->Grade->store($request);

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
  public function update(StoreGradesRequest $request)
  {
    return $this->Grade->update($request);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    return $this->Grade->destroy($request);

  }
}
