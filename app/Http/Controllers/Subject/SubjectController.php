<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectsRequest;
use App\RepositoryInterface\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Subject;
     public function __construct(SubjectRepositoryInterface $Subject)
     {
        $this->Subject = $Subject;
        $this->middleware('permission:قائمة المواد|List Subjects', ['only' => ['index' ]]);
        $this->middleware('permission:اضافة المواد|Add Subjects', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل المواد|Edit Subjects', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف المواد|Delete Subjects', ['only' => ['destroy']]);
     }

    public function index()
    {
        //
        return $this->Subject->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->Subject->create();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectsRequest $request)
    {
        return $this->Subject->store($request);

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
        return $this->Subject->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectsRequest $request)
    {
        //
        return $this->Subject->update($request);

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
        return $this->Subject->destroy($request);

    }
}
