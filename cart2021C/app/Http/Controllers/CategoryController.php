<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import Database Library
use App\Models\Category; //import model
use Session;
use Auth;

class CategoryController extends Controller
{
    public function _contruct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('addCategory');
    }

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
