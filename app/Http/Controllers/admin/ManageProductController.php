<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageProductController extends Controller
{
    public function index(){
        return view("backend.product.index");
    }

    public function detail($id){
        $data = Product::where('id', $id)->with(['umkm', 'category'])->first();
        return view("backend.product.detail", [
            "data" => $data
        ]);
    }
 
    public function create(){
        $umkm = Umkm::all();
        $categories = ProductCategory::all();
        return view("backend.product.add", [
            "umkm" => $umkm,
            "categories" => $categories,
        ]);
    }

    public function store(Request $req){
        $req->validate([
            'umkm_id' => 'required',
            'product_category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ], [
            'umkm_id.required' => 'Pilih UMKM!',
            'product_category_id.required' => 'Pilih kategori produk!',
            'name.required' => 'Nama harus diisi!',
            'price.required' => 'Harga harus diisi!',
            'desc.required' => 'Deskripsi produk harus diisi!',
        ]);

        $data = $req->all();
        $data['price'] = intval(str_replace([".", ","], ["", ""], $req->price));

        if($req->has('photo')){
            $imageName = time().'.'.$req->photo->extension();
            $req->photo->move(public_path('uploaded/product'), $imageName);
            $data['photo'] = url('uploaded/product') ."/". $imageName;
        }

        Product::create($data);
        return redirect(route('manage.product'))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id){
        $data = Product::where('id', $id)->with('umkm')->first();
        $categories = ProductCategory::all();
        return view("backend.product.edit", [
            "data" => $data,
            "categories" => $categories,
        ]);
    }

    public function update(Request $req){
        $data = [
            "name" => $req->name,
            "product_category_id" => $req->product_category_id,
            "price" => intval(str_replace([".", ","], ["", ""], $req->price)),
            "desc" => $req->desc,
            "link" => $req->link,
        ];

        if($req->has('photo')){
            // remove old photo if exist
            if($req->old_photo != null){
                $path = explode("uploaded/product", $req->old_photo);
                unlink(public_path('uploaded/product') . $path[1]);
            }
            // upload new photo
            $imageName = time().'.'.$req->photo->extension();
            $req->photo->move(public_path('uploaded/product'), $imageName);
            $data['photo'] = url('uploaded/product') ."/". $imageName;
        }

        Product::where('id', $req->id)->update($data);
        return redirect(route('manage.product'))->with('success', 'Produk berhasil diubah.');
    }

    public function destroy($id){
        Product::find($id)->delete();
        
        return redirect(route('manage.product'))->with('success', 'Produk dihapus.');
    }


    // Datatable
    public function data()
    {
        $products = Product::with(['umkm', 'category'])->orderBy('created_at', 'desc');
        return DataTables::of($products)
            ->editColumn('umkm', function ($data) {
                return $data->umkm->name;
            })
            ->editColumn('category', function ($data) {
                return $data->category->name;
            })
            ->editColumn('price', 'Rp {{number_format($price)}}')
            ->editColumn('action', function ($data) {
                return $data->category->name;
            })
            ->editColumn('action', function ($data) {
                return view('components.backend.product.aksi', [
                    "data" => $data
                ]);
            })
            ->toJson();
    }
}
