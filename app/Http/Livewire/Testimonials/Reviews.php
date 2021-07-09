<?php

namespace App\Http\Livewire\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;

class Reviews extends Component
{
    public $reviewId, $name, $review, $data;

    protected $rules = [
        'name' => 'required|min:2',
        'review' => 'required|min:2',
    ];

    /*
     *to listen the js function created in the component.
     * this is compolsory only if we are using js confirm box to delete data.
     */
    protected $listeners = [
        'deleteReview' => 'delete'
        // deleteReview is the function created in the component script &
        // delete is the function for deleting data from database which is created in this livewire controller
    ];

    // function is for remove all the error message and validation
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function resetFormFields()
    {
        $this->name = '';
        $this->review = '';
    }

    public function resetFormback()
    {
        $this->resetFormFields();
    }

    public function closeForm()
    {
        $this->emit('reviewStore'); //TO CLOSE THE MODAL FORM. "reviewStore" =>its a event name defined in the jquery in livewire component
        $this->emit('reviewUpdate');
        $this->emit('reviewDelete');
        $this->resetFormback();
        $this->hydrate();
    }

    public function store()
    {
        $this->validate();

        Testimonial::create([
            'name' => $this->name,
            'review' => $this->review
        ]);

        session()->flash('message', 'Review successfully added.');
        $this->closeForm();

    }

    public function edit($id)
    {
        $this->reviewId = $id;
        $data = Testimonial::where('id', $this->reviewId)->first();
        $this->name = $data->name;
        $this->review = $data->review;
    }

    public function update()
    {
        $this->validate();
        $data = [
            'name' => $this->name,
            'review' => $this->review,
        ];
        Testimonial::where('id', $this->reviewId)->update($data);
        session()->flash('message', 'Review successfully updated.');
        $this->closeForm();
    }

    /* passing id data to the delete modal...*/
    public function delete($id)
    {
        $this->reviewId = $id;
    }

    public function destroy()
    {
        if ($this->reviewId) {
            Testimonial::where('id', $this->reviewId)->delete();
            session()->flash('message', 'Review successfully deleted.');
            $this->closeForm();
        }
    }

    public function render()
    {
        $this->data = Testimonial::get();
        return view('livewire.testimonials.reviews');
    }

}
