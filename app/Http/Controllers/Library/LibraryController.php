<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\LibraryRepositoryInterface;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $Library;
    public function __construct(LibraryRepositoryInterface $Library)
    {
        $this->Library = $Library;
        $this->middleware('permission:List of Library|قائمة المكتبة', ['only' => ['index' ]]);
        $this->middleware('permission:Add book|اضافة كتب', ['only' => ['create','store']]);
        $this->middleware('permission:Edit book|تعديل كتب', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete book|حذف كتب', ['only' => ['destroy']]);
        $this->middleware('permission:Download a book|تحميل كتاب', ['only' => ['download']]);
    }
    public function index()
    {
        //

        return $this->Library->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->Library->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->Library->store($request);
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
        return $this->Library->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        return $this->Library->update($request);
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
        return $this->Library->destroy($request);
    }

    public function download($filename)
    {
        //
        return $this->Library->download($filename);
    }
}
