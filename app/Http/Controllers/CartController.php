<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan halaman keranjang belanja
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart.index', compact('cartItems'));
    }

    // Menambahkan produk ke keranjang
  public function addToCart($id)
{
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'product' => $product,
            'quantity' => 1
        ];
    }

    session()->put('cart', $cart);

    // Redirect ke halaman keranjang setelah produk ditambahkan
    return redirect()->route('cart.index')->with('success', 'Product added to cart!');
}
public function removeFromCart($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index')->with('success', 'Product removed from cart');
}

    // Menyelesaikan pesanan (checkout)
    public function checkout(Request $request)
    {
        // Ambil keranjang belanja dari session
        $cart = session()->get('cart', []);
        $address = $request->input('address');
        $subtotal = 0;
    
        // Hitung subtotal
        foreach ($cart as $item) {
            $subtotal += $item['product']->harga * $item['quantity'];
        }
    
        // Generate laporan pembelian
        $fileName = $this->generatePurchaseReport($cart, $subtotal, $address);
    
        // Kosongkan keranjang setelah selesai checkout
        session()->forget('cart');
    
        // Redirect ke halaman keranjang dan memberikan nama file untuk unduhan
        return redirect()->route('cart.index')->with('success', 'Your order has been placed!')->with('file', $fileName);
    }

    // Fungsi untuk mencetak laporan pembelian ke file .txt
    private function generatePurchaseReport($cart, $subtotal, $address)
    {
        // Tentukan nama file laporan, bisa memakai timestamp untuk nama unik
        $fileName = 'purchase_report_' . time() . '.txt';
    
        // Tentukan path untuk menyimpan file
        $filePath = storage_path('app/public/reports/' . $fileName);
    
        // Buat laporan sebagai string
        $reportContent = "Purchase Report\n";
        $reportContent .= "Date: " . now() . "\n";
        $reportContent .= "Shipping Address: " . $address . "\n";
        $reportContent .= "-----------------------------\n";
        $reportContent .= "Products Purchased:\n";
        
        // List produk yang dibeli
        foreach ($cart as $item) {
            $reportContent .= $item['product']->name_product . " - " . $item['quantity'] . " x Rp " . number_format($item['product']->harga, 0, ',', '.') . "\n";
        }
        
        $reportContent .= "-----------------------------\n";
        $reportContent .= "Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        $reportContent .= "-----------------------------\n";
        $reportContent .= "Thank you for shopping with us!\n";
    
        // Menulis laporan ke file
        file_put_contents($filePath, $reportContent);
    
        return $fileName;
    }
    
    public function downloadReport($fileName)
    {
        // Pastikan file ada sebelum diunduh
        $filePath = storage_path('app/public/reports/' . $fileName);
    
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->route('cart.index')->with('error', 'Report file not found.');
        }
    }
}
