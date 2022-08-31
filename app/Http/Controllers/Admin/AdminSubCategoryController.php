<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class AdminSubCategoryController extends Controller
{
   
    public  function sub_category_show()
    {
        $sub_categories = SubCategory::with('rCategory')->orderBy('sub_category_order', 'asc')->get();
        return view('Admin.sub_category_show', compact('sub_categories'));

    }

    public  function sub_category_create()
    {
        $categories = Category::orderBy('category_order', 'asc')->get();
        return view('Admin.sub_category_create', compact('categories'));

    }

    public  function sub_category_store(Request $request)
    {

        $request->validate([
            'sub_category_name' => 'required|',
            'sub_category_order' => 'required|'
        ]);

        $sub_category = new SubCategory();

       $sub_category->sub_category_name = $request->sub_category_name;
       $sub_category->show_on_menu = $request->show_on_menu;
       $sub_category->sub_category_order = $request->sub_category_order;
       $sub_category->category_id = $request->category_id;
       $sub_category->save();

        return redirect()->route('admin_sub_category_show')->with('success', 'sub Category Created successfully.');

    }


}
