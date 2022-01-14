<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory(){
        return view('category.addcategory');
    }

    public function PostAddCategory(Request $req){
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

    public function ShowCategory(){
        try{
            $category = Category::paginate(5)->all();
            return view('category.showcategory',compact('category'));   
        }catch(\Exception $e){
            return view('category.categorynotfound');
        }
    }

    public function EditCategory($id){
        try {
            $category = Category::where('id', $id)->firstorFail();
            return view('category.editcategory', compact('category'));
        } catch (\Exception $exceptions) {
            return view('category.categorynotfound');
        }
        
    }

    public function UpdateCategory(Request $req){
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

    public function DeleteCategory(Request $req){
        try{
            Category::where('id',$req->aid)->delete();
        }catch(\Exception $exception){
            return view('category.categorynotfound');
        }
        
        return back();
    }
}