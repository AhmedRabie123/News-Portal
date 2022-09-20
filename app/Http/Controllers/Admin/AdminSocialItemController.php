<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialItem;

class AdminSocialItemController extends Controller
{
    public function social_item_show()
    {
        $social_item_data = SocialItem::get();
        return view('Admin.social_item_show', compact('social_item_data'));
    }

  
    public function social_item_create()
    {
      return view('Admin.social_item_create');
    }
  
    public function social_item_store(Request $request)
    {
  
      $request->validate([
           'icon' => 'required',
           'url' => 'required'
      ]);
  
      $social_item_data = new SocialItem();
  
      $social_item_data->icon = $request->icon;
      $social_item_data->url = $request->url;
      $social_item_data->save();
  
      return redirect()->route('admin_social_item_show')->with('success', 'Social Item Saved Successfully.');
  
    }
  
    public function social_item_edit($id)
    {
       $social_item_single = SocialItem::where('id', $id)->first();
       return view('Admin.social_item_edit', compact('social_item_single'));
    }
  
  
    public function social_item_update(Request $request, $id)
    {
  
      $request->validate([
          'icon' => 'required',
          'url' => 'required'
     ]);
  
      $social_item = SocialItem::where('id', $id)->first();
  
      $social_item->icon = $request->icon;
      $social_item->url = $request->url;
      $social_item->update();
  
      return redirect()->route('admin_social_item_show')->with('success', 'Social Item Updated Successfully.');
  
    }
  
    public function social_item_delete($id)
    {
      $social_item_single = SocialItem::where('id', $id)->first();
      $social_item_single->delete();
  
      return redirect()->route('admin_social_item_show')->with('success', 'Social Item Deleted Successfully.');
  
  
    }
}
