<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart.index', compact('cartItems'));
    }

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

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
    
            if ($cart[$id]['quantity'] < 1) {
                unset($cart[$id]);
            }
    
            session()->put('cart', $cart);
        }
    
        return redirect()->route('cart.index')->with('success', 'Product quantity updated or removed from cart');
    }
    

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        $address = $request->input('address');
        $subtotal = 0;
    
        foreach ($cart as $item) {
            $subtotal += $item['product']->harga * $item['quantity'];
        }
    
        $fileName = $this->generatePurchaseReport($cart, $subtotal, $address);
    
        session()->forget('cart');
    
        return redirect()->route('cart.index')->with('success', 'Your order has been placed!')->with('file', $fileName);
    }
    

    private function generatePurchaseReport($cart, $subtotal, $address)
    {
        $fileName = 'purchase_report_' . time() . '.txt';

        $filePath = storage_path('app/public/reports/' . $fileName);

        $reportContent = "Purchase Report\n";
        $reportContent .= "Date: " . now() . "\n";
        $reportContent .= "Shipping Address: " . $address . "\n";
        $reportContent .= "-----------------------------\n";
        $reportContent .= "Products Purchased:\n";
        
        foreach ($cart as $item) {
            $reportContent .= $item['product']->name_product . " - " . $item['quantity'] . " x Rp " . number_format($item['product']->harga, 0, ',', '.') . "\n";
        }
        
        $reportContent .= "-----------------------------\n";
        $reportContent .= "Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        $reportContent .= "-----------------------------\n";
        $reportContent .= "Thank you for shopping with us!\n";

        file_put_contents($filePath, $reportContent);

        return $fileName;
    }

    public function downloadReport($fileName)
    {
        $filePath = storage_path('app/public/reports/' . $fileName);
    
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->route('cart.index')->with('error', 'Report file not found.');
        }
    }
    
}
