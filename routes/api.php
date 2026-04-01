<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ProjectSubcategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Project subcategories by category
Route::get('/project-subcategories/{categoryId}', function ($categoryId) {
    $subcategories = ProjectSubcategory::where('project_category_id', $categoryId)
        ->where('status', 1)
        ->get(['id', 'name']);
    return response()->json($subcategories);
});
