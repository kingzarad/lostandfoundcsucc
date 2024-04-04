<?php

namespace App\Livewire\Admin\Items;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Update extends Component
{
    use WithFileUploads;

    public $items, $categories;
    public $item_id,$image_d, $foundby, $description, $description_f, $location, $location_f, $phone, $phone_f, $email, $turnedin, $status, $status_f, $published, $published_f, $categories_id, $categories_id_f, $date, $date_f, $image, $image_f;

    public function mount()
    {
        $itemId = session()->get('editItemId');

        if ($itemId) {
            $this->items = Items::findOrFail($itemId);
            $this->categories= Categories::orderBy('created_at', 'DESC')->get();
            $this->item_id = $this->items->id;
            $this->foundby = $this->items->foundby;
            $this->description = $this->items->description;
            $this->description_f = $this->items->description;
            $this->location = $this->items->location;
            $this->location_f = $this->items->location;
            $this->phone = $this->items->phonenum;
            $this->phone_f = $this->items->phonenum;
            $this->email = $this->items->email;
            $this->turnedin = $this->items->turnedInto;
            $this->status_f = $this->items->status;
            $this->status = $this->items->status;
            $this->published = $this->items->published;
            $this->published_f = $this->items->published;
            $this->categories_id = $this->items->categories_id;
            $this->categories_id_f = $this->items->categories_id;
            $this->date = $this->items->date;
            $this->date_f = $this->items->date;
            $this->image_d = $this->items->image;
           // $this->image_f = $this->items->image;
        } else {
            $this->redirect('/admin/items', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire..admin.items.update', ['Items' => $this->items, 'categories' => $this->categories]);
    }

    public function updateFound(){
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
            'image_f' => 'nullable|image',

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



        $imagePath = null; // Initialize image path to null

        if (!empty($this->image_f)) {
            $Items = Items::findOrFail($this->item_id);
            if (!empty($Items->image)) {
                Storage::disk('public')->delete($Items->image);
            }

            $imagePath = $this->image_f->store('photos', 'public');
        }

        $itemData = [
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
            'categories_id' => $validData['categories_id_f'],

        ];

         // Update image path only if photos are provided
         if (!empty($imagePath)) {
            $itemData['image'] = $imagePath;
        }

        Items::where('id', $this->item_id)->update($itemData);
        session()->flash('success', 'Items updated successfully!');

    }

    public function updateLost(){
        $validData = $this->validate([
            'location' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:50',
            'email' => 'nullable|email|max:50',
            'phone' => 'required',
            'status' => 'required|min:3|max:50',
            'published' => 'required|min:3|max:50',
            'categories_id' => 'required',
            'date' => 'required',
            'image' => 'nullable|image',
        ], [
            'categories_id.required' => 'The category field is required.',
        ]);


        $imagePath = null; // Initialize image path to null

        if (!empty($this->image)) {
            $Items = Items::findOrFail($this->item_id);
            if (!empty($Items->image)) {
                Storage::disk('public')->delete($Items->image);
            }

            $imagePath = $this->image->store('photos', 'public');
        }

        $itemData = [
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
            'categories_id' => $validData['categories_id'],
        ];

         // Update image path only if photos are provided
         if (!empty($imagePath)) {
            $itemData['image'] = $imagePath;
        }

        Items::where('id', $this->item_id)->update($itemData);
        session()->flash('success', 'Items updated successfully!');
    }
}
