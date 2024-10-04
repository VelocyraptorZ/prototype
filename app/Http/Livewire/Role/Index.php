<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $iteration=0;

    use WithPagination;

    protected $listeners = ['reloadRoles'];

    public function reloadRoles()
    {
        $this->iteration++;
    }

    public function delete(Role $role)
    {
        $role->delete();
        $this->reloadRoles();
    }
    
    public function render()
    {
        return view('livewire.role.index', ['roles'=>Role::paginate(20)]);
    }
}