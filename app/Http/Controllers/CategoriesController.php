<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function Index()
    {

        return response()->view('admin.category.index', ['categories' => Categories::orderBy('created_at', 'DESC')->get()])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');

    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:5|max:50'
        ]);

        $categories = Categories::create([
            'categories_name' => request()->get('name')
        ]);

        $categories->save();
        return redirect()->route('category.form')->with('success', 'Category created successfully!');
    }

    public function destroy(Categories $id)
    {
        try {
            $id->delete();
            return redirect()->route('category')->with('success', 'Delete successfully!');
        } catch (ModelNotFoundException  $e) {
            return redirect()->route('category')->with('error', 'Record not found.');
        }
    }

    public function update(Categories $categories)
    {
        request()->validate([
            'name' => 'required|min:5|max:50'
        ]);

        $categories->categories_name = request()->get('name', '');
        $categories->save();
        return redirect()->route('category')->with('success', 'Category updated successfully!');
    }

    public function show(Categories $id)
    {
        return view('admin.category.edit', ['category' => $id]);
    }

    public function add()
    {
        return view('admin.category.add');
    }
}
