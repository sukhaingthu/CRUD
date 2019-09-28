<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;


class CategoryController extends Controller
{
    public function index()
    {
    	//$cats = Category::all();
        $cats = Category::latest()->paginate(3);
        //$cats = Category::orderBy('id', 'desc')->paginate(3);

    	return view('category.index', compact('cats'));

    }
   public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {	
    	$request->validate([
    		'name'    =>'required',
    		'age'     =>'required',
            'image'   =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'age'        =>   $request->age,
            'image'      =>   $new_name
        );

        Category::create($form_data);

        return redirect('category')->with('status', 'Created successfully.');

    }

     public function show($id)
    {
        $cat = Category::findOrFail($id);
        //return view('category.index', compact('cats'));
        return view('category.show', compact('cat'));
    }


     public function edit($id)
    {
     	$cat = Category::findOrFail($id);
     	return view('category.edit', compact('cat'));
    }

    public function update(Request $request,$id)
    {
    	$image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'age'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'age'     =>  'required'
            ]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'age'        =>   $request->age,
            'image'      =>   $image_name
        );
  
        Category::whereId($id)->update($form_data);

        return redirect('/category')->with('status', 'Data is successfully updated');
        // $cat = Category::findOrFail($id);
     //    $cat->name = $request->name;
     //    $cat->age = $request->age;
     //    $cat->save();

    	// //Category::findOrFail($id)->update($request->all());
    	// return redirect ('/category')->with('status','Updated Successfully');
    }
    public function delete($id)
    {
     	 Category::findOrFail($id)->delete();
     	 return redirect('/category')->with('status','Deleted Successfully');
    }
}
