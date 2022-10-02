<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;
use File;

class AdminLanguageController extends Controller
{

    public function language_show()
    {
        $language_data = Language::get();
        return view('Admin.language_show', compact('language_data'));
    }

    public function language_create()
    {
        return view('Admin.language_create');
    }

    public function language_store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'short_name' => 'required|unique:languages'
        ]);

        if ($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default' => 'No']);
        }

        $language_data = new Language();

        $language_data->name = $request->name;
        $language_data->short_name = $request->short_name;
        $language_data->is_default = $request->is_default;
        $language_data->save();

        $test_data = file_get_contents(resource_path('languages/sample.json'));
           // dd($test_data);
        file_put_contents(resource_path('languages/'.$request->short_name.'.json'),$test_data);

        return redirect()->route('admin_language_show')->with('success', 'Language Saved Successfully.');
    }

    public function language_edit($id)
    {
        $language_single = Language::where('id', $id)->first();
        return view('Admin.language_edit', compact('language_single'));
    }


    public function language_update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required'
            // 'short_name' => 'required'
        ]);

        if ($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default' => 'No']);
        }

        $language = Language::where('id', $id)->first();

        $language->name = $request->name;
        // $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        $language->update();

        return redirect()->route('admin_language_show')->with('success', 'Language Updated Successfully.');
    }

    public function language_delete($id)
    {
        $language_single = Language::where('id', $id)->first();

        if ($language_single->is_default == 'Yes') {
            DB::table('languages')->where('id', 1)->update(['is_default' => 'Yes']);
        }

        unlink(resource_path('languages/'.$language_single->short_name.'.json'));

        $language_single->delete();

        return redirect()->route('admin_language_show')->with('success', 'Language Deleted Successfully.');
    }

    public function update_detail($id)
    {

        $language_data = Language::where('id', $id)->first();
        $lang_id = $language_data->id;

        $json_data = json_decode(file_get_contents(resource_path('languages/'.$language_data->short_name.'.json')));
        return view('Admin.language_update_detail', compact('json_data','lang_id'));
    }

    public function update_detail_submit(Request $request, $id)
    {
        
        $language_data = Language::where('id', $id)->first();

        $arr1 = [];
        $arr2 = [];

        foreach( $request->arr_key as $val ){
            $arr1[] = $val;
        }

        foreach( $request->arr_value as $val ){
            $arr2[] = $val;
        }
 
        for($i=0; $i<count($arr1); $i++){
            $data[$arr1[$i]] = $arr2[$i];
        }

        $after_json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('languages/'. $language_data->short_name.'.json'),$after_json);

        return redirect()->route('admin_language_show')->with('success', 'Language updated Successfully.');

    }
}
