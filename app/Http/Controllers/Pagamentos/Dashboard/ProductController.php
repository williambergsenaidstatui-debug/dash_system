<?php

namespace App\Http\Controllers\Pagamentos\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pagamentos.dashboard.index', [
            'products' => Product::query()->latest()->paginate(15),
            'totalProducts' => Product::query()->count(),
            'activeProducts' => Product::query()->where('is_active', true)->count(),
        ]);
    }

    public function create(): View
    {
        return view('pagamentos.dashboard.products.form', ['product' => new Product(['is_active' => true])]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('pagamentos.dashboard.index')->with('status', 'Produto cadastrado com sucesso.');
    }

    public function edit(Product $product): View
    {
        return view('pagamentos.dashboard.products.form', ['product' => $product]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('pagamentos.dashboard.index')->with('status', 'Produto atualizado com sucesso.');
    }
}
