<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Umkm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $req){
        $categories = ProductCategory::all();
        $products = Product::orderBy('created_at', 'desc')->with('umkm');

        $filterCategory = $req->has('category') ? [intval($req->category)] : collect($categories)->pluck('id')->toArray();
        $products = $products->whereIn('product_category_id', $filterCategory);

        if($req->has('keyword')){
            if($req->has('price')){
                $products = $products->whereLike('name', '%' . $req->keyword . '%')->orderBy('price', $req->price);
            }else{
                $products = $products->whereLike('name', '%' . $req->keyword . '%');
            }
        }else{
            if($req->has('price')){
                $products = $products->orderBy('price', $req->price);
            }
        }

        $isFiltered = $req->has('keyword') || $req->has('category') || $req->has('price');
        return view('frontend.product', [
            "products" => $products->limit(50)->get(),
            "categories" => $categories,
            "isFiltered" => $isFiltered
        ]);
    }

    public function umkm(Request $req){
        $umkm = Umkm::orderBy('created_at', 'desc')->with('products');

        $filterCategory = $req->has('category') ? [$req->category] : ["Fashion","Kuliner","Kerajinan","Jasa"];
        $umkm = $umkm->whereIn('type', $filterCategory);

        if($req->has('keyword')){
            $umkm = $umkm->whereLike('name', '%' . $req->keyword . '%');
        }

        $isFiltered = $req->has('keyword') || $req->has('category');
        return view('frontend.umkm', [
            "umkm" => $umkm->limit(50)->get(),
            "isFiltered" => $isFiltered
        ]);
    }

    public function productDetail($id){
        $data = Product::where('id', $id)->with('umkm')->first();
        $otherProducts = Product::where('umkm_id', $data->umkm_id)->with('umkm')->orderBy('created_at', 'desc')->limit(4)->get();
        
        return view('frontend.product_detail', [
            "data" => $data,
            "otherProducts" => $otherProducts,
        ]);
    }

    public function umkmDetail($id){
        $data = Umkm::where('id', $id)->first();
        $products = Product::where('umkm_id', $id)->orderBy('created_at', 'desc')->limit(4)->get();
        $productCount = Product::where('umkm_id', $id)->count();

        return view('frontend.umkm_detail', [
            "data" => $data,
            "products" => $products,
            "productCount" => $productCount,
        ]);
    }
}
