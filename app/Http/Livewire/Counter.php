<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $_count=0;
    public function increment()
    {
        $this->_count++;
    }
    
    public function decrement()
    {
        $this->_count--;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
