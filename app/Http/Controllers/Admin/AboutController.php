<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB, Auth, Image, File;;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // about index
    public function index()
    {
        $data = DB::table('_about')->get()->first();
        return view('admin.homepage_setup.about', compact('data'));
    }

    // UPDATE ABOUT
    public function update(Request $request)
    {
        $data = array();;

        if( $request->description ){
            $data['description'] = $request->description;
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

        DB::table('_about')->where('id', 1)->update($data);

        $notifiactiaon = array('messege' => 'About Updated', 'alert-type' => 'success');
        return redirect()->route('about.index')->with($notifiactiaon);
    }
}
