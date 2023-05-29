<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;
use App\RepositoryInterface\QuestionsRepositoryInterface;
 use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $Questions;

    public function __construct(QuestionsRepositoryInterface $Questions)
    {
        $this->Questions = $Questions;
        $this->middleware('permission:Questions|الاسئلة', ['only' => ['index' ]]);
        $this->middleware('permission:Add Questions|اضافة الاسئلة', ['only' => ['create','store']]);
        $this->middleware('permission:Edit Questions|تعديل الاسئلة', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Questions|حذف الاسئلة', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        return $this->Questions->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->Questions->create();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request)
    {
        //
        return $this->Questions->store($request);

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
        return $this->Questions->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request)
    {
        //
        return $this->Questions->update($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Questions->destroy($request);
    }
}
