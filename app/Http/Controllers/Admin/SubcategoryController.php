<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index methode

    public function index()
    {
        // $data = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();

        $data = Subcategory::all();

        $category = Category::all();

        return view('admin.category.subcategory.index', compact('data', 'category'));
    }



    // subcategory store methode
    public function store(Request $request)
    {
        $validet = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);

        //query builder
        $data = array();
        // $data['category_id'] = $request->category_id;
        // $data['subcategory_name'] = $request->subcategory_name;
        // $data['subcategory_slug'] = Str::slug($request->subcategory_name, '-');
        // DB::table('subcategories')->insert($data);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);

        $notification = array('messege' => 'Sub Category Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // delete subcategory 

    public function destroy($id)
    {
        //query builder
        // DB::table('subcategories')->where('id', $id)->delete();


        //Eloquent ORM
        $subcat = Subcategory::find($id);
        $subcat->delete();

        $notification = array('messege' => 'SubCategory Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //edit subcategory

    public function edit($id)
    {
        // $data = Subcategory::find($id);
        // $category = Category::all();

        // $data = DB::table('subcategories')->where('id', $id)->first();
        $data = Subcategory::find($id);
        $category = DB::table('categories')->get();

        return view('admin.category.subcategory.edit', compact('data', 'category'));
    }

    // update methode

    public function update(Request $request)
    {

        $subcategory =  Subcategory::where('id', $request->id)->first();
        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug( $request->subcategory_name),
        ]);


        //query builder
        // $data = array();
        // $data['category_id'] = $request->category_id;
        // $data['subcategory_name'] = $request->subcategory_name;
        // $data['subcategory_slug'] = Str::slug( $request->subcategory_name, '-');

        // DB::table('subcategories')->where('id', $request->id)->update($data);

        $notification = array('messege' => 'SubCategory Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
