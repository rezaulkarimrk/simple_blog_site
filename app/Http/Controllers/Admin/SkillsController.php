<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB, Auth, Image, File;;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Skill index
    public function index()
    {
        $data = DB::table('skills')->get()->first();
        $skill = DB::table('skills_list')->get();
        return view('admin.homepage_setup.skill',compact('data', 'skill'));
    }
    // skill store

    public function update(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;

        DB::table('skills')->where('id', 1)->update($data);

        $notification = array('messege' => 'Services Section Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    // skill store
    public function destroy($id)
    {
        DB::table('skills_list')->where('id', $id)->delete();

        $notifiactiaon = array('messege' => 'Skils Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifiactiaon);
    }

    // edit methode
    public function edit($id)
    {
        $data = DB::table('skills_list')->where('id', $id)->first();
        return response()->json($data);
    }

    // skill Update
    public function skillupdate(Request $request)
    {
        $id = $request->id;

        //query builder
        $data = array();
        $data['skillNmae'] = $request->skillNmae;
        $data['persent'] = $request->persent;
        DB::table('skills_list')->where('id', $id)->update($data);

        $notification = array('messege' => 'Skill Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
