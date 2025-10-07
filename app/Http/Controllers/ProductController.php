<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() : \Inertia\Response
    {
        $allProducts = Product::select('id', 'name', 'description', 'price', 'created_at')
            ->orderBy('created_at', 'desc')
            ->cursor()
            ->take(10)
            ->remember();

        return Inertia::render('Products/Index', [
            'allProducts' => $allProducts
        ]);
    }
}
