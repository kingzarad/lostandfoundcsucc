<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categories;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function Index()
    {
        return view('admin.items.index', [
            'items' => Items::orderBy('created_at', 'DESC')->get(),
            'categories' => Categories::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function store()
    {
       // dd(request()->all());
        request()->validate([
            'foundby' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:50',
            'location' => 'required|min:5|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required',
            'turnedin' => 'required|min:3|max:50',
            'returnto' => 'required|min:3|max:50',
            'status' => 'required|min:3|max:50',
            'published' => 'required|min:3|max:50',
            'categories_id' => 'required',
            'date' => 'required'
        ], [
            'turnedin.required' => 'The turn into field is required.',
            'returnto.required' => 'The purpose field is required.',
            'categories_id.required' => 'The category field is required.',
        ]);


        $items = Items::create([
            'description' => request()->get('description'),
            'location' => request()->get('location'),
            'email' => request()->get('email'),
            'phonenum' => request()->get('phone'),
            'foundby' => request()->get('foundby'),
            'turnedInto' => request()->get('turnedin'),
            'returnTo' => request()->get('returnto'),
            'status' => request()->get('status'),
            'published' => request()->get('published'),
            'date' => request()->get('date'),
            'categories_id' => request()->get('categories_id'),
        ]);
        $items->save();

        return redirect()->route('items.form')->with('success', 'Items created successfully!');
    }

    public function destroy(Items $id)
    {
        try {
            $id->delete();
            return redirect()->route('items')->with('success', 'Delete successfully!');
        } catch (ModelNotFoundException  $e) {
            return redirect()->route('items')->with('error', 'Record not found.');
        }
    }

    public function update(Items $items)
    {
        request()->validate([
            'foundby' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:50',
            'location' => 'required|min:5|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required',
            'turnedin' => 'required|min:3|max:50',
            'returnto' => 'required|min:3|max:50',
            'published' => 'required|min:3|max:50',
            'categories_id' => 'required',
            'date' => 'required'
        ], [
            'turnedin.required' => 'The turn into field is required.',
            'returnto.required' => 'The purpose field is required.',
        ]);



        $items->description = request()->get('description', '');
        $items->location = request()->get('location', '');
        $items->email = request()->get('email', '');
        $items->phonenum = request()->get('phone', '');
        $items->foundby = request()->get('foundby', '');
        $items->turnedInto = request()->get('turnedin', '');
        $items->returnTo = request()->get('returnto', '');
        $items->status = request()->get('status', '');
        $items->published = request()->get('published', '');
        $items->date = request()->get('date', '');
        $items->categories_id = request()->get('categories_id', '');

        $items->save();
        return redirect()->route('items')->with('success', 'Items updated successfully!');
    }

    public function show(Items $id)
    {
        return view('admin.items.edit', [
            'Items' => $id,
            'categories' => Categories::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function add()
    {
        return view('admin.items.add', ['categories' => Categories::orderBy('created_at', 'DESC')->get()]);
    }
}
