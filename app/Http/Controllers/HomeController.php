<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $makingDate = Carbon::create('2018')->timestamp;
        $products = Products::create([
            'title' => $request->input('name'),
            'price' => $request->input('price'),
            'is_active' => false,
//            'making_date' => $makingDate
        ]);
    }

    public function createArticle(Request $request)
    {
        $model = new News();
        $model->title = $request->input('title');
        $model->body = $request->input('body');
        $model->author = $request->input('author');
        $model->like = (int) $request->input('like');
        $model->comments = (int) $request->input('comments');
        $model->is_active = (bool) $request->input('is_active');
        $model->save();
    }

    public function getProducts()
    {
        // "SELECT * FROM products WHERE is_active = true;"
        $products = Products::where('is_active', true)->get();

        foreach ($products as $product) {
            echo "<br> " . $product['title'];
            echo "<br> " . $product['price'];
            echo "<br> " . $product['is_active'];
            echo "<br> " . $product['create_at'];
            echo "<hr>";
        }
    }
}
