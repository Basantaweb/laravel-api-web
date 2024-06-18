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
        // Initialize validation rules
        $validationRules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.01,'
        ];

        // Conditionally apply validation based on request data
        if ($request->filled('description')) {
            $validationRules['description'] = 'string|max:500';
        }

        // Validate the request data against the rules
        $request->validate($validationRules);

        // Process the validated data and create a new Item
        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, $hashid)
    {
        // Decode hashid to get the item ID
        $id = \Vinkla\Hashids\Facades\Hashids::decode($hashid)[0] ?? null;
        if (!$id) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Initialize validation rules
        $validationRules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.01',
        ];

        // Conditionally apply validation based on request data
        if ($request->filled('description')) {
            $validationRules['description'] = 'string|max:500';
        }

        // Validate the request data against the rules
        $request->validate($validationRules);

        // Find the item and update it with validated data
        $item = Item::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->noContent();
    }
}
