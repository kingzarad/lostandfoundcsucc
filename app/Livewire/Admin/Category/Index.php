<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;


    public function render()
    {
        return view('livewire..admin.category.index', ['categories' => Categories::orderBy('created_at', 'DESC')->paginate(10)]);
    }
}
