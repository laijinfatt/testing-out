<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import Database Library
use App\Models\Category; //import model

class CategoryController extends Controller
{
    public function add(){
        $r=request();//received the data by GET or POST method $_POST['name']
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        return view('addCategory');
    }
}
