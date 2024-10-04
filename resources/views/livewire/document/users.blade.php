@if($document->user_id==Auth::id())
    <div class="p-4">
        <b>Accessible to</b>
        @foreach($document->users as $user)
            <div>
                <a wire:click="removeUser('{{ $user->id }}')">
                    <x-tabler-trash class="text-red-500 inline-block w-4 cursor-pointer" />
                </a>
                {{ $user->name }}
            </div>
        @endforeach
        @livewire('autocomplete',['table'=>'users', 'event'=>'userSelected'])
    </div>
@endif