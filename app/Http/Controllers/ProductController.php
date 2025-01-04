<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get search term if provided
        $search = $request->input('search');

        // Fetch products, optionally filtered by search term
        $stores = Store::when($search, function ($query, $search) {
            return $query->where('name_product', 'like', '%' . $search . '%');
        })->paginate(5);  // Pagination for 5 products per page

        return view('admin.admin_store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admin_store.create');
    }

    /**
     * Store a newly created product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Create a new product
        Store::create([
            'name_product' => $request->input('name_product'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'stock' => $request->input('stock'),
        ]);

        // Redirect back to the product list with a success message
        return redirect()->route('admin.store.index')->with('success', 'Product successfully added.');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        return view('admin.admin_store.edit', compact('store'));
    }

    /**
     * Update the specified product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Find the product by its ID
        $store = Store::findOrFail($id);

        // Validate the incoming data
        $request->validate([
            'name_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Update the product details
        $store->update([
            'name_product' => $request->input('name_product'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'stock' => $request->input('stock'),
        ]);

        // Redirect back to the product list with a success message
        return redirect()->route('admin.store.index')->with('success', 'Product successfully updated.');
    }

    /**
     * Remove the specified product from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the product by its ID
        $store = Store::findOrFail($id);

        // Delete the product from the database
        $store->delete();

        // Redirect back to the product list with a success message
        return redirect()->route('admin.store.index')->with('success', 'Product successfully deleted.');
    }
}
