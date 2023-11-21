<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categories;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {

        return view('home', [
            'items' => Items::orderBy('created_at', 'DESC')->get(),
            'categories' => Categories::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:5|max:50',
            'purpose' => 'required|min:3|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required|min:5|max:50',
            'message' => 'required|min:5|max:200',
        ]);

        $inquiry = Inquiry::create([
            'name' => request()->get('name'),
            'purpose' => request()->get('purpose'),
            'email' => request()->get('email'),
            'phonenum' => request()->get('phone'),
            'message' => request()->get('message'),
            'status' => 'unmarked'
        ]);

        $inquiry->save();
        return redirect()->route('home')->with('success', 'Your message has been sent. Thank you!');
    }
}
