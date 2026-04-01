<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Models\ProjectSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectSubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = ProjectSubcategory::with('category')->get();
        return view('backend.project_subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = ProjectCategory::where('status', 1)->get();
        return view('backend.project_subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1'
        ]);

        $data = [
            'project_category_id' => $request->project_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'slug' => Str::slug($request->name)
        ];

        if ($request->hasFile('image')) {
            // Create directory if it doesn't exist
            if (!file_exists(public_path('backend/project_subcategory'))) {
                mkdir(public_path('backend/project_subcategory'), 0777, true);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/project_subcategory'), $imageName);
            $data['image'] = 'backend/project_subcategory/' . $imageName;
        }

        ProjectSubcategory::create($data);
        return redirect()->route('all.project_subcategory')->with('success', 'Subcategory created successfully');
    }

    public function edit(ProjectSubcategory $subcategory)
    {
        $categories = ProjectCategory::where('status', 1)->get();
        return view('backend.project_subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, ProjectSubcategory $subcategory)
    {
        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1'
        ]);

        $data = [
            'project_category_id' => $request->project_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'slug' => Str::slug($request->name)
        ];

        if ($request->hasFile('image')) {
            if ($subcategory->image && file_exists(public_path($subcategory->image))) {
                unlink(public_path($subcategory->image));
            }
            
            // Create directory if it doesn't exist
            if (!file_exists(public_path('backend/project_subcategory'))) {
                mkdir(public_path('backend/project_subcategory'), 0777, true);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/project_subcategory'), $imageName);
            $data['image'] = 'backend/project_subcategory/' . $imageName;
        }

        $subcategory->update($data);
        return redirect()->route('all.project_subcategory')->with('success', 'Subcategory updated successfully');
    }

    public function destroy(ProjectSubcategory $subcategory)
    {
        if ($subcategory->image && file_exists(public_path($subcategory->image))) {
            unlink(public_path($subcategory->image));
        }
        $subcategory->delete();
        return redirect()->route('all.project_subcategory')->with('success', 'Subcategory deleted successfully');
    }
}
