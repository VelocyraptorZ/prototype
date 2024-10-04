<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $user;

    protected $listeners = ['roleSelected'];

    public function roleSelected(Role $role){
        $this->user->assignRole($role);
        $this->user->refresh();
    }

    public function remove($role)
    {
        $this->user->removeRole($role);
        $this->user->refresh();
    }
    
    public function render()
    {
        return view('livewire.user.roles');
    }
}