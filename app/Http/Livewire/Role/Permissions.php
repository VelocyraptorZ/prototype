<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\DocumentType;
use App\Models\Status;

class Permissions extends Component
{
    public $role, $existingPermissions;
    
    public $modules = array(
        "Company" => array('View Company', 'Create Company', 'Edit Company', 'Add Company Address', 'Delete Company'),
        "Item" => array('View Item', 'Create Item', 'Edit Item', 'Delete Item', 'Add Inventory'),
        "Role" => array('View Role', 'Create Role', 'Edit Role', 'Delete Role'),
        "User" => array('View User', 'Create User', 'Edit User', 'Delete User'),
    );

    public function mount()
    {
        if(!isset($this->role->Created_at)){
            $this->role = Role::find($this->role);
        }
        $this->existingPermissions = Permission::all()->pluck('name');
        $docTypes = DocumentType::get();
        // $statuses = Status::get();
        foreach($docTypes as $type)
        {
            $this->modules[$type->name]=array('View '.$type->name, 'Create '.$type->name, 'Edit '.$type->name, 'Delete '.$type->name, 'View '.$type->name.' Information', 'View '.$type->name.' Prices', 'Send '.$type->name.' Mail', 'Add '.$type->name.' Attachments', 'View '.$type->name.' Attachments', 'Add '.$type->name.' Comments', 'View '.$type->name.' Comments');
            if($type->payment_involved){
                $this->modules[$type->name][]='View '.$type->name.' Payment Log';
                $this->modules[$type->name][]='Add '.$type->name.' Payment Log';
            }

            /* foreach($statuses as $status)
            {
                $this->modules[$type->name][]='View '.$status->name.' '.$type->name;
                $this->modules[$type->name][]='Update '.$status->name.' '.$type->name;
            } */

            if($type->statuses){
                foreach($type->statuses as $status)
                {
                    $this->modules[$type->name][]='View '.$status.' '.$type->name;
                    $this->modules[$type->name][]='Update '.$status.' '.$type->name;
                }
            }
        }
        $this->createPermissions();
    }
    
    public function createPermissions()
    {
        foreach($this->modules as $module=>$vals)
        {
            foreach($vals as $key=>$permissionName)
            {
                Permission::firstOrCreate(['name' => $permissionName,'guard_name' => 'web']);
            }
        }
    }

    public function syncPermission($permissionName)
    {
        $permission = Permission::firstOrCreate(['name' => $permissionName,'guard_name' => 'web']);
        if($this->role->hasPermissionTo($permissionName)){
            $this->role->revokePermissionTo($permission);
        }else{
            $this->role->givePermissionTo($permission);
        }
    }

    public function render()
    {
        return View('livewire.role.permissions');
    }
}