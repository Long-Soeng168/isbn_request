<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\IsbnRequest;

use Image;

class IsbnCreate extends Component
{
    use WithFileUploads;

    public $image;

    public $title = null;
    public $authors = null;
    public $number_of_pages = null;
    public $format = null;
    public $price = null;
    public $publication_date = null;
    public $edition = null;
    public $description = null;
    public $isbn_last_received = null;
    public $language = 'khmer';



    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function save()
    {

        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string|max:255',
            'number_of_pages' => 'required|int',
            'format' => 'required|string|max:255',
            'price' => 'required|int',
            'publication_date' => 'required|date',
            'edition' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'isbn_last_received' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        // dd($validated);
        $validated['publisher_id'] = request()->user()->id;

        if(!empty($this->image)){
            // $filename = time() . '_' . $this->image->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->image->getClientOriginalExtension();

            $image_path = public_path('assets/images/isbn/'.$filename);
            $image_thumb_path = public_path('assets/images/isbn/thumb/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(1280,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;
        }

        $createdPublication = IsbnRequest::create($validated);

        // dd($createdPublication);
        return redirect('/isbn_requests')->with('success', 'Successfully Created!');

        session()->flash('success', 'Successfully Submit!');
    }

    public function render()
    {
        // dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.isbn-create');
    }
}
