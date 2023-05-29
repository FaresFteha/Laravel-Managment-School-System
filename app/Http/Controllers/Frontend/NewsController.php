<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsSchool;
use Illuminate\Http\Request;
use App\Http\Traits\AttachFilesTrait;
use Livewire\WithPagination;

class NewsController extends Controller
{
    use AttachFilesTrait;
    use WithPagination;
    public function index()
    {
        //
        $News = NewsSchool::paginate(10);
        return view('pages.NewsSchool.index', compact('News'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.NewsSchool.create');
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
        //
        try {
            $News = new NewsSchool();
            $News->Title =  ['en' => $request->Title_en, 'ar' => $request->Title];
            $News->content =  ['en' => $request->content_en, 'ar' => $request->content];
            $News->file_name =  $request->file('file_name')->getClientOriginalName();
            $News->save();
            $this->uploadFile($request, 'file_name', 'NewsSchool');
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('News.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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

        $News = NewsSchool::findorfail($id);
        return view('pages.NewsSchool.edit', compact('News'));
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
        //
        //
        try {
            $News =   NewsSchool::findorfail($request->id);
            $News->Title =  ['en' => $request->Title_en, 'ar' => $request->Title];
            $News->content =  ['en' => $request->content_en, 'ar' => $request->content];
            if ($request->hasfile('file_name')) {

                $this->deleteFileNews($News->file_name);

                $this->uploadFile($request, 'file_name', 'EventsSchool');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $News->file_name = $News->file_name !== $file_name_new ? $file_name_new : $News->file_name;
            }
            $News->save();
            $this->uploadFile($request, 'file_name', 'NewsSchool');
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('News.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        $this->deleteFileNews($request->file_name);
        NewsSchool::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('News.index');
    }
}
