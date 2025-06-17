<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class SellerController extends Controller
{
public function dashboard()
    {
        $products = Product::all();
        return view('seller.dashboard', compact('products'));
    }
    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);
        Product::create($request->only('name', 'stock', 'harga'));

        return back()->with('success', 'Produk berhasil ditambahkan!');
    }
    public function status ()
    {
        $soldProducts =  [ 
        ['name' => 'Poco X78', 'sold' => 3],
        ['name' => 'Redmi Note 35', 'sold' => 3],
        ['name' => 'Mate Fold 512gb', 'sold' => 3],
        ];

        return view('seller.status', compact('soldProducts'));
    }
}
