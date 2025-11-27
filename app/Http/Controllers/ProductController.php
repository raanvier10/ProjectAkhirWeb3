<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\View\View;

use illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        //Coding untuk get atau ambil dari model dengan format 10 data terbaru 
        $products = Product::latest()->paginate(10);
        //Coding akses membawa data ke view 
        return view('tampilan.index',compact('products')); //ambil dlu foldernya jika filenya didalam folder
    }

    public function create() : View
    {
        return view('tampilan.createproduct');
    }

    public function store(Request $request) : RedirectResponse
    {

        // dd($request->all());
        $request->validate=([
            'txtnama'=>'required',
            'txtdes'=>'required|min:5',
            'txtharga'=>'required|numeric',
            'txtstock'=>'required|numeric'
        ]);

        Product::create([ 
            'title' => $request ->txtnama,
            'description' => $request ->txtdes,
            'price' => $request ->txtharga,
            'stock' => $request ->txtstock
        ]);

        return redirect()->route('products.index');
    }
    public function edit(string $id): View
    {
        // Coding menuju ke model utk mengambil data berdasarkan id
        $products = Product::FindOrFail($id);
        //Coding menuju ke view bersama (kamu awch) data
        return view('tampilan.editproduct',compact('products'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate=([
            'txtnama'=>'required',
            'txtdes'=>'required|min:5',
            'txtharga'=>'required|numeric',
            'txtstock'=>'required|numeric'
        ]);
        
        //caro data yg mau diupdate
        $products = Product::FindOrFail($id);

        $products->update([ 
            'title' => $request ->txtnama,
            'description' => $request ->txtdes,
            'price' => $request ->txtharga,
            'stock' => $request ->txtstock
        ]);

        return redirect()->route('products.index');
    }
    public function destroy(string $id) : RedirectResponse
    {
        //cari data yg mau dihapus
        $products = Product::FindOrFail($id);
        //hapus data
        $products->delete();

        return redirect()->route('products.index');
    }
}
