<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::latest()->get();
        return view('menu.index', compact('items'));
    }

    // Show form to create a new item
    public function create()
    {
        return view('menu.create');
    }

    // Store new item
    public function store(Request $request)
    {
        $request->merge([
            'is_recommended' => $request->has('is_recommended'),
            'is_popular' => $request->has('is_popular'),
        ]);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'ingredients' => 'required|string',
            'image' => 'required|url',
            'is_recommended' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
        ]);

        MenuItem::create($request->only([
            'name',
            'category',
            'ingredients',
            'image',
            'is_recommended',
            'is_popular'
        ]));

        return redirect()->route('menu.index')->with('success', 'Мени продукт успешно креиран!');
    }

    // Show form to edit an item
    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        return view('menu.edit', compact('item'));
    }

    // Update the item
    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $request->merge([
            'is_recommended' => $request->has('is_recommended'),
            'is_popular' => $request->has('is_popular'),
        ]);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'ingredients' => 'required|string',
            'image' => 'required|url',
            'is_recommended' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
        ]);

        $item->update($request->only([
            'name',
            'category',
            'ingredients',
            'image',
            'is_recommended',
            'is_popular'
        ]));

        return redirect()->route('menu.index')->with('success', 'Мени продукт успешно променет!');
    }

    // Delete an item
    public function destroy($id)
    {
        MenuItem::destroy($id);
        return redirect()->route('menu.index')->with('success', 'Мени продукт успешно избришан!');
    }
}
