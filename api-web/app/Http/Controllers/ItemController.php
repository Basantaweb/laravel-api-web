<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        return Item::create($request->all());
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'sometimes|required',
            'price' => 'sometimes|required|numeric',
        ]);

        $item->update($request->all());

        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->noContent();
    }
}
