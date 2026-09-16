<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\settings;
use App\Models\subcatagory;
use Illuminate\Http\Request;

class Generalsettingscontroller extends Controller
{
    //
   public function Generalsettings()
{
    try {

        $setting = Settings::first();

        if (!$setting) {
            return response()->json([
                'error' => true,
                'message' => 'Data not found',
                'generaldata' => []
            ], 404);
        }

        return response()->json([
            'error' => false,
            'settings' => $setting,
            'message' => 'Settings fetched successfully'
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
            'error' => true,
            'message' => 'Something went wrong',
            'generaldata' => [],
            // 'error_message' => $e->getMessage()
        ], 500);
    }

    }
    public function Categories()
    {
        try {
            $categories = Category::with('subcatagory')->orderBy('name', 'asc')->get();

            if ($categories->isEmpty()) {
                return response()->json([
                    'error' => true,
                    'message' => 'No categories found',
                    'categories' => []
                ], 404);
            }

            return response()->json([
                'error' => false,
                'categories' => $categories,
                'message' => 'Categories fetched successfully'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'categories' => [],
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
    public function Subcategories()
    {
        try {
            $subcategories = subcatagory::orderBy('name', 'asc')->get();

            if ($subcategories->isEmpty()) {
                return response()->json([
                    'error' => true,
                    'message' => 'No subcategories found',
                    'subcategories' => []
                ], 404);
            }

            return response()->json([
                'error' => false,
                'subcategories' => $subcategories,
                'message' => 'Subcategories fetched successfully'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'subcategories' => [],
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
}
