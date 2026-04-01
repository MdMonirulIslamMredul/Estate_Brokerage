<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::all();
        return view('backend.project_category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.project_category.create');
    }

    public function store(Request $request)
    {
        error_log('=== STORE METHOD CALLED ===');
        error_log('Request data: ' . json_encode($request->all()));
        
        $validated = $request->validate([
            'name' => 'required|unique:project_categories',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1'
        ]);

        error_log('Validation passed: ' . json_encode($validated));

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => (int) $request->status,
            'slug' => Str::slug($request->name)
        ];

        error_log('Data array before create: ' . json_encode($data));
        error_log('Status type: ' . gettype($data['status']) . ', Value: ' . $data['status']);

        if ($request->hasFile('image')) {
            // Create directory if it doesn't exist
            if (!file_exists(public_path('backend/project_category'))) {
                mkdir(public_path('backend/project_category'), 0777, true);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/project_category'), $imageName);
            $data['image'] = 'backend/project_category/' . $imageName;
        }

        error_log('About to create category with: ' . json_encode($data));
        
        $category = ProjectCategory::create($data);
        
        error_log('Category created with ID: ' . $category->id . ', Status: ' . $category->status);
        
        return redirect()->route('all.project_category')->with('success', 'Category created successfully');
    }

    public function edit(ProjectCategory $category)
    {
        return view('backend.project_category.edit', compact('category'));
    }

    public function update(Request $request, ProjectCategory $category)
    {
        error_log('=== UPDATE METHOD CALLED ===');
        error_log('Request data (before validation): ' . json_encode($request->all()));

        $request->validate([
            'name' => 'required|unique:project_categories,name,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => (int) $request->status,
            'slug' => Str::slug($request->name)
        ];

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
            
            // Create directory if it doesn't exist
            if (!file_exists(public_path('backend/project_category'))) {
                mkdir(public_path('backend/project_category'), 0777, true);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/project_category'), $imageName);
            $data['image'] = 'backend/project_category/' . $imageName;
        }

        $category->update($data);
        return redirect()->route('all.project_category')->with('success', 'Category updated successfully');
    }

    public function destroy(ProjectCategory $category)
    {
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }
        $category->delete();
        return redirect()->route('all.project_category')->with('success', 'Category deleted successfully');
    }
}
