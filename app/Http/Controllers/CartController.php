<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\UpdateCartItemRequest;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()
            ->cart()
            ->with('items.product')
            ->first();

        return view('cart.index', compact('cart'));
    }

    public function add(AddToCartRequest $request): RedirectResponse
    {
        $product = Product::findOrFail($request->product_id);

        $cart = auth()->user()
            ->cart()
            ->firstOrCreate(['user_id' => auth()->id()]);

        $item = $cart->items()
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity', $request->quantity ?? 1);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => $request->quantity ?? 1,
                'price'      => $product->price,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Item added to cart.');
    }

    public function update(UpdateCartItemRequest $request, CartItem $item): RedirectResponse
    {
        $this->authorize('manage', $item->cart);

        $item->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index');
    }

    public function remove(CartItem $item): RedirectResponse
    {
        $this->authorize('manage', $item->cart);

        $item->delete();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Item removed.');
    }
}