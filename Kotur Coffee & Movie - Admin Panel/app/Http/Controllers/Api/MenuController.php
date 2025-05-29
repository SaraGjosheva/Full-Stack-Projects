<?php

namespace App\Http\Controllers\Api;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $menuItems = MenuItem::all();
            return MenuItemResource::collection($menuItems);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to load menu items.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function index2()
    {
        return MenuItemResource::collection(MenuItem::all());
    }
}
