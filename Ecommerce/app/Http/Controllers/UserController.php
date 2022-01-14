<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserApiResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\CMS;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\ProductAttributesAssoc;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __constract(){
        $this->middleware('auth:api',['except'=>['login','register']]);
    }

    public function Index(){
        $data = User::all();
        return response()->json($data);
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            if(!$token=auth()->attempt($validator->validated())){
               return response()->json(['err'=>"Unauthorized User !"],401);
            }
            $user = User::where('email',$request->email)->first();
            return response()->json([
                'access_token'=>$token,
                'token_type'=>'bearer',
                'expires_in'=>auth()->guard('api')->factory()->getTTL()*60,
                'user'=>$user
            ]);
        }
    }

    public function registerUser(Request $request){
        $validator=Validator::make($request->all(),[
            'ufname' => 'required', 'string', 'max:255',
            'ulname' => 'required', 'string', 'max:255',
            'uemail' => 'required', 'string', 'unique:users',
            'upassword' => 'required', 'string', 'min:8', 'confirmed',
            'ucpassword' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            User::create([
                'firstname' => $request->ufname,
                'lastname' => $request->ulname,
                'email' => $request->uemail,
                'password' => Hash::make($request->cpassword),
                'role_id' =>'5',
                'status' => '1'
            ]);
            return response()->json(['msg'=>"User Registered Successfully !"]);
        }
    }

    public function contactUs(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required|min:5|max:500'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else{
            $contact = new ContactUs();
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->subject=$request->subject;
            $contact->message=$request->message;
            $contact->save();
            return response()->json(['msg'=>"we will contact you"]);
        }
    }

    public function ProductDetails(){
        $product = Product::all();
        $productImage = ProductImage::all();
        $productAttributes = ProductAttributesAssoc::all();
        $proddetails = ["Product"=>$product,"ProductIimage"=>$productImage,"ProductAttr"=>$productAttributes];
        return response()->json($proddetails);
    }

    public function ProductImages(){
        $productImage = ProductImage::all();
        return response(['image'=>UserApiResource::collection($productImage)]);
    }

    public function BannerDetails(){
        $banner = Banner::all();
        return response(['banner'=>UserApiResource::collection($banner)]);
    }

    public function Category(){
        $category = Category::all();
        return response(['category'=>UserApiResource::collection($category)]);
    }

    public function SubCategory(){
        $subcategory = SubCategory::all();
        return response(['subcategory'=>UserApiResource::collection($subcategory)]);
    }

    public function SubCategoryProducts($id){
        $product = Product::where('subcat_id',$id)->get();
        $productImage = ProductImage::all();
        $productAttributes = ProductAttributesAssoc::all();
        $proddetails = ["Product"=>$product,"ProductIimage"=>$productImage,"ProductAttr"=>$productAttributes];

        return response()->json($proddetails);
    }

    public function CurrentProductsDetails($id){
        $product = Product::with('Images','ProdAttr')->find($id);
        return response()->json($product);

    }

    public function Profile($user){
        $profile=User::where('email',$user)->first();
        return response()->json(['profile'=>$profile]);

    }

    public function UpdateProfile(Request $request){
            $user=User::where('id',$request->id)->update([
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'email' => $request->email
            ]);
            return response()->json([
                'message'=>"profile updated successfully",
                'updatedprofile'=>$user
            ]);
         //return response()->json(['status'=>1,'updatedprofile'=>$user]);
     }

     public function ChangePassword(Request $request){
        $validator=Validator::make($request->all(),[
            'old_password'=>'required|min:6|max:12',
            'new_password'=>'required|min:6|max:12',
            'confirm_password'=>'required|min:6|max:12|same:new_password',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::where('email',$request->email)->first();
            if(Hash::check($request->old_password,$user->password)){
               $user->update([
                   'password'=>Hash::make($request->new_password)
               ]);
               return response()->json([
                'message'=>"password successfully updated",
                'status'=>1
                ],200);
            }
           else{
                return response()->json([
                    'message'=>"old password does not match",
                ],400);
           }
        }
        return response()->json([
            'message'=>"password successfully updated",
            'status'=>1
        ]);
    }

    public function CMSDetails(){
        $data = CMS::all();
        return response(['services'=>UserApiResource::collection($data)]);
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->guard('api')->factory()->getTTL()*60
        ]);
    }    
}