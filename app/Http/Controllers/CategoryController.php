<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


/**
 * @OA\Info(
 *     title="Category API",
 *     version="1.0.0",
 *     description="Category Application API documentation"
 * )
 */
 
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/category",
     *     summary="Get all Categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of categories",
     *     )
     * )
     */
    public function index()
    {
        $catgeories = Category::all();
        $data = [
            'categories' => $catgeories,
            'message' => 'Success',
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        $data = [
            'category' => $category,
            'message' => 'Success',
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        $data = [
            'category' => $category,
            'message' => 'Success',
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $data = [
            'category' => $category,
            'message' => 'Success',
        ];

        return response()->json($data, 200);
    }
}
