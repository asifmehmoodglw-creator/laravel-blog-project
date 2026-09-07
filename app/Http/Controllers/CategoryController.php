<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

// use App\Models\Post;

class CategoryController extends Controller
{
    public function store(Request $request){
         $data=$request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
         ]);
         Category::create($data);

          return response()->json([
        'success' => true,
        // 'message' => 'Category added successfully!',
        // 'category' => $category
    ]);
    }
    public function create(){

          $categories = Category::all() ;
          return view('admin.posts.create',compact('categories'));
    }
    public function create1(){

          $categories = Category::all() ;
          return view('components.Category-dropdown',compact('categories'));
    }
    public function ind(){
       
      //     return view('components.category-form');
      $values = Category::all();
      // dd($values);
          return view('components.category-form',compact('values'));
    }
    public function editcategory($id){
      
    $categories = Category::findOrFail($id);
   
    return view('components.edit-category',compact('categories'));
          
    }
    public function updatecategory(Request $request,$id){
    $request->validate([
      'name' => 'required',
      'slug' => 'required',
    ]);
    $categories = Category::findOrFail($id);
    $categories->update([
      'name' => $request->name,
      'slug' => $request->slug
    ]);
    return redirect()->route('CategoryData')->with('success','Update Successfully');        
    }
    
    public function delete($id){
      $record = Category::findOrFail($id);
      $record->delete();
      return redirect()->route('CategoryData')->with('success' , 'Deleted Successfully');
    }
}