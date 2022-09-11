<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{

  public function faq_show()
  {
      $faq_data = Faq::get();
      return view('Admin.faq_show', compact('faq_data'));
  }

  public function faq_create()
  {
    return view('Admin.faq_create');
  }

  public function faq_store(Request $request)
  {

    $request->validate([
         'faq_title' => 'required',
         'faq_detail' => 'required'
    ]);

    $faq_data = new Faq();

    $faq_data->faq_title = $request->faq_title;
    $faq_data->faq_detail = $request->faq_detail;
    $faq_data->save();

    return redirect()->route('admin_faq_show')->with('success', 'Faq Saved Successfully.');

  }

  public function faq_edit($id)
  {
     $faq_single = Faq::where('id', $id)->first();
     return view('Admin.faq_edit', compact('faq_single'));
  }


  public function faq_update(Request $request, $id)
  {

    $request->validate([
        'faq_title' => 'required',
        'faq_detail' => 'required'
   ]);

    $faq = Faq::where('id', $id)->first();

    $faq->faq_title = $request->faq_title;
    $faq->faq_detail = $request->faq_detail;
    $faq->update();

    return redirect()->route('admin_faq_show')->with('success', 'Faq Updated Successfully.');

  }

  public function faq_delete($id)
  {
    $faq_single = Faq::where('id', $id)->first();
    $faq_single->delete();

    return redirect()->route('admin_faq_show')->with('success', 'Faq Deleted Successfully.');


  }

}
