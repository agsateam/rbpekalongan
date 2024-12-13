<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Umkm;
use App\Models\WebContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(){
        $products = $this->getProducts();

        return view('frontend.product', [
            "products" => $products,
        ]);
    }

    private function getProducts()
    {
        $token = WebContent::select(["gerai_token"])->first();

        try {
            $response = Http::get('https://graph.instagram.com/me/media', [
                // 'fields' => 'id,caption,media_url,media_type,permalink,thumbnail_url,timestamp,children{media_url,media_type}',
                'fields' => 'id,caption,media_url,media_type,permalink,thumbnail_url',
                'limit' => 52,
                'access_token' => $token->gerai_token,
            ]);

            if ($response->status() == 200) {
                return json_decode($response->body(), true);
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }

    // public function index(Request $req){
    //     $categories = ProductCategory::all();
    //     $products = Product::orderBy('created_at', 'desc')->with('umkm');

    //     $filterCategory = $req->has('category') ? [intval($req->category)] : collect($categories)->pluck('id')->toArray();
    //     $products = $products->whereIn('product_category_id', $filterCategory);

    //     if($req->has('keyword')){
    //         if($req->has('price')){
    //             $products = $products->whereLike('name', '%' . $req->keyword . '%')->orderBy('price', $req->price);
    //         }else{
    //             $products = $products->whereLike('name', '%' . $req->keyword . '%');
    //         }
    //     }else{
    //         if($req->has('price')){
    //             $products = $products->orderBy('price', $req->price);
    //         }
    //     }

    //     $isFiltered = $req->has('keyword') || $req->has('category') || $req->has('price');
    //     return view('frontend.product', [
    //         "products" => $products->limit(50)->get(),
    //         "categories" => $categories,
    //         "isFiltered" => $isFiltered
    //     ]);
    // }

    public function umkm(Request $req){
        $umkm = Umkm::where('status', 'join');

        $categories = collect(ProductCategory::select('name')->get()->toArray())->pluck('name')->concat(["LAINNYA"]);
        $filterCategory = $req->has('category') ? [$req->category] : $categories;
        $umkm = $umkm->whereIn('type', $filterCategory);

        if($req->has('keyword')){
            $umkm = $umkm->whereLike('name', '%' . $req->keyword . '%');
        }

        $isFiltered = $req->has('keyword') || $req->has('category');
        return view('frontend.umkm', [
            "umkm" => $umkm->paginate(104),
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
        // $products = Product::where('umkm_id', $id)->orderBy('created_at', 'desc')->limit(4)->get();
        // $productCount = Product::where('umkm_id', $id)->count();

        return view('frontend.umkm_detail', [
            "data" => $data,
            // "products" => $products,
            // "productCount" => $productCount,
        ]);
    }
}
