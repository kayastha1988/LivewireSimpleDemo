<?php

namespace App\Http\Livewire\Gallery;

use App\Models\ImageGallery;
use Illuminate\Support\Facades\Gate;
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
        $this->emit('galleryDelete');
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

    public function delete($id)
    {
        $this->galleryId = $id;
    }

    public function destroy()
    {
        if (Gate::allows('isAdmin')) {
            $galleryImage = ImageGallery::where('id', $this->galleryId)->first();
            if ($galleryImage) {
                if (file_exists('storage/' . $galleryImage->image)) {
                    unlink('storage/' . $galleryImage->image);
                }
                ImageGallery::where('id', $this->galleryId)->delete();

                session()->flash('message', 'Image successfully deleted from gallery.');
            } else {
                session()->flash('message', 'Something went wrong. Please try again.');
            }
            $this->closeForm();
        } else {
            session()->flash('message', 'Sorry! you don\' have access to this action. Thanks');
            $this->closeForm();
        }

    }

    public function render()
    {
        $this->data = ImageGallery::get();
        return view('livewire.gallery.gallery');
    }
}
