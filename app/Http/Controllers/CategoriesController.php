<?php

namespace App\Http\Controllers;

use App\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = Category::Selection()->get();
        return response()->json($categories);
    }
    public function getCategoryById(Request $request)
    {
        $categories = Category::Selection()->find($request->id);
        if(!$categories){
           return $this->returnError('001','غير موجود');
        }
        return $this->returnData('category',$categories,'تم بنجاح');
    }

    public function changeStatus(Request $request)
    {
        Category::where('id',$request -> id) -> update(['active' =>$request ->  active]);

        return $this -> returnSuccessMessage('تم تغيير الحاله بنجاح');
    }
}
