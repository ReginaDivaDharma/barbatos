<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        $search_query = $request->query('search');

        $products = Product::where('name', 'LIKE', "%$search_query%")->paginate(1)->appends(['search' => $search_query]);
        $categories = Category::all();
        return view('home', compact('products','categories'));
    }

    public function showAdminPage(Request $request){
        $search_query = $request->query('search');

        $products = Product::where('name', 'LIKE', "%$search_query%")->paginate(1)->appends(['search' => $search_query]);
        return view('admin', compact('products'));
    }

    public function showAddPage(){
        $categories = Category::all();
        return view('add')->with(compact('categories'));
    }

    public function showUpdatePage($id){
        $products = DB::table('products')->where('id', $id)->first();
        return view('update', compact('products'));
    }
    
    public function showProfilePage(){
        $users = User::all(); 
        return view('profile')->with(compact('users'));
    }

    public function showDetailPage($id){
        $products = DB::table('products')->where('id', $id)->first();
        return view('detail')->with(compact('products'));
    }

    public function showAllPage(Request $request) {
        $search_query = $request->query('search');

        $products = Product::where('name', 'LIKE', "%$search_query%")->paginate(1)->appends(['search' => $search_query]);
        $categories = Category::all();
        return view('index', compact('products','categories'));
    }
}
