<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategorySuscription;
class SuscriptionController extends Controller
{
    public function suscription($id){
        $category=Category::findOrFail($id);
        
        $suscription=CategorySuscription::where('user_id','=',
                            auth()->user()->id)
                            ->where('category_id','=',$category->id)
                            ->first();
        if($suscription==null){
            $suscription=new CategorySuscription();
        }

        $suscription->fill([
            'user_id'=>auth()->user()->id
        ]);
        $category->suscriptions()->save($suscription);
    }

    public function unsuscription($id){
        $category=Category::findOrFail($id);
        
        $suscription=CategorySuscription::where('user_id','=',
                            auth()->user()->id)
                            ->where('category_id','=',$category->id)
                            ->first();
        if($suscription!=null){
            $suscription->delete();
        }
        return response()->json('proceso ok');
    }

}
