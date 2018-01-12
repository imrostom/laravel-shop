<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeOptionController extends Controller {

    public function save_option(Request $request) {

        $data = array();

        $request->validate([
            'header_phone' => 'required',
            'header_email' => 'required',
            'facebook_url' => 'required',
            'twitter_url' => 'required',
            'linkin_url' => 'required',
            'google_url' => 'required',
            'sidebar_add_link' => 'required',
            'about_us_text' => 'required',
            'footer_contact_address' => 'required',
            'copyright_by' => 'required',
            'developed_by' => 'required',
            'map_latitude' => 'required',
            'map_longitute' => 'required',
            'contact_page_address' => 'required',
        ]);

        if ($request->hasFile('theme_logo')) {
            $request->validate([
                'theme_logo' => 'required|mimes:jpeg,jpg,png|max:3000'
            ]);
            $request->theme_logo->store('public/images');
            $data['theme_logo'] = $request->theme_logo->hashName();
        }
        if ($request->hasFile('sidebar_add_img')) {
            $request->validate([
                'sidebar_add_img' => 'required|mimes:jpeg,jpg,png|max:3000'
            ]);
            $request->sidebar_add_img->store('public/images');
            $data['sidebar_add_img'] = $request->sidebar_add_img->hashName();
        }

        $data['header_phone'] = $request->header_phone;
        $data['header_email'] = $request->header_email;
        $data['facebook_url'] = $request->facebook_url;
        $data['twitter_url'] = $request->twitter_url;
        $data['linkin_url'] = $request->linkin_url;
        $data['google_url'] = $request->google_url;
        $data['sidebar_add_link'] = $request->sidebar_add_link;
        $data['about_us_text'] = $request->about_us_text;
        $data['footer_contact_address'] = $request->footer_contact_address;
        $data['copyright_by'] = $request->copyright_by;
        $data['developed_by'] = $request->developed_by;
        $data['map_latitude'] = $request->map_latitude;
        $data['map_longitute'] = $request->map_longitute;
        $data['contact_page_address'] = $request->contact_page_address;
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        $result = DB::table('tbl_option')->update($data);

        if ($result) {
            return redirect('option')->with('message', 'Options Updated Sucesfully');
        } else {
            return redirect('option')->with('message', 'Options Updated Failed');
        }
    }

}
