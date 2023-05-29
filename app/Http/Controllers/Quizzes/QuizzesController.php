<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzesRequest;
use App\RepositoryInterface\QuizzesRepositoryInterface;
 use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Quizzes;
    public function __construct(QuizzesRepositoryInterface $Quizzes)
    {
        $this->Quizzes = $Quizzes;
        $this->middleware('permission:List of Quizzes|قائمة الاختبارات', ['only' => ['index' ]]);
        $this->middleware('permission:اضافة الاختبارات|Add Quizzes', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل الاختبارات|Edit Quizzes', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف الاختبارات|Delete Quizzes', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        return $this->Quizzes->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->Quizzes->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizzesRequest $request)
    {
        //
        return $this->Quizzes->store( $request);

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
        return $this->Quizzes->store( $id);

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
        return $this->Quizzes->edit( $id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizzesRequest $request)
    {
        //
        return $this->Quizzes->update( $request);

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
        return $this->Quizzes->destroy($request);

    }
}
