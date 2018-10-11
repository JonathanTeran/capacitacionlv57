<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class GuestController extends Controller
{
   public function booksByCategory(Category $category){
        dd($category);
   }
}
