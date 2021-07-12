<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination; // main class required for pagination

    public $title, $short_info, $desc, $author;
    public $isBlogUpdate='list';
    public $blog, $blog_id;  // varaible must be public to get binding them into component


    public function render()
    {
        $this->blog = Blog::orderby('created_at','desc')->get();
        return view('livewire.blogs');
    }

    //to listen the js function created in the component.
    protected $listeners = [
        'deleteBlog'=>'delete'
        // deleteBlog is the function created in the component script &
        // delete is the function for deleting data from database which is created in this livewire controller
    ];

    // public function mount()
    // {
    //     $blog = Blog::orderby('created_at','desc')->get();
    // }

      protected $rules = [
        'title' => 'required|min:3',
        'short_info' => 'required|min:3',
        'desc' => 'required|min:3',
        'author' => 'required|min:3',
    ];

    protected $messages = [
        'title.required' => 'The title cannot be empty.',
        'title.min' => 'Minimum 3 chars.',

        'short_info.required' => 'The short info cannot be empty.',
        'short_info.min' => 'Minimum 3 chars.',

        'desc.required' => 'The description cannot be empty.',
        'desc.min' => 'Minimum 3 chars.',

        'author.required' => 'The author cannot be empty.',
        'author.min' => 'Minimum 3 chars.',
    ];

    public function resetFormFields(){
        $this->title='';
        $this->short_info='';
        $this->desc='';
        $this->author='';
    }

    public function resetFormback(){
        $this->isBlogUpdate='list';
        $this->resetFormFields();
    }

    public function create()
    {
        $this->isBlogUpdate='create';
    }

    public function closeForm()
    {
        $this->resetFormback();
        $this->hydrate();
    }

    public function store()
    {
        $this->validate();

        // only if validation get success
        $data= new Blog( [
            'title' => $this->title,
            'short_info' => $this->short_info,
            'description' => $this->desc,
            'author' => $this->author,
        ]);

        $data->save();
        $this->resetFormFields();
        session()->flash('message', 'Blog successfully saved.');

    }

    public function edit($id)
    {
        $this->hydrate();
        $this->isBlogUpdate='update';
        $data=Blog::where('id',$id)->first();

        $this->blog_id=$data->id;
        $this->title=$data->title;
        $this->short_info=$data->short_info;
        $this->desc=$data->description;
        $this->author=$data->author;
    }



    public function update()
    {
        $this->validate();

        // only if validation get success
        $data=  [
            'title' => $this->title,
            'short_info' => $this->short_info,
            'description' => $this->desc,
            'author' => $this->author,
        ];

        Blog::where('id',$this->blog_id)->update($data);
        $this->resetFormback();
        session()->flash('message', 'Blog successfully updated.');

    }

    public function delete($id){
        if($id){
            Blog::where('id', $id)->delete();
            session()->flash('message', 'Blog successfully deleted.');
        }
    }

    // function is for removie all the error message and validation
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
