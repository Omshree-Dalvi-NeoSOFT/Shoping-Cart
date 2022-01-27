<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // add sub category page
    public function addSubCategory(){
        try{
            $categories = Category::all();
            return view('subcategory.addsubcategory',compact('categories'));
        }catch(\Exception $e){
            return view('subcategory.subcatnotfound');
        }
    }

    // add sub category
    public function postaddSubCategory(Request $req){
        $validation = $req->validate([
            'subcatname' => ['required', 'string'],
            'cattype' => ['required'],
            'subcatdescription' => ['max:300']
        ],[
            'subcatname.required' => "Sub-Category name is required !",
            'cattype.required' => "Category type is required !",
            'subcatdescription.max' => "Description must not exceed more then 300 characters."
        ]);

        if($validation){
            $category = Category::where('id', $req->cattype)->first();
            $subcat = new SubCategory();
            $subcat->subcat_name = $req->subcatname;
            $subcat->category_id = $category->id;
            $subcat->subcat_description = $req->subcatdescription;
            $subcat->save();
            if($category->subCat()->save($subcat)){
                return back()->with('status',"Sub-Category Added Successfully !");
            }
            
        }
    }

    // display subcategory
    public function showSubCategory(){
        try{
            $subcats = SubCategory::all();
            $categories = Category::all();
            return view('subcategory.showsubcategory',compact('subcats','categories'));
        }catch(\Exception $e){
            return view('subcategory.subcatnotfound');
        }
    }

    // edit subcategory page
    public function editSubCategory($id){
        try{
            $subcat = SubCategory::where('id',$id)->firstorFail();
            $category = Category::where('id',$subcat->category_id)->firstorFail();
            $categories = Category::all()->except($category->id);
            return view('subcategory.editsubcategory',compact('subcat','categories','category'));
        }catch(\Exception $e){
            return view('subcategory.subcatnotfound');
        }
    }

    // update subcategory
    public function postEditSubCategory(Request $req){
        $validation = $req->validate([
            'subcatname' => ['required', 'string'],
            'cattype' => ['required'],
            'subcatdescription' => ['max:300']
        ],[
            'subcatname.required' => "Sub-Category name is required !",
            'cattype.required' => "Category type is required !",
            'subcatdescription.max' => "Description must not exceed more then 300 characters."
        ]);
        try{
            if($validation){
                $category = Category::where('id', $req->cattype)->first();
                if(SubCategory::where('id',$req->id)->update([
                    'subcat_name' => $req->subcatname,
                    'category_id' => $category->id,
                    'subcat_description' => $req->subcatdescription
                ])){
                    return back()->with('status',"Sub-Category Updated Successfully !");
                }
            }
        }catch(\Exception $e){
            return view('subcategory.subcatnotfound');
        }
    }

    // delete subcategory
    public function deleteSubCategory(Request $req){
        try{
            SubCategory::where('id',$req->aid)->delete();
        }catch(\Exception $exception){
            return view('subcategory.subcatnotfound');
        }
        
        return back();
    }
}
