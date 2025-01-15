<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
 // Misalnya di method listAll atau indexUser
public function listAll()
{
    // Mengambil semua produk dari database
    $products = Product::all();  // Atau sesuai query yang Anda perlukan

    // Mengirimkan data ke tampilan
    return view('menu.products', compact('products'));
}

    

    public function index(Request $request)
    {
        $search = $request->input('search');

        $stores = Product::when($search, function ($query, $search) {
            return $query->where('name_product', 'like', '%' . $search . '%');
        })->paginate(5);  // Pagination for 5 products per page

        return view('admin.admin_store.index', compact('stores'));
    }


    public function create()
    {
        return view('admin.admin_store.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create([
            'name_product' => $request->input('name_product'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'stock' => $request->input('stock'),
        ]);

        return redirect()->route('admin.store.index')->with('success', 'Product successfully added.');
    }


    public function edit($id)
    {
        $store = Product::findOrFail($id);
        return view('admin.admin_store.edit', compact('store'));
    }

  
    public function update(Request $request, $id)
    {
        $store = Product::findOrFail($id);

        $request->validate([
            'name_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $store->update([
            'name_product' => $request->input('name_product'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'stock' => $request->input('stock'),
        ]);

        return redirect()->route('admin.store.index')->with('success', 'Product successfully updated.');
    }

 
    public function destroy($id)
    {
        $store = Product::findOrFail($id);

        $store->delete();

        return redirect()->route('admin.store.index')->with('success', 'Product successfully deleted.');
    }

    public function indexUser()
    {
        // Mengambil semua produk tanpa fitur pencarian
        $products = Product::paginate(5); // Paginate dengan 5 produk per halaman
    
        return view('menu.products', compact('products')); // Kirim data produk ke tampilan
    }
    
}
