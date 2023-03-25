<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB, Auth, Image, File;;

class HeaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('header')->get()->first();

        return view('admin.homepage_setup.header', compact('data'));
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'email' => 'email',
        ]);
        $data = array();

        $logo = $request->logo;
        if($logo){
             $logoName = 'logo.'.$logo->getClientOriginalExtension();
             if(File::exists('logo')){
                    File::delete('logo');
                }
            Image::make($logo)->save('public/media'.$logoName);
            $data['image'] = 'public/media'.$logoName;
        }

        $image = $request->image;
        if($image){
             $imageName = 'image.'.$image->getClientOriginalExtension();
              if(File::exists('image')){
                    File::delete('image');
                }
            Image::make($image)->save('public/media'.$imageName);
            $data['image'] = 'public/media'.$imageName;
        }

        if($request->name){
            $data['name'] = $request->name;
        }
        if($request->profession){
            $data['profession'] = $request->profession;
        }
        if($request->email){
            $data['email'] = $request->email;
        }

        $cv = $request->cv;
        if($cv){
             $cvName = 'cv.'.$cv->getClientOriginalExtension();
            Image::make($cv)->save('public/media'.$cvName);
            if(File::exists('image')){
                    File::delete('image');
                }
            $data['image'] = 'public/media'. $cvName;
        }

        if($request->facebook){
            $data['facebook'] = 'https://www.facebook.com/'. $request->facebook;
        }
        if($request->github){
            $data['github'] = 'https://github.com/'. $request->github;
        }
        if($request->twitter){
            $data['twitter'] = 'https://twitter.com/'. $request->twitter;
        }

        DB::table('header')->where('id', 1)->update($data);
        
        $notifiactiaon = array('messege' => 'Header Updated', 'alert-type' => 'success');
        return redirect()->route('header.index')->with($notifiactiaon);
    }
}
