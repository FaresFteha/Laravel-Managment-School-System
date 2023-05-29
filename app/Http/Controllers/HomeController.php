<?php

namespace App\Http\Controllers;

use App\Models\EventSchool;
use App\Models\Fee_invoice;
use App\Models\NewsSchool;
use App\Models\ReceiptStudent;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class HomeController extends Controller
{

    use WithPagination;
    public function index()
    {
        $data['events'] = EventSchool::latest()->take(5)->get();
        $data['news'] = NewsSchool::latest()->take(4)->get();
        return view('frontendpages.page.index.index' , $data);
    }

    public function showNews( )
    {
        $data['News'] = NewsSchool::paginate(8);
        return view('frontendpages.page.News.index' , $data);
    }

    public function showContent($id)
    {
        $data['News'] = NewsSchool::findorfail($id);
        return view('frontendpages.page.News.content' , $data);
    }

    public function about()
    {
        return view('frontendpages.page.Aboutschool.about');
    }

    public function Home()
    {

        return view('master');
    }


}
