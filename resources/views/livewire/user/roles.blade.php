<div>
    <h2 class="font-semibold">Roles</h2>
    <div class="text-sm">
        @foreach($user->getRoleNames() as $role)
            <a wire:click="remove('{{ $role }}')" class="text-red-500 cursor-pointer">Remove</a>
            {{ $role }}<br/>
        @endforeach
    </div>
    <div>
        @livewire('autocomplete',['table'=>'roles', 'event'=>'roleSelected', 'createComponent'=>'role.form'])
    </div>
</div>