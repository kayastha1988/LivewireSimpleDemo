<?php

namespace App\Http\Livewire\Gallery;

use App\Models\ImageGallery;
use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;

    public $data;
    public $galleryId, $title, $image;

    protected $rules = [
        'title' => 'required|min:2',
        'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:10240',
    ];

    // function is for remove all the error message and validation
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function resetFormFields()
    {
        $this->title = '';
        $this->image = '';
    }

    public function resetFormback()
    {
        $this->resetFormFields();
    }

    public function closeForm()
    {
        $this->emit('galleryStore'); //TO CLOSE THE MODAL FORM. "reviewStore" =>its a event name defined in the jquery in livewire component
//        $this->emit('reviewUpdate');
//        $this->emit('reviewDelete');
        $this->resetFormback();
        $this->hydrate();
    }

    public function store()
    {
        $this->validate();

        $imageName = $this->image->store("images/galleries", 'public');
        ImageGallery::create([
            'title' => $this->title,
            'image' => $imageName
        ]);

        session()->flash('message', 'Image successfully uploaded for gallery.');
        $this->closeForm();
    }

    public function render()
    {
        $this->data= ImageGallery::get();
        return view('livewire.gallery.gallery');
    }
}
