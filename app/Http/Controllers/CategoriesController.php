<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories/index', [
            'categories' => $categories
        ]);
    }
    public function show($id)
    {
        $category_products = Category::with(['products'])->find($id);
        return view('categories.show',compact('category_products'));
    }
    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->cat_name = $request->cat_name;

        $category->save();
        return redirect('categories');

    }
    public function storeprod(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'nom_produit' => 'required',
            'prix' => 'required'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->nom_produit = $request->nom_produit;
        $product->prix = $request->prix;
        $product->save();
        
        return $this->show($request->category_id);
    }

    public function edit(Category $category)
    {
        
        $category = Category::find($category->id);
        return view('categories/edit', ['category' => $category]);
    }

    public function update(Request $request,Category $category)
    {
        $category->cat_name = $request->cat_name;
        $category->save();
        return redirect('categories');
    }

    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return redirect('categories');
    }
}
