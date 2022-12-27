<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('item');
            if (!is_null($id)) {
                $itemId = Product::availableItems()->where('products.id', $id)->exists();
                if (!$itemId) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {

        $products = Product::availableItems()->get();

        return view('user.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
            ->sum('quantity');

        if ($quantity > 5) {
            $quantity = 5;
        }
        return view('user.show', compact('product', 'quantity'));
    }
}
