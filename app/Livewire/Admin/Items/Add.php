<?php

namespace App\Livewire\Admin\Items;

use App\Models\Items;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Add extends Component
{
    use WithFileUploads;

    public $categories;
    public $foundby, $description, $description_f, $location, $location_f, $phone, $phone_f, $email, $turnedin, $returnto, $status, $status_f, $published, $published_f, $categories_id, $categories_id_f, $date, $date_f, $image, $image_f;

    public function mount($categories){
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire..admin.items.add', ['categories' => $this->categories]);
    }


    public function saveFound()
    {

        $validData =  $this->validate([
            'foundby' => 'required|min:5|max:50',
            'location_f' => 'required|min:5|max:50',
            'description_f' => 'required|min:5|max:50',
            'email' => 'nullable|email|max:50',
            'phone_f' => 'required',
            'turnedin' => 'required|min:3|max:50',
            'status_f' => 'required|min:3|max:50',
            'date_f' => 'required',
            'published_f' => 'required|min:3|max:50',
            'categories_id_f' => 'required',
            'image_f' => 'required|image',

        ], [
            'turnedin.required' => 'The turn into field is required.',
            'description_f.required' => 'The description field is required.',
            'location_f.required' => 'The location field is required.',
            'phone_f.required' => 'The phone field is required.',
            'status_f.required' => 'The status field is required.',
            'published_f.required' => 'The published field is required.',
            'date_f.required' => 'The date field is required.',
            'image_f.required' => 'The image field is required.',
            'categories_id_f.required' => 'The category field is required.',

        ]);

       $imagePath = $this->image_f->store('photos', 'public');

        $items = Items::create([
            'description' => $validData['description_f'],
            'location' => $validData['location_f'],
            'email' => $validData['email'] ?? '',
            'phonenum' => $validData['phone_f'],
            'foundby' => $validData['foundby'],
            'turnedInto' =>  $validData['turnedin'],
            'purpose' =>  'found',
            'status' => $validData['status_f'],
            'published' => $validData['published_f'],
            'date' => $validData['date_f'],
            'image' => $imagePath,
            'categories_id' => $validData['categories_id_f'],
        ]);
        $items->save();

        $this->resetInput();
        session()->flash('success', 'Items created successfully!');
    }

    public function saveLost()
    {

        $validData = $this->validate([
            'location' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:50',
            'email' => 'nullable|email|max:50',
            'phone' => 'required',
            'status' => 'required|min:3|max:50',
            'published' => 'required|min:3|max:50',
            'categories_id' => 'required',
            'date' => 'required',
            'image' => 'required|image',
        ], [
            'categories_id.required' => 'The category field is required.',
        ]);

        $imagePath = $this->image->store('photos', 'public');

        $items = Items::create([
            'description' => $validData['description'],
            'location' => $validData['location'],
            'email' => $validData['email'] ?? '',
            'phonenum' => $validData['phone'],
            'foundby' => '',
            'turnedInto' => '',
            'purpose' => 'lost',
            'status' => $validData['status'],
            'published' => $validData['published'],
            'date' => $validData['date'],
            'image' => $imagePath,
            'categories_id' => $validData['categories_id'],
        ]);
        $items->save();
        $this->resetInput();
        session()->flash('success', 'Items created successfully!');
    }

    private function resetInput()
    {
        $this->reset(['foundby', 'description', 'description_f', 'location', 'location_f', 'phone', 'phone_f', 'email', 'turnedin', 'returnto', 'status', 'status_f', 'published', 'published_f', 'categories_id', 'categories_id_f', 'date', 'date_f', 'image', 'image_f']);
    }
}
