<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // add category page
    public function addCategory(){
        return view('category.addcategory');
    }

    // add category
    public function postAddCategory(Request $req){
        $validate = $req->validate([
            'catname' => ['required','string', 'max:255'],
            'catdescription' => ['max:300']
        ]);

        if($validate){
            try{
                $category = new Category();
                $category->cat_name = $req->catname;
                $category->cat_description = $req->catdescription;
                $category->save();
            }catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        return view('category.duplicate');
                    }
            }
            
            return back()->with('status',"Category added successfully");
        }
    }

    // display category
    public function showCategory(){
        try{
            $category = Category::paginate(5)->all();
            return view('category.showcategory',compact('category'));   
        }catch(\Exception $e){
            return view('category.categorynotfound');
        }
    }

    // show category detail edit page
    public function editCategory($id){
        try {
            $category = Category::where('id', $id)->firstorFail();
            return view('category.editcategory', compact('category'));
        } catch (\Exception $exceptions) {
            return view('category.categorynotfound');
        }
        
    }

    // update category
    public function updateCategory(Request $req){
        $validate = $req->validate([
            'catname' => ['required','string', 'max:255'],
            'catdescription' => ['max:300']
        ]);
        if($validate){
            try{
                Category::where('id',$req->catid)->update([
                    'cat_name' => $req->catname,
                    'cat_description' => $req->catdescription
                ]);
            }catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return view('category.duplicate');
                }
            }
            
            return back()->with('status',"Category Updated successfully");
        }
    }

    // delete category
    public function deleteCategory(Request $req){
        try{
            Category::where('id',$req->aid)->delete();
        }catch(\Exception $exception){
            return view('category.categorynotfound');
        }
        
        return back();
    }
}
