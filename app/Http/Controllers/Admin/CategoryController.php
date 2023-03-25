<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // All Category Showing Method
    public function index()
    {
        // $data =  DB::table('categories')->get(); //query builder

        $data = Category::all();

        return view('admin.category.category.index', compact('data'));
    }

    //store methode
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        //query builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        // DB::table('categories')->insert($data);


        //eluquent ORM

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);

        $notification = array('messege' => 'Category Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //edit methode
    public function edit($id)
    {
        // query builder
        // $data = DB::table('categories')->where('id', $id)->first();

        $data =  Category::findorfail($id);
        
        return response()->json($data);
    }

    //update methode

    public function update(Request $request)
    {

        $id = $request->id;
        //query builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        // DB::table('categories')->where('id', $id)->update($data);

        //eloquent ORM
        $category = Category::where('id', $id)->first();
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);

        $notification = array('messege' => 'Category Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //delete category methode

    public function destroy($id)
    {
        //query builder
        //DB::table('categories')->where('id', $id)->delete();

        $category = Category::find($id);
        $category->delete();
        $notification = array('messege' => 'Category Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
