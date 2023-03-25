<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB, Auth, Image, File;;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // services index
    public function index()
    {
        $data = DB::table('services')->get()->first();
        $services = DB::table('services_skil')->get();
        return view('admin.homepage_setup.services',compact('data', 'services'));
    }


    public function update(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;

        DB::table('services')->where('id', 1)->update($data);

        $notification = array('messege' => 'Services Section Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    // Skil store methode
    public function skillstore(Request $request)
    {
        $data = array();

        $data['fontAwosome'] = $request->fontAwosome;
        $data['skillName'] = $request->skillName;

        DB::table('services_skil')->insert($data);

        $notifiactiaon = array('messege' => 'Skils Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifiactiaon);
    }
    //destroy methoode
    public function destroy($id)
    {
        DB::table('services_skil')->where('id', $id)->delete();

        $notifiactiaon = array('messege' => 'Skils Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifiactiaon);
    }

    // edit methode
    public function edit($id)
    {
        $data = DB::table('services_skil')->where('id', $id)->first();
        return response()->json($data);
    }

    // skill update methode
    public function skillupdate(Request $request)
    {
        $id = $request->id;

        //query builder
        $data = array();
        $data['fontAwosome'] = $request->fontAwosome;
        $data['skillName'] = $request->skillName;
        DB::table('services_skil')->where('id', $id)->update($data);

        $notification = array('messege' => 'Skill Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
