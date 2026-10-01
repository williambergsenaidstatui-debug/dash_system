<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pagamentos.products.index', [
            'products' => Product::query()->where('is_active', true)->latest()->paginate(12),
        ]);
    }
}
