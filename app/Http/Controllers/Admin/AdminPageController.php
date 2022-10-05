<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{

    public function admin_about_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.about_page', compact('page_data'));
    }

    public function admin_about_update(Request $request)
    {

        $request->validate([
            'about_title' => 'required|',
            'about_detail' => 'required|'
        ]);

        $page = Page::where('id', $request->id)->first();

        $page->about_title = $request->about_title;
        $page->about_detail = $request->about_detail;
        $page->about_status = $request->about_status;
        $page->update();

        return redirect()->route('admin_page_about')->with('success', 'About Page updated successfully.');

    }

    public function admin_faq_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.faq_page', compact('page_data'));
    }

    public function admin_faq_update(Request $request)
    {

        $request->validate([
            'faq_title' => 'required'
            
        ]);

        $page = Page::where('id', $request->id)->first();

        $page->faq_title = $request->faq_title;
        $page->faq_detail = $request->faq_detail;
        $page->faq_status = $request->faq_status;
        $page->update();

        return redirect()->route('admin_page_faq')->with('success', 'FAQ Page updated successfully.');

    }

    public function admin_terms_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.terms_page', compact('page_data'));
       
    }

    public function admin_terms_update(Request $request)
    {

        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required'
            
        ]);
        

       $page = Page::where('id', $request->id)->first();
      
        $page->terms_title = $request->terms_title;
        $page->terms_detail = $request->terms_detail;
        $page->terms_status = $request->terms_status;
        $page->update();

       return redirect()->route('admin_page_terms')->with('success', 'Terms Page updated successfully.');

      
    }

    public function admin_Privacy_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.privacy_page', compact('page_data'));
       
    }

    public function admin_Privacy_update(Request $request)
    {

        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required'
            
        ]);
        

       $page = Page::where('id', $request->id)->first();
      
        $page->privacy_title = $request->privacy_title;
        $page->privacy_detail = $request->privacy_detail;
        $page->privacy_status = $request->privacy_status;
        $page->update();

       return redirect()->route('admin_page_Privacy')->with('success', 'Privacy Page updated successfully.');

      
    }

    public function admin_disclaimer_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.disclaimer_page', compact('page_data'));
       
    }

    public function admin_disclaimer_update(Request $request)
    {

        $request->validate([
            'disclaimer_title' => 'required',
            'disclaimer_detail' => 'required'
            
        ]);
        

       $page = Page::where('id', $request->id)->first();
      
        $page->disclaimer_title = $request->disclaimer_title;
        $page->disclaimer_detail = $request->disclaimer_detail;
        $page->disclaimer_status = $request->disclaimer_status;
        $page->update();

       return redirect()->route('admin_page_disclaimer')->with('success', 'disclaimer Page updated successfully.');

    }

    public function admin_login_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.login_page', compact('page_data'));
       
    }

    public function admin_login_update(Request $request)
    {

        $request->validate([
            'login_title' => 'required'
            
        ]);
        

        $page = Page::where('id', $request->id)->first();
      
        $page->login_title = $request->login_title;
        $page->login_status = $request->login_status;
        $page->update();

       return redirect()->route('admin_page_login')->with('success', 'Login Page updated successfully.');

    }

    public function admin_contact_show()
    {
        $page_data = Page::with('rLanguage')->get();
        return view('Admin.contact_page', compact('page_data'));
       
    }

    public function admin_contact_update(Request $request)
    {

        $request->validate([
            'contact_title' => 'required'
            
        ]);
        

       $page = Page::where('id', $request->id)->first();

       //dd($request->contact_detail);
      
        $page->contact_title = $request->contact_title;
        $page->contact_detail = $request->contact_detail;
        //$page->contact_detail = (!is_null($request->contact_detail) ? $request->contact_detail : "");
        $page->contact_map = $request->contact_map;
        $page->contact_status = $request->contact_status;
        $page->update();

       return redirect()->route('admin_page_contact')->with('success', 'Contact Page updated successfully.');

    }
   
   
}
