<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $caterories = Category::all();
        // dd($products);
        return view('client.home', [
            'productList' => $products,'cateroriesList' => $caterories,
        ]);

         
    }
}
