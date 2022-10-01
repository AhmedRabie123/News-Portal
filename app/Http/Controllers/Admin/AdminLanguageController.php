<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;

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
            'short_name' => 'required'
        ]);

        if ($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default' => 'No']);
        }

        $language_data = new Language();

        $language_data->name = $request->name;
        $language_data->short_name = $request->short_name;
        $language_data->is_default = $request->is_default;
        $language_data->save();

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
            'name' => 'required',
            'short_name' => 'required'
        ]);

        if ($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default' => 'No']);
        }

        $language = Language::where('id', $id)->first();

        $language->name = $request->name;
        $language->short_name = $request->short_name;
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

        $language_single->delete();

        return redirect()->route('admin_language_show')->with('success', 'Language Deleted Successfully.');
    }
}
