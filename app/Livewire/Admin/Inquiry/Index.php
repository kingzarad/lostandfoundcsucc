<?php

namespace App\Livewire\Admin\Inquiry;

use App\Models\Inquiry;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        return view('livewire..admin.inquiry.index', [
            'inquiries' => Inquiry::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
}
