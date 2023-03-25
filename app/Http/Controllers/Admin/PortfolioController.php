<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB, Auth, Image, File;;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // portfolio section index
    public function index(){
        $data = DB::table('_portfolio')->first();
        $portfolio = DB::table('_portfolio_list')->get();

        return view('admin.homepage_setup.portfolio',compact('data', 'portfolio'));
    }

    // update portfolio section
    public function update(Request $request){

        $data = array();

        $data['title'] = $request->title;
        $data['description'] = $request->description;

        DB::table('_portfolio')->where('id', 1)->update($data);

        $notification = array('messege' => 'Portfolio Section Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // add portfolio
    public function add()
    {
        return view('admin.homepage_setup.addPortfolio');
    }

    // Store portfolio
    public function store(Request $request)
    {
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $photo = $request->image;
        if($photo){
            $photoName = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 400)->save('public/media'.$photoName);
            $data['image'] = 'public/media'.$photoName;
        }

        DB::table('_portfolio_list')->insert($data);

        $notification = array('messege' => 'Portfolio Added!', 'alert-type' => 'success');
        return redirect()->route('portfolio.index')->with($notification);
    }

    // portfolio delete
    public function destroy($id)
    {
        DB::table('_portfolio_list')->where('id', $id)->delete();

        $notification = array('messege' => 'Portfolio deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $posrtfolio = DB::table('_portfolio_list')->where('id', $id)->first();
        
        return view('admin.homepage_setup.editPortfolio', compact('posrtfolio'));
    }



    function singleupdate(Request $request, $id)
    {
        $data = array();

        $data['title'] = $request->title;
        $data['link'] = $request->link;

        $photo = $request->image;
        if($photo){
            $photoName = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 400)->save('public/media'.$photoName);
            $data['image'] = 'public/media'.$photoName;
            //delete old image
            if(File::exists($posrtfolio->old_image)){
                File::delete($posrtfolio->old_image);
            }
            DB::table('_portfolio_list')->where('id', $id)->update($data);

            $notifiactiaon = array('messege' => 'Post Created', 'alert-type' => 'success');
            return redirect()->route('portfolio.index')->with($notifiactiaon);
        }
        else{
            $data['image'] = $request->old_image;
            DB::table('_portfolio_list')->where('id', $id)->update($data);
            $notifiactiaon = array('messege' => 'Post Update', 'alert-type' => 'success');
            return redirect()->route('portfolio.index')->with($notifiactiaon);
        }
    }
}
