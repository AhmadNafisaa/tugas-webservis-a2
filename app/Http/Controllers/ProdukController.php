<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $producst = Produk::all();
        return response()->json($producst);
    }

    public function store(Request $request)
    {
        $validataData = $request->validate ([
            'title' => 'required|string|max:255',
            'price' =>'required|string',
            'description' =>'nullable|string',
        ]);

        $product = Produk::create($validataData);
        return response()->json(["massage" =>"product crated successfully", 'data' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = Produk::find($id);

        if (!$product) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $product->update($validatedData);

        return response()->json(['message' => 'Book updated successfully', 'data' => $product]);
    }

    public function destroy ($id) 
    {
        $product = Produk::find($id);

        if(!$product){
            return response()->json(["message"=> "Product Not Found"]);
        }

        $product->delete();        

        return response()->json(["message"=> "Deleted Product successfully"]);
    }
}
