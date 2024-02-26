<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products/index', ['products' => $products]);
    }
    public function create()
    {
        return view('products/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png, gif|max:10000',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        DB::table('products')->insert(['name' =>  $request->name,'description' =>  $request->description, 'image' => $imageName]);
        return redirect('/')->withSuccess('Product Added!!!');
    }
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png, gif|max:10000',
        ]);
        
        $updateData = [];
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $updateData['image'] = $imageName;
        }
        $updateData['name'] =  $request->name;
        $updateData['description'] = $request->description;

        $affected = DB::table('products')->where('id', $id)->update($updateData);
        return redirect('/')->withSuccess('Product Updated!!!');
    }

    public function delete($id)
    {
        $deleted = DB::table('products')->where('id', $id)->delete();
        if ($deleted) {
            return redirect('/')->withSuccess('Product Deleted!!!');
        }
        return redirect('/')->withErrors('Error!!!');
    }
}
