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
        return response()->view('admin.items.index')->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
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

    public function show()
    {
        return view('admin.items.edit');
    }

    public function add()
    {
        return view('admin.items.add', ['categories' => Categories::orderBy('created_at', 'DESC')->get()]);
    }
}
