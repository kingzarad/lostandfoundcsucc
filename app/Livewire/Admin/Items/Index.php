<?php

namespace App\Livewire\Admin\Items;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $id, $foundby, $description, $description_f, $location, $location_f, $phone, $phone_f, $email, $turnedin, $returnto, $status, $status_f, $published, $published_f, $categories_id, $categories_id_f, $date, $date_f, $image, $image_f;

    public function render()
    {
        $items = Items::orderBy('created_at', 'DESC')->paginate(10);
        $categories = Categories::orderBy('created_at', 'DESC')->get();
        return view('livewire..admin.items.index', ['categories' => $categories, 'items' => $items]);
    }

    public function editItem(int $id)
    {

        $items = Items::findOrFail($id);

        if ($items) {
            session()->flash('editItemId', $items->id);
            $this->redirect('/admin/items/edit');

        } else {
            $this->redirect('/admin/category');
        }
    }

}
