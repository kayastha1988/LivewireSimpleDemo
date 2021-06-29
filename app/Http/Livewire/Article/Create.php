<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Create extends Component
{

    public $email, $address, $address2, $city, $postcode;

    protected $rules = [
        'email' => 'required|email',
        'address' => 'required|min:3',
        'city' => 'required|min:3',
        'postcode' => 'required|min:3',
    ];

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        
        'address.required' => 'The Address cannot be empty.',
        'address.min' => 'Minimum 3 chars.',

        'city.required' => 'The City/Town cannot be empty.',
        'city.min' => 'Minimum 3 chars.',

        'postcode.required' => 'The Post Code cannot be empty.',
        'postcode.min' => 'Minimum 3 chars.',
    ];

    public function storeArticle()
    {
        $this->validate();

        // only if validation get success
        $data= new Article( [
            'email' => $this->email,
            'address' => $this->address,
            'address2' => $this->address2,
            'city' => $this->city,
            'postcode' => $this->postcode,
        ]);

        $isEmailExist=Article::where('email',$this->email)->first();
        // dd($isEmailExist);
        if($isEmailExist!='' || $isEmailExist !=null){
            return redirect()->back();
            session()->flash('message', 'Email already exists. Please! try another.');
        }

        $result=$data->save();

        if($result){
            return redirect()->route('article');
            session()->flash('message', 'Article successfully saved.');
        }else{
            return redirect()->route('article.add');
            session()->flash('message', 'Article failed to save.');
        }

    }

    public function updateArticle()
    {

        dd('this is the update function');

    }

    public function render()
    {
        return view('livewire.article.create');
    }
}
