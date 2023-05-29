<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Traits\AttachFilesTrait;

class SettingController extends Controller
{
    use AttachFilesTrait;

    function __construct()
    {
    $this->middleware('permission:Settings|الاعدادات' , ['only' => ['index' , 'show']]);
    $this->middleware('permission:Edit Settings|تعديل الاعدادات', ['only' => ['edit','update']]);
    }

    public function index()
    {

        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->Key => $collection->Value];
        });
        return view('pages.Setting.index', $setting);
    }


    public function update(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'logo'); //شيلي التلت اتربيوت الموجودة قي الدالة
            //best case
            foreach ($info as $key => $value) {
                Setting::where('Key', $key)->update(['Value' => $value]);
            }
            //Worst Case
            //            $key = array_keys($info);
            //            $value = array_values($info);
            //            fo r($i =0; $i<count($info);$i++){
            //                Setting::where('key', $key[$i])->update(['value' => $value[$i]]);
            //            }
            if ($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('Key', 'logo')->update(['Value' => $logo_name]);
                $this->uploadFile($request, 'logo', 'Logo');
            }
            toastr()->success(trans('meesageop.Update'));
            return back();
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
