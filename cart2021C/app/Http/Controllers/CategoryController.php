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
        return redirect()->route('showCategory');
    }

    public function view(){
        $viewCategory=Category::all(); //generate SQL SELECT * from category
        return view('showCategory')->with('categories',$viewCategory);
    }
}
