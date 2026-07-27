<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\policysettings;
use App\Models\settings;
use Illuminate\Http\Request;

class settingscontroller extends Controller
{
    public function websitesettings(){
        $website_settings = settings::first();
        // dd($website_settings);
        return view("admin.settings.websitesettings",compact("website_settings"));
    }
    public function updatesetting(Request $request){
        $website_settings = settings::first();
        $website_settings->phone = $request->phone;
        $website_settings->email = $request->email ;
        $website_settings->adress = $request->adress;
        $website_settings->facebook = $request->facebook ;
        $website_settings->twitter = $request->twitter ;
        $website_settings->instagram = $request->instagram ;
        $website_settings->youtube = $request->youtube ;

         if (isset($request->logo)) {
            if($website_settings->logo && file_exists('admin/settings/logo/' .basename($website_settings->logo))){
                unlink('admin/settings/logo/' .basename($website_settings->logo));
            }
            $image = $request->file('logo');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/settings/logo/', $imageName);

            $website_settings->logo = url('admin/settings/logo/' . $imageName);
        }

         if (isset($request->hero_image)) {
            if($website_settings->hero_image && file_exists('admin/settings/hero_image/' .basename($website_settings->hero_image))){
                unlink('admin/settings/hero_image/' .basename($website_settings->hero_image));
            }
            $images = $request->file('hero_image');
            $imageNames = rand() . '.' . $images->getClientOriginalExtension();
            $images->move('admin/settings/hero_image/', $imageNames);

            $website_settings->hero_image = url('admin/settings/hero_image/' . $imageNames);
        }
        $website_settings->save();
        toastr()->success('Settings update successfull');
        return redirect()->back();
    }
    public function policysettings(){
        $policy = policysettings::first();
        
        return view('admin.settings.policysettings',compact('policy'));
    }
    public function policysettingsupdate(Request $request){
        $policy = policysettings::first();
        $policy->privacy_policy = $request->privacy_policy ;
        $policy->terms_conditions = $request->terms_conditions ;
        $policy->refund_policy = $request->refund_policy ;
        $policy->payment_plicy = $request->payment_plicy ;
        $policy->about_us = $request->about_us ;
        $policy->save();
        toastr()->success('update successfull');
        return redirect()->back();
        
    }
    
}
