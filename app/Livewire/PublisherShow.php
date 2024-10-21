<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Book;
use App\Models\IsbnRejectComment;
use App\Models\IsbnRequest;

use Image;

class PublisherShow extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $user;
    public function mount($id) {
        $this->user = User::findOrFail($id);
    }
    public function render()
    {
        $items = IsbnRequest::where(function($q){
            $q->where('status', 1)->orWhere('status', 0);
        })->where('publisher_id', $this->user->id)
        ->orderBy('status', 'DESC')
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('livewire.publisher-show', [
            'items' => $items,
        ]);
    }
}
