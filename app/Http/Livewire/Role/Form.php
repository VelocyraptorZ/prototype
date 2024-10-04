<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Form extends Component
{
    public $role, $event;
    
    protected $rules = [
        'role.name' => 'required|unique:roles,name',
        'role.guard_name' => 'required'
    ];

    public function mount(){
        if($this->role==null){
            $this->role = New Role;
            $this->role->guard_name = 'web';
        }elseif(is_numeric($this->role)){
            $this->role = Role::find($this->role);
        }
    }

    public function save()
    {
        $validated = $this->validate();
        //$role = Role::create(['name' => 'writer']);
        $this->role->save();
        session()->flash('message', ' Successfully created.');
        if($this->event){
            $this->emit($this->event, $this->role->id);
            $this->emitUp('closeModal');
        }else{
            //return redirect()->to(route('roles.index'));
        }
    }
    
    public function render()
    {
        return view('livewire.role.form');
    }
}