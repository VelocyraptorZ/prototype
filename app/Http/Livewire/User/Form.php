<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Form extends Component
{
    public $user, $event;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'email',
    ];

    public function mount(){
        if(!$this->user){
            $this->user = New user;
        }
    }

    public function save()
    {
        $validated = $this->validate();
        $this->user->save();
        if($this->event){
            $this->emit($this->event, $this->user->id);
            $this->emitUp('closeModal');
        }else{
            session()->flash('message', ' Successfully saved.');
        }
    }

    public function render()
    {
        return view('livewire.user.form');
    }
}