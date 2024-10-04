<div class="p-4">
    @foreach($modules as $module=>$vals)
        <div class="border rounded-lg mb-3 text-sm leading-relaxed">
            <div class="p-2 bg-gray-100">
                <h1>{{ $module }}</h1>
            </div>
            <div class="p-2">
            @foreach($vals as $key=>$permissionName)
                <input type="checkbox" id="{{ $module.$key }}" value="{{ $permissionName }}" wire:click="syncPermission('{{ $permissionName }}')" 
                @if($existingPermissions->contains($permissionName) && $role->hasPermissionTo($permissionName))
                    checked
                @endif >
                <label for="{{ $module.$key }}">{{ $permissionName }}</label>
                <br/>
            @endforeach
            </div>
        </div>
    @endforeach
</div>