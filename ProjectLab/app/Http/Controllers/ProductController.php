<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Product;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct(Request $request){

        $productName = $request->product_name;
        $productCategory= Category::where('name',$request->product_category)->first();
        $productDetail = $request->product_detail;
        $productPrice = $request->product_price;
        $productImage = $request->file('product_image');

        $this->validate($request, [
            'product_name' => 'required|string|max:255',
            'product_detail' => 'required|string|max:255',
            'product_price' => 'required',
            'product_image' => 'required|mimes:png,jpg',
        ]);

        Storage::putFileAs('/public/image/', $productImage, $productImage->getClientOriginalName());
        DB::table('products')->insert([
            'name' => $productName,
            'categories_id' => $productCategory->id,
            'detail' => $productDetail,
            'price' => $productPrice,
            'image' => $productImage->getClientOriginalName(),
        ]);

        return redirect('/');
    }

    public function deleteProduct($id){
        DB::table('products')->where('id', $id)->delete();
        return redirect('/');
    }

    public function updateProduct(Request $request){
        $name = $request->product_name;
        $detail = $request->product_detail;
        $price = $request->product_price;

        $this->validate($request,[
            'product_name' => 'required|string|max:255',
            'product_detail' => 'required|string|max:255',
            'product_price' => 'required',
            'product_image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $img = $request->file('product_image');

        if($img!=null){
            Storage::putFileAs('/storage/image', $img, $img->getClientOriginalName());
            DB::table('products')->where('id',$request->route('id'))->update([
                'name' => $name,
                'detail' => $detail,
                'price'=>$price,
                'image'=> $img->getClientOriginalName(),
            ]);

        }else{
            DB::table('products')->where('id',$request->route('id'))->update([
                'name' => $name,
                'detail' => $detail,
                'price'=>$price,
            ]);
        }
        return redirect('/');
    }

    public function cart() {
        return view('cart');
    }

    public function addToCart($id) {
        $product = Product::findorFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request) {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request) {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function historyTransaction() {
        return view('history');
    }
    
}

