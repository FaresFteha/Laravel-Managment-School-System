<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Library;
use App\Http\Traits\AttachFilesTrait;
use App\RepositoryInterface\LibraryRepositoryInterface;
use Livewire\WithPagination;
class LibraryRepository implements LibraryRepositoryInterface
{
    use AttachFilesTrait;
    use WithPagination;
    public function index()
    {
        
        $books = Library::when(\request()->keyword != null, function ($query) {
            $query->search(\request()->keyword);
        })
        ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);
        return view('pages.Library.index' , compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.Library.create' , compact('grades')); 
    }

    public function store($request)
    {
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->Grade_id = $request->Grade_id;
            $books->classroom_id = $request->Classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();
            $this->uploadFile($request,'file_name' , 'library');

            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $book = Library::findorfail($id);
        $grades = Grade::all();
        return view('pages.Library.edit' , compact('grades' , 'book')); 
    }

    public function update($request)
    {
        try {

            $book = library::findorFail($request->id);
            $book->title = $request->title;

            if($request->hasfile('file_name')){

                $this->deleteFile($book->file_name);

                $this->uploadFile($request,'file_name' , 'library');

                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->Grade_id = $request->Grade_id;
            $book->classroom_id = $request->Classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('meesageop.Update'));
            return redirect()->route('Library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $this->deleteFile($request->file_name);
        Library::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('Library.index');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }
}
