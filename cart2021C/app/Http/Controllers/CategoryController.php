<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import Database Library
use App\Models\Category; //import model
use Session;

class CategoryController extends Controller
{
    public function add(){
        $r=request();//received the data by GET or POST method $_POST['name']
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        Session::flash('success',"Category create successfully");
        return redirect()->route('showCategory');
    }

    public function view(){
        $viewCategory=Category::all(); //generate SQL SELECT * from category
        return view('showCategory')->with('categories',$viewCategory);
    }
}
